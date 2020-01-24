<?php
require "views/partials/header.php";
?>

    <form action="/index.php?page=create_article" method="post" class="mt-5">

        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Description"></textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Category: </label>
            <select class="form-control" id="category_id" name="category_id">
                <?php
                foreach ($this->db->readAll('categories') as $value) :
                    /* @var Category $value */
                    ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success" name="insert_article" id="insert_article">Insert new article</button>
    </form>

<?php
require "views/partials/footer.php";
?>