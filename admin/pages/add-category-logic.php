<?php

require $_SERVER["DOCUMENT_ROOT"] . "/My Blog/admin/config/database.php";

if (isset($_POST["submit"])) {
    //get form data 
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST["description"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

if (!$title) {
    $_SESSION["add-category"] = "Enter The Title";
} elseif (!$description) {
    $_SESSION["add-category"] = "Enter The Description";
}

if (isset($_SESSION["add-category"])) {
    // redirect back to add category page with form data if there was a invalid input
    $_SESSION["add-category-data"] = $_POST;
    header("location: " . ROOT_URL . "admin/pages/add-category.php");
    die();
} else {
    //insert category into database
    $query = "INSERT INTO categories(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($connection, $query);
    if (mysqli_errno($connection)) {
        $_SESSION["add-category"] = "Couldn't Add Category";
        header("location: " . ROOT_URL . "admin/pages/add-category.php");
        die();
    } else {
        $_SESSION["add-category-success"] = "Category $title Added Successfully";
        header("location: " . ROOT_URL . "admin/pages/manage-categories.php");
        die();
    }
}
