<?php
    include_once '../database/db.php';
    include_once '../constants/db_vars.php';

    class User {
        public $id;
        public $username;
        public $password;
        public $email;
        public $fullname;
        public $bio;
        public $posts_count;
        public $profile_pic_url;
        public $created_at;

        public function __construct($id, $username, $password, $email, $fullname, $bio, $posts_count, $profile_pic_url, $created_at) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->fullname = $fullname;
            $this->bio = $bio;
            $this->posts_count = $posts_count;
            $this->profile_pic_url = $profile_pic_url;
            $this->created_at = $created_at;
        }

        public static function find_all() {
            global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
            $query = "SELECT * FROM $USERS_TABLE";
            $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
            $users = [];
            while ($row = mysqli_fetch_array($result)) {
                $user = new User(
                                $row['id'], 
                                $row['username'], 
                                $row['password'], 
                                $row['email'], 
                                $row['fullname'], 
                                $row['bio'], 
                                $row['posts_count'], 
                                $row['profile_pic_url'], 
                                $row['created_at']);
                array_push($users, $user);
            }
            return $users;
        }

        public static function find_by_id($id) {
            global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
            $query = "SELECT * FROM $USERS_TABLE WHERE id = $id";
            $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
            $row = mysqli_fetch_array($result);
            if (!$row) {
                return null;
            }
            $user = new User(
                            $row['id'], 
                            $row['username'], 
                            $row['password'], 
                            $row['email'], 
                            $row['fullname'], 
                            $row['bio'], 
                            $row['posts_count'], 
                            $row['profile_pic_url'], 
                            $row['created_at']);
            return $user;
        }

        public static function find_by_username($username) {
            global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
            $query = "SELECT * FROM $USERS_TABLE WHERE username = '$username'";
            $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
            $row = mysqli_fetch_array($result);
            if (!$row) {
                return null;
            }
            $user = new User(
                            $row['id'], 
                            $row['username'], 
                            $row['password'], 
                            $row['email'], 
                            $row['fullname'], 
                            $row['bio'], 
                            $row['posts_count'], 
                            $row['profile_pic_url'], 
                            $row['created_at']);
            return $user;
        }

        public function save() {
            global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
            if ($this->id && User::find_by_id($this->id)) {
                // Update user info
                $query = "UPDATE $USERS_TABLE SET 
                                    username = '$this->username', 
                                    password = '$this->password', 
                                    email = '$this->email', 
                                    fullname = '$this->fullname', 
                                    bio = '$this->bio', 
                                    posts_count = $this->posts_count, 
                                    profile_pic_url = '$this->profile_pic_url', 
                                    created_at = '$this->created_at'
                                WHERE id = $this->id";
            }
            else {
                // Create new user
                $this->created_at = date('Y-m-d H:i:s');
                $query = "INSERT INTO $USERS_TABLE (
                                        username, 
                                        password, 
                                        email, 
                                        fullname, 
                                        bio, 
                                        posts_count, 
                                        profile_pic_url, 
                                        created_at) 
                                VALUES (
                                        '$this->username', 
                                        '$this->password', 
                                        '$this->email', 
                                        '$this->fullname', 
                                        '$this->bio', 
                                        $this->posts_count, 
                                        '$this->profile_pic_url', 
                                        '$this->created_at')";
            }
            $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        }

    }
?>