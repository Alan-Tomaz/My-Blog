<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

if (isset($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

    //fetch category from database
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['edit-category'] = "This User Doesn't exists";
        header('location: ' . ROOT_URL . 'admin/pages/manage-categories.php');
    }
} else {
    header("location: " . ROOT_URL . "admin/pages/manage-categories.php");
    die();
}

if (!isset($_SESSION['user-is-admin'])) {
    $_SESSION["access-not-authorized"] = "You are not authorized to access this session.";
    header("location: " . ROOT_URL . "admin/index.php");
    die();
}
?>


<body>
    <section class="form-section add-content">
        <div class="container form-section-container">
            <h2>Edit Category</h2>
            <form action="<?= ROOT_URL ?>admin/pages/edit-category-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Title">
                <textarea name="description" rows="4" placeholder="Description"><?= $category["description"] ?></textarea>
                <button type="submit" name="submit" class="btn">Update Category</button>
            </form>
        </div>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>