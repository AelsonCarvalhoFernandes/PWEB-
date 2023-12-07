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

        // Authentication Controller
        "/register" => fn() => $authController->register(),

        "/login" => fn() => $authController->login(),
        "/logout" => fn() => $authController->logout(),

        "/forgotPassword" => fn() => $authController->forgotPassword(),
        
        "/profile" => fn() => $authenticatedController->profile(),

        "/product" => fn() => $productController->productToId(),
        "/product/create" => fn() => $productController->product(),
        "/product/edit" => fn() => $productController->editProduct(),

        "/library" => fn() => $authenticatedController->library(),       

    ],
    "POST" => [
        "/register" => fn() => $authController->registerValidate(),

        "/login" => fn() => $authController->loginValidate(),
        "/forgotPassword" => fn() => $authController->forgotPasswordValidate(),

        "/updateProfile" => fn() => $authenticatedController->updateProfile(),

        "/product" => fn() => $productController->buyProduct(),
        "/product/create" => fn() => $productController->createProduct(),
        "/product/edit" => fn() => $productController->updateProduct(),

    ]
];