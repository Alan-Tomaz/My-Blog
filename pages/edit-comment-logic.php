<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_POST["submit"])) {
    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $postId = filter_var($_POST["post-id"], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$message) {
        $_SESSION["edit-comment"] = "Enter Comment Text";
    }

    if (isset($_SESSION['edit-comment'])) {
        header("location: " . ROOT_URL . "pages/edit-comment.php?id=" . $id . "&post=" . $postId);
        die();
    } else {
        $query = "UPDATE comments SET body= '$message' WHERE id='$id' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            $_SESSION["edit-comment-success"] = "Comment Successfully Updated";
            header("location: " . ROOT_URL . "pages/post.php?id=" . $postId);
            die();
        }
    }
}
header("location: " . ROOT_URL . "pages/edit-comment.php?id=" . $id . "&post=" . $postId);
die();
