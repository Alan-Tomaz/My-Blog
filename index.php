<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Blog</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Iconscout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Font (Montserrat) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- ============== NAV  ================-->
    <nav>
        <div class="container nav-container">
            <ul class="nav-items nav-items-left">
                <li><a href="index.html" class="nav-logo">THE BLOG</a></li>
                <li>
                    <div class="nav-search-container">
                        <form class="nav-search">
                            <i class="uil uil-search"></i>
                            <input type="search" placeholder="Search Posts">
                        </form>
                    </div>
                </li>
            </ul>
            <ul class="nav-items nav-items-right">
                <li><a href="./pages/blog.html">Blog</a></li>
                <li><a href="./pages/about.html">About</a></li>
                <li><a href="./pages/contact.html">Contact</a></li>
                <!-- <li><a href="./pages/signin.html">Sign In</a></li> -->
                <!-- <li"><a class="sign-up" href=" ./pages/signup.html">Sign Up</a> </li> -->

                <li class="nav-profile">
                    <div class="avatar">
                        <img src="img/avatar2.jpg">
                    </div>
                    <ul>
                        <li><a href="./pages/profile.html">Dashboard</a></li>
                        <li><a href="./pages/logout.html">Logout</a></li>
                    </ul>

                </li>

            </ul>
            <button id="open-nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close-nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- ============== HERO SECTION ================-->
    <section class="hero-section">
        <div class="hero-section-container">
            <div class="hero-section-content">
                <h1 class="hero-section-title">Lorem ipsum dolor sit amet, consectetur.</h1>
                <p class="hero-section-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                    sollicitudin mi eu massa iaculis
                    egestas. Proin finibus rutrum sodales. Sed auctor aliquam vestibulum. Phasellus.</p>
                <a href="" class="action-button">SIGN UP</a>
            </div>
            <img src="./img/undraw_reading_re_29f8.svg">
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
                    <a href="./pages/post.html">
                        <img src="./img/blog60.jpg">
                    </a>
                </div>
                <div class="featured-info">
                    <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                    <a href="./pages/post.html">
                        <h2 class="featured-title">Title</h2>
                    </a>
                    <a href="./pages/post.html">
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
                    <a href="./pages/post.html">

                        <div class="post-author">
                            <div class="post-author-avatar">
                                <img src="./img/avatar2.jpg">
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
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>
            <article class="new-post category-post">
                <div class="new-post-author home-page-new-post-author">
                    <div class="new-post-author-avatar category-post-author-avatar">
                        <img src="../img/avatar2.jpg">
                    </div>
                    <h5>By: John Mills</h5>
                </div>
                <h3 class="new-post-title category-post-title">
                    <a href="./pages/post.html">Title</a>
                </h3>
                <a href="./pages/category-posts.html" class="category-button">Wild Life</a>
                <p class="new-post-body category-post-body">
                    <a href="./pages/post.html">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae officiis quod fugit
                        architecto exercitationem ea, quia dolore voluptatum magni cumque minus debitis ipsam.
                    </a>
                </p>
                <div class="new-post-author-info category-post-author-info">
                    <a href="./pages/post.html">

                        <small>February 28, 2023 - 06:33</small>
                    </a>

                </div>

            </article>




        </div>
        <div class="pages-container">
            <div class="pages">
                <div class="page">1</div>
                <div class="page active-page">2</div>
                <div class="page">3</div>
            </div>
        </div>
    </section>

    <hr class="hr container">

    <!-- ============== CATEGORY BUTTONS SECTION ================-->

    <section class="category-buttons">
        <h1 class="section-title">CATEGORY BUTTONS</h1>

        <div class="container category-buttons-container">
            <a href="./pages/category-posts.html" class="category-button category-button-section">Uncategorized</a>
            <a href="./pages/category-posts.html" class="category-button category-button-section">Wild Life</a>
            <a href="./pages/category-posts.html" class="category-button category-button-section">Art</a>
            <a href="./pages/category-posts.html" class="category-button category-button-section">Travel</a>
            <a href="./pages/category-posts.html" class="category-button category-button-section">Music</a>
            <a href="./pages/category-posts.html" class="category-button category-button-section">Science &
                Technology</a>
            <a href="./pages/category-posts.html" class="category-button category-button-section">Food</a>
        </div>
    </section>

    <!-- ============== FOOTER SECTION ================-->

    <footer>
        <div class="footer-socials">
            <a href="https://youtube.com" target="_blank"><i class="uil uil-youtube"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="uil uil-twitter"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
        </div>
        <div class="container footer-container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">Wild Life</a></li>
                    <li><a href="">Art</a></li>
                    <li><a href="">Travel</a></li>
                    <li><a href="">Music</a></li>
                    <li><a href="">Science and Technology</a></li>
                    <li><a href="">Food</a></li>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Online Support</a></li>
                    <li><a href="">Call Numbers</a></li>
                    <li><a href="">Emails</a></li>
                    <li><a href="">Social Support</a></li>
                    <li><a href="">Location</a></li>
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Safety</a></li>
                    <li><a href="">Repair</a></li>
                    <li><a href="">Recent</a></li>
                    <li><a href="">Popular</a></li>
                    <li><a href="">Categories</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer-copyright">
            <small>Copyright &copy; 2022 ALAN</small>
        </div>
    </footer>
    <script src="./js/main.js"></script>
</body>

</html>