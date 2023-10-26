<?php

include_once './Services/DatabaseConnection.php';

class ProductRepository{
    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function insert($nome, $quant, $categoria, $preco, $descricao, $id_vendedor){
        $conn = $this->connection->getConnection();

        $localdate = localtime();

        $dt = new DateTime("now", new DateTimeZone('Brazil/Brasilia'));

        var_dump($localdate);
        $sql = "
            insert into Produto(nome, quant, categoria, preco, descricao, dataCriacao, dataAtualizacao, id_vendedor) values ('$nome', '$quant', '$categoria', '$preco', '$descricao', '$localdate', '$localdate', '$id_vendedor');
        ";

        $conn->execute_query($sql);
        $conn->close();
    }

    function selectAll(){
        $conn = $this->connection->getConnection();
        $sql = "
            select * from Produto;
        ";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;

    }

    function selectAllLimited(){
        $conn = $this->connection->getConnection();
        $sql = "
            select * from Produto FETCH FIRST 100;
        ";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;

    }

    function findByName($nome){
        $conn = $this->connection->getConnection();

        $sql = "
            select * from Produto where nome like '%$nome%';
        ";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }

    function selectById($id){
        $conn = $this->connection->getConnection();
        $sql = "select * from Produto where id = $id";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }
}