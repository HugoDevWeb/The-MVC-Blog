<?php
/* @var GlobalController $this */
/* @var Model $category */
require "views/partials/header.php";

$articles = $this->db->readAll("articles");
?>

    <!--    <a class="btn btn-default" href="/index.php?page=show_movies&id=--><?php //echo $value['id']; ?><!--">Info</a>-->

    <div class="container mt-5 mx-0">
        <a href="/index.php?page=create_article"
           class="btn btn-secondary rounded-pill float-right">Create article</a>
        <?php if (count($articles) < 1) echo "<h4>There's no article to display right now</h4>" ?>

        <?php if (count($articles) >= 1): ?>
            <table class="table table-striped w-100">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>


                <?php foreach ($articles as $article): ; ?>
                    <tr class="border">
                        <td class="border"><?= $article["title"] ?></td>
                        <td class="w-50 border"><?php
                            echo substr($article["description"], 0, 120) . "..."
                            ?>
                        </td>
                        <?php foreach ($this->db->getCategoryFromArticle($article["category_id"]) as $category): ; ?>
                            <td class="border"><?= $category["title"] ?></td>
                        <?php endforeach ?>


                        <td>
                            <a href="/index.php?page=show_article&id=<?php echo $article['id'] ?>"
                               class="btn btn-primary rounded-pill w-75 mb-1">Info</a>

                            <a href="/index.php?page=delete_article&id=<?php echo $article['id'] ?>"
                               class="btn btn-danger rounded-pill w-75 mb-1">Delete article</a>

                            <a href="/index.php?page=edit_article&id=<?php echo $article['id']; ?>"
                               class="btn btn-info rounded-pill w-75">edit article</a>
                        </td>
                    </tr>
                <?php endforeach ?>

                </tbody>
            </table>
        <?php endif; ?>
    </div>


<?php
require "views/partials/footer.php";
?>