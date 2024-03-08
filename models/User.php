<?php
include_once '../database/db.php';
include_once '../constants/db_vars.php';
include_once '../constants/db_schema_vars.php';

class User
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $fullname;
    public $bio;
    public $posts_count;
    public $profile_pic_url;
    public $created_at;

    public function __construct($id, $username, $password, $email, $fullname, $bio, $posts_count, $profile_pic_url, $created_at)
    {
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

    public static function find_all()
    {
        global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
        $query = "SELECT * FROM $USERS_TABLE";
        $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        $users = [];
        while ($row = mysqli_fetch_array($result)) {
            $user = new User(
                $row[USER_VARS::ID],
                $row[USER_VARS::USERNAME],
                $row[USER_VARS::PASSWORD],
                $row[USER_VARS::EMAIL],
                $row[USER_VARS::FULLNAME],
                $row[USER_VARS::BIO],
                $row[USER_VARS::POSTS_COUNT],
                $row[USER_VARS::PROFILE_PIC_URL],
                $row[USER_VARS::CREATED_AT]
            );
            array_push($users, $user);
        }
        return $users;
    }

    public static function find_by_id($id)
    {
        global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
        $query = "SELECT * FROM $USERS_TABLE WHERE id = $id";
        $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        $row = mysqli_fetch_array($result);
        if (!$row) {
            return null;
        }
        $user = new User(
            $row[USER_VARS::ID],
            $row[USER_VARS::USERNAME],
            $row[USER_VARS::PASSWORD],
            $row[USER_VARS::EMAIL],
            $row[USER_VARS::FULLNAME],
            $row[USER_VARS::BIO],
            $row[USER_VARS::POSTS_COUNT],
            $row[USER_VARS::PROFILE_PIC_URL],
            $row[USER_VARS::CREATED_AT]
        );
        return $user;
    }

    public static function find_by_username($username)
    {
        global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;
        $query = "SELECT * FROM $USERS_TABLE WHERE username = '$username'";
        $result = mysqli_query($dbc, $query) or die($ERROR_QUERYING_DB);
        $row = mysqli_fetch_array($result);
        if (!$row) {
            return null;
        }
        $user = new User(
            $row[USER_VARS::ID],
            $row[USER_VARS::USERNAME],
            $row[USER_VARS::PASSWORD],
            $row[USER_VARS::EMAIL],
            $row[USER_VARS::FULLNAME],
            $row[USER_VARS::BIO],
            $row[USER_VARS::POSTS_COUNT],
            $row[USER_VARS::PROFILE_PIC_URL],
            $row[USER_VARS::CREATED_AT]
        );
        return $user;
    }

    public function save()
    {
        global $dbc, $USERS_TABLE, $ERROR_QUERYING_DB;

        $columnMappings = [
            USER_VARS::USERNAME => $this->username,
            USER_VARS::PASSWORD => $this->password,
            USER_VARS::EMAIL => $this->email,
            USER_VARS::FULLNAME => $this->fullname,
            USER_VARS::BIO => $this->bio,
            USER_VARS::POSTS_COUNT => $this->posts_count,
            USER_VARS::PROFILE_PIC_URL => $this->profile_pic_url,
            USER_VARS::CREATED_AT => $this->created_at
        ];

        if ($this->id && User::find_by_id($this->id)) {
            // Update user info

            $columns = [];
            foreach ($columnMappings as $column => $value) {
                ($value == '$this->posts_count') ?
                    $columns[] = "$column = $value" :
                    $columns[] = "$column = '$value'";
            }

            $columnsString = implode(', ', $columns);

            $query = "UPDATE $USERS_TABLE SET $columnsString WHERE id = $this->id";
        } else {
            // Create new user

            $columns = [];
            foreach ($columnMappings as $column => $value) {
                $columns[] = "$column";
            }

            $columnsString = implode(', ', $columns);

            $this->created_at = date('Y-m-d H:i:s');
            $query = "INSERT INTO $USERS_TABLE ($columnsString) 
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
        return $result;
    }

}
