<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';


if (isset($_GET["search"])) {
    $search = filter_var($_GET["search"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $currentPage = $_GET["page"];
    $maxElementsPerPage = 21;

    if (intval($currentPage) == 0) {
        //$currentPage = 1;
        header("location: " . ROOT_URL . "pages/search-posts.php?search=" . $search  . "&page=1");
        die();
    }

    //determine the max range of posts
    $maxElementId = ($currentPage * $maxElementsPerPage);
    $minElementId = ($maxElementId - $maxElementsPerPage);

    $maxPostsQuery = "SELECT * FROM posts WHERE title LIKE '%$search%'";
    $maxPostsResult = mysqli_query($connection, $maxPostsQuery);
    if (mysqli_num_rows($maxPostsResult) > 0) {
        $maxPosts = mysqli_num_rows($maxPostsResult);
        $maxPostPage = $maxPosts / $maxElementsPerPage;
        $maxPostPage = ceil($maxPostPage);

        if ($currentPage > $maxPostPage) {
            header("location: " . ROOT_URL . "pages/search-posts.php?search=" . $search  . "&page=1");
            die();
        }
    }

    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC LIMIT $minElementId, $maxElementsPerPage";
    $posts = mysqli_query($connection, $query);
} else {
    header("location: " . ROOT_URL . "pages/blog.php");
    die();
}
?>


<!-- ==============  SECTION ================-->

<section class="search-pages-query-section">
    <div class="container search-query">
        <h6>Search For:</h6>
        <p><?= $search ?></p>
    </div>

</section>
<section class="search-pages-section">

    <div class="search-pages-container container">
        <?php if (mysqli_num_rows($posts) > 0) : ?>

            <div class="search-pages-result new-posts">
                <div class="search-pages-result-container new-posts-page-container">
                    <?php while ($post = mysqli_fetch_assoc($posts)) : ?>

                        <article class="new-post search-pages-post">
                            <a href="<?php echo ROOT_URL ?>pages/post.php?id<?= $post["id"] ?>">

                                <div class="new-post-author search-pages-post-author">
                                    <?php
                                    //fetch author from users table using author_id
                                    $authorId = $post["author_id"];
                                    $authorQuery = "SELECT * FROM users WHERE id = $authorId";
                                    $authorResult = mysqli_query($connection, $authorQuery);
                                    $author = mysqli_fetch_assoc($authorResult);
                                    ?>
                                    <div class="new-post-author-avatar search-pages-post-author-avatar">
                                        <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">
                                    </div>
                                    <h5>By: <?= $author["firstname"] . " " . $author["lastname"] ?></h5>
                                </div>
                            </a>
                            <h3 class="new-post-title search-pages-post-title">
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>"><?= $post["title"] ?></a>
                            </h3>
                            <?php
                            //fetch category from categories table using category_id of post 
                            $category_id = $post["category_id"];
                            $categoryQuery = "SELECT * FROM categories WHERE id = $category_id";
                            $categoryResult = mysqli_query($connection, $categoryQuery);
                            $category = mysqli_fetch_assoc($categoryResult);
                            ?>
                            <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $category["id"] ?>" class="category-button"><?= $category["title"] ?></a>
                            <p class="new-post-body search-pages-post-body">
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                                    <?= substr((htmlspecialchars_decode($post["subtitle"], ENT_QUOTES)), 0, 150) ?>...

                                </a>
                            </p>
                            <div class="new-post-author-info search-pages-post-author-info">
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">

                                    <small><?= date("M d, Y - H:i", strtotime($post["date_time"])) ?></small>
                                </a>

                            </div>

                        </article>
                    <?php endwhile ?>


                </div>
                <div class="pages-container pages-container-search-posts">
                    <div class="pages">
                        <?php if ($currentPage > 1) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= 1 ?>" class="page ">&lt;&lt;</a>
                        <?php endif ?>
                        <?php if ($currentPage > 1) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage - 1 ?>" class="page ">
                                &lt;</a>
                        <?php endif ?>
                        <?php if ($currentPage > 3) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage - 3 ?>" class="page "><?= $currentPage - 3 ?></a>
                        <?php endif ?>
                        <?php if ($currentPage > 2) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage - 2 ?>" class="page "><?= $currentPage - 2 ?></a>
                        <?php endif ?>
                        <?php if ($currentPage > 1) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage - 1 ?>" class="page "><?= $currentPage - 1 ?></a>
                        <?php endif ?>
                        <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage ?>" class="page active-page"><?= $currentPage ?></a>
                        <?php if (($currentPage + 1) <= $maxPostPage) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage + 1 ?>" class="page "><?= $currentPage + 1 ?></a>
                        <?php endif ?>
                        <?php if (($currentPage + 2) <= $maxPostPage) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage + 2 ?>" class="page "><?= $currentPage + 2 ?></a>
                        <?php endif ?>
                        <?php if (($currentPage + 3) <= $maxPostPage) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage + 3 ?>" class="page "><?= $currentPage + 3 ?></a>
                        <?php endif ?>

                        <!-- exchange arrows -->
                        <?php if (($currentPage + 1) <= $maxPostPage) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $currentPage + 1 ?>" class="page "> &gt;</a>
                        <?php endif ?>
                        <?php if ($currentPage < $maxPostPage) : ?>
                            <a href="<?= ROOT_URL ?>pages/search-posts.php?search=<?= $search ?>&page=<?= $maxPostPage ?>" class="page ">&gt;&gt;</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="alert-message alert-message-search error ">
                <p style="text-align: center;">No Posts Found For This Search</p>
            </div>
        <?php endif ?>
        <div class="individual-post-sidebar search-posts-sidebar">
            <hr class="individual-post-vertical-line search-posts-vertical-line container">

            <div class="individual-post-sidebar-vertical-line search-posts-sidebar-vertical-line"></div>
            <div class="individual-post-sidebar-content search-posts-sidebar-content">
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
                <?php if (mysqli_num_rows($firstFeaturedPostResult) == 1) : ?>
                    <div class="individual-post-sidebar-popular-posts">

                        <h6 class="individual-post-sidebar-section-title search-posts-sidebar-section-title">Popular
                            Posts</h6>
                        <div class="individual-post-sidebar-popular-post sidebar-post">

                            <div class="individual-post-sidebar-popular-post-container sidebar-post-container">
                                <!-- IF HAVE A ERROR, CHECK THE A TAGS -->
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/<?= $firstFeaturedPost["thumbnail"] ?>"> </a>
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>">
                                    <div class="search-posts-sidebar-popular-post-content sidebar-post-content">
                                        <div class="search-posts-sidebar-new-post-author sidebar-post-author">
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
                                        <p>
                                        <p class="featured-paragraph"><?= substr($firstFeaturedPost["subtitle"], 0, 80) ?>...</p>
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
                                        <div class="search-posts-sidebar-popular-post-content sidebar-post-content">
                                            <div class="search-posts-sidebar-new-post-author sidebar-post-author">
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
                                            <p>
                                            <p class="featured-paragraph"><?= substr($secondFeaturedPost["subtitle"], 0, 80) ?>...</p>
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
                                        <div class="search-posts-sidebar-popular-post-content sidebar-post-content">
                                            <div class="search-posts-sidebar-new-post-author sidebar-post-author">
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
                                            <p>
                                            <p class="featured-paragraph"><?= substr($thirdFeaturedPost["subtitle"], 0, 80) ?>...</p>
                                            </p>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                    <hr class="individual-post-sidebar-horizontal-line search-posts-sidebar-horizontal-line">
                <?php endif ?>

                <div class="individual-post-sidebar-new-posts">
                    <h6 class="individual-post-sidebar-section-title search-posts-sidebar-section-title">New Posts
                    </h6>
                    <div class="individual-post-sidebar-new-post sidebar-post">
                        <?php
                        $newPostsQuery = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 6";
                        $newPostsResult = mysqli_query($connection, $newPostsQuery);
                        ?>
                        <?php while ($newPost = mysqli_fetch_assoc($newPostsResult)) : ?>
                            <div class="individual-post-sidebar-new-post-container sidebar-post-container">
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $newPost["id"] ?>"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/<?= $newPost["thumbnail"] ?>"> </a>
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $newPost["id"] ?>">
                                    <div class="search-posts-sidebar-popular-post-content sidebar-post-content">

                                        <div class="search-posts-sidebar-new-post-author sidebar-post-author">
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
                                        <p> <?= substr($newPost["subtitle"], 0, 80) ?>...
                                        </p>

                                    </div>
                                </a>
                            </div>
                        <?php endwhile ?>

                    </div>
                    <hr class="individual-post-sidebar-horizontal-line search-posts-sidebar-horizontal-line">
                    <div class="individual-post-sidebar-categories sidebar-categories">
                        <h6 class="individual-post-sidebar-section-title sidebar-categories-section-title search-posts-sidebar-section-title">
                            Categories
                        </h6>
                        <div class="individual-post-sidebar-categories-container sidebar-categories-container">
                            <?php
                            $categoriesQuery = "SELECT * FROM categories";
                            $categoriesResult = mysqli_query($connection, $categoriesQuery);
                            ?>
                            <?php while ($category = mysqli_fetch_assoc($categoriesResult)) : ?>
                                <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $category["id"] ?>" class="search-posts-sidebar-category sidebar-category"><?= $category["title"] ?></a>

                            <?php endwhile ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<hr class="hr container">

<!-- ============== CATEGORY BUTTONS SECTION ================-->

<section class="category-buttons">
    <h1 class="section-title">CATEGORIES</h1>

    <div class="container category-buttons-container">
        <?php
        $allCategoriesQuery = "SELECT * FROM categories";
        $allCategories = mysqli_query($connection, $allCategoriesQuery);

        ?>
        <?php while ($category = mysqli_fetch_assoc($allCategories)) : ?>
            <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $category["id"] ?>" class="category-button category-button-section"><?= $category["title"] ?></a>
        <?php endwhile ?>
</section>




<!-- ============== FOOTER SECTION ================-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>