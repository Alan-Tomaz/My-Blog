<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/partials/header.php';


$currentUserId = $_SESSION["user-id"];
$query = "SELECT id, title, category_id, is_featured FROM posts WHERE author_id = $currentUserId ORDER BY id DESC";
$posts = mysqli_query($connection, $query);

var_dump($featuredPosts);

?>


<!-- ==============  SECTION ================-->
<section class="profile-section">
    <?php if (isset($_SESSION['add-post-success'])) : //shows if add categories was successfully
    ?>
        <div class="alert-message success container">
            <p>
                <?=
                $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['edit-post-success'])) : //shows if edit categories was successfully
    ?>
        <div class="alert-message success container">
            <p>
                <?=
                $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-post'])) : //shows if edit categories was not successfully
    ?>
        <div class="alert-message error container">
            <p>
                <?=
                $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
                ?>
            </p>
        </div>
    <?php endif ?>
    <?php if (isset($_SESSION['delete-post-success'])) : //shows if delete categories was successfully
    ?>
        <div class="alert-message success container">
            <p>
                <?=
                $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-post'])) : //shows if delete categories was not successfully
    ?>
        <div class="alert-message error container">
            <p>
                <?=
                $_SESSION['delete-post'];
                unset($_SESSION['delete-post']);
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
            <a href="<?php echo ROOT_URL ?>admin/pages/manage-posts.php" class="profile-sidebar-active"><i class="uil uil-postcard"></i>
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
        <div class="manage-content">
            <h2>Manage Posts</h2>
            <?php if (mysqli_num_rows($posts) > 0) : ?>

                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Featured</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                            <?php
                            $categoryId = $post["category_id"];
                            $categoryQuery = "SELECT title FROM categories where id=$categoryId";
                            $categoryResult = mysqli_query($connection, $categoryQuery);
                            $category = mysqli_fetch_assoc($categoryResult);
                            ?>
                            <tr>
                                <td><?= $post["title"] ?></td>
                                <td><?= $category["title"] ?></td>
                                <td><a href="<?php echo ROOT_URL ?>admin/pages/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?php echo ROOT_URL ?>admin/pages/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>
                                <td><?= $post["is_featured"] ? "Yes" : "No"  ?></td>
                            </tr>
                        <?php endwhile ?>


                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert-message error"><?= "No Posts Found" ?></div>
            <?php endif ?>
        </div>
    </div>
</section>
<!-- ============== FOOTER SECTION ================-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/footer.php';
?>