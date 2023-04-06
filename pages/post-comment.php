<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

$postId = filter_var($_POST["post-id"], FILTER_SANITIZE_NUMBER_INT);
if (isset($_POST["submit"])) {

    $message = filter_var($_POST["message"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$message) {
        $_SESSION["post-comment"] = "Insert The Content Of The Comment";
    } elseif (!isset($_SESSION["user-id"])) {
        $_SESSION["post-comment"] = "You Must Be Logged In To Comment!";
    }

    if (!isset($_SESSION["post-comment"])) {
        $authorId = filter_var($_SESSION["user-id"], FILTER_SANITIZE_NUMBER_INT);
        $query = "INSERT INTO comments (body, post_id, author_id) VALUES ('$message', '$postId', '$authorId')";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            $_SESSION["post-comment-success"] = "New Comment Added Successfully";
        }
    }
}
header("location: " . ROOT_URL . "pages/post.php?id=" . $postId);
die();
