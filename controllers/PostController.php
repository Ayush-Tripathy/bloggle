<?php
include_once '../controllers/UserController.php';
include_once '../constants/db_vars.php';
include_once '../models/User.php';
include_once '../services/UserService.php';
include_once '../pages/utils/utils.php';
include_once '../services/PostService.php';


function upload_post($title, $content, $img_url)
{
    global $USER_NOT_LOGGED_IN, $POST_SAVED;

    if (!isset($_SESSION['user'])) {
        return $USER_NOT_LOGGED_IN;
    }
    $user = $_SESSION['user'];
    $user_id = $user['id'];

    $ret = save_post($user_id, $title, $content, $img_url);

    // Increment the user's post count
    if ($ret === $POST_SAVED) {
        $user_ = User::find_by_id($user_id);
        $user_->posts_count++;
        $user_->save();
    }
    return $ret;
}

function get_posts_from_before(DateTime $end = NULL, int $count = NULL)
{
    return get_posts(NULL, $end, $count);
}

function get_posts_from_after(DateTime $start = NULL, int $count = NULL)
{
    return get_posts($start, NULL, $count);
}

function get_posts_oc($offset, $count)
{
    return get_posts_from_offset($offset, $count);
}
