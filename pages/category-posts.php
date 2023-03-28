<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';
?>



<h1 class="page-title">Uncategorized</h1>

<section class="categories-posts new-posts">
    <div class="container new-posts-page-container categories-posts-page-container">
        <article class="new-post category-post">
            <a href="<?php echo ROOT_URL ?>pages/post.php">
                <div class="new-post-author categories-post-author">
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


<!-- ==============  SECTION ================-->



<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>