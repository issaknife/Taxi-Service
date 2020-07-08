<?php

namespace Core;

use App\Users\Model;

class Session
{
    private $user;

    public function __construct()
    {
        session_start();
        $this->loginFromCookie();
    }

    public function loginFromCookie()
    {
        return $this->login($_SESSION['email'] ?? '', $_SESSION['password'] ?? '');
    }

    public function login($email, $password)
    {
        $userData = Model::getWhere([
            'email' => $email,
            'password' => $password
        ]);

        if ($userData) {
            $user = $userData[0];
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            $this->user = $user;

            return true;
        }

        return false;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function logout($redirect = null)
    {
        $_SESSION = [];

        setcookie(session_name(), null, time() - 1, '/');

        session_destroy();
        $this->user = null;

        if ($redirect) {
            header("Location: $redirect");
        }
    }
}
