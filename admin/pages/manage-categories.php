<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';


$currentAdminId = $_SESSION['user-id'];

$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);
?>


<!-- ==============  SECTION ================-->
<section class="profile-section">
    <?php if (isset($_SESSION['add-category-success'])) : //shows if add categories was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['add-category'])) : //shows if edit categories was not successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['edit-category-success'])) : //shows if edit categories was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-category'])) : //shows if edit categories was not successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['edit-category'];
                unset($_SESSION['edit-category']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['delete-category-success'])) : //shows if delete categories was successfully
    ?>
        <div class="alert-message alert-message-manage success container">
            <p>
                <?=
                $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-category'])) : //shows if delete categories was not successfully
    ?>
        <div class="alert-message alert-message-manage error container">
            <p>
                <?=
                $_SESSION['delete-category'];
                unset($_SESSION['delete-category']);
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
                <a href="<?php echo ROOT_URL ?>admin/pages/manage-users.php"><i class="uil uil-users-alt"></i>
                    <h5>Manage Users</h5>
                </a>
                <a href="<?php echo ROOT_URL ?>admin/pages/add-category.php"><i class="uil uil-edit"></i>
                    <h5>Add Category</h5>
                </a>
                <a href="<?php echo ROOT_URL ?>admin/pages/manage-categories.php" class="profile-sidebar-active"><i class="uil uil-list-ul"></i>
                    <h5>Manage Categories</h5>
                </a>
            <?php endif ?>
        </div>
        <div class="manage-content">

            <h2>Manage Categories</h2>
            <?php if (mysqli_num_rows($categories) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                            <tr>
                                <td><?= $category['title'] ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/pages/edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/pages/delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile ?>

                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert-message error"><?= "No Categories Found" ?></div>
            <?php endif ?>
        </div>
    </div>
</section>
<!-- ============== FOOTER SECTION ================-->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>