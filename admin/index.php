<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>


<!-- ==============  SECTION ================-->
<section class="profile-section">
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
        </div>
        <div class="profile-info">
            <h3 class="profile-title">Profile</h3>
            <div class="profile-user">
                <div class="profile-user-info">
                    <img src="<?php echo ROOT_URL ?>img/avatar2.jpg">
                    <div class="profile-user-content">
                        <h5 class="user-name">Allen Bale</h5>
                        <h6 class="user-email"><i class="uil uil-envelope-alt"></i>allen@gmail.com</h6>
                        <small><i class="uil uil-location-point"></i>Brazil, São Paulo</small>
                    </div>

                </div>
                <div class="edit-profile">
                    <a href="<?php echo ROOT_URL ?>admin/pages/edit-profile.php" class="btn"> Edit Profile</a>
                </div>
            </div>
            <div class="profile-bio">
                <h1 class="profile-bio-title">Biography</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum magni a incidunt libero iure
                    tempora aliquid laboriosam repellat eos voluptas doloremque aut quisquam quae velit, vitae quam
                    quibusdam, praesentium voluptate!</p>
            </div>
        </div>
    </div>
</section>
<!-- ============== FOOTER SECTION ================-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>