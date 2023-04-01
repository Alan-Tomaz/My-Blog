<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if ($id != $_SESSION["user-id"]) {
        header('location: ' . ROOT_URL . 'admin/index.php');
        die();
    }

    if (mysqli_num_rows($result) !== 1) {
        $_SESSION['edit-user'] = "This User Doesn't exists";
        header('location: ' . ROOT_URL . 'admin/index.php');
    }
} else {
    header('location: ' . ROOT_URL . 'admin/index.php');
}
?>
<section class="form-section-alt add-content">
    <div class="container form-section-container">
        <h2>Edit Profile</h2>
        <?php if (isset($_SESSION['edit-profile'])) : ?>
            <div class="alert-message error">
                <?= $_SESSION['edit-profile'];
                unset($_SESSION['edit-profile']);
                ?>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/pages/edit-profile-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
            <input type="hidden" name="id" value="<?= $user["id"] ?>">
            <input type="hidden" name="current-avatar" value="<?= $user["avatar"] ?>">
            <input type="text" name="firstname" value="<?= $user["firstname"] ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?= $user["lastname"] ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?= $user["username"] ?>" placeholder="Username">
            <input type="email" name="email" value="<?= $user["email"] ?>" placeholder="E-mail">
            <input type="text" name="location" value="<?= $user["location"] ?>" placeholder="Location">
            <textarea name="bio" cols="20" rows="10" placeholder="Biography"><?= $user["firstname"] ?></textarea>
            <input type="password" name="create-password" placeholder="Edit Password">
            <input type="password" name="confirm-password" placeholder="Confirm Password">
            <div class="form-control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Edit User</button>
        </form>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>