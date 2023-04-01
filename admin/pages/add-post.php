<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

//fetch  categories from database 
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// get back form data if there was a registration error
$title = $_SESSION['add-post-data']['title'] ?? null; //null coalesscence operator
$body = $_SESSION['add-post-data']['body'] ?? null;
//delete add-posts data session
unset($_SESSION['add-post-data']);


?>


<body>
    <section class="form-section-alt ">
        <div class="container form-section-container">
            <h2>Add Post</h2>
            <?php if (isset($_SESSION['add-post'])) : ?>
                <div class="alert-message error">
                    <?= $_SESSION['add-post'];
                    unset($_SESSION['add-post']);
                    ?>
                </div>
            <?php endif ?>
            <form action="<?php echo ROOT_URL ?>admin/pages/add-post-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
                <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
                <select name="category">
                    <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
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
                    <div class="text-editor-content" contenteditable="true">
                        <?= $body ?>
                    </div>
                    <textarea name="body" rows="0" cols="0" id="hidden-input"><?= $body ?></textarea>
                </div>
                <?php if (isset($_SESSION['user-is-admin'])) : ?>
                    <div class="form-control inline">
                        <input type="checkbox" name="is-featured" id="is-featured" value="1" checked>
                        <label for="is-featured">Featured</label>
                    </div>
                <?php endif ?>
                <div class="form-control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Add Post</button>
            </form>
        </div>
    </section>
    <script src="<?= ROOT_URL ?>js/textEditor.js"></script>
    <script src="https://use.fontawesome.com/6cb622e004.js"></script>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>