<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) !== 1) {
        $_SESSION['edit-user'] = "This User Doesn't exists";
        header('location: ' . ROOT_URL . 'admin/pages/manage-users.php');
    }
} else {
    header('location: ' . ROOT_URL . 'admin/pages/manage-users.php');
}
?>

<body>
    <section class="form-section-alt add-content">
        <div class="container form-section-container">
            <h2>Edit User</h2>

            <form action="<?php echo ROOT_URL ?>admin/pages/edit-user-logic.php" enctype="multipart/form-data" class="form-general" method="POST">
                <input type="hidden" name="id" value="<?= $user["id"] ?>">
                <input type="text" name="firstname" value="<?= $user["firstname"] ?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $user["lastname"] ?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $user["username"] ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $user["email"] ?>" placeholder="E-mail">
                <input type="text" name="location" value="<?= $user["location"] ?>" placeholder="Location">
                <textarea name="bio" cols="20" rows="10" placeholder="Biography"><?= $user["firstname"] ?></textarea>
                <input type="password" name="create-password" placeholder="Edit Password">
                <input type="password" name="confirm-password" placeholder="Confirm Password">
                <select name="user-role">
                    <option value="0" selected>Author</option>
                    <option value="1">Admin</option>
                </select>
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