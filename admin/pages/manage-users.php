<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

//fetch users from database but not current user 
$currentAdminId = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id='$currentAdminId'";
$users = mysqli_query($connection, $query);

?>


<!-- ==============  SECTION ================-->
<section class="profile-section">

    <?php if (isset($_SESSION['add-user-success'])) : //shows if add user was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['edit-user-success'])) : //shows if edit user was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-user'])) : //shows if edit user was not successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['delete-user-success'])) : //shows if delete user was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-user'])) : //shows if delete user was not successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <div class="container profile-container">
        <button id="show-sidebar-btn" class="sidebar-toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide-sidebar-btn" class="sidebar-toggle"><i class="uil uil-angle-left-b"></i></button>
        <div class="profile-sidebar">
            <a href="<?php echo ROOT_URL ?>admin/index.php"><i class="uil uil-user-circle"></i>
                <h5>Profile</h5>
            </a>
            <a href="<?php echo ROOT_URL ?>admin/pages/add-post.php"><i class="uil uil-edit-alt"></i>
                <h5>Add Post</h5>
            </a>
            <a href="<?php echo ROOT_URL ?>admin/pages/manage-posts.php"><i class="uil uil-postcard"></i>
                <h5>Manage Posts</h5>
            </a>
            <?php if (isset($_SESSION['user-is-admin'])) : ?>

                <a href="<?php echo ROOT_URL ?>admin/pages/add-user.php"><i class="uil uil-user-plus"></i>
                    <h5>Add User</h5>
                </a>
                <a href="<?php echo ROOT_URL ?>admin/pages/manage-users.php" class="profile-sidebar-active"><i class="uil uil-users-alt"></i>
                    <h5>Manage Users</h5>
                </a>
                <a href="<?php echo ROOT_URL ?>admin/pages/add-category.php"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                </a>
                <a href="<?php echo ROOT_URL ?>admin/pages/manage-categories.php"><i class="uil uil-list-ul"></i>
                    <h5>Manage Categories</h5>
                </a>
            <?php endif ?>
        </div>
        <div class="manage-content">
            <h2>Manage Users</h2>
            <?php if (mysqli_num_rows($users) > 0) : ?>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)) : ?>

                            <tr>
                                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><a href="<?php echo ROOT_URL ?>admin/pages/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?php echo ROOT_URL ?>admin/pages/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                                <td><?= $user["is_admin"] ? "Yes" : "No"  ?></td>
                            </tr>
                        <?php endwhile ?>

                        </tr>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert-message error"><?= "No Users Found" ?></div>
            <?php endif ?>
        </div>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>