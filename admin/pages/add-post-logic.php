<?php

require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_POST["submit"])) {
    $authorId = $_SESSION["user-id"];
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST["body"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST["category"], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES["thumbnail"];



    //set is_featured to 0 if unchecked
    $isFeatured = $isFeatured == 1 ?: 0;

    //validate form data
    if (!$title) {
        $_SESSION["add-post"] = "Enter Post Title";
    } elseif (!$body) {
        $_SESSION["add-post"] = "Enter Post Body";
    } elseif (!$categoryId) {
        $_SESSION["add-post"] = "Select Post Category";
    } elseif (!$thumbnail["name"]) {
        $_SESSION["add-post"] = "Choose Post Thumbnail";
    } else {
        //work on thumbnail
        //rename the image
        $time = time(); // make each image name unique
        $thumbnailName = $time . $thumbnail["name"];
        $thumbnailTmpName = $thumbnail["tmp_name"];
        $thumbnailDestinationPath = "../../img/" . $thumbnailName;

        //make sure file is an image 
        $allowedFiles = ["png", "jpg", "jpeg"];
        $extension = explode(".", $thumbnailName);
        $extension = end($extension);
        if (in_array($extension, $allowedFiles)) {
            //make sure image is not too big (2MB)
            if ($thumbnail["size"] < 2_000_000) {
                //upload thumbnail
                move_uploaded_file($thumbnailTmpName, $thumbnailDestinationPath);
            } else {
                $_SESSION["add-post"] = "File Size Too Big. Should Be Least Than 2MB ";
            }
        } else {
            $_SESSION["add-post"] = "File Should Be PNG, JPG or JPEG";
        }
    }

    //redirect back (with form data) to add-post page if there is any problem
    if (isset($_SESSION['add-post'])) {
        $_SESSION["add-post-data"] = $_POST;
        header("location: " . ROOT_URL . "admin/pages/add-post.php");
        die();
    } else {

        //insert post into database
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnailName', $categoryId, $authorId, 0)";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            $_SESSION["add-post-success"] = "New Post Added Successfully";
            header("location: " . ROOT_URL . "admin/pages/manage-posts.php");
            die();
        }
    }
}
header("location: " . ROOT_URL . "admin/pages/add-post.php");
die();
