<?php
$ONE_DAY = 60 * 60 * 24;
session_set_cookie_params($ONE_DAY);
session_set_cookie_params(0, '/');
session_start();

include_once '../constants/db_vars.php';
include_once '../models/User.php';
include_once '../services/UserService.php';
include_once '../pages/utils/utils.php';



function register_user(
    string $username,
    string $password,
    string $email,
    string $fullname,
    ?string $bio,
    ?string $profile_pic_data
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
    return save_user(
        $username,
        $password,
        $email,
        $fullname,
        $bio,
        $posts_count,
        $profile_pic_url
    );
}

function login_user($username, $password)
{
    global $USER_DOES_NOT_EXIST, $INVALID_CREDENTIALS;
    $user = User::find_by_username($username);
    if (!$user) {
        return $USER_DOES_NOT_EXIST;
    }
    if (password_verify($password, $user->password)) {

        $user_to_set = [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'fullname' => $user->fullname,
            'bio' => $user->bio,
            'posts_count' => $user->posts_count,
            'profile_pic_url' => $user->profile_pic_url
        ];

        $_SESSION['user'] = $user_to_set;
        return $user;
    }
    return $INVALID_CREDENTIALS;
}

function logout_user()
{
    session_unset();
    session_destroy();
}
