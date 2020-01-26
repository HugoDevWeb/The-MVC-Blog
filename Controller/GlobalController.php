<?php


Class GlobalController
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);


        switch ($page) {
            case ($page === "/"):
                $this->db->readAll('articles');
                $category = $this->db->readAll("categories");
                require "views/articles/index.php";
                break;

            case ($page === "show_article"):
                $id = $_GET['id'];
                $this->db->readArticle($id);
                require "views/articles/show.php";
                break;

            case ($page === "categories"):
                $this->db->readAll("categories");
                require "views/categories/index.php";
                break;


            case ($page === "show_category"):
                $id = $_GET['id'];
                $this->db->readCategory($id);
                $id2 = $_GET['id'];
                $this->db->getArticleFromCategory($id2);
                require "views/categories/show.php";
                break;

            case ($page === "create_article"):
                if (isset($_POST["insert_article"])) {
                    $art = new Article();
                    $art->setTitle($_POST["title"]);
                    $art->setDescription($_POST["description"]);
                    $art->setCategoryId($_POST["category_id"]);

                    $insert_success = $this->createArticle($art);
                    header("Location: /");
                    exit();
                }
                require "views/articles/create.php";
                break;

            case ($page === "edit_article"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->db->getById('articles', $id);
                    require "views/articles/edit.php";
                }
                break;

            case ($page === "do_edit_article"):
                if (isset($_POST['edit_article'])) {
                    $art = new Article();
                    $art->setId($_POST["id"]);
                    $art->setTitle($_POST["title"]);
                    $art->setDescription($_POST["description"]);
                    $art->setCategoryId($_POST["category_id"]);
                    var_dump($art);
                    $this->updateArticle($art);

                    header('Location: /');
                    exit();
                }
                break;


            case ($page === "delete_article"):
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->db->delete('articles',$id);
                    header('Location: /');
                    exit();
                }
                break;

            default:
                require "views/start.php";
                break;
        }
    }

    public function createArticle(Article $article)
    {
        return $this->db->create('articles', $article->toArray());
    }

    public function updateArticle(Article $art) {
        return $this->db->update('articles', $art->getId(), $art->toArray());
    }

}