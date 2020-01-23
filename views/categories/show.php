<?php
/* @var Database $db */
require "views/partials/header.php";
?>
<?php
/* @var Model $id */

$category = $this->db->readCategory($_GET["id"]);
$articles = $this->db->getArticleFromCategory($category[0]["id"]);

/* @var GlobalController $article */
/* @var GlobalController $category */
?>

    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <h1 class="display-4 "><?php echo $category[0]["title"] ?></h1>
            <h4 class="display-5 border-bottom border-primary mb-2 p-2">Liste des blogs appartenant à cette
                catégorie</h4>
            <div class="row align-items-center text-center">
                <?php foreach ($articles as $article): ;?>
                    <div class="col-12 col-md-6 col-lg-4 my-5">
                        <a href="/index.php?page=show_article&id=<?php echo $article['id'] ?>" class="btn bt-primary bg-primary text-white"><h4 class="display-6 "><?= $article["title"] ?></h4></a>
                    </div>
                <?php endforeach ?>
            </div>
            <a href="/index.php?page=categories" class="btn btn-warning mt-2"><- Go back</a>
        </div>

    </div>

<?php
require "views/partials/footer.php";
?>