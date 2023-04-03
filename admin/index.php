<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';

$id = $_SESSION['user-id'];
$query = "SELECT * FROM users WHERE id = $id";
$result  = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);
$avatar = $user["avatar"];
$name = $user["firstname"] . " " . $user["lastname"];
$location = $user["location"];
$bio = $user["biography"];
$email = $user["email"];
?>


<!-- ==============  SECTION ================-->
<section class="profile-section">
    <?php if (isset($_SESSION['access-not-authorized'])) : //shows if add user was successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['access-not-authorized'];
                unset($_SESSION['access-not-authorized']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['edit-profile-success'])) : //shows if edit user was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['edit-profile-success'];
                unset($_SESSION['edit-profile-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-profile'])) : //shows if edit user was not successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['edit-profile'];
                unset($_SESSION['edit-profile']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <div class="container profile-container">
        <button id="show-sidebar-btn" class="sidebar-toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide-sidebar-btn" class="sidebar-toggle"><i class="uil uil-angle-left-b"></i></button>
        <div class="profile-sidebar">
            <a href="<?php echo ROOT_URL ?>admin/index.php" class="profile-sidebar-active"><i class="uil uil-user-circle"></i>
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
                <a href="<?php echo ROOT_URL ?>admin/pages/manage-users.php"><i class="uil uil-users-alt"></i>
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
        <div class="profile-info">
            <h3 class="profile-title">Profile</h3>
            <div class="profile-user">
                <div class="profile-user-info">
                    <div class="profile-user-avatar">
                        <img src="<?php echo ROOT_URL . 'img/' . $avatar ?>">
                    </div>
                    <div class="profile-user-content">
                        <h5 class="user-name">
                            <?= $name ?>
                            <?php if (isset($_SESSION["user-is-admin"])) : ?>
                                <span class="admin"> (Administrator)</span>
                            <?php endif ?>
                        </h5>
                        <h6 class="user-email"><i class="uil uil-envelope-alt"></i><?= $email ?></h6>
                        <small><i class="uil uil-location-point"></i><?= $location ?></small>
                    </div>

                </div>
                <div class="edit-profile">
                    <a href="<?php echo ROOT_URL ?>admin/pages/edit-profile.php?id=<?= $id ?>" class="btn"> Edit Profile</a>
                </div>
            </div>
            <div class="profile-bio">
                <h1 class="profile-bio-title">Biography</h1>
                <p><?= substr($bio, 0, 1000) ?></p>
            </div>
        </div>
    </div>
</section>
<!-- ============== FOOTER SECTION ================-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';

?>