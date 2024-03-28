<?php
include_once '../constants/db_vars.php';
include_once '../models/User.php';
include_once '../services/UserService.php';
include_once '../pages/utils/utils.php';

$ONE_DAY = 60 * 60 * 24;
session_set_cookie_params($ONE_DAY);
session_start();

function registerUser(
    $username,
    $password,
    $email,
    $fullname,
    $bio,
    $profile_pic_data
) {


    $password = password_hash($password, PASSWORD_DEFAULT);
    $posts_count = 0;

    // TODO: Save image to firebase storage and get the URL
    $profile_pic_url = get_user_default_image_url($username);

    $user = [
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'fullname' => $fullname,
        'bio' => $bio,
        'posts_count' => $posts_count,
        'profile_pic_url' => $profile_pic_url
    ];

    $_SESSION['user'] = $user;
    return saveUser(
        $username,
        $password,
        $email,
        $fullname,
        $bio,
        $posts_count,
        $profile_pic_url
    );
}

function loginUser($username, $password)
{
    global $USER_DOES_NOT_EXIST;
    $user = User::find_by_username($username);
    if (!$user) {
        return $USER_DOES_NOT_EXIST;
    }
    if (password_verify($password, $user->password)) {
        $_SESSION['user'] = $user;
        return $user;
    }
    return null;
}

function logoutUser()
{
    session_unset();
    session_destroy();
}
