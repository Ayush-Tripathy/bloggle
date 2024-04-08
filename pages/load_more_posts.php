<?php
include_once '../controllers/PostController.php';
include_once '../models/User.php';

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$count = isset($_GET['count']) ? $_GET['count'] : 3;

$posts = get_posts_oc($offset, $count);

foreach ($posts as $post) {
    $user = User::find_by_id($post->user_id);
    $post->user = [
        'username' => $user->username,
        'profile_pic' => $user->profile_pic_url
    ];
    $post->date = date('M d, Y', strtotime($post->created_at));
    $len = strlen($post->content);
    if ($len > 250) {
        $post->content = substr($post->content, 0, 250) . "...";
    }
}

$response = [
    'status' => 'success',
    'posts' => $posts
];

header('Content-Type: application/json');
echo json_encode($response);
