<?php

class AuthController{

    function register(){
        readfile('./Pages/Register.php');
        exit();
    }

    function registerValidate(){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}