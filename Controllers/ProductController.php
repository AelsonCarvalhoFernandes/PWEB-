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
}