<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';



if (isset($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

    //fetch post from database in order to delete thumbnail from images folder
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);

    if (!isset($_SESSION["user-is-admin"])) {
        if ($post["author_id"] != $_SESSION["user-id"]) {
            header('location: ' . ROOT_URL . 'admin/index.php');
            die();
        }
    }

    // make sure only 1 record/post was fetched 
    if (mysqli_num_rows($result) == 1) {
        $thumbnailName = $post["thumbnail"];
        $thumbnailPath = "../../img/" . $thumbnailName;

        if ($thumbnailPath) {
            // delete image from localhost
            unlink($thumbnailPath);

            $isFeatured = $post["is_featured"];
            //
            if ($isFeatured != 0) {
                if ($isFeatured == 1) {
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
                if ($isFeatured == 2) {
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

            // delete post from database
            $deletePostQuery = "DELETE FROM posts WHERE id=$id LIMIT 1";
            $deletePostResult = mysqli_query($connection, $deletePostQuery);

            if (!mysqli_errno($connection)) {
                $_SESSION["delete-post-success"] = "Post Deleted Successfully";
            }
        }
    }
}

header("location: " . ROOT_URL . "admin/pages/manage-posts.php");
die();
