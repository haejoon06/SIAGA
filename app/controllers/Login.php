<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;

class Login extends Controller {
    
    public function index()
    {
        $authController = new \MyApp\Controllers\Auth();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $error = $authController->login($username, $password);
        }

        $data['judul'] = "Login";
        $this->view('login/index', $data);
    }

    
}