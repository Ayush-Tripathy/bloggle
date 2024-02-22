<?php
    class Like {
        public $user_id;
        public $post_id;
        public $created_at;

        public function __construct($user_id, $post_id, $created_at) {
            $this->user_id = $user_id;
            $this->post_id = $post_id;
            $this->created_at = $created_at;
        }

        public function save() {
            global $ERROR_SAVING_LIKE;
            global $dbc;

            $this->created_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO likes (user_id, post_id, created_at) 
                                    VALUES ($this->user_id, $this->post_id, $this->created_at)";
            mysqli_query($dbc, $query) or die($ERROR_SAVING_LIKE);    
        }

        public static function find_by_user_id_and_post_id($user_id, $post_id) {
            global $dbc;
            $query = "SELECT * FROM likes WHERE user_id = $user_id AND post_id = $post_id";
            $result = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($result);
            if (!$row) {
                return null;
            }
            return new Like(
                            $row['user_id'], 
                            $row['post_id'], 
                            $row['created_at']);
        }

        public static function delete_by_user_id_and_post_id($user_id, $post_id) {
            global $dbc;
            $query = "DELETE FROM likes WHERE user_id = $user_id AND post_id = $post_id";
            mysqli_query($dbc, $query);
        }

        public static function count_by_post_id($post_id) {
            global $dbc;
            $query = "SELECT COUNT(*) FROM likes WHERE post_id = $post_id";
            $result = mysqli_query($dbc, $query);
            $row = mysqli_fetch_array($result);
            return $row[0];
        }

        public static function find_users_liked_post($post_id) {
            global $dbc;
            $query = "SELECT user_id FROM likes WHERE post_id = $post_id";
            $result = mysqli_query($dbc, $query);
            $user_ids = [];
            while ($row = mysqli_fetch_array($result)) {
                array_push($user_ids, $row['user_id']);
            }
            return $user_ids;
        }

        public static function find_where($where_obj){
            // $where_obj = ['user_id' => 1, 'post_id' => 2]

            global $dbc;
            $query = "SELECT * FROM likes WHERE ";
            $i = 0;
            foreach ($where_obj as $key => $value) {
                if ($i > 0) {
                    $query .= " AND ";
                }
                $query .= "$key = $value";
                $i++;
            }

            $result = mysqli_query($dbc, $query);
            $likes = [];
            while ($row = mysqli_fetch_array($result)) {
                $like = new Like(
                                $row['user_id'], 
                                $row['post_id'], 
                                $row['created_at']);
                array_push($likes, $like);
            }

            return $likes;
        }
    }
?>