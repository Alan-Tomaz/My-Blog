<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if ((isset($_GET["id"]))) {
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
} else {
    $id = null;
}
if ((isset($_GET["post"]))) {
    $postId = filter_var($_GET["post"], FILTER_SANITIZE_NUMBER_INT);
} else {
    $postId = null;
}
echo $id;

if (intval($postId) == 0) {
    header("location: " . ROOT_URL . "pages/blog.php?page=1");
    die();
}

$postQuery = "SELECT * FROM posts WHERE id=$postId";
$postResult = mysqli_query($connection, $postQuery);
if (mysqli_num_rows($postResult) == 0) {
    header("location: " . ROOT_URL . "pages/blog.php?page=1");
    die();
}

if (intval($id) == 0) {
    header('location: ' . ROOT_URL . 'pages/post.php?id=' . $postId);
    die();
}

$query = "SELECT * FROM comments WHERE id=$id";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 0) {
    header('location: ' . ROOT_URL . 'pages/post.php?id=' . $postId);
    die();
}

$comment = mysqli_fetch_assoc($result);
$currentUser = $_SESSION["user-id"];
if (!isset($_SESSION["user-is-admin"])) {

    if ($currentUser != $comment["author_id"]) {
        header('location: ' . ROOT_URL . 'pages/post.php?id=' . $postId);
        die();
    }
}

if (mysqli_num_rows($result) == 1) {
    $deletePostQuery = "DELETE FROM comments WHERE id=$id LIMIT 1";
    $deletePostResult = mysqli_query($connection, $deletePostQuery);

    if (!mysqli_errno($connection)) {
        $_SESSION["delete-comment-success"] = "Comment Deleted Successfully";
    }
}

header('location: ' . ROOT_URL . 'pages/post.php?id=' . $postId);
die();
