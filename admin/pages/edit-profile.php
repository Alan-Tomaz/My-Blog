<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Blog</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../css/style.css">
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
                <li><a href="../index.html" class="nav-logo">THE BLOG</a></li>
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
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./about.html">About</a></li>
                <li><a href="./contact.html">Contact</a></li>
                <li><a href="./signin.html">Sign In</a></li>
                <li"><a class="sign-up" href=" ./signup.html">Sign Up</a> </li>
                    <!-- <li class="nav-profile">
                        <div class="avatar">
                            <img src="img/avatar2.jpg">
                        </div>
                        <ul>
                            <li><a href="./dashboard.html">Dashboard</a></li>
                            <li><a href="./logout.html">Logout</a></li>
                        </ul>

                        </li>
                        -->
            </ul>
            <button id="open-nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close-nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <body>
        <section class="form-section-alt add-content">
            <div class="container form-section-container">
                <h2>Edit Profile</h2>
                <div class="alert-message error">
                    <p>This is an error message</p>
                </div>
                <form action="" enctype="multipart/form-data" class="form-general">
                    <input type="text" name="" id="" placeholder="First Name">
                    <input type="text" name="" id="" placeholder="Last Name">
                    <input type="text" name="" id="" placeholder="Username">
                    <input type="email" name="" id="" placeholder="E-mail">
                    <input type="text" name="" placeholder="Location">
                    <textarea name="" cols="20" rows="10" placeholder="Biography"></textarea>
                    <input type="password" name="" id="" placeholder="Edit Password">
                    <input type="password" name="" id="" placeholder="Confirm Password">
                    <div class="form-control">
                        <label for="avatar">User Avatar</label>
                        <input type="file" name="" id="avatar">
                    </div>
                    <button type="submit" class="btn">Edit Profile</button>
                </form>
            </div>
        </section>

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