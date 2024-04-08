<?php
include_once '../controllers/PostController.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $imageUrl = $_POST['imageurl'];
    $postTitle = $_POST['title'];
    $postContent = $_POST['content'];

    $ret = upload_post($postTitle, $postContent, $imageUrl);
    if ($ret) {
        echo "SUCCESS";
    } else {
        echo "FAILED";
    }
}
