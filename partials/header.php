<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

// fetch current user from database
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT avatar from users WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Blog</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo ROOT_URL ?>img/favicon.png" type="image/x-icon">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>css/style.css">
    <!-- Iconscout CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Font (Montserrat) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
    <!-- ============== NAV  ================-->
    <nav>
        <div class="container nav-container">
            <ul class="nav-items nav-items-left">
                <li><a href="<?php echo ROOT_URL ?>index.php" class="nav-logo">THE BLOG</a></li>
                <li>
                    <div class="nav-search-container">
                        <form class="nav-search" action="<?php echo ROOT_URL ?>pages/search-posts.php" method="GET">
                            <i class="uil uil-search"></i>
                            <input type="search" name="search" placeholder="Search Posts">
                        </form>
                    </div>
                </li>
            </ul>
            <ul class="nav-items nav-items-right">
                <li><a href="<?php echo ROOT_URL ?>pages/blog.php">Blog</a></li>
                <li><a href="<?php echo ROOT_URL ?>pages/about.php">About</a></li>
                <li><a href="<?php echo ROOT_URL ?>pages/contact.php">Contact</a></li>
                <?php if (isset($_SESSION["user-id"])) : ?>
                    <li class="nav-profile">
                        <div class="avatar">
                            <img src="<?php echo ROOT_URL . 'img/' . $avatar["avatar"] ?>">
                        </div>
                        <ul>
                            <li><a href="<?php echo ROOT_URL ?>admin/index.php">Dashboard</a></li>
                            <li><a href="<?php echo ROOT_URL ?>pages/logout.php">Logout</a></li>
                        </ul>

                    </li>
                <?php else : ?>
                    <li><a href="<?php echo ROOT_URL ?>pages/signin.php">Sign In</a></li>
                    <li><a class="sign-up" href="<?php echo ROOT_URL ?>pages/signup.php">Sign Up</a> </li>
                <?php endif ?>
            </ul>
            <button id="open-nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close-nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>