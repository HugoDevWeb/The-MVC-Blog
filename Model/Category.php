<?php

class Category
{
    private $id;
    private $title;

    public function __construct($categories_data = [])
    {
        if (isset($director_data['id'])) {
            $this->id = $categories_data['id'];
            $this->title = $categories_data['title'];
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
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function toArray()
    {
        return [
            "id" => $this->getId(),
            "title" => $this->getTitle(),
        ];
    }
}