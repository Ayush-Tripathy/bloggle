<?php
$USERS_TABLE = 'users';
$POSTS_TABLE = 'posts';
$LIKES_TABLE = 'likes';
$COMMENTS_TABLE = 'comments';

class USER_VARS
{
    const ID = 'id';
    const USERNAME = 'username';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const FULLNAME = 'fullname';
    const BIO = 'bio';
    const POSTS_COUNT = 'posts_count';
    const PROFILE_PIC_URL = 'profile_pic_url';
    const CREATED_AT = 'created_at';
}

class POST_VARS
{
    const ID = 'id';
    const USER_ID = 'user_id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const IMG_URL = 'img_url';
    const LIKES_COUNT = 'likes_count';
    const COMMENTS_COUNT = 'comments_count';
    const CREATED_AT = 'created_at';
}

class LIKE_VARS
{
    const ID = 'id';
    const USER_ID = 'user_id';
    const POST_ID = 'post_id';
    const CREATED_AT = 'created_at';
}
