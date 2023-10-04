<?php

require_once './Services/Engine.php';
require_once './Repositories/ClienteRepository.php';

class AuthenticatedController{

    private $clienteRepository;

    function __construct(){
        $this->clienteRepository = new ClienteRepository();
    }

    function perfil(){

        $clientes = $this->clienteRepository->selectById(1);

        $data = $clientes->fetch_assoc();

        var_dump($data);

        return view('Perfil', $data);
    }
}