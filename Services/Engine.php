<?php


function view($view, $data = []){

    ob_start();

    $dt = [];

    if($_SESSION["UserSession"] != null){
        $dt = [
            "data" => $data,
            "User" => $_SESSION["UserSession"]
        ];
    }else{
        $dt = [
            "data" => $data,
        ];
    }

    extract($dt);

    require "./Views/{$view}.php";

    $content = ob_get_contents();

    ob_end_clean();

    echo $content;
}