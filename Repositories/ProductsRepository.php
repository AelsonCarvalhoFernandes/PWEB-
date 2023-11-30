<?php

include_once './Services/DatabaseConnection.php';

class ProductRepository{
    public $connection;

    function __construct()
    {
        $connection = new DatabaseConnection();
    }

    function insert($nome, $quant, $categoria, $preco, $descricao, $id_vendedor){
        $conn = $this->connection->getConnection();

        $data = date_default_timezone_get();
        $sql = "
            insert into Produto(nome, quant, categoria, preco, descricao, dataCriacao, dataAtualizacao, id_vendedor) values ('$nome', '$quant', '$categoria', '$preco', '$descricao', '$data', '$data', '$id_vendedor');
        ";

        $conn->execute_query($sql);
        $conn->close();
    }
}