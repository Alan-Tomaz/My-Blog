<?php
require $_SERVER["DOCUMENT_ROOT"] . "/My Blog/admin/config/database.php";

if (isset($_POST["submit"])) {
    $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $location = filter_var($_POST["location"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $bio = filter_var($_POST["bio"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $createPassword = filter_var($_POST["create-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST["confirm-password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES["avatar"];



    /* Shows the values 
    #region
    echo $firstname . ", " . $lastname . ", " . $username . ", " . $email . ", " . $createPassword . ", " . $confirmPassword;
    echo "<pre>";
    var_dump($avatar);
    echo "</pre>";
    #endregion
    */

    //validate input values
    if (!$firstname) {
        $_SESSION["signup"] = "Please Enter Your First Name";
    } else if (!$lastname) {
        $_SESSION["signup"] = "Please Enter Your Last Name";
    } else if (!$username) {
        $_SESSION["signup"] = "Please Enter Your Username";
    } else if (!$email) {
        $_SESSION["signup"] = "Please Enter a Valid E-mail";
    } else if (!$location) {
        $_SESSION["signup"] = "Please Enter a Valid Location";
    } else if (!$bio) {
        $_SESSION["signup"] = "Please Enter a Biography";
    } else if (strlen($createPassword) < 8 || strlen($confirmPassword) < 8) {
        $_SESSION["signup"] = "Please The Password Should Be 8+ Characters";
    } else if (!$avatar["name"]) {
        $_SESSION["signup"] = "Please Add a Avatar";
    } else {
        //check if passwords don"t match
        if ($createPassword !== $confirmPassword) {
            $_SESSION["signup"] = "Passwords Do Not Match";
        } else {

            // hash password
            $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);

            //check if username and email already exist in database
            $userCheckQuery = "Select * FROM users WHERE username = '$username' OR email = '$email'";
            $userCheckResult = mysqli_query($connection, $userCheckQuery);
            if (mysqli_num_rows($userCheckResult) > 0) {
                $_SESSION["signup"] = "Username or Email Already Exists";
            } else {

                //WORK ON AVATAR
                //rename avatar
                $time = time(); //make each image name unique using current timestamp
                $avatarName = $time . "-" . $avatar["name"];
                $avatarTmpName = $avatar["tmp_name"];
                $avatarDestinationPath =  "../img/" . $avatarName;

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
                        $_SESSION["signup"] = "File Size Too Big. Should Be Less Than 1MB";
                    }
                } else {
                    $_SESSION["signup"] = "File Should Be PNG, JPG or JPEG";
                }
            }
        }
    }

    // redirect back to signup page if there was any problem
    if (isset($_SESSION["signup"])) {
        //pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header("location:" . ROOT_URL . "pages/signup.php");
        die();
    } else {
        // insert new user into users table
        $insertUserQuery = "INSERT INTO users (firstname, lastname, username, email, location, biography, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$location', '$bio', '$hashedPassword', '$avatarName', 0)";
        $insertUserResult = mysqli_query($connection, $insertUserQuery);

        if (!mysqli_errno($connection)) {
            //redirect to login page with success message
            $_SESSION['signup-success'] = "Registration Successfully. Please Log In";
            header("location: " . ROOT_URL . "pages/signin.php");
            die();
        }
    }
} else {
    //if button wasn"t clicked, bounce back to signup page
    header("location:" . ROOT_URL . "pages/signup.php");
    die();
}
