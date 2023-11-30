<?php

require_once './Services/Engine.php';
require_once './Repositories/ClienteRepository.php';
require_once './Repositories/VendedorRepository.php';

class AuthenticatedController{

    private $clienteRepository;
    private $vendedorRepository;

    function __construct(){
        $this->clienteRepository = new ClienteRepository();
        $this->vendedorRepository = new VendedorRepository();
    }

    function perfil(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $id = $user['id'];
            $type = $user['type'];

            if($type == 'cliente'){
                $data = $this->clienteRepository->selectById($id);
                return view('Perfil', ['data' => $data]);
            }else{
                $data = $this->vendedorRepository->selectById($id);
                return view('Perfil', ['data' => $data]);
            }
        }else{
            header("Location: /login");
            exit();
        }
    }
}