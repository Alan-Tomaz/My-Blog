<?php

require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_POST["submit"])) {
    $authorId = $_SESSION["user-id"];
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST["body"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST["category"], FILTER_SANITIZE_NUMBER_INT);
    $isFeatured = filter_var($_POST["is-featured"], FILTER_SANITIZE_NUMBER_INT);
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

        //is_featured value that will be added to the table (the value is from 1 to 3)
        $featuredPost = 0;

        //if the is_featured equals 1 (the post will be a featured) it will put the oldest featured posts at the bottom of the list and the newest at the top. The oldest post will be removed from the featured posts list        if ($isFeatured == 1) {
        if ($isFeatured == 1) {
            $thirdFeaturedPostQuery = "SELECT * from posts WHERE is_featured = 3";
            $thirdFeaturedPostResult = mysqli_query($connection, $thirdFeaturedPostQuery);
            if (mysqli_num_rows($thirdFeaturedPostResult) > 0) {
                $thirdFeaturedPost = mysqli_fetch_assoc($thirdFeaturedPostResult);
                $thirdFeaturedPostId = $thirdFeaturedPost["id"];
                $removeThirdFeaturedPostQuery = "UPDATE posts SET is_featured= '0' WHERE id=$thirdFeaturedPostId LIMIT 1";
                $removeThirdFeaturedPostResult = mysqli_query($connection, $removeThirdFeaturedPostQuery);
            }

            $secondFeaturedPostQuery = "SELECT * from posts WHERE is_featured = 2";
            $secondFeaturedPostResult = mysqli_query($connection, $secondFeaturedPostQuery);
            if (mysqli_num_rows($secondFeaturedPostResult) > 0) {
                $secondFeaturedPost = mysqli_fetch_assoc($secondFeaturedPostResult);
                $secondFeaturedPostId = $secondFeaturedPost["id"];
                $removeSecondFeaturedPostQuery = "UPDATE posts SET is_featured= '3' WHERE id=$secondFeaturedPostId LIMIT 1";
                $removeSecondFeaturedPostResult = mysqli_query($connection, $removeSecondFeaturedPostQuery);
            }

            $firstFeaturedPostQuery = "SELECT * from posts WHERE is_featured = 1";
            $firstFeaturedPostResult = mysqli_query($connection, $firstFeaturedPostQuery);
            if (mysqli_num_rows($firstFeaturedPostResult) > 0) {
                var_dump($firstFeaturedPostResult);
                $firstFeaturedPost = mysqli_fetch_assoc($firstFeaturedPostResult);
                $firstFeaturedPostId = $firstFeaturedPost["id"];
                $removeFirstFeaturedPostQuery = "UPDATE posts SET is_featured= '2' WHERE id=$firstFeaturedPostId LIMIT 1";
                $removeFirstFeaturedPostResult = mysqli_query($connection, $removeFirstFeaturedPostQuery);
            }
            $featuredPost = 1;
            //crie uma lógica que adapta a sessão dos posts em destaque para ser compativel com menos de 3 posts                
        }

        //insert post into database
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnailName', $categoryId, $authorId, $featuredPost)";
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
