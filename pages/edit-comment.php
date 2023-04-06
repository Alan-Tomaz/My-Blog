<?php
$rootUrl = 'http://localhost/My Blog/';
$dbHost =  'localhost';
$dbUser = 'root';
$dbPass =  '';
$dbName =  'my_blog';
$session = session_start();


$connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}

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
    header("location: " . $rootUrl . "pages/blog.php?page=1");
    die();
}

$postQuery = "SELECT * FROM posts WHERE id=$postId";
$postResult = mysqli_query($connection, $postQuery);
if (mysqli_num_rows($postResult) == 0) {
    header("location: " . $rootUrl . "pages/blog.php?page=1");
    die();
}

if (intval($id) == 0) {
    header('location: ' . $rootUrl . 'pages/post.php?id=' . $postId);
    die();
}

$query = "SELECT * FROM comments WHERE id=$id";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 0) {
    header('location: ' . $rootUrl . 'pages/post.php?id=' . $postId);
    die();
}

$comment = mysqli_fetch_assoc($result);
$currentUser = $_SESSION["user-id"];
if (!isset($_SESSION["user-is-admin"])) {

    if ($currentUser != $comment["author_id"]) {
        header('location: ' . $rootUrl . 'pages/post.php?id=' . $postId);
        die();
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>

<section class="form-section-alt ">
    <div class="container form-section-container">
        <h2>Edit Comment</h2>
        <?php if (isset($_SESSION['edit-comment'])) : ?>
            <div class="alert-message error">
                <?= $_SESSION['edit-comment'];
                unset($_SESSION['edit-comment']);
                ?>
            </div>
        <?php endif ?>
        <form action="<?php echo ROOT_URL ?>pages/edit-comment-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
            <input type="hidden" name="id" value="<?= $comment["id"]  ?>">
            <input type="hidden" name="post-id" value="<?= $postId  ?>">
            <textarea name="message" rows="5" placeholder="Comment"><?= $comment['body']  ?></textarea>
            <button type="submit" name="submit" class="btn">Edit Post</button>
        </form>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>