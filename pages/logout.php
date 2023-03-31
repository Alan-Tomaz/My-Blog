<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/constants.php';

//destroy all sessions and redirect to the login page
session_destroy();
header("location: " . ROOT_URL);
die();
