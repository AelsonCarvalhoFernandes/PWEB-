<?php

require_once './Services/Engine.php';
require_once './Repositories/ProductsRepository.php';

class ProductController{
    private $productRepository; 
    function __construct(){
        $this->productRepository = new ProductRepository();
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
            $id_vendedor = $_SESSION['user']['id'];

            $this->productRepository->insert($name, $price, $category, $price, $description, $img, $id_vendedor); 

            header("Location: /perfil");
            exit();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }



    function productToId(){

        if (isset($_GET['idElement'])) {
            $id = $_GET['idElement'];
            $id_cliente = $_SESSION['user']['id'];

            if ($id !== null) {
                $data = $this->productRepository->selectById($id);
                $dataVenda = $this->productRepository->selectVendaById($id_cliente, $id);
                
                $viewData = [
                    "data" => $data,
                    "dataVenda" => $dataVenda
                ];

                return view('DescriptionProduct', $viewData);
            } else {
                echo "ID não fornecido ou inválido";
            }
        } else {
            echo "ID não encontrado na consulta GET";
        }
    }


    function buyProduct(){
        try {
            $id = $_POST['idElementProduct'];
            $id_cliente = $_SESSION['user']['id'];
            $data = $this->productRepository->selectById($id);
    
            $this->productRepository->buyProduct($id, $id_cliente, $data["id_vendedor"], $data["preco"]);
            header("Location: /");
            $this->productRepository->closeConnection();
            exit();
    
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