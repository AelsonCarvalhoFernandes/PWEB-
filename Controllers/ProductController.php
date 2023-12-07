<?php

require_once './Services/Engine.php';
require_once './Repositories/ProductsRepository.php';
require_once './Repositories/ClientRepository.php';
require_once './Repositories/SellerRepository.php';
require_once './Repositories/UserRepository.php';

class ProductController{

    private $productRepository; 
    private $sellerRepository;
    private $userRepository;
    private $clientRepository;

    function __construct(){
        $this->productRepository = new ProductRepository();
        $this->sellerRepository = new SellerRepository();
        $this->userRepository = new UserRepository();
        $this->clientRepository = new ClientRepository();
    }

    function product() {
        if (isset($_SESSION['user'])) {
            include_once './Views/Publication.php';

        } else {
            header("Location: /login");
            exit();
        }
    }

    function createProduct(){
        try {
            if (isset( $_FILES['file']) && !empty($_FILES['file'])) 
            {
                $img ="./Repositories/Files/img/".$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $img);

            } else 
            {
                $img = "";
            }

            $name = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $quant = $_POST['quantity'];
            $id_userSeller = $_SESSION['user']['id'];
            $create_at = date('Y-m-d H:i:s');
            $update_at = date('Y-m-d H:i:s');

            $seller = $this->sellerRepository->selectByIdUser($id_userSeller)->fetch_assoc();
            $id_seller = $seller['id'];
            
            $this->productRepository->insert($name, $quant, $category, $price, $description, $create_at, $update_at, $img, $id_seller); 
            $this->productRepository->closeConnection();
            header("Location: /library");
            exit();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function productToId(){
        
        if (isset($_GET['idCardProduct'])){

            $id = $_GET['idCardProduct'];
            $dataSale = null;   
            $dataClient = null;         

            if ($id !== null) {
                $data = $this->productRepository->selectById($id);

                if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 'client') {
                    $id_user = $_SESSION['user']['id'];
                    $dataClient = $this->clientRepository->selectById($id_user)->fetch_assoc();
                    
                    $id_client = $dataClient['id'];
                    $dataSale = $this->productRepository->selectSaleById($id, $id_client);
                }
                $this->productRepository->closeConnection();
                return view('DescriptionProduct', ['data' => $data, 'dataSale' => $dataSale, 'dataClient' => $dataClient]);

            } else {
                echo "ID não fornecido ou inválido";
            }
        } else {
            header("Location: /");
            exit();
        }
    }

    function editProduct(){
        
        if (isset($_GET['idCardProduct'])){

            $id = $_GET['idCardProduct'];
            $dataSale = null;   
            $dataClient = null;         

            if ($id !== null) {
                $data = $this->productRepository->selectById($id);

                if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 'client') {
                    $id_user = $_SESSION['user']['id'];
                    $dataClient = $this->clientRepository->selectById($id_user)->fetch_assoc();
                    
                    $id_client = $dataClient['id'];
                    $dataSale = $this->productRepository->selectSaleById($id, $id_client);
                }
                $this->productRepository->closeConnection();
                return view('UpdateDescriptionProduct', ['data' => $data, 'dataSale' => $dataSale, 'dataClient' => $dataClient]);

            } else {
                echo "ID não fornecido ou inválido";
            }
        } else {
            header("Location: /");
            exit();
        }
    }

    function updateProduct() {
        try {

            $id = $_POST['idElementProduct'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $quant = $_POST['quantity'];
            $update_at = date('Y-m-d H:i:s');

            $this->productRepository->update($id, $name, $quant, $category, $price, $description, $update_at);
            $this->productRepository->closeConnection();
            header("Location: /library");
            exit();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    function buyProduct(){
        try {
            if ($_SESSION['user']['type'] == 'client') {
                
                $id = $_POST['idElementProduct'];
                $valueMoney = $_POST['inputMoney'];

                $client = $this->clientRepository->selectById($_SESSION['user']['id'])->fetch_assoc();
                $id_client = $client['id'];

                $data = $this->productRepository->selectById($id);
                $seller = $this->sellerRepository->selectByIdSeller($data['id_seller'])->fetch_assoc();
        
                $this->productRepository->buyProduct($id_client, $data["id_seller"], $id, $data["price"]);
                $this->productRepository->updateQuantity($id);
                $this->userRepository->updateMoney($seller['id_user'], $valueMoney);

                $this->productRepository->closeConnection();
                header("Location: /library");
                exit();
            }
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


/*
    function selectProductsByIdCliente(){
        $id = $_SESSION['user']['id'];

        $dataProducts = $this->productRepository->selectProductsByIdCliente($id);
        $this->productRepository->closeConnection();
        return view('Library', $dataProducts);
    }*/
     


    /*
    function selectProductByIdVendedor() {
        $id = $_SESSION['user']['id'];

        $dataProducts = $this->productRepository->selectProductByIdVendedor($id);
        $this->productRepository->closeConnection();
        return view('Library', $dataProducts);
    }*/
}