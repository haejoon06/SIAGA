<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;

class Auth extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('MyApp\Models\UserModel');
    }

    public function login($username, $password)
    {
        $user = $this->userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password_tmu'])) {
            $_SESSION['id_tmu'] = $user['id_tmu'];
            $_SESSION['username_tmu'] = $user['username_tmu'];
            $_SESSION['role_tmu'] = $user['role_tmu'];
            return $this->redirect('home');
        } else {
            return 'INVALID_CREDENTIALS';
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect('');
        exit();
    }
}
