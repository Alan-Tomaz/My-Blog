<?php

require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';


if (isset($_POST['submit'])) {
    //get updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    $idQuery = "SELECT * FROM users WHERE id='$id'";
    $idResult = mysqli_query($connection, $idQuery);
    $idUser = mysqli_fetch_assoc($idResult);




    if (mysqli_num_rows($idResult) == 1) {

        $currentAvatar = filter_var($_POST["current-avatar"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $location = filter_var($_POST["location"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $bio = filter_var($_POST["bio"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $createPassword = filter_var($_POST["create-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmPassword = filter_var($_POST["confirm-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $isAdmin = filter_var($_POST['user-role'], FILTER_SANITIZE_NUMBER_INT);
        $avatar = $_FILES["avatar"];



        $passwordIsBlank = false;
        if (!$firstname) {
            $_SESSION["edit-user"] = "Please Enter The First Name";
        } else if (!$lastname) {
            $_SESSION["edit-user"] = "Please Enter The Last Name";
        } else if (!$username) {
            $_SESSION["edit-user"] = "Please Enter The Username";
        } else if (!$email) {
            $_SESSION["edit-user"] = "Please Enter a Valid E-mail";
        } else if (!$location) {
            $_SESSION["edit-user"] = "Please Enter a Valid Location";
        } else if (!$bio) {
            $_SESSION["edit-user"] = "Please Enter a Biography";
        } else if ((strlen($createPassword) < 8 || strlen($confirmPassword) < 8) && (strlen($createPassword) > 0 || strlen($confirmPassword) > 0)) {
            $_SESSION["edit-user"] = "Please The Password Should Be 8+ Characters";
        } else {

            if ($createPassword !== $confirmPassword) {
                $_SESSION["edit-user"] = "Passwords Do Not Match";
            } else {

                if (!$createPassword && !$confirmPassword) {
                    $passwordIsBlank = true;
                }



                if ($passwordIsBlank == false) {
                    // hash password
                    $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);
                }


                //check if username and email already exist in database
                $userCheckQuery = "SELECT * FROM users WHERE username = '$username'";
                $userCheckResult = mysqli_query($connection, $userCheckQuery);
                $userCheck = mysqli_fetch_assoc($userCheckResult);
                $emailCheckQuery = "SELECT * FROM users WHERE email = '$email'";
                $emailCheckResult = mysqli_query($connection, $emailCheckQuery);
                $emailCheck = mysqli_fetch_assoc($emailCheckResult);

                if ((mysqli_num_rows($userCheckResult) > 0) && ($id != $userCheck["id"])) {
                    $_SESSION["edit-user"] = "Username or Email Already Exists";
                } else if ((mysqli_num_rows($emailCheckResult) > 0) && ($id != $emailCheck["id"])) {
                    $_SESSION["edit-user"] = "Username or Email Already Exists";
                }
                /*if ((mysqli_num_rows($userCheckResult) > 0) && (($username != $idUser["username"]) || ($email != $idUser["email"]))) {
                    $_SESSION["edit-user"] = "Username or Email Already Exists";
                }*/ else {

                    // unlink the old avatar
                    if ($avatar["name"]) {
                        $oldAvatarPath =  "../../img/" . $currentAvatar;
                        if ($oldAvatarPath) {
                            unlink($oldAvatarPath);
                        }

                        //WORK ON NEW AVATAR
                        //rename avatar
                        $time = time(); //make each image name unique using current timestamp
                        $avatarName = $time . "-" . $avatar["name"];
                        $avatarTmpName = $avatar["tmp_name"];
                        $avatarDestinationPath = "../../img/" . $avatarName;

                        //make sure file is an image
                        $allowed_files = ["png", "jpg", "jpeg"];
                        $extention = explode(".", $avatarName);
                        $extention = end($extention);
                        if (in_array($extention, $allowed_files)) {
                            //make sure image is not too large (1MB)
                            if ($avatar["size"] < 1000000) {
                                //upload avatar 
                                move_uploaded_file($avatarTmpName, $avatarDestinationPath);
                            } else {
                                $_SESSION["edit-user"] = "File Size Too Big. Should Be Less Than 1MB";
                            }
                        } else {
                            $_SESSION["edit-user"] = "File Should Be PNG, JPG or JPEG";
                        }
                    }
                }
            }
        }


        if (isset($_SESSION['edit-user'])) {
            $_SESSION["edit-user-data"] = $_POST;
            header("location: " . ROOT_URL . "admin/pages/edit-user.php?id=" . $id);
            die();
        } else {

            //set avatar name if a new one was uploaded, else keep old thumbnail name
            $avatarToInsert = $avatarName ?? $currentAvatar;

            // update user 
            if ($passwordIsBlank == true) {
                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username = '$username', email = '$email', location = '$location', biography = '$bio', avatar = '$avatarToInsert', is_admin='$isAdmin' WHERE id='$id' limit 1";
            } else {
                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username = '$username', email = '$email', location = '$location', biography = '$bio', password = '$hashedPassword', avatar = '$avatarToInsert', is_admin='$isAdmin' WHERE id='$id' limit 1";
            }
            $result = mysqli_query($connection, $query);
            if (mysqli_errno($connection)) {
                $_SESSION['edit-user'] = "Failed to Update User";
            } else {
                $_SESSION['edit-user-success'] = "User $firstname $lastname Updated Successfully";
            }
        }
    } else {
        $_SESSION['edit-user'] = "This User Doesn't exists";
        header("location: " . ROOT_URL . "admin/pages/manage-users.php");
        die();
    }
}
header("location: " . ROOT_URL . "admin/pages/manage-users.php");
die();
