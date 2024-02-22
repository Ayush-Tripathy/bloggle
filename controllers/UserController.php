<?php
    include_once '../models/User.php';
    include_once '../services/UserService.php';

    function registerUser( 
                    $username, 
                    $password, 
                    $email, 
                    $fullname, 
                    $bio, 
                    $profile_pic_data) {


        $password = password_hash($password, PASSWORD_DEFAULT);
        $posts_count = 0;

        // TODO: Save image to google cloud storage and get the URL
        $profile_pic_url = null;
        
        return saveUser(
                    $username, 
                    $password, 
                    $email, 
                    $fullname, 
                    $bio, 
                    $posts_count, 
                    $profile_pic_url);

    }

    // TODO: Use sessions to store user data
    function loginUser($username, $password) {
        $user = User::find_by_username($username);
        if (!$user) {
            return null;
        }
        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
?>