<?php

class Auth
{
    public static function login($username)
    {
        $_SESSION['username'] = $username;
    }

    public static function logout()
    {
        unset( $_SESSION['username']);
    }

    public static function isLogged()
    {
        return isset( $_SESSION['username']);
    }

    public static function getUser()
    {
        return (Auth::isLogged() ? $_SESSION['username'] : "Anonym");
    }
}
?>