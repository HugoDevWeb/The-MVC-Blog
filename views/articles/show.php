<?php
/* @var Database $db */
require "views/partials/header.php";
?>
<?php
/* @var Model $id */

$article = $this->db->getById("articles", $_GET["id"]);

$category = $this->db->readCategory($article[0]["category_id"]);

/* @var GlobalController $article*/
/* @var GlobalController $categories*/
?>

    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <h1 class="display-4"><?php echo $article[0]["title"] ?></h1>
            <h4 class="display-5 border-bottom border-secondary p-2 mb-3">Category: <?php echo $category[0]["title"] ?>
                <a href="/index.php?page=show_category&id=<?php echo $category[0]['id'] ?>" class="btn btn-primary float-right p-2">Infos about this category -></a></h4>
            <p class="lead"><?php echo $article[0]["description"] ?></p>
            <a href="/" class="btn btn-warning mt-2"><- Go back</a>
        </div>

    </div>

<?php
require "views/partials/footer.php";
?>