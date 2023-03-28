<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';
?>


<!-- ==============  SECTION ================-->
<section class="profile-section">
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
        </div>
        <div class="manage-content">
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Janeth Smith</td>
                        <td>janeth</td>
                        <td><a href="<?php echo ROOT_URL ?>admin/pages/edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="<?php echo ROOT_URL ?>admin/pages/delete-user.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>
                    </tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>