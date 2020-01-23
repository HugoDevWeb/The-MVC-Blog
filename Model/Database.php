<?php

class Database{


    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getById($table, $id){
        $query = $this->pdo->prepare('SELECT * FROM '.$table.' WHERE `id` = :id');
        $query->bindValue(":id", $id);
        $success = $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $res: [];
    }

    public function readAll($table){
        $query = $this->pdo->prepare('SELECT * FROM '.$table);
        $success = $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows: [];
    }

    public function readArticle($table, $id){
        $query = $this->pdo->prepare('SELECT * FROM ' .$table. ' WHERE `id` = :id');
        $query->bindValue(':id', $id);
        $success = $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row: [];
    }



}
