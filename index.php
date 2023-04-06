<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';

$featuredPostsNum = 0;

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

if (mysqli_num_rows($firstFeaturedPostResult) == 1) {
    $featuredPostsNum = 1;
}

if (mysqli_num_rows($secondFeaturedPostResult) == 1) {
    $featuredPostsNum = 2;
}

if (mysqli_num_rows($thirdFeaturedPostResult) == 1) {
    $featuredPostsNum = 3;
}

// fetch 9 posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 12";
$posts = mysqli_query($connection, $query);

?>
<!-- ============== HERO SECTION ================-->
<section class="hero-section">
    <div class="hero-section-container">
        <div class="hero-section-content">
            <h1 class="hero-section-title">Lorem ipsum dolor sit amet, consectetur.</h1>
            <p class="hero-section-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                sollicitudin mi eu massa iaculis
                egestas. Proin finibus rutrum sodales. Sed auctor aliquam vestibulum. Phasellus.</p>
            <a href="<?php echo ROOT_URL ?>pages/signup.php" class="action-button">SIGN UP</a>
        </div>
        <img src="<?php echo ROOT_URL ?>img/undraw_reading_re_29f8.svg">
    </div>
</section>

<!-- ============== FEATURED SECTION ================-->
<?php if (mysqli_num_rows($firstFeaturedPostResult) == 1) : ?>
    <h1 class="section-title">FEATURED</h1>
    <section class="featured">
        <button class="slider-angle-button" id="before-button">
            <i class="uil uil-angle-left-b angle-button"></i>
        </button>
        <div class="slider">
            <div class="slides">
                <!-- radio button start -->
                <input type="radio" name="radio-btn" id="radio1">
                <?php if (mysqli_num_rows($secondFeaturedPostResult) == 1) : ?>
                    <input type="radio" name="radio-btn" id="radio2">
                <?php endif ?>
                <?php if (mysqli_num_rows($thirdFeaturedPostResult) == 1) : ?>
                    <input type="radio" name="radio-btn" id="radio3">
                <?php endif ?>

                <!-- radio buttons end -->
                <!-- slide images start-->
                <div class="slide first">
                    <div class="featured-area">

                        <div class="featured-container">
                            <div class="post-thumbnail">
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>">
                                    <img src="<?php echo ROOT_URL ?>img/<?= $firstFeaturedPost["thumbnail"] ?>">
                                </a>
                            </div>
                            <div class="featured-info">
                                <?php
                                //fetch category from categories table using category_id of post 
                                $firstFeaturedPostCategoryId = $firstFeaturedPost["category_id"];
                                $firstFeaturedPostCategoryQuery = "SELECT * FROM categories WHERE id = $firstFeaturedPostCategoryId";
                                $firstFeaturedPostCategoryResult = mysqli_query($connection, $firstFeaturedPostCategoryQuery);
                                $firstFeaturedPostCategory = mysqli_fetch_assoc($firstFeaturedPostCategoryResult);
                                ?>
                                <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $firstFeaturedPostCategory["id"] ?>" class="category-button"><?= $firstFeaturedPostCategory["title"] ?></a>
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>">
                                    <h2 class="featured-title"><?= $firstFeaturedPost["title"] ?></h2>
                                </a>
                                <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $firstFeaturedPost["id"] ?>">
                                    <p class="featured-paragraph"><?= substr($firstFeaturedPost["subtitle"], 0, 300) ?>...</p>
                                </a>
                                <?php
                                //fetch author from users table using author_id
                                $firstFeaturedPostAuthorId = $firstFeaturedPost["author_id"];
                                $firstFeaturedPostAuthorQuery = "SELECT * FROM users WHERE id = $firstFeaturedPostAuthorId";
                                $firstFeaturedPostAuthorResult = mysqli_query($connection, $firstFeaturedPostAuthorQuery);
                                $firstFeaturedPostAuthor = mysqli_fetch_assoc($firstFeaturedPostAuthorResult);
                                ?>
                                <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $firstFeaturedPostAuthor["username"] ?>">
                                    <div class="post-author">

                                        <div class="post-author-avatar">
                                            <img src="<?php echo ROOT_URL ?>img/<?= $firstFeaturedPostAuthor["avatar"] ?>">
                                        </div>
                                        <div class="post-avatar-info">
                                            <h5>By: <?= $firstFeaturedPostAuthor["firstname"] . " " . $firstFeaturedPostAuthor["lastname"] ?></h5>
                                            <small><?= date("M d, Y - H:i", strtotime($firstFeaturedPost["date_time"])) ?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (mysqli_num_rows($secondFeaturedPostResult) == 1) : ?>
                    <div class="slide">
                        <div class="featured-area">

                            <div class="featured-container">
                                <div class="post-thumbnail">
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $secondFeaturedPost["id"] ?>">
                                        <img src="<?php echo ROOT_URL ?>img/<?= $secondFeaturedPost["thumbnail"] ?>">
                                    </a>
                                </div>
                                <div class="featured-info">
                                    <?php
                                    //fetch category from categories table using category_id of post 
                                    $secondFeaturedPostCategoryId = $secondFeaturedPost["category_id"];
                                    $secondFeaturedPostCategoryQuery = "SELECT * FROM categories WHERE id = $secondFeaturedPostCategoryId";
                                    $secondFeaturedPostCategoryResult = mysqli_query($connection, $secondFeaturedPostCategoryQuery);
                                    $secondFeaturedPostCategory = mysqli_fetch_assoc($secondFeaturedPostCategoryResult);
                                    ?>
                                    <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $secondFeaturedPostCategory["id"] ?>" class="category-button"><?= $secondFeaturedPostCategory["title"] ?></a>
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $secondFeaturedPost["id"] ?>">
                                        <h2 class="featured-title"><?= $secondFeaturedPost["title"] ?></h2>
                                    </a>
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $secondFeaturedPost["id"] ?>">
                                        <p class="featured-paragraph"><?= substr($secondFeaturedPost["subtitle"], 0, 300) ?>...</p>
                                    </a>
                                    <?php
                                    //fetch author from users table using author_id
                                    $secondFeaturedPostAuthorId = $secondFeaturedPost["author_id"];
                                    $secondFeaturedPostAuthorQuery = "SELECT * FROM users WHERE id = $secondFeaturedPostAuthorId";
                                    $secondFeaturedPostAuthorResult = mysqli_query($connection, $secondFeaturedPostAuthorQuery);
                                    $secondFeaturedPostAuthor = mysqli_fetch_assoc($secondFeaturedPostAuthorResult);
                                    ?>
                                    <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $secondFeaturedPostAuthor["username"] ?>">
                                        <div class="post-author">

                                            <div class="post-author-avatar">
                                                <img src="<?php echo ROOT_URL ?>img/<?= $secondFeaturedPostAuthor["avatar"] ?>">
                                            </div>
                                            <div class="post-avatar-info">
                                                <h5>By: <?= $secondFeaturedPostAuthor["firstname"] . " " . $secondFeaturedPostAuthor["lastname"] ?></h5>
                                                <small><?= date("M d, Y - H:i", strtotime($secondFeaturedPost["date_time"])) ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php if (mysqli_num_rows($thirdFeaturedPostResult) == 1) : ?>

                    <div class="slide">
                        <div class="featured-area">

                            <div class="featured-container">
                                <div class="post-thumbnail">
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $thirdFeaturedPost["id"] ?>">
                                        <img src="<?php echo ROOT_URL ?>img/<?= $thirdFeaturedPost["thumbnail"] ?>">
                                    </a>
                                </div>
                                <div class="featured-info">
                                    <?php
                                    //fetch category from categories table using category_id of post 
                                    $thirdFeaturedPostCategoryId = $thirdFeaturedPost["category_id"];
                                    $thirdFeaturedPostCategoryQuery = "SELECT * FROM categories WHERE id = $thirdFeaturedPostCategoryId";
                                    $thirdFeaturedPostCategoryResult = mysqli_query($connection, $thirdFeaturedPostCategoryQuery);
                                    $thirdFeaturedPostCategory = mysqli_fetch_assoc($thirdFeaturedPostCategoryResult);
                                    ?>
                                    <a href="<?php echo ROOT_URL ?>pages/category-posts.php?category=<?= $thirdFeaturedPostCategory["id"] ?>" class="category-button"><?= $thirdFeaturedPostCategory["title"] ?></a>
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $thirdFeaturedPost["id"] ?>">
                                        <h2 class="featured-title"><?= $thirdFeaturedPost["title"] ?></h2>
                                    </a>
                                    <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $thirdFeaturedPost["id"] ?>">
                                        <p class="featured-paragraph"><?= substr($thirdFeaturedPost["subtitle"], 0, 300) ?>...</p>
                                    </a>
                                    <?php
                                    //fetch author from users table using author_id
                                    $thirdFeaturedPostAuthorId = $thirdFeaturedPost["author_id"];
                                    $thirdFeaturedPostAuthorQuery = "SELECT * FROM users WHERE id = $thirdFeaturedPostAuthorId";
                                    $thirdFeaturedPostAuthorResult = mysqli_query($connection, $thirdFeaturedPostAuthorQuery);
                                    $thirdFeaturedPostAuthor = mysqli_fetch_assoc($thirdFeaturedPostAuthorResult);
                                    ?>
                                    <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $thirdFeaturedPostAuthor["username"] ?>">

                                        <div class="post-author">

                                            <div class="post-author-avatar">
                                                <img src="<?php echo ROOT_URL ?>img/<?= $thirdFeaturedPostAuthor["avatar"] ?>">
                                            </div>
                                            <div class="post-avatar-info">
                                                <h5>By: <?= $thirdFeaturedPostAuthor["firstname"] . " " . $thirdFeaturedPostAuthor["lastname"] ?></h5>
                                                <small><?= date("M d, Y - H:i", strtotime($thirdFeaturedPost["date_time"])) ?></small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <!-- slie image end -->



                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <?php if (mysqli_num_rows($secondFeaturedPostResult) == 1) : ?>
                        <div class="auto-btn2"></div>
                    <?php endif ?>
                    <?php if (mysqli_num_rows($thirdFeaturedPostResult) == 1) : ?>
                        <div class="auto-btn3"></div>
                    <?php endif ?>

                    <!-- automatic navigation end -->
                </div>

            </div>

            <!-- automatic navigation start -->

            <!-- manual navigation start -->
            <div class="navigation-buttons">
                <label for="radio1" class="manual-btn" id="manual-btn1"></label>
                <?php if (mysqli_num_rows($secondFeaturedPostResult) == 1) : ?>
                    <label for="radio2" class="manual-btn" id="manual-btn2"></label>
                <?php endif ?>
                <?php if (mysqli_num_rows($thirdFeaturedPostResult) == 1) : ?>
                    <label for="radio3" class="manual-btn" id="manual-btn3"></label>
                <?php endif ?>

            </div>
            <!-- manual navigation end -->
        </div>
        <button class="slider-angle-button before-button" id="after-button">
            <i class="uil uil-angle-right-b angle-button"></i>
        </button>
    </section>
    <hr class="hr container">
<?php endif ?>

<!-- ============== NEW POSTS SECTION ================-->
<h1 class="section-title">New Posts</h3>

    <section class="home-page-new-posts new-posts">

        <div class="home-page-new-posts-page-container container new-posts-page-container">
            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>

                <article class="new-post category-post">
                    <?php
                    //fetch author from users table using author_id
                    $authorId = $post["author_id"];
                    $authorQuery = "SELECT * FROM users WHERE id = $authorId";
                    $authorResult = mysqli_query($connection, $authorQuery);
                    $author = mysqli_fetch_assoc($authorResult);
                    ?>
                    <a href="<?= ROOT_URL ?>pages/user-page.php?user=<?= $author["username"] ?>">
                        <div class="new-post-author home-page-new-post-author">
                            <div class="new-post-author-avatar category-post-author-avatar">
                                <img src="<?php echo ROOT_URL ?>img/<?= $author["avatar"] ?>">
                            </div>
                            <h5>By: <?= $author["firstname"] . " " . $author["lastname"] ?></h5>
                        </div>
                    </a>
                    <h3 class="new-post-title category-post-title">

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
                    <p class="new-post-body category-post-body">
                        <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">
                            <?= substr($post["subtitle"], 0, 150) ?>...
                        </a>
                    </p>
                    <div class="new-post-author-info category-post-author-info">
                        <a href="<?php echo ROOT_URL ?>pages/post.php?id=<?= $post["id"] ?>">

                            <small><?= date("M d, Y - H:i", strtotime($post["date_time"])) ?></small>
                        </a>

                    </div>

                </article>
            <?php endwhile ?>



        </div>
        <div class="view-more-container">
            <a href="<?= ROOT_URL ?>pages/blog.php" class="btn">View More...</a>
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
        </div>
    </section>

    <script>
        document.getElementById("radio1").checked = true;
        let featuredPostsNum = <?= $featuredPostsNum ?>;
        console.log(featuredPostsNum);
        if (featuredPostsNum != 0) {
            let counter = 1;
            var i = 0;
            let sliderArray = [];
            //let isPressed = 0;
            let beforeButton = document.getElementById("before-button");
            let afterButton = document.getElementById("after-button");





            beforeButton.addEventListener('click', function() {
                clearInterval(autoInterv);
                if (sliderArray[i] != null) {
                    clearInterval(sliderArray[i]);
                }
                i++;
                counter--;
                if (counter < 1) {
                    counter = featuredPostsNum;
                }
                document.getElementById("radio" + counter).checked = true;
                console.log("Checked = " + counter);
                //isPressed = 1;
                /*setInterval(function () {
                        if (isPressed === 1) {
                            counter++;
                            if (counter > 4) {
                                counter = 1;
                            }
                            document.getElementById("radio" + counter).checked = true;
                            console.log("Checked = " + counter);
                            console.log("Interval = 1");
                        }
                    }, 5000);*/
                sliderArray[i] = setInterval(function() {

                    //if (isPressed === 1) {

                    counter++;
                    if (counter > featuredPostsNum) {
                        counter = 1;
                    }
                    document.getElementById("radio" + counter).checked = true;
                    console.log("Checked = " + counter);
                    console.log("Interval = 1");

                    //}


                }, 10000);
            });

            afterButton.addEventListener('click', function() {
                clearInterval(autoInterv);
                if (sliderArray[i] != null) {
                    clearInterval(sliderArray[i]);
                }
                i++;
                counter++;
                if (counter > featuredPostsNum) {
                    counter = 1;
                }
                document.getElementById("radio" + counter).checked = true;
                console.log("Checked = " + counter);
                sliderArray[i] = setInterval(function() {

                    counter++;
                    if (counter > featuredPostsNum) {
                        counter = 1;
                    }
                    document.getElementById("radio" + counter).checked = true;
                    console.log("Checked = " + counter);
                    console.log("Interval = 1");


                }, 10000);
            });


            let autoInterv = setInterval(function() {
                counter++;
                if (counter > featuredPostsNum) {
                    counter = 1;
                }
                document.getElementById("radio" + counter).checked = true;
                console.log("Checked = " + counter);
                console.log("Interval = 3");
            }, 10000);
        }
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>