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
    <section class="form-section-alt ">
        <div class="container form-section-container">
            <h2>Sign Up</h2>
            <div class="alert-message success">
                <p>This is an success message</p>
            </div>
            <form action="<?php echo ROOT_URL ?>pages/signup-logic.php" enctype="multipart/form-data" class="form-general">
                <input type="text" name="firstname" placeholder="First Name">
                <input type="text" name="lastname" placeholder="Last Name">
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="location" placeholder="Location">
                <textarea name="bio" cols="20" rows="10" placeholder="Biography"></textarea>
                <input type="password" name="password" placeholder="Create Password">
                <input type="password" name="confirm-password" placeholder="Confirm Password">

                <div class="form-control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="<?php echo ROOT_URL ?>pages/signin.php">Sign In</a></small>
            </form>
        </div>
    </section>

</body>

</html>