<?php

require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_POST["submit"])) {
    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $previousThumbnailName = filter_var($_POST["previous-thumbnail-name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST["body"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST["category"], FILTER_SANITIZE_NUMBER_INT);
    $isFeatured = filter_var($_POST["is-featured"], FILTER_SANITIZE_NUMBER_INT);
    $wasFeatured = filter_var($_POST["was-featured"], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES["thumbnail"];

    //set is_featured to 0 if unchecked
    $isFeatured = $isFeatured == 1 ?: 0;


    //validate form data
    if (!$title) {
        $_SESSION["edit-post"] = "Enter Post Title";
    } elseif (!$body) {
        $_SESSION["edit-post"] = "Enter Post Body";
    } elseif (!$categoryId) {
        $_SESSION["edit-post"] = "Select Post Category";
    } else {


        if ($thumbnail["name"]) {
            $previousThumbnailPath = "../../img/" . $previousThumbnailName;
            if ($previousThumbnailPath) {
                unlink($previousThumbnailPath);
            }


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
                    $_SESSION["edit-post"] = "File Size Too Big. Should Be Least Than 2MB ";
                }
            } else {
                $_SESSION["edit-post"] = "File Should Be PNG, JPG or JPEG";
            }
        }
    }

    //redirect back (with form data) to edit-post page if there is any problem
    if (isset($_SESSION['edit-post'])) {
        $_SESSION["edit-post-data"] = $_POST;
        header("location: " . ROOT_URL . "admin/pages/edit-post.php?id=" . $id);
        die();
    } else {
        //is_featured value that will be added to the table (the value is from 1 to 3)
        $featuredPost = 0;

        //if the is_featured equals 1 (the post will be a featured) it will put the oldest featured posts at the bottom of the list and the newest at the top. The oldest post will be removed from the featured posts list        if ($isFeatured == 1) {
        if ($isFeatured == 1) {
            if ($wasFeatured == 0) {
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
            } else {
                $featuredPost = $wasFeatured;
            }

            //crie uma lógica que adapta a sessão dos posts em destaque para ser compativel com menos de 3 posts                
        }

        //if a post that was featured is edited and is no longer featured this if will push the posts to the beginning of the list of featured posts so that one of the current featured posts does not happen to be removed earlier than it should when a new highlight is added
        if ($isFeatured == 0 && $wasFeatured != 0) {
            if ($wasFeatured == 1) {
                $secondFeaturedPostQuery = "SELECT * from posts WHERE is_featured = 2";
                $secondFeaturedPostResult = mysqli_query($connection, $secondFeaturedPostQuery);
                if (mysqli_num_rows($secondFeaturedPostResult) > 0) {
                    $secondFeaturedPost = mysqli_fetch_assoc($secondFeaturedPostResult);
                    $secondFeaturedPostId = $secondFeaturedPost["id"];
                    $removeSecondFeaturedPostQuery = "UPDATE posts SET is_featured= '1' WHERE id=$secondFeaturedPostId LIMIT 1";
                    $removeSecondFeaturedPostResult = mysqli_query($connection, $removeSecondFeaturedPostQuery);
                }
                $thirdFeaturedPostQuery = "SELECT * from posts WHERE is_featured = 3";
                $thirdFeaturedPostResult = mysqli_query($connection, $thirdFeaturedPostQuery);
                if (mysqli_num_rows($thirdFeaturedPostResult) > 0) {
                    $thirdFeaturedPost = mysqli_fetch_assoc($thirdFeaturedPostResult);
                    $thirdFeaturedPostId = $thirdFeaturedPost["id"];
                    $removeThirdFeaturedPostQuery = "UPDATE posts SET is_featured= '2' WHERE id=$thirdFeaturedPostId LIMIT 1";
                    $removeThirdFeaturedPostResult = mysqli_query($connection, $removeThirdFeaturedPostQuery);
                }
            }
            if ($wasFeatured == 2) {
                $thirdFeaturedPostQuery = "SELECT * from posts WHERE is_featured = 3";
                $thirdFeaturedPostResult = mysqli_query($connection, $thirdFeaturedPostQuery);
                if (mysqli_num_rows($thirdFeaturedPostResult) > 0) {
                    $thirdFeaturedPost = mysqli_fetch_assoc($thirdFeaturedPostResult);
                    $thirdFeaturedPostId = $thirdFeaturedPost["id"];
                    $removeThirdFeaturedPostQuery = "UPDATE posts SET is_featured= '2' WHERE id=$thirdFeaturedPostId LIMIT 1";
                    $removeThirdFeaturedPostResult = mysqli_query($connection, $removeThirdFeaturedPostQuery);
                }
            }
        }
        //set thumbnail name if a new one was uploaded, else keep old thumbnail name
        $thumbnailToInsert = $thumbnailName ?? $previousThumbnailName;

        //insert post into database
        $query = "UPDATE posts SET title= '$title', body = '$body', thumbnail = '$thumbnailToInsert', category_id='$categoryId', is_featured='$featuredPost' WHERE id='$id' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            header("location: " . ROOT_URL . "admin/pages/manage-posts.php");
            die();
        }
    }
}
header("location: " . ROOT_URL . "admin/pages/edit-post.php");
die();
