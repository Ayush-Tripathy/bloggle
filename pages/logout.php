<?php

include_once '../controllers/UserController.php';

if (isset($_SESSION['user'])) {
    logout_user();
    header('Location: login.php');
    // echo 'Logged out';
} else {
    header('Location: index.php');
}
