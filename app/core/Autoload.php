<?php

function load_core($class){
    $path_to_file ='../app/core/'.$class.'.php';
    if(file_exists($path_to_file)){
        require_once ($path_to_file);
    }
}

spl_autoload_register('load_core');