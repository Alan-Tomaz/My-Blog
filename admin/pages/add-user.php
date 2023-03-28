<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>


<body>
    <section class=" form-section-alt">
        <div class="container form-section-container">
            <h2>Add User</h2>
            <div class="alert-message error">
                <p>This is an error message</p>
            </div>
            <form action="<?php echo ROOT_URL ?>admin/pages/add-user-logic.php" enctype="multipart/form-data" class="form-general">
                <input type="text" name="firstname" placeholder="First Name">
                <input type="text" name="lastname" placeholder="Last Name">
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="location" placeholder="Location">
                <textarea name="bio" cols="20" rows="10" placeholder="Biography"></textarea>
                <input type="password" name="password" placeholder="Create Password">
                <input type="password" name="confirm-password" placeholder="Confirm Password">
                <select name="is-admin">
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