<?php
/* @var Article $article */
/* @var GlobalController $this */
require "views/partials/header.php";
?>

<?php
$article = $this->db->getById("articles", $_GET["id"]);
$category = $this->db->readCategory($article[0]["category_id"]);
?>


    <form action="/index.php?page=do_edit_article" method="post" class="mt-5">
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $article[0]["id"]; ?>"
                   readonly>
        </div>

        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo $article[0]['title']; ?>"
                   required>
        </div>
        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control"
                      rows="5"><?php echo $article[0]["description"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category: </label>
            <select class="form-control" name="category_id" id="category_id">
                <?php
                foreach ($this->db->readAll('categories') as $value) :
                    ?>
                    <option value="<?php echo $value['id']; ?>" <?php if ($value["title"] == $category[0]["title"]) echo "selected"?>>
                        <?php echo $value['title']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="edit_article">Update article</button>
    </form>

<?php
require "views/partials/footer.php";
?>