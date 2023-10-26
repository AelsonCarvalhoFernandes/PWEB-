<?php

require_once './Services/Engine.php';
require_once './Repositories/ProductsRepository.php';

class ProductController{
    private $productRepository; 
    function __construct(){
        $this->productRepository = new ProductRepository();
    }

    function createProduct(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view('CreateProduct');
        }else{
            $nome = $_POST['name'];
            $quant = $_POST['quant'];
            $categoria = $_POST['categoria'];
            $descricao = $_POST['descricao'];
            $preco = $_POST['preco'];
            $id_vendedor = $_POST['id_vendedor'];


            $this->productRepository->insert($nome, $quant, $categoria, $preco, $descricao, $id_vendedor);

        }
    }
}