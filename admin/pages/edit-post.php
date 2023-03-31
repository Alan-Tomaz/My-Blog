<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';


// fetch categories from database 
$categoryQuery = "SELECT * FROM categories";
$categories = mysqli_query($connection, $categoryQuery);

// fetch post data from database if id is set
if (isset($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    var_dump($featuredPosts);
} else {
    header("location: " . ROOT_URL . "admin/pages/manage-posts.php");
    die();
}

?>
<section class="form-section-alt ">
    <div class="container form-section-container">
        <h2>Edit Post</h2>
        <form action="<?php echo ROOT_URL ?>admin/pages/edit-post-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
            <input type="hidden" name="id" value="<?= $post["id"]  ?>">
            <input type="hidden" name="previous-thumbnail-name" value="<?= $post["thumbnail"]  ?>">
            <input type="text" name="title" placeholder="Title" value="<?= $post['title']  ?>">

            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category["id"] ?>"><?= $category["title"] ?></option>
                <?php endwhile ?>
            </select>
            <div class="text-editor-container">
                <div class="text-editor-header">
                    <button class="btn-text-editor" type="button" data-element="bold">
                        <i class="fa fa-bold"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="italic">
                        <i class="fa fa-italic"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="underline">
                        <i class="fa fa-underline"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="insertUnorderedList">
                        <i class="fa fa-list-ul"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="insertOrderedList">
                        <i class="fa fa-list-ol"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="createLink">
                        <i class="fa fa-link"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="justifyLeft">
                        <i class="fa fa-align-left"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="justifyCenter">
                        <i class="fa fa-align-center"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="justifyRight">
                        <i class="fa fa-align-right"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="justifyFull">
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="insertImage">
                        <i class="fa fa-image"></i>
                    </button>
                    <button class="btn-text-editor" type="button" data-element="fontSize">
                        <i class="fa fa-text-height"></i>
                    </button>
                </div>
                <div class="text-editor-content" contenteditable="true" id="text-editor-content-id"><?php echo (htmlspecialchars_decode($post["body"], ENT_QUOTES)) ?></div>

                <textarea name="body" rows="0" cols="0" id="hidden-input"><?php echo (htmlspecialchars_decode($post["body"], ENT_QUOTES)) ?></textarea>
            </div>
            <div class="form-control inline">
                <input type="checkbox" name="is-featured" id="is-featured" value="1" checked>
                <label for="is-featured">Featured</label>
            </div>
            <div class="form-control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Edit Post</button>
        </form>
    </div>
</section>

<script src="<?= ROOT_URL ?>js/textEditor.js"></script>
<script src="https://use.fontawesome.com/6cb622e004.js"></script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>