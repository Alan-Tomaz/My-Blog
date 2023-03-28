<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>


<body>
    <section class="form-section add-content">
        <div class="container form-section-container">
            <h2>Edit Category</h2>
            <div class="alert-message error">
                <p>This is an error message</p>
            </div>
            <form action="<?= ROOT_URL ?>admin/pages/edit-category-logic.php" enctype="multipart/form-data" class="form-general">
                <input type="text" name="title" placeholder="Title">
                <textarea name="description" rows="4" placeholder="Description"></textarea>
                <button type="submit" name="submit" class="btn">Update Category</button>
            </form>
        </div>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>