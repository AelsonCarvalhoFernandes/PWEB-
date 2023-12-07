<?php

require_once './Services/Engine.php';
require_once './Repositories/ProductsRepository.php';

class HomeController{

    public $productRepository;

    function __construct() {
        $this->productRepository = new ProductRepository(); 
    }

    function home() {
        $queryOnce = $this->productRepository->selectAll();

        $data = [
            "products" => [],
            "promotions" => null
        ];
        
        while ($row = $queryOnce->fetch_array()) {
            $data["products"][] = $row;
        }
        return view('Home', $data);
    }
}