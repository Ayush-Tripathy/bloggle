<?php
include_once '../controllers/UserController.php';
include_once '../constants/db_vars.php';
include_once '../models/User.php';
include_once '../services/UserService.php';
include_once '../pages/utils/utils.php';
include_once '../services/PostService.php';


function uploadPost($title, $content, $img_url)
{
    global $USER_NOT_LOGGED_IN;

    if (!isset($_SESSION['user'])) {
        return $USER_NOT_LOGGED_IN;
    }
    $user = $_SESSION['user'];
    $user_id = $user['id'];
    // echo "User id: $user_id<br>";
    $ret = savePost($user_id, $title, $content, $img_url);
    return $ret;
}

function getPostsFromBefore(DateTime $end = NULL, int $count = NULL)
{
    return getPosts(NULL, $end, $count);
}

function getPostsFromAfter(DateTime $start = NULL, int $count = NULL)
{
    return getPosts($start, NULL, $count);
}
