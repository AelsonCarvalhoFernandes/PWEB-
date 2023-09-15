<?php

include_once './Controllers/HomeController.php';
include_once './Controllers/AuthController.php';

$homeController = new HomeController();
$authController = new AuthController();


$route = [
    "GET" => [
        "/" => fn() => $homeController->home(),
        "/home" => fn() => $homeController->home(),
        "/contact" => fn() => $homeController->contact(),
        "/register" => fn() => $authController->register(),
    ],
    "POST" => [
        "/register" => fn() => $authController->registerValidate(),
    ]
];
