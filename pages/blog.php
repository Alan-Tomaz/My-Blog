<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';

//read page informations vars
$currentPage = $_GET["page"];
$maxElementsPerPage = 20;


//validate the variables

if (intval($currentPage) == 0) {
    //$currentPage = 1;
    header("location: " . ROOT_URL . "pages/blog.php?page=1");
    die();
}


//determine the max range of posts
$maxElementId = ($currentPage * $maxElementsPerPage);
$minElementId = ($maxElementId - $maxElementsPerPage);

$maxPostsQuery = "SELECT * FROM posts";
$maxPostsResult = mysqli_query($connection, $maxPostsQuery);
if (mysqli_num_rows($maxPostsResult) > 0) {
    $maxPosts = mysqli_num_rows($maxPostsResult);
    $maxPostPage = $maxPosts / $maxElementsPerPage;
    $maxPostPage = ceil($maxPostPage);


    if ($currentPage > $maxPostPage) {
        header("location: " . ROOT_URL . "pages/blog.php?page=1");
        die();
    }
}


//WHERE id >= $minElementId AND id <= $maxElementId
//$postsQuery = "SELECT * FROM posts WHERE id >= $minElementId AND id <= $maxElementId ORDER BY date_time DESC";
$postsQuery = "SELECT * FROM posts ORDER BY date_time DESC LIMIT $minElementId, $maxElementsPerPage";
$postsResult = mysqli_query($connection, $postsQuery);
?>


<h1 class="page-title">Blogs</h1>
<section class="search-bar">
    <form class="container search-bar-container" action="<?php echo ROOT_URL ?>pages/search-posts.php" method="GET">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="Search Posts">
        </div>
    </form>
</section>

<?php if (mysqli_num_rows($maxPostsResult) > 0) : ?>
    <section class="new-posts">
        <h3 class="section-subtitle">New Posts</h3>
        <div class="container new-posts-page-container">

            <?php while ($post = mysqli_fetch_assoc($postsResult)) : ?>
                <article class="new-post">
                    <?php
                    //fetch author from users table using author_id
                    $authorId = $post["author_id"];
                    $authorQuery = "SELECT * FROM users WHERE id = $authorId";
                    $authorResult = mysqli_query($connection, $authorQuery);
                    $author = mysqli_fetch_assoc($authorResult);
                    ?>
                    <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                        <div class="new-post-author">

                            <div class="new-post-author-avatar">
                                <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">
                            </div>
                            <h5>By: <?= $author["firstname"] . " " . $author["lastname"] ?></h5>
                        </div>
                    </a>
                    <h3 class="new-post-title">
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
                    <p class="new-post-body">
                        <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                            <?= substr((htmlspecialchars_decode($post["subtitle"], ENT_QUOTES)), 0, 150) ?>...
                        </a>
                    </p>
                    <div class="new-post-author-info">
                        <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">

                            <small><?= date("M d, Y - H:i", strtotime($post["date_time"])) ?></small>
                        </a>

                    </div>

                </article>
            <?php endwhile ?>
        </div>
        <div class="pages-container">
            <!-- exchange arrows -->

            <div class="pages">
                <?php if ($currentPage > 1) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= 1 ?>" class="page ">&lt;&lt;</a>
                <?php endif ?>
                <?php if ($currentPage > 1) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage - 1 ?>" class="page ">
                        &lt;</a>
                <?php endif ?>
                <?php if ($currentPage > 3) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage - 3 ?>" class="page "><?= $currentPage - 3 ?></a>
                <?php endif ?>
                <?php if ($currentPage > 2) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage - 2 ?>" class="page "><?= $currentPage - 2 ?></a>
                <?php endif ?>
                <?php if ($currentPage > 1) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage - 1 ?>" class="page "><?= $currentPage - 1 ?></a>
                <?php endif ?>
                <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage ?>" class="page active-page"><?= $currentPage ?></a>
                <?php if (($currentPage + 1) <= $maxPostPage) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage + 1 ?>" class="page "><?= $currentPage + 1 ?></a>
                <?php endif ?>
                <?php if (($currentPage + 2) <= $maxPostPage) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage + 2 ?>" class="page "><?= $currentPage + 2 ?></a>
                <?php endif ?>
                <?php if (($currentPage + 3) <= $maxPostPage) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage + 3 ?>" class="page "><?= $currentPage + 3 ?></a>
                <?php endif ?>

                <!-- exchange arrows -->
                <?php if (($currentPage + 1) <= $maxPostPage) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $currentPage + 1 ?>" class="page "> &gt;</a>
                <?php endif ?>
                <?php if ($currentPage < $maxPostPage) : ?>
                    <a href="<?= ROOT_URL ?>pages/blog.php?page=<?= $maxPostPage ?>" class="page ">&gt;&gt;</a>
                <?php endif ?>
            </div>

        </div>
    </section>
<?php else : ?>
    <div class="alert-message error alert-message-blog">
        <p style="text-align: center;">No Posts Were Found</p>
    </div>
<?php endif ?>
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
    </div>
</section>


<!-- ==============  SECTION ================-->




<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>