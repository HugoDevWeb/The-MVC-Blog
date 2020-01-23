<?php

class Article
{
    private $id;
    private $title;
    private $description;
    private $category_id;

    public function __construct($articles_data = [])
    {
        if (isset($director_data['id'])) {
            $this->id = $articles_data['id'];
            $this->title = @$articles_data['title'];
            $this->description = @$articles_data['description'];
            $this->category_id = @$articles_data["category_id"];
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $name
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "title" => $this->getTitle(),
            "description" => $this->getDescription(),
            "category_id" => $this->getCategoryId()
        ];
    }
}