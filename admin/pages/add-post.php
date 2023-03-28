<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>


<body>
    <section class="form-section-alt ">
        <div class="container form-section-container">
            <h2>Add Post</h2>
            <div class="alert-message error">
                <p>This is an error message</p>
            </div>
            <form action="<?php echo ROOT_URL ?>admin/pages/content-test.php" enctype="multipart/form-data" class="form-general" method="POST">
                <input type="text" name="title" placeholder="Title">
                <select name="category">
                    <option value="1">Wild Life</option>
                    <option value="2">Art</option>
                    <option value="3">Travel</option>
                    <option value="4">Music</option>
                    <option value="5">Science and Technology</option>
                    <option value="6">Food</option>
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
                    </div>
                    <textarea name="body" rows="0" cols="0" id="hidden-input"></textarea>
                </div>
                <div class="form-control inline">
                    <input type="checkbox" name="is-featured" id="is-featured" checked>
                    <label for="is-featured">Featured</label>
                </div>
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