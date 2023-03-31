<?php
require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/partials/header.php';

// check login status
if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . 'pages/signin.php');
    die();
}
