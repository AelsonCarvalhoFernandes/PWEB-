<?php


function view($view, $data = []){

    ob_start();

    extract($data);

    require "./Views/{$view}.php";

    $content = ob_get_contents();

    ob_end_clean();

    echo $content;
}