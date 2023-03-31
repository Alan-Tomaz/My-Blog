<?php
require $_SERVER["DOCUMENT_ROOT"] . "/My Blog/admin/config/database.php";

if (isset($_POST["submit"])) {
    // get form data
    $usernameEmail = filter_var($_POST["username-email"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$usernameEmail) {
        $_SESSION["signin"] = "Username or Email Required";
    } elseif (!$password) {
        $_SESSION["signin"] = "Password Required";
    } else {
        //fetch user from database
        $fetchUserQuery = "SELECT * FROM users WHERE username = '$usernameEmail' OR email = '$usernameEmail'";
        $fetchUserResult = mysqli_query($connection, $fetchUserQuery);

        if (mysqli_num_rows($fetchUserResult) == 1) {
            //convert the record into assoc array
            $userRecord = mysqli_fetch_assoc($fetchUserResult);
            $dbPassword = $userRecord['password'];

            //compare form password with database password
            if (password_verify($password, $dbPassword)) {
                // set session for access the control
                $_SESSION['user-id'] = $userRecord['id'];
                // set session if user is an admin
                if ($userRecord["is_admin"] == 1) {
                    $_SESSION["user-is-admin"] = true;
                }
                //log user in
                header("location: " . ROOT_URL . "admin/index.php");
                die();
            } else {
                $_SESSION["signin"] = "Please Check Your Input";
            }
        } else {
            $_SESSION['signin'] = "User Not Found";
        }
    }
}

//if any problem, redirect back to sign in page with login data
if (isset($_SESSION["signin"])) {
    $_SESSION["signin-data"] = $_POST;
    header("location: " . ROOT_URL . "pages/signin.php");
    die();
} else {
    //if button wasn"t clicked, bounce back to signin page
    header("location:" . ROOT_URL . "pages/signin.php");
    die();
}
