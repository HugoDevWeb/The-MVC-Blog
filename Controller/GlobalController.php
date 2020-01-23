<?php


Class GlobalController
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function index(){
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
//
//            case ($page === "delete_movie"):
//                if (isset($_GET['id'])) {
//                    $id = $_GET['id'];
//                    $this->db->delete('films',$id);
//                    header('Location: /index.php?page=show');
//                    exit();
//                }
//                require "views/show_movies.php";
//                break;
//
//            case ($page === "create_movie"):
//                if (isset($_POST['insert_movie'])) {
//                    $movie = new Movie();
//                    $movie->setDirectorId($_POST['director_id']);
//                    $movie->setTitle($_POST['title']);
//                    $movie->setAltTitle($_POST['alt_title']);
//                    $movie->setYear($_POST['year']);
//                    $insert_success_movie = $this->createMovies($movie);
//                    header('Location: /index.php?page=show&insert_success_movie=' . (bool)$insert_success_movie . '&id=' . $movie->getId());
//                    exit();
//                }
//                require "views/create.php";
//                break;
//
//            case ($page === "create_director"):
//                if (isset($_POST['insert_director'])) {
//                    $director = new Director();
//                    $director->setName($_POST['name']);
//                    $director->setBirthYear($_POST['birth_year']);
//                    $director->setNationality($_POST['nationality']);
//                    $insert_success_director = $this->createDirector($director);
//                    header('Location: /index.php?page=show&insert_success_director=' . (bool)$insert_success_director . '&id=' . $director->getId());
//                    exit();
//                }
//                require "views/create_director.php";
//                break;
//
//            case ($page === "update_movie"):
//                if (isset($_GET['id'])) {
//                    $id = $_GET['id'];
//                    $movie = $this->db->getById('films', $id);
//                    require "views/update.php";
//                }
//                break;
//
//            case ($page === "do_update_movie"):
//                if (isset($_POST['update_movie'])) {
//                    $movie = new Movie($_POST);
//                    $update_success_movie = $this->updateMovies($movie);
//                    header('Location: /index.php?page=show&update_success_movie=' . (int)$update_success_movie . '&id=' . $movie->getId());
//                    exit();
//                }
//                break;
//
//            case ($page === "update_director"):
//                if (isset($_GET['id'])) {
//                    $id = $_GET['id'];
//                    $director = $this->db->getById('director', $id);
//                    require "views/update_director.php";
//                }
//                break;
//
//            case ($page === "do_update_director"):
//                if (isset($_POST['update_director'])) {
//                    $director = new Director($_POST);
//                    $update_success_director = $this->updateDirector($director);
//                    header('Location: /index.php?page=show&update_success_director=' . (int)$update_success_director . '&id=' . $director->getId());
//                    exit();
//                }
//                break;

            default:
                require "views/start.php";
                break;
        }
    }

}