<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';
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
    <section class="form-section ">
        <div class="container form-section-container">
            <h2>Sign In</h2>
            <div class="alert-message success">
                <p>This is an success message</p>
            </div>
            <form action="<?php echo ROOT_URL ?>pages/signin-logic.php" enctype="multipart/form-data" class="form-general">
                <input type="text" name="username-email" placeholder="Username or Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="submit" class="btn">Sign In</button>
                <small>Don't have an account? <a href="<?php echo ROOT_URL ?>pages/signup.php">Sign Up</a></small>
            </form>
        </div>
    </section>

</body>

</php>