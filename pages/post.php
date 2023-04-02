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
} else {
    header("location: " . ROOT_URL . "pages/blog.php");
    die();
}
?>


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
                    <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">

                    <div class="individual-post-author-info">
                        <h5>By: <?= $author["firstname"] . " " . $author["lastname"] ?></h5>
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
                    <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">
                    <div class="individual-post-sidebar-author-info">
                        <h6 class="individual-post-sidebar-author-name"><?= $author["firstname"] . " " . $author["lastname"] ?></h6>
                        <span class="individual-post-sidebar-author-location"><i class="uil uil-location-point"></i><?= $author["location"] ?></span>
                    </div>
                    <p>
                    <p> <?= substr($author["biography"], 0, 200) ?>...
                    </p>
                    <span class="individual-post-sidebar-author-mail"><i class="uil uil-envelope-alt"></i><?= $author["email"] ?></span>
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
                                            <img src="<?php echo ROOT_URL ?>img/<?= $firstFeaturedPostAuthor["avatar"] ?>">
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
                                                <img src="<?php echo ROOT_URL ?>img/<?= $secondFeaturedPostAuthor["avatar"] ?>">
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
                                                <img src="<?php echo ROOT_URL ?>img/<?= $thirdFeaturedPostAuthor["avatar"] ?>">
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
                                            <img src="<?php echo ROOT_URL ?>img/<?= $newPostAuthor["avatar"] ?>">
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

<!-- ============== FOOTER SECTION ================-->


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>