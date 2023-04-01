<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

// get back form data if there was a registration error
$firstname = $_SESSION['add-user-data']['firstname'] ?? null; //null coalesscence operator
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$location = $_SESSION['add-user-data']['location'] ?? null;
$bio = $_SESSION['add-user-data']['bio'] ?? null;
$createPassword = $_SESSION['add-user-data']['create-password'] ?? null;
$confirmPassword = $_SESSION['add-user-data']['confirm-password'] ?? null;
//delete add-user data session
unset($_SESSION['add-user-data']);

if (!isset($_SESSION['user-is-admin'])) {
    $_SESSION["access-not-authorized"] = "You are not authorized to access this session.";
    header("location: " . ROOT_URL . "admin/index.php");
    die();
}
?>


<body>
    <section class=" form-section-alt">
        <div class="container form-section-container">
            <h2>Add User</h2>
            <?php if (isset($_SESSION['add-user'])) : ?>
                <div class="alert-message error">
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </div>
            <?php endif ?>
            <form action="<?php echo ROOT_URL ?>admin/pages/add-user-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
                <input type="text" name="location" value="<?= $location ?>" placeholder="Location">
                <textarea name="bio" cols="20" rows="10" placeholder="Biography"><?= $bio ?></textarea>
                <input type="password" name="create-password" value="<?= $createPassword ?>" placeholder="Create Password">
                <input type="password" name="confirm-password" value="<?= $confirmPassword ?>" placeholder="Confirm Password">
                <select name="user-role">
                    <option value="0" selected>Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form-control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
    ?>