<?php

namespace app\Helpers;

trait Session {
    public function isLoggedIn()
    {
        session_start();
        if(isset($_SESSION['user_email'])) {
            return true;
        }
        return false;
    }

    public function createUserSession($email) 
    {
        session_start();
        $_SESSION['user_email'] = $email;

        return true;
    }

    public function logoutSession()
    {
        session_start();
        $_SESSION = array();

        session_destroy();
        return true;
    }
}