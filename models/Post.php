<?php
include_once '../database/db.php';
include_once '../constants/db_vars.php';

class Post
{
    public $id;
    public $user_id;
    public $title;
    public $content;
    public $img_url;
    public $likes_count;
    public $comments_count;
    public $created_at;

    public function __construct($id, $user_id, $title, $content, $img_url, $likes_count, $comments_count, $created_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->img_url = $img_url;
        $this->likes_count = $likes_count;
        $this->comments_count = $comments_count;
        $this->created_at = $created_at;
    }

    public static function find_all()
    {
        global $dbc, $POSTS_TABLE, $ERROR_QUERYING_DB;
        $query = "SELECT * FROM $POSTS_TABLE";
        $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        $posts = [];
        while ($row = mysqli_fetch_array($result)) {
            $post = new Post(
                $row['id'],
                $row['user_id'],
                $row['title'],
                $row['content'],
                $row['image_url'],
                $row['likes_count'],
                $row['comments_count'],
                $row['created_at']
            );
            array_push($posts, $post);
        }
        return $posts;
    }

    public static function find_by_user_id($user_id)
    {
        global $dbc, $POSTS_TABLE, $ERROR_QUERYING_DB;
        $query = "SELECT * FROM $POSTS_TABLE WHERE user_id = $user_id";
        $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        $posts = [];
        while ($row = mysqli_fetch_array($result)) {
            $post = new Post(
                $row['id'],
                $row['user_id'],
                $row['title'],
                $row['content'],
                $row['image_url'],
                $row['likes_count'],
                $row['comments_count'],
                $row['created_at']
            );
            array_push($posts, $post);
        }
        return $posts;
    }

    public static function find_by_id($id)
    {
        global $dbc, $POSTS_TABLE, $ERROR_QUERYING_DB;
        $query = "SELECT * FROM $POSTS_TABLE WHERE id = $id";
        $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        $row = mysqli_fetch_array($result);
        if (!$row) {
            return null;
        }
        $post = new Post(
            $row['id'],
            $row['user_id'],
            $row['title'],
            $row['content'],
            $row['image_url'],
            $row['likes_count'],
            $row['comments_count'],
            $row['created_at']
        );
        return $post;
    }

    public function save()
    {
        global $dbc, $POSTS_TABLE, $ERROR_SAVING_POST;
        $query = "INSERT INTO $POSTS_TABLE (
                user_id, title, content, image_url, likes_count, comments_count) 
                    VALUES (
                        $this->user_id, 
                        '$this->title', 
                        '$this->content', 
                        '$this->img_url', 
                        $this->likes_count, 
                        $this->comments_count)";

        mysqli_query($dbc, $query) or die($ERROR_SAVING_POST);
    }
}
