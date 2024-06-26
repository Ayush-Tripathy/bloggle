<?php
include_once '../models/Post.php';
include_once '../constants/db_vars.php';

function save_post(
    $user_id,
    $title,
    $content,
    $img_url
) {

    global $ALL_FIELDS_REQUIRED, $POST_SAVED, $ERROR_SAVING_POST;

    if (empty($user_id) || empty($title) || empty($content)) {
        return $ALL_FIELDS_REQUIRED;
    }

    $post = new Post(
        null,
        $user_id,
        $title,
        $content,
        $img_url,
        0,
        0,
        null
    );

    try {
        $post->save();
    } catch (Exception $e) {
        return $ERROR_SAVING_POST;
    };

    return $POST_SAVED;
}

function get_posts(DateTime $start = null, DateTime $end = null, int $count = null)
{
    return Post::find_all($start, $end, $count);
}

function get_posts_from_offset($offset, $count)
{
    return Post::find_from_offset($offset, $count);
}
