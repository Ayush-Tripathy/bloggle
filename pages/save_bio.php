<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../models/User.php';

    $bio = $_POST['bio'];
    $username = $_POST['username'];

    $user = User::find_by_username($username);
    $user->bio = $bio;
    $user->save();

    echo "SUCCESS";
}
