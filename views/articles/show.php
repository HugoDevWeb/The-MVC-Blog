<?php
/* @var Database $db */
require "views/partials/header.php";
?>
<?php
/* @var Model $id */
$article = $this->db->getById("articles", $_GET["id"])
/* @var GlobalController $articles*/
?>

    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <h1 class="display-4"><?php echo $article[0]["title"] ?></h1>
            <p class="lead"><?php echo $article[0]["description"] ?></p>
            <a href="/" class="btn btn-info mt-2"><- Go back</a>
        </div>

    </div>

<?php
require "views/partials/footer.php";
?>