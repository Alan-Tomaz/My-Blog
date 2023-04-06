<?php
$rootUrl = 'http://localhost/My Blog/';
$dbHost =  'localhost';
$dbUser = 'root';
$dbPass =  '';
$dbName =  'my_blog';
$connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
$isTrue = true;
if (isset($_GET["user"])) {
    $username = $_GET["user"];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 0) {
        header("location: " . $rootUrl . "index.php");
        die();
    } else {
        $user = mysqli_fetch_assoc($result);
        $userId = $user["id"];

        $commentsQuery = "SELECT * FROM comments WHERE author_id = $userId ORDER BY date_time DESC";
        $commentsResult = mysqli_query($connection, $commentsQuery);

        $postsQuery = "SELECT * FROM posts WHERE author_id = $userId ORDER BY date_time DESC";
        $postsResult = mysqli_query($connection, $postsQuery);
    }
} else {
    header("location: " . $rootUrl . "index.php");
    die();
}
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';
?>

<section class="user-page-section">
    <div class="user-page-container container">
        <div class="user-new-posts">
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <h1 class="section-title user-page-title-section">New Posts</h1>
                <?php while ($post = mysqli_fetch_assoc($postsResult)) : ?>
                    <div class="user-new-post-container">
                        <div class="user-new-post-info">
                            <div class="user-new-post-category-button category-button">
                                <?php
                                $postCategoryId = $post["category_id"];
                                $postCategoryQuery = "SELECT * FROM categories WHERE id = $postCategoryId";
                                $postCategoryResult = mysqli_query($connection, $postCategoryQuery);
                                $postCategory = mysqli_fetch_assoc($postCategoryResult);
                                ?>
                                <a href="<?= ROOT_URL ?>pages/category-posts.php?category=<?= $postCategory["id"] ?>">
                                    <?= $postCategory["title"] ?>
                                </a>
                            </div>
                            <a href="<?= ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                                <h4 class="user-new-post-title"><?= $post["title"] ?></h4>
                            </a>
                            <a href="<?= ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                                <h5 class="user-new-post-subtitle"><?= $post["subtitle"] ?></h5>
                            </a>
                            <a href="<?= ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                                <small class="user-new-post-data"><?= date("M d, Y - H:i", strtotime($post["date_time"])) ?></small>
                            </a>
                        </div>
                        <div class="user-new-post-thumbnail">
                            <a href="<?= ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                                <img src="<?= ROOT_URL ?>img/<?= $post["thumbnail"] ?>">
                            </a>
                        </div>
                    </div>
                    <hr class="user-new-posts-horizontal-row">
                <?php endwhile ?>

            <?php else : ?>
                <div class="alert-message error"><?= "No Posts Found" ?></div>
            <?php endif ?>
        </div>
        <div class="user-page-sidebar">
            <hr class="user-page-sidebar-huge-horizontal-line container">
            <div class="user-page-sidebar-vertical-line"></div>
            <div class="user-page-sidebar-container">
                <div class="user-page-user-info">
                    <h4 class="user-page-user-name">
                        <?= $user["firstname"] . " " . $user["lastname"] ?>
                    </h4>
                    <div class="user-page-user-details">
                        <div class="user-page-user-avatar">
                            <img src="<?= ROOT_URL ?>img/<?= $user["avatar"] ?>">
                        </div>
                    </div>
                    <small class="user-page-user-location"><i class="uil uil-location-point"></i><?= $user["location"] ?></small>

                    <div class="user-page-user-biography">
                        <p><?= $user["biography"] ?></p>
                    </div>
                    <span class="user-page-user-email">
                        <i class="uil uil-envelope-alt"></i><?= $user["email"] ?> </span>
                </div>
                <hr class="user-page-sidebar-horizontal-line">
                <?php if (mysqli_num_rows($commentsResult)) : ?>
                    <h4 class="user-page-sidebar-title">
                        New Comments
                    </h4>
                    <?php while ($comment = mysqli_fetch_assoc($commentsResult)) : ?>
                        <?php
                        $postId = $comment["post_id"];
                        $postCommentQuery = "SELECT * FROM posts WHERE id = $postId";
                        $postCommentResult = mysqli_query($connection, $postCommentQuery);
                        $postComment = mysqli_fetch_assoc($postCommentResult);
                        ?>
                        <a href="<?= ROOT_URL ?>pages/post.php?id=<?= $postComment["id"] ?>">
                            <div class="new-comments-container">
                                <h5 class="user-page-page-sidebar-comment-title"><?= $postComment["title"] ?></h5>
                                <div class="user-page-sidebar-comment-container">
                                    <div class="user-page-sidebar-comment-avatar">
                                        <?php
                                        $authorId = $comment["author_id"];
                                        $authorCommentQuery = "SELECT * FROM users WHERE id = $authorId";
                                        $authorCommentResult = mysqli_query($connection, $authorCommentQuery);
                                        $authorComment = mysqli_fetch_assoc($authorCommentResult);
                                        ?>
                                        <img src="<?= ROOT_URL ?>img/<?= $authorComment["avatar"] ?>">
                                    </div>
                                    <div class="user-page-sidebar-comment">
                                        <div class="user-page-sidebar-comment-info">
                                            <h6 class="user-page-sidebar-comment-author">
                                                <?php $authorComment["firstname"] . " " . $authorComment["lastname"] ?>
                                            </h6>
                                            <small class="circle">●</small>
                                            <span class="user-page-sidebar-comment-time"><?= date("M d, Y - H:i", strtotime($comment["date_time"])) ?></span>
                                        </div>
                                        <div class="user-page-sidebar-comment-content">
                                            <?= $comment["body"] ?>
                                        </div>
                                    </div>
                                </div>
                                <hr class="user-page-sidebar-horizontal-line user-page-sidebar-new-posts-hotizontal-line">
                            </div>
                        </a>
                    <?php endwhile ?>
                <?php else : ?>
                    <div class="alert-message error"><?= "No Comments Found" ?></div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';

?>