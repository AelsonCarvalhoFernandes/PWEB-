<?php

require_once './Services/Engine.php';
require_once './Repositories/ClienteRepository.php';

class AuthController{

    private $clienteRepository;

    function __construct(){
        $this->clienteRepository = new ClienteRepository();
    }
    function register(){
        return view('Register');
    }

    function registerValidate(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confPassword = $_POST['confirm_password'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        if($password == $confPassword){
            $this->clienteRepository->insert($username, $email, $password, $rg, $cpf, $telefone);
        }

        return view('Register', ['Error' => 'A senha não bate']);

    }
}