<?php

require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (!isset($_SESSION['user-is-admin'])) {
    $_SESSION["access-not-authorized"] = "You are not authorized to access this session.";
    header("location: " . ROOT_URL . "admin/index.php");
    die();
}

if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch user from database
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        $avatarName = $user["avatar"];
        $avatarPath =  "../../img/" . $avatarName;

        //delete image if available
        if ($avatarPath) {
            unlink($avatarPath);
        }
    }

    // FOR LATER
    // Fetch all thumbnails of user and delete them

    $thumbnailsQuery = "SELECT thumbnail from posts WHERE author_id = $id";
    $thumbnailsResult = mysqli_query($connection, $thumbnailsQuery);

    if (mysqli_num_rows($thumbnailsResult) > 0) {
        while ($thumbnail = mysqli_fetch_assoc($thumbnailsResult)) {
            $thumbnailPath = "../../img/" . $thumbnail["thumbnail"];
            // delete thumbnails from images folder is exist
            if ($thumbnailPath) {
                unlink($thumbnailPath);
            }
        }
    }




    //delete user from database
    $deleteUserQuery = "DELETE FROM users WHERE id='$id'";
    $deleteUserResult = mysqli_query($connection, $deleteUserQuery);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "Couldn't Delete '{$user['firstname']}  '{$user['lastname']}'";
    } else {
        $_SESSION['delete-user-success'] = "'{$user['firstname']}  '{$user['lastname']}' Deleted Successfully";
    }
}

header('location: ' . ROOT_URL . "admin/pages/manage-users.php");
die();
