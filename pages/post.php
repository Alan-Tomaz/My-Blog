<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';

//fetch post from database if id is set
if (isset($_GET["id"])) {
    $id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

    if (intval($id) == 0) {
        //$currentPage = 1;
        header("location: " . ROOT_URL . "pages/blog.php");
        die();
    }

    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) < 1) {
        header("location: " . ROOT_URL . "pages/blog.php");
        die();
    }

    $i = 1;
    $isTrue = true;
} else {
    header("location: " . ROOT_URL . "pages/blog.php");
    die();
}
?>



<?php if (isset($_SESSION["post-comment"])) : ?>
    <div class="alert-comment error" id="alert-comment">
        <?php
        echo $_SESSION["post-comment"];
        unset($_SESSION["post-comment"])
        ?>
        <script>
            let alertComment = document.getElementById("alert-comment");
            console.log(alertComment);
            let showAlert = setTimeout(function() {
                alertComment.classList.add("show-alert-comment");
                let hideAlert = setTimeout(function() {
                    alertComment.classList.add("hide-alert-comment");
                }, 5000)
            }, 1000);
        </script>
    </div>

<?php elseif (isset($_SESSION["post-comment-success"])) : ?>
    <div class="alert-comment success" id="alert-comment">
        <?php
        echo $_SESSION["post-comment-success"];
        unset($_SESSION["post-comment-success"])
        ?>
        <script>
            let alertComment1 = document.getElementById("alert-comment");
            console.log(alertComment1);
            let showAlert1 = setTimeout(function() {
                alertComment1.classList.add("show-alert-comment");
                let hideAlert = setTimeout(function() {
                    alertComment1.classList.add("hide-alert-comment");
                }, 5000)
            }, 1000);
        </script>
    </div>
<?php endif ?>
<?php if (isset($_SESSION["edit-comment"])) : ?>
    <div class="alert-comment error" id="alert-comment">
        <?php
        echo $_SESSION["edit-comment"];
        unset($_SESSION["edit-comment"])
        ?>
        <script>
            let alertCommen2 = document.getElementById("alert-comment");
            console.log(alert2Comment);
            let showAlert2 = setTimeout(function() {
                alertComment2.classList.add("show-alert-comment");
                let hideAlert = setTimeout(function() {
                    alertComment2.classList.add("hide-alert-comment");
                }, 5000)
            }, 1000);
        </script>
    </div>

<?php elseif (isset($_SESSION["edit-comment-success"])) : ?>
    <div class="alert-comment success" id="alert-comment">
        <?php
        echo $_SESSION["edit-comment-success"];
        unset($_SESSION["edit-comment-success"])
        ?>
        <script>
            let alertComment3 = document.getElementById("alert-comment");
            console.log(alertComment3);
            let showAlert3 = setTimeout(function() {
                alertComment3.classList.add("show-alert-comment");
                let hideAlert = setTimeout(function() {
                    alertComment3.classList.add("hide-alert-comment");
                }, 5000)
            }, 1000);
        </script>
    </div>
<?php endif ?>
<?php if (isset($_SESSION["delete-comment-success"])) : ?>
    <div class="alert-comment success" id="alert-comment">
        <?php
        echo $_SESSION["delete-comment-success"];
        unset($_SESSION["delete-comment-success"])
        ?>
        <script>
            let alertComment4 = document.getElementById("alert-comment");
            console.log(alertComment4);
            let showAlert4 = setTimeout(function() {
                alertComment4.classList.add("show-alert-comment");
                let hideAlert = setTimeout(function() {
                    alertComment4.classList.add("hide-alert-comment");
                }, 5000)
            }, 1000);
        </script>
    </div>
<?php endif ?>

<section class="individual-post">
    <div class="container individual-post-container">
        <div class="individual-post-content">
            <h5 class="individual-post-title"><?= $post["title"] ?></h5>
            <h4 class="individual-post-subtitle"><?= $post["subtitle"] ?></h4>
            <div class="post-info">
                <div class="individual-post-author">
                    <?php
                    //fetch author from users table using author_id
                    $authorId = $post["author_id"];
                    $authorQuery = "SELECT * FROM users WHERE id = $authorId";
                    $authorResult = mysqli_query($connection, $authorQuery);
                    $author = mysqli_fetch_assoc($authorResult);
                    ?>
                    <div class="individual-post-author-img">
                        <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                            <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">
                        </a>
                    </div>
                    <div class="individual-post-author-info">
                        <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                            <h5>By: <?= $author["firstname"] . " " . $author["lastname"] ?></h5>
                        </a>
                        <small><?= date("M d, Y - H:i", strtotime($post["date_time"])) ?></small>
                    </div>
                </div>
                <div class="individual-post-category">
                    <?php
                    $postCategoryQuery = "SELECT * FROM categories";
                    $postCategoryResult = mysqli_query($connection, $postCategoryQuery);
                    $category = mysqli_fetch_assoc($postCategoryResult)
                    ?>
                    <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $category["id"] ?>" class="category-button individual-post-category-button"><?= $category["title"] ?></a>
                </div>
            </div>
            <img src="<?php echo ROOT_URL ?>img/<?= $post["thumbnail"] ?>">
            <div class="post-body-content">
                <?= (htmlspecialchars_decode($post["body"], ENT_QUOTES)) ?>
            </div>
        </div>
        <div class="individual-post-sidebar">
            <hr class="individual-post-vertical-line container">
            <div class="individual-post-sidebar-vertical-line"></div>
            <div class="individual-post-sidebar-content">
                <div class="individual-post-sidebar-author">
                    <h6 class="individual-post-sidebar-section-title">Author</h6>
                    <div class="individual-post-sidebar-author-img">
                        <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                            <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">
                        </a>
                    </div>
                    <div class="individual-post-sidebar-author-info">
                        <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                            <h6 class="individual-post-sidebar-author-name"><?= $author["firstname"] . " " . $author["lastname"] ?></h6>
                        </a>
                        <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                            <span class="individual-post-sidebar-author-location"><i class="uil uil-location-point"></i><?= $author["location"] ?></span>
                        </a>
                    </div>

                    <p> <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                            <?= substr($author["biography"], 0, 200) ?>...
                        </a>
                    </p>
                    <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                        <span class="individual-post-sidebar-author-mail"><i class="uil uil-envelope-alt"></i><?= $author["email"] ?></span>
                    </a>
                </div>
                <hr class="individual-post-sidebar-horizontal-line">
                <?php
                //fetch featured post from database
                $firstFeaturedPostQuery = "SELECT * FROM posts WHERE is_featured = 1";
                $firstFeaturedPostResult = mysqli_query($connection, $firstFeaturedPostQuery);
                $firstFeaturedPost = mysqli_fetch_assoc($firstFeaturedPostResult);

                $secondFeaturedPostQuery = "SELECT * FROM posts WHERE is_featured = 2";
                $secondFeaturedPostResult = mysqli_query($connection, $secondFeaturedPostQuery);
                $secondFeaturedPost = mysqli_fetch_assoc($secondFeaturedPostResult);

                $thirdFeaturedPostQuery = "SELECT * FROM posts WHERE is_featured = 3";
                $thirdFeaturedPostResult = mysqli_query($connection, $thirdFeaturedPostQuery);
                $thirdFeaturedPost = mysqli_fetch_assoc($thirdFeaturedPostResult);
                ?>
                <?php if (mysqli_num_rows($firstFeaturedPostResult) > 0) : ?>
                    <div class="individual-post-sidebar-popular-posts">
                        <h6 class="individual-post-sidebar-section-title">Popular Posts</h6>
                        <div class="individual-post-sidebar-popular-post sidebar-post">
                            <div class="individual-post-sidebar-popular-post-container sidebar-post-container">
                                <!-- IF HAVE A ERROR, CHECK THE A TAGS -->
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/<?= $firstFeaturedPost["thumbnail"] ?>"> </a>
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>">

                                    <div class="individual-post-sidebar-popular-post-content sidebar-post-content">
                                        <div class="individual-post-sidebar-popular-post-author sidebar-post-author">
                                            <?php
                                            //fetch author from users table using author_id
                                            $firstFeaturedPostAuthorId = $firstFeaturedPost["author_id"];
                                            $firstFeaturedPostAuthorQuery = "SELECT * FROM users WHERE id = $firstFeaturedPostAuthorId";
                                            $firstFeaturedPostAuthorResult = mysqli_query($connection, $firstFeaturedPostAuthorQuery);
                                            $firstFeaturedPostAuthor = mysqli_fetch_assoc($firstFeaturedPostAuthorResult);
                                            ?>
                                            <div class="sidebar-post-author-img">
                                                <img src="<?php echo ROOT_URL ?>img/<?= $firstFeaturedPostAuthor["avatar"] ?>">
                                            </div>
                                            <h6><?= $firstFeaturedPostAuthor["firstname"] . " " . $firstFeaturedPostAuthor["lastname"] ?></h6>
                                        </div>
                                        <p><?= substr($firstFeaturedPost["title"], 0, 80) ?>...</p>
                                        </p>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <?php if (mysqli_num_rows($secondFeaturedPostResult) == 1) : ?>

                            <div class="individual-post-sidebar-popular-post sidebar-post">
                                <div class="individual-post-sidebar-popular-post-container sidebar-post-container">
                                    <!-- IF HAVE A ERROR, CHECK THE A TAGS -->
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $secondFeaturedPost["id"] ?>"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/<?= $secondFeaturedPost["thumbnail"] ?>"> </a>
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $secondFeaturedPost["id"] ?>">

                                        <div class="individual-post-sidebar-popular-post-content sidebar-post-content">
                                            <div class="individual-post-sidebar-popular-post-author sidebar-post-author">
                                                <?php
                                                //fetch author from users table using author_id
                                                $secondFeaturedPostAuthorId = $secondFeaturedPost["author_id"];
                                                $secondFeaturedPostAuthorQuery = "SELECT * FROM users WHERE id = $secondFeaturedPostAuthorId";
                                                $secondFeaturedPostAuthorResult = mysqli_query($connection, $secondFeaturedPostAuthorQuery);
                                                $secondFeaturedPostAuthor = mysqli_fetch_assoc($secondFeaturedPostAuthorResult);
                                                ?>
                                                <div class="sidebar-post-author-img">

                                                    <img src="<?php echo ROOT_URL ?>img/<?= $secondFeaturedPostAuthor["avatar"] ?>">
                                                </div>
                                                <h6><?= $secondFeaturedPostAuthor["firstname"] . " " . $secondFeaturedPostAuthor["lastname"] ?></h6>
                                            </div>
                                            <p><?= substr($secondFeaturedPost["title"], 0, 80) ?>...</p>
                                            </p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        <?php endif ?>
                        <?php if (mysqli_num_rows($thirdFeaturedPostResult) == 1) : ?>

                            <div class="individual-post-sidebar-popular-post sidebar-post">
                                <div class="individual-post-sidebar-popular-post-container sidebar-post-container">
                                    <!-- IF HAVE A ERROR, CHECK THE A TAGS -->
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $thirdFeaturedPost["id"] ?>"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/<?= $thirdFeaturedPost["thumbnail"] ?>"> </a>
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $thirdFeaturedPost["id"] ?>">

                                        <div class="individual-post-sidebar-popular-post-content sidebar-post-content">
                                            <div class="individual-post-sidebar-popular-post-author sidebar-post-author">
                                                <?php
                                                //fetch author from users table using author_id
                                                $thirdFeaturedPostAuthorId = $thirdFeaturedPost["author_id"];
                                                $thirdFeaturedPostAuthorQuery = "SELECT * FROM users WHERE id = $thirdFeaturedPostAuthorId";
                                                $thirdFeaturedPostAuthorResult = mysqli_query($connection, $thirdFeaturedPostAuthorQuery);
                                                $thirdFeaturedPostAuthor = mysqli_fetch_assoc($thirdFeaturedPostAuthorResult);
                                                ?>
                                                <div class="sidebar-post-author-img">

                                                    <img src="<?php echo ROOT_URL ?>img/<?= $thirdFeaturedPostAuthor["avatar"] ?>">
                                                </div>
                                                <h6><?= $thirdFeaturedPostAuthor["firstname"] . " " . $thirdFeaturedPostAuthor["lastname"] ?></h6>
                                            </div>
                                            <p><?= substr($thirdFeaturedPost["title"], 0, 80) ?>...</p>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endif ?>



                    </div>
                    <hr class="individual-post-sidebar-horizontal-line">
                <?php endif ?>
                <div class="individual-post-sidebar-new-posts">
                    <h6 class="individual-post-sidebar-section-title">New Posts</h6>
                    <div class="individual-post-sidebar-new-post sidebar-post">
                        <?php
                        $newPostsQuery = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 6";
                        $newPostsResult = mysqli_query($connection, $newPostsQuery);
                        ?>
                        <?php while ($newPost = mysqli_fetch_assoc($newPostsResult)) : ?>

                            <div class="individual-post-sidebar-new-post-container sidebar-post-container">
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $newPost["id"] ?>"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/<?= $newPost["thumbnail"] ?>"> </a>
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $newPost["id"] ?>">
                                    <div class="individual-post-sidebar-new-post-content sidebar-post-content">

                                        <div class="individual-post-sidebar-new-post-author sidebar-post-author">
                                            <?php
                                            //fetch author from users table using author_id
                                            $newPostAuthorId = $newPost["author_id"];
                                            $newPostAuthorQuery = "SELECT * FROM users WHERE id = $newPostAuthorId";
                                            $newPostAuthorResult = mysqli_query($connection, $newPostAuthorQuery);
                                            $newPostAuthor = mysqli_fetch_assoc($newPostAuthorResult);
                                            ?>
                                            <div class="sidebar-post-author-img">

                                                <img src="<?php echo ROOT_URL ?>img/<?= $newPostAuthor["avatar"] ?>">
                                            </div>
                                            <h6><?= $newPostAuthor["firstname"] . " " . $newPostAuthor["lastname"] ?></h6>
                                        </div>
                                        <p><?= substr($newPost["title"], 0, 80) ?>...</p>


                                    </div>
                                </a>
                            </div>
                        <?php endwhile ?>

                    </div>
                    <hr class="individual-post-sidebar-horizontal-line">
                    <div class="individual-post-sidebar-categories sidebar-categories">
                        <h6 class="individual-post-sidebar-section-title sidebar-categories-section-title">
                            Categories
                        </h6>
                        <div class="individual-post-sidebar-categories-container sidebar-categories-container">
                            <?php
                            $categoriesQuery = "SELECT * FROM categories";
                            $categoriesResult = mysqli_query($connection, $categoriesQuery);
                            ?>
                            <?php while ($category = mysqli_fetch_assoc($categoriesResult)) : ?>
                                <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $category["id"] ?>" class="individual-post-sidebar-category sidebar-category"><?= $category["title"] ?></a>
                            <?php endwhile ?>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="comments-section">
    <div class="comments-section-container container">
        <hr class="huge-horizontal-line">
        <h1 class="section-title comments-section-title">
            Comments
        </h1>
        <?php if (!isset($_SESSION["user-id"])) : ?>
            <div class="login-alert">
                <p>You Must Be Logged In To Comment!</p>
            </div>
        <?php endif ?>
        <div class="post-comment-container">
            <?php if (isset($_SESSION["user-id"])) : ?>
                <div class="author-avatar-comment">
                    <?php
                    $currentUserId = $_SESSION["user-id"];
                    $currentUserQuery = "SELECT * FROM users WHERE id = $currentUserId";
                    $currentUserResult = mysqli_query($connection, $currentUserQuery);
                    $currentUser = mysqli_fetch_assoc($currentUserResult);
                    ?>
                    <img src="<?= ROOT_URL ?>img/<?= $currentUser["avatar"] ?>">
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>pages/post-comment.php" method="POST" class="post-comment-form">
                <input type="hidden" name="post-id" value="<?= $_GET["id"] ?>">
                <textarea name="message" cols="30" rows="10" placeholder="Add a Comment..." required></textarea>
                <button type="submit" name="submit" class="btn post-comment-btn">Send Post</button>
            </form>
        </div>
        <hr class="comment-section-horizontal-line">
        <div class="total-comments-container">
            <?php
            $commentsQuery = "SELECT * FROM comments WHERE post_id = $id ORDER BY date_time DESC";
            $commentsResult = mysqli_query($connection, $commentsQuery);
            ?>
            <h3 class="total-comments">
                <?= mysqli_num_rows($commentsResult) ?>
            </h3>
            <h4>Comment(s)</h6>
        </div>
        <?php if (mysqli_num_rows($commentsResult) > 0) : ?>
            <?php while ($comment = mysqli_fetch_assoc($commentsResult)) : ?>
                <div class="comment-container">
                    <div class="comment-avatar">
                        <?php
                        $authorId = $comment['author_id'];
                        $commentAuthorQuery = "SELECT * FROM users WHERE id = $authorId";
                        $commentAuthorResult = mysqli_query($connection, $commentAuthorQuery);
                        $commentAuthor = mysqli_fetch_assoc($commentAuthorResult);
                        ?>
                        <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $commentAuthor["username"] ?>">
                            <img src="<?= ROOT_URL ?>img/<?= $commentAuthor["avatar"] ?>">
                        </a>
                    </div>
                    <div class="comment-content-container">
                        <div class="comment-info-container">
                            <div class="comment-info">
                                <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $commentAuthor["username"] ?>">
                                    <h6 class="comment-author"><?= $commentAuthor["firstname"] . " " . $commentAuthor["lastname"] ?></h6>
                                    <span class="circle">●</span>
                                    <span class="comment-time"><?= date("M d, Y - H:i", strtotime($comment["date_time"])) ?></small>

                                </a>
                            </div>
                            <div class="comment-buttons">
                                <?php if (isset($_SESSION["user-id"])) : ?>

                                    <?php if (($authorId == $currentUserId) || (isset($_SESSION["user-is-admin"]))) : ?>
                                        <a href="<?= ROOT_URL ?>pages/edit-comment.php?id=<?= $comment["id"] ?>&post=<?= $id ?>" class="btn sm">Edit</a>
                                        <a class="btn sm danger" onclick="showConfirmMessageComment(<?= $i ?>)">Delete</a>
                                        <div class="popup popup-comment-section" id="popup-comment-section<?= $i ?>">
                                            <img src="<?= ROOT_URL ?>img/9004715_cross_delete_remove_cancel_icon.png">
                                            <h2>Delete Page</h2>
                                            <p>Are you sure you want to delete this comment?</p>
                                            <div class="confirmation-btn">
                                                <a class="options-btn" id="cancel-btn" onclick="hideConfirmMessageComment(<?= $i ?>)">Cancel</a>
                                                <a href="<?php echo ROOT_URL ?>pages/delete-comment.php?id=<?= $comment["id"] ?>&post=<?= $id ?>" class="options-btn" id="ok-btn">Yes</a>
                                            </div>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>

                        </div>
                        <div class="comment-content">
                            <p><?= nl2br($comment["body"]) ?></p>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endwhile ?>
        <?php else : ?>
            <h1 class="missing-comments">No Comments Found</h1>
        <?php endif ?>
    </div>
    <hr class="small-comment-section-horizontal-line">
    </div>
</section>

<!-- ============== FOOTER SECTION ================-->

<script src="<?= ROOT_URL ?>js/showAlert.js"></script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>