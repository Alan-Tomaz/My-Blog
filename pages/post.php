<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';
?>


<section class="individual-post">
    <div class="container individual-post-container">
        <div class="individual-post-content">
            <h5 class="individual-post-title">Title</h5>
            <div class="individual-post-author">

                <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">

                <div class="individual-post-author-info">
                    <h5>By: Allen Bale</h5>
                    <small>February 10, 2023 - 13:22</small>
                </div>
            </div>
            <img src="<?php echo ROOT_URL ?>img/blog60.jpg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus consectetur maiores soluta odit
                suscipit dicta, repellat perspiciatis illum accusamus iusto possimus, velit ex nemo dignissimos
                dolore voluptatem magnam. Enim, voluptatem. Ex reprehenderit numquam ipsam libero, odio quis
                voluptatum at corrupti repudiandae officia nisi asperiores eligendi optio amet aliquid in sequi?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus consectetur maiores soluta
                odit
                suscipit dicta, repellat perspiciatis illum accusamus iusto possimus, velit ex nemo dignissimos
                dolore voluptatem magnam. Enim, voluptatem. Ex reprehenderit numquam ipsam libero, odio quis
                voluptatum at corrupti repudiandae officia nisi asperiores eligendi optio amet aliquid in sequi?
            </p>
            <img src="<?php echo ROOT_URL ?>img/blog60.jpg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus consectetur maiores soluta odit
                suscipit dicta, repellat perspiciatis illum accusamus iusto possimus, velit ex nemo dignissimos
                dolore voluptatem magnam. Enim, voluptatem. Ex reprehenderit numquam ipsam libero, odio quis
                voluptatum at corrupti repudiandae officia nisi asperiores eligendi optio amet aliquid in sequi?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus consectetur maiores soluta
                odit
                suscipit dicta, repellat perspiciatis illum accusamus iusto possimus, velit ex nemo dignissimos
                dolore voluptatem magnam. Enim, voluptatem. Ex reprehenderit numquam ipsam libero, odio quis
                voluptatum at corrupti repudiandae officia nisi asperiores eligendi optio amet aliquid in sequi?
            </p>
        </div>
        <div class="individual-post-sidebar">
            <hr class="individual-post-vertical-line container">
            <div class="individual-post-sidebar-vertical-line"></div>
            <div class="individual-post-sidebar-content">
                <div class="individual-post-sidebar-author">
                    <h6 class="individual-post-sidebar-section-title">Author</h6>
                    <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                    <div class="individual-post-sidebar-author-info">
                        <h6 class="individual-post-sidebar-author-name">Allen</h6>
                        <span class="individual-post-sidebar-author-location"><i class="uil uil-location-point"></i>Brasil,
                            São Paulo</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A atque, optio veniam velit
                        iusto
                        nisi
                        recusandae quam aperiam est at!</p>
                    <span class="individual-post-sidebar-author-mail"><i class="uil uil-envelope-alt"></i>Allen@gmail.com</span>
                </div>
                <hr class="individual-post-sidebar-horizontal-line">
                <div class="individual-post-sidebar-popular-posts">
                    <h6 class="individual-post-sidebar-section-title">Popular Posts</h6>
                    <div class="individual-post-sidebar-popular-post sidebar-post">
                        <div class="individual-post-sidebar-popular-post-container sidebar-post-container">
                            <!-- IF HAVE A ERROR, CHECK THE A TAGS -->
                            <a href="<?php echo ROOT_URL ?>pages/post.php"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/blog60.jpg"> </a>
                            <a href="<?php echo ROOT_URL ?>pages/post.php">
                                <div class="individual-post-sidebar-popular-post-content sidebar-post-content">
                                    <div class="individual-post-sidebar-popular-post-author sidebar-post-author">
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
                <hr class="individual-post-sidebar-horizontal-line">
                <div class="individual-post-sidebar-new-posts">
                    <h6 class="individual-post-sidebar-section-title">New Posts</h6>
                    <div class="individual-post-sidebar-new-post sidebar-post">

                        <div class="individual-post-sidebar-new-post-container sidebar-post-container">
                            <a href="<?php echo ROOT_URL ?>pages/post.php"><img class="individual-post-sidebar-popular-post-thumbnail sidebar-post-thumbnail" src="<?php echo ROOT_URL ?>img/blog60.jpg"> </a>
                            <a href="<?php echo ROOT_URL ?>pages/post.php">
                                <div class="individual-post-sidebar-new-post-content sidebar-post-content">

                                    <div class="individual-post-sidebar-new-post-author sidebar-post-author">
                                        <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                                        <h6>Allen</h6>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi libero
                                        dignissimos.</p>

                                </div>
                            </a>
                        </div>

                    </div>
                    <hr class="individual-post-sidebar-horizontal-line">
                    <div class="individual-post-sidebar-categories sidebar-categories">
                        <h6 class="individual-post-sidebar-section-title sidebar-categories-section-title">
                            Categories
                        </h6>
                        <div class="individual-post-sidebar-categories-container sidebar-categories-container">
                            <a href="<?php echo ROOT_URL ?>pages/category-posts.php" class="individual-post-sidebar-category sidebar-category">Uncategorized</a>



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