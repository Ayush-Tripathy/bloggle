<?php

include_once '../controllers/UserController.php';

if (isset($_SESSION['user'])) {
    logoutUser();
    header('Location: login.php');
    // echo 'Logged out';
} else {
    header('Location: index.php');
}
