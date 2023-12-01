<?php

include_once './Services/DatabaseConnection.php';

class ProductRepository{
    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function insert($nome, $quant, $categoria, $preco, $descricao, $url_image, $id_vendedor){
        $conn = $this->connection->getConnection();

        $data = date_default_timezone_get();
        $sql = "
            insert into Produto (nome, quant, categoria, preco, descricao, dataCriacao, dataAtualizacao, url_image, id_vendedor) values ('$nome', '$quant', '$categoria', '$preco', '$descricao', '$data', '$data', '$url_image', '$id_vendedor');
        ";

        $conn->execute_query($sql);
        $conn->close();
    }

    function selectAll(){
        $conn = $this->connection->getConnection();
        $sql = "select * from Produto";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }
}