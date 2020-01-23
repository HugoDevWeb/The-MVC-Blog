<?php


Class GlobalController
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function index(){
        $this->db->readAll('articles');
        require "views/articleIndex.php";
    }
}