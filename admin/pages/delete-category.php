<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM categories WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);



    //FOR LATER
    // update category_id of posts that belong to this category to id of uncategorized category
    $updateQuery = "UPDATE posts SET category_id = 1 WHERE category_id = $id";
    $updateResult = mysqli_query($connection, $updateQuery);


    if (!mysqli_errno($connection)) {
        //delete category
        $deleteCategoryQuery = "DELETE FROM categories WHERE id='$id' LIMIT 1";
        $deleteCategoryResult = mysqli_query($connection, $deleteCategoryQuery);
        $_SESSION['delete-category-success'] = "Category Deleted Successfully";
    }
}

header('location: ' . ROOT_URL . "admin/pages/manage-categories.php");
die();
