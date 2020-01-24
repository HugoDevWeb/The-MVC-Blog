<?php

class Database
{


    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getById($table, $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE `id` = :id');
        $query->bindValue(":id", $id);
        $success = $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $res : [];
    }

    public function readAll($table)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $table);
        $success = $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    public function readArticle($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM articles WHERE `id` = :id');
        $query->bindValue(':id', $id);
        $success = $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getCategoryFromArticle($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM categories WHERE `id` = :id');
        $query->bindValue(":id", $id);
        $success = $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $res : [];
    }

    public function readCategory($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM categories WHERE `id` = :id');
        $query->bindValue(':id', $id);
        $success = $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getArticleFromCategory($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM articles WHERE `category_id` = :id');
        $query->bindValue(":id", $id);
        $success = $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $res : [];
    }

    public function create($table, $data)
    {
        $columns = array_keys($data);
        $columnSql = implode(',', $columns);
        $bindingSql = ":" . implode(",:", $columns);

        $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
        $req = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $req->bindValue(":" . $key, $value);
        }
        $status = $req->execute();
        return $status ? $this->pdo->lastInsertId() : false;
    }

    public function update($table, $id, $data)
    {
        if (isset($data["id"]))
            unset($data["id"]);

        $columns = array_keys($data);
        $columns = array_map(function ($item) {
            return $item . "=:" . $item;
        }, $columns);

        $bindingSql = implode(',', $columns);
        $sql = "UPDATE $table SET $bindingSql WHERE `id` = :id";
        $req = $this->pdo->prepare($sql);
        $data["id"] = $id;
        foreach ($data as $key => $value) {
            $req->bindValue(':' . $key, $value);
        }
        return $req->execute();

    }


    public function delete($table, $id)
    {
        $stm = $this->pdo->prepare('DELETE FROM ' . $table . ' WHERE id = :id');
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        return ($success);
    }


}
