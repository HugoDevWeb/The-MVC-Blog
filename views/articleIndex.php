<?php
/* @var GlobalController $this */
require "partials/header.php";
?>

    <!--    <a class="btn btn-default" href="/index.php?page=show_movies&id=--><?php //echo $value['id']; ?><!--">Info</a>-->

    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->db->readAll("articles") as $article): ?>
                <tr class="border">
                    <td class="border"><?= $article["id"] ?></td>
                    <td class="border"><?= $article["title"] ?></td>
                    <td class="w-50 border"><?php
                        echo substr($article["description"], 0, 120) . "..."
                        ?>
                    </td>
                    <td><a href="" class="btn btn-primary rounded-pill">Info</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?php
require "partials/footer.php";
?>