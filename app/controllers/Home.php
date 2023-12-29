<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;


class Home extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id_tmu'])) {
            header('Location: ' . BASEURL . '');
            exit();
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer-home');
    }
}
