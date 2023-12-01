<?php

require_once './Services/Engine.php';
require_once './Repositories/ClienteRepository.php';
require_once './Repositories/VendedorRepository.php';
require_once './Repositories/ProductsRepository.php';

class AuthenticatedController{

    private $clienteRepository;
    private $vendedorRepository;

    function __construct(){
        $this->clienteRepository = new ClienteRepository();
        $this->vendedorRepository = new VendedorRepository();
        $this->productRepository = new ProductRepository();

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

    function updateProfile() {

        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $id = $user['id'];
            $type = $user['type'];

            if($type == 'cliente'){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $rg = $_POST['rg'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['telefone'];
                $type = 'cliente';

                $this->clienteRepository->update($id, $username, $email, $password, $rg, $cpf, $telefone, $type);
                header("Location: /perfil");
                exit();

            }else{
                $username = $_POST['username'];
                $email = $_POST['email'];
                $rg = $_POST['cnpj_rg'];
                $cnpj = $_POST['cnpj_cpf'];
                $telefone = $_POST['telefone'];

                $this->vendedorRepository->update($id, $username, $email, $rg, $cnpj, $telefone, $type);
                header("Location: /perfil");
                exit();
            }
        }else{
            header("Location: /login");
            exit();
        }
    }

    function library() {
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user']['id'];
    
            if ($_SESSION['user']['type'] == 'cliente') {
                $dataProducts = $this->productRepository->selectProductsByIdCliente($id);
            } else {
                $dataProducts = $this->productRepository->selectProductsByIdCliente($id);
            }
    
            // Crie um array associativo com uma chave para os dados
            $viewData = [
                'dataProducts' => $dataProducts,
            ];
    
            return view('Library', $viewData);
    
        } else {
            header("Location: /login");
            exit();
        }
    }    
    
}