<?php

include_once './Controllers/HomeController.php';
include_once './Controllers/AuthController.php';

include_once './Controllers/AuthenticatedController.php';

include_once './Controllers/ProductController.php';

$homeController = new HomeController();
$authController = new AuthController();
$authenticatedController = new AuthenticatedController();
$productController = new ProductController();


$route = [
    "GET" => [
        // Home Controller
        "/" => fn() => $homeController->home(),
        "/home" => fn() => $homeController->home(),
        "/contact" => fn() => $homeController->contact(),

        // Authentication Controller
        "/register" => fn() => $authController->register(),


        "/perfil" => fn() => $authenticatedController->perfil(),

        // Product Controller
        "/product/create" => fn() => $productController->createProduct(),

        //"/product/[1-~]/" => fn() => '',
    ],
    "POST" => [
        "/register" => fn() => $authController->registerValidate(),

        "/product/create" => fn() => $productController->createProduct(),
    ]
];
