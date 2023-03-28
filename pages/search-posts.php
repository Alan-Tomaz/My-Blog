<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';
?>


<!-- ==============  SECTION ================-->

<section class="search-pages-query-section">
    <div class="container search-query">
        <h6>Search For:</h6>
        <p>Lorem ipsum dolor sit amet.</p>
    </div>

</section>
<section class="search-pages-section">
    <div class="search-pages-container container">
        <div class="search-pages-result new-posts">
            <div class="search-pages-result-container new-posts-page-container">
                <article class="new-post search-pages-post">
                    <a href="<?php echo ROOT_URL ?>pages/post.php">

                        <div class="new-post-author search-pages-post-author">
                            <div class="new-post-author-avatar search-pages-post-author-avatar">
                                <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                            </div>
                            <h5>By: John Mills</h5>
                        </div>
                    </a>
                    <h3 class="new-post-title search-pages-post-title">
                        <a href="<?php echo ROOT_URL ?>pages/post.php">Title</a>
                    </h3>
                    <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button">Wild Life</a>
                    <p class="new-post-body search-pages-post-body">
                        <a href="<?php echo ROOT_URL ?>pages/post.php">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                            architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                        </a>
                    </p>
                    <div class="new-post-author-info search-pages-post-author-info">
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
        </div>
        <div class="individual-post-sidebar search-posts-sidebar">
            <hr class="individual-post-vertical-line search-posts-vertical-line container">

            <div class="individual-post-sidebar-vertical-line search-posts-sidebar-vertical-line"></div>
            <div class="individual-post-sidebar-content search-posts-sidebar-content">

                <div class="individual-post-sidebar-popular-posts">
                    <h6 class="individual-post-sidebar-section-title search-posts-sidebar-section-title">Popular
                        Posts</h6>
                    <div class="individual-post-sidebar-popular-post sidebar-post">

                        <div class="individual-post-sidebar-popular-post-container sidebar-post-container">
                            <!-- IF HAVE A ERROR, CHECK THE A TAGS -->
                            <a href="<?php echo ROOT_URL ?>pages/post.php"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/blog60.jpg"> </a>
                            <a href="<?php echo ROOT_URL ?>pages/post.php">
                                <div class="search-posts-sidebar-popular-post-content sidebar-post-content">
                                    <div class="search-posts-sidebar-new-post-author sidebar-post-author">
                                        <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                                        <h6>Allen</h6>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi libero
                                        dignissimos.</p>
                                </div>
                            </a>
                        </div>

                    </div>


                </div>
                <hr class="individual-post-sidebar-horizontal-line search-posts-sidebar-horizontal-line">
                <div class="individual-post-sidebar-new-posts">
                    <h6 class="individual-post-sidebar-section-title search-posts-sidebar-section-title">New Posts
                    </h6>
                    <div class="individual-post-sidebar-new-post sidebar-post">

                        <div class="individual-post-sidebar-new-post-container sidebar-post-container">
                            <a href="<?php echo ROOT_URL ?>pages/post.php"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/blog60.jpg"> </a>
                            <a href="<?php echo ROOT_URL ?>pages/post.php">
                                <div class="search-posts-sidebar-popular-post-content sidebar-post-content">

                                    <div class="search-posts-sidebar-new-post-author sidebar-post-author">
                                        <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                                        <h6>Allen</h6>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi libero
                                        dignissimos.</p>

                                </div>
                            </a>
                        </div>

                    </div>
                    <hr class="individual-post-sidebar-horizontal-line search-posts-sidebar-horizontal-line">
                    <div class="individual-post-sidebar-categories sidebar-categories">
                        <h6 class="individual-post-sidebar-section-title sidebar-categories-section-title search-posts-sidebar-section-title">
                            Categories
                        </h6>
                        <div class="individual-post-sidebar-categories-container sidebar-categories-container">

                            <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="search-posts-sidebar-category sidebar-category">Uncategorized</a>





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
    <h1 class="section-title">CATEGORY BUTTONS</h1>

    <div class="container category-buttons-container">
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Uncategorized</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Wild
            Life</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Art</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Travel</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Music</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Science &
            Technology</a>
        <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="category-button category-button-section">Food</a>
    </div>
</section>




<!-- ============== FOOTER SECTION ================-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>