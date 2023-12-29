<?php

namespace MyApp\Core;

use MyApp\Core\Filter;

class Controller extends Filter
{
    public function view($view, $data = [])
    {
        if (count($data)) {
            extract($data);
        }
        require_once '../app/views/' . $view . '.php';


    }

    public function redirect($url)
    {
        header('Location: ' . BASEURL . '/' . $url);
        exit;
    }

    public function model($model)
    {
        // Example: $model = 'MyApp\Models\SomeModel';
        // Check if the class exists before instantiating
        if (class_exists($model)) {
            return new $model();
        } else {
            // Handle the case where the class doesn't exist
            die('Error: Model class not found.');
        }
    }
}
