<?php

require_once './Services/Engine.php';
require_once './Repositories/UserRepository.php';
require_once './Repositories/SellerRepository.php';
require_once './Repositories/ClientRepository.php';
require_once './Repositories/AddressUserRepository.php';

class AuthController{

    private $clientRepository;
    private $sellerRepository;
    private $userRepository;
    private $addressUserRepository;

    function __construct(){
        $this->userRepository = new UserRepository();
        $this->clientRepository = new ClientRepository();
        $this->sellerRepository = new SellerRepository();
        $this->addressUserRepository = new AddressUserRepository();
    }

    /* 
        Inicia a Sessão e armazena os dados do usuário 
    */
    private function startSession($userData) {
        session_start();
        $_SESSION['user'] = $userData;
    }

    /*
        Finaliza a Sessão 
    */
    private function endSession() {
        session_start();
        session_destroy();
    }

    /*
        Encaminha para a tela de login
    */
    function login(){  
        if (isset($_SESSION['user'])) {
            header("Location: /");
            exit(); 
        }
        return view('Login');
    }

    /*
        Valida o login do usuário
    */
    function loginValidate(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepository->selectByEmail($email);
        $data = $user->fetch_assoc();

        if($data['password'] == $password){
            $this->startSession($data);
            header("Location: /");
            exit(); 
        }

        return view('Login', ['Error' => 'Email ou senha incorretos']);
    }

    /*
        Finaliza a sessão do usuário
    */
    function logout(){
        if (!isset($_SESSION['user'])) {
            header("Location: /");
            exit(); 
        }
        $this->endSession();
        header("Location: /login");
        exit(); 
    }

    /*
        Encaminha para a tela de registro
    */
    function register(){
        if (isset($_SESSION['user'])) {
            header("Location: /");
            exit(); 
        }
        return view('Register');
    }

    /*
        Registra um novo usuário
    */
    function registerValidate(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $cellphone = $_POST['cellphone'];
        $type = $_POST['type'];
        $money = $_POST['money'];

        $verifyUserExists = $this->userRepository->selectByEmail($email)->fetch_assoc() ;

        if (empty($verifyUserExists)) {

            $user = $this->userRepository->insert($username, $email, $password, $rg, $cpf, $cellphone, $type, $money);

            if($user){
                
                $data_user = $this->userRepository->selectByEmail($email)->fetch_assoc() ;
                $id_user = $data_user['id'];

                if ($type == 'seller') {
                    $seller = $this->sellerRepository->insert($id_user);
                } else {
                    $client = $this->clientRepository->insert($id_user);
                }

                $this->addressUserRepository->createUserAddress($id_user);                

                $this->userRepository->closeConnection();

                header("Location: /login");
                return view('Login', ['Success' => 'Usuário cadastrado com sucesso']);
            }  
        } else {
            return view('/register', ['Error' => 'Email já cadastrado']); 
        }

        return view('/register', ['Error' => 'Erro ao cadastrar usuário']);
    }
}