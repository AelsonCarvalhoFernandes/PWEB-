<?php

require_once './Services/Engine.php';
require_once './Repositories/ProductsRepository.php';

class HomeController{

    private $productRepository; 
    function __construct(){
        $this->productRepository = new ProductRepository();
    }

    function home(){

        $queryOne = $this->productRepository->selectAllLimited();

        $data = [
            "products" => $queryOne->fetch_assoc(),
            "promotions" => null
        ];

        return view("Home", $data);
    }

    function contact(){
        
    }
}