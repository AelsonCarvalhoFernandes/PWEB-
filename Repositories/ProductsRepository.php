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

    function selectVendaById($id_cliente, $id_produto) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Venda WHERE id_produto = $id_produto AND id_cliente = $id_cliente";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            $data = [];
        }
    
        return $data;
    }

    function selectById($id){
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Produto WHERE id = $id";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            $data = [];
        }
    
        return $data;
    }

    function buyProduct($id, $id_cliente, $id_vendedor, $preco) {
        $conn = $this->connection->getConnection();
    
        // Use uma declaração preparada para evitar SQL Injection
        $sql = "INSERT INTO Venda (id_cliente, id_vendedor, id_produto, preco, data) VALUES (?, ?, ?, ?, NOW())";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiid", $id_cliente, $id_vendedor, $id, $preco);
        $stmt->execute();
    }    




    function selectProductsByIdCliente($id) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT V.*, P.*
                FROM Venda V
                JOIN Produto P ON V.id_produto = P.id
                WHERE V.id_cliente = $id";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = [];
        }
    
        return $data;
    }
    




    function selectProductsByIdVendedor($id) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Produto WHERE id_vendedor = $id";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = [];
        }
    
        return $data;
    }
    
    
    function closeConnection() {
        $this->connection->closeConnection();
    }
    
}