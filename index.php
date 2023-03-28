<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';
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
<section class="featured">
    <h1 class="section-title">FEATURED</h1>
    <div class="featured-area">
        <div class="next-button after-button">
            <a href="">
                <i class="uil uil-angle-left-b angle-button"></i>
            </a>
        </div>


        <div class="featured-container">
            <div class="post-thumbnail">
                <a href="<?php echo ROOT_URL ?>pages/post.php">
                    <img src="<?php echo ROOT_URL ?>img/blog60.jpg">
                </a>
            </div>
            <div class="featured-info">
                <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button">Wild Life</a>
                <a href="<?php echo ROOT_URL ?>pages/post.php">
                    <h2 class="featured-title">Title</h2>
                </a>
                <a href="<?php echo ROOT_URL ?>pages/post.php">
                    <p class="featured-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                        quis
                        dapibus nibh, nec euismod
                        turpis.
                        Etiam a
                        mauris sed ante lacinia feugiat. Integer tincidunt felis ut interdum rhoncus. Donec vel
                        ipsum et
                        neque
                        lacinia blandit sit amet sit amet elit.</p>
                </a>
                <a href="<?php echo ROOT_URL ?>pages/post.php">

                    <div class="post-author">
                        <div class="post-author-avatar">
                            <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                        </div>
                        <div class="post-avatar-info">
                            <h5>By: Janeth Smith</h5>
                            <small>February 10, 2023 - 13:22</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="next-button before-button">

            <a href="">
                <i class="uil uil-angle-right-b angle-button"></i>
            </a>
        </div>
    </div>
    <div class="featured-pages-container">
        <div class="featured-pages">
            <div class="featured-page"></div>
            <div class="featured-active-page featured-page"></div>
            <div class="featured-page"></div>
        </div>
    </div>

</section>
<hr class="hr container">
<!-- ============== NEW POSTS SECTION ================-->
<section class="home-page-new-posts new-posts">
    <div class="home-page-new-posts-page-container container new-posts-page-container">
        <article class="new-post category-post">
            <a href="<?php echo ROOT_URL ?>pages/post.php">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
            </a>
            <h3 class="new-post-title category-post-title">
                <a href="<?php echo ROOT_URL ?>pages/post.php">Title</a>
            </h3>
            <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button">Wild Life</a>
            <p class="new-post-body category-post-body">
                <a href="<?php echo ROOT_URL ?>pages/post.php">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                    architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                </a>
            </p>
            <div class="new-post-author-info category-post-author-info">
                <a href="<?php echo ROOT_URL ?>pages/post.php">

                    <small>February 28, 2023 - 06:33</small>
                </a>

            </div>

        </article>






    </div>
    <div class="pages-container">
        <div class="pages">
            <a href="" class="page">1</a>
            <a href="" class="page active-page">2</a>
            <a href="" class="page">3</a>
        </div>
    </div>
</section>

<hr class="hr container">

<!-- ============== CATEGORY BUTTONS SECTION ================-->

<section class="category-buttons">
    <h1 class="section-title">CATEGORY BUTTONS</h1>

    <div class="container category-buttons-container">
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Uncategorized</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Wild Life</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Art</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Travel</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Music</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Science &
            Technology</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Food</a>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>