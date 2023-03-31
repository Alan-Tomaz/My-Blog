<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

    //fetch post from database in order to delete thumbnail from images folder
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure only 1 record/post was fetched 
    if (mysqli_num_rows($result) == 1) {
        $post = mysqli_fetch_assoc($result);
        $thumbnailName = $post["thumbnail"];
        $thumbnailPath = "../../img/" . $thumbnailName;

        if ($thumbnailPath) {
            // delete image from localhost
            unlink($thumbnailPath);

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
