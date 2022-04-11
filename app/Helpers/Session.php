<?php

namespace app\Helpers;

session_start();

trait Session {
    public function isLoggedIn()
    {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function createUserSession($user) 
    {
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
    }
}