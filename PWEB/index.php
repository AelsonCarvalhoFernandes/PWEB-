<?php

require_once './Routes/Routes.php';

session_start();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($_SERVER['REQUEST_METHOD'], $route)) {
    if (array_key_exists($path, $route[$_SERVER['REQUEST_METHOD']])) {
        call_user_func($route[$_SERVER['REQUEST_METHOD']][$path]);
    } else {
        echo 'Rota não encontrada';
    }
} else {
    echo 'Método de requisição não suportado';
}
