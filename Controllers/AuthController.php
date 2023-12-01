<?php

require_once './Services/Engine.php';
require_once './Repositories/ClienteRepository.php';
require_once './Repositories/VendedorRepository.php';

class AuthController{

    private $clienteRepository;

    function __construct(){
        $this->clienteRepository = new ClienteRepository();
        $this->vendedorRepository = new VendedorRepository();
    }

    function register(){
        return view('Register');
    }

    function login(){  
        return view('Login');
    }

    function registerValidate(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confPassword = $_POST['confirm_password'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $tipo = 'cliente';

        if($password == $confPassword){
            $this->clienteRepository->insert($username, $email, $password, $rg, $cpf, $telefone, $tipo);

            header("Location: /login");
            exit(); 
        }

        return view('Register', ['Error' => 'A senha não bate']);
    }

    function registerValidateVendedor(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confPassword = $_POST['confirm_password'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $tipo = 'vendedor';

        if($password == $confPassword){
            $this->vendedorRepository->insert($username, $email, $password, $rg, $cpf, $telefone, $tipo);

            header("Location: /login");
            $this->startSession($data);
            exit(); 
        }

        return view('Register', ['Error' => 'A senha não bate']);
    }

    function loginValidate(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $cliente = $this->clienteRepository->selectByEmail($email);

        $data = $cliente->fetch_assoc();

        if($data['password'] == $password){
            $this->startSession($data);
            header("Location: /");
            exit(); 
        }

        $this->loginValidateVendedor();
        // return view('Login', ['Error' => 'Email ou senha incorretos']);
    }

    function loginValidateVendedor(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $vendedor = $this->vendedorRepository->selectByEmail($email);

        $data = $vendedor->fetch_assoc();

        if($data['password'] == $password){
            $this->startSession($data);
            header("Location: /");
            exit(); 
        }

        return view('Login', ['Error' => 'Email ou senha incorretos']);
    }

    function logout(){
        $this->endSession();
        //session_destroy();
        header("Location: /login");
        exit(); 
    }


    private function startSession($userData) {
        // Inicie a sessão e armazene as informações do usuário
        session_start();
        $_SESSION['user'] = $userData;
    }

    private function endSession() {
        // Encerre a sessão
        session_start();
        session_destroy();
    }

}