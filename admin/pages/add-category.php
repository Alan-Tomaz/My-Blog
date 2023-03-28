<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>


<body>
    <section class="form-section ">
        <div class="container form-section-container">
            <h2>Add Category</h2>
            <div class="alert-message error">
                <p>This is an error message</p>
            </div>
            <form action="<?php echo ROOT_URL ?>admin/pages/add-category-logic.php" enctype="multipart/form-data" class="form-general">
                <input type="text" name="title" placeholder="Title">
                <textarea name="description" rows="4" placeholder="Description"></textarea>
                <button type="submit" name="submit" class="btn">Add Category</button>
            </form>
        </div>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>