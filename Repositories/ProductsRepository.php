<?php

include_once './Services/DatabaseConnection.php';

class ProductRepository{
    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function selectAll(){
        $conn = $this->connection->getConnection();
        $sql = "select * from Product";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }

    function selectById($id){
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Product WHERE id = $id";
    
        $result = $conn->execute_query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            $data = [];
        }
    
        return $data;
    }

    function selectSaleById($id_product, $id_user) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Sale WHERE id_product = $id_product AND id_client = $id_user";
    
        $result = $conn->execute_query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();
        } else {
            $data = [];
        }
    
        return $data;
    }

    function insert($name, $quant, $category, $price, $description, $create_at, $update_at, $url_image, $id_seller){
        $conn = $this->connection->getConnection();

        $data = date_default_timezone_get();
        $sql = "
            insert into Product (name, quantity, category, price, description, creation_date, update_date, url_image, id_seller) values ('$name', '$quant', '$category', '$price', '$description', '$create_at', '$update_at', '$url_image', '$id_seller');
        ";

        $conn->execute_query($sql);
        //$conn->close();
    }

    function buyProduct($id_client, $id_seller, $id_product, $price) {
        $conn = $this->connection->getConnection();
    
        $sql = "INSERT INTO Sale (id_client, id_seller, id_product, price, date) VALUES (?, ?, ?, ?, NOW())";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $id_client, $id_seller, $id_product, $price);
        $stmt->execute();

    }

    function selectProductsByIdClient($id_client) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT S.*, P.*
                FROM Sale S
                JOIN Product P ON S.id_product = P.id
                WHERE S.id_client = $id_client";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = [];
        }
    
        return $data;
    }

    function selectProductoFromSeller($id_seller) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Product WHERE id_seller = $id_seller";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = [];
        }
    
        return $data;
    }

    function updateQuantity($id) {
        $conn = $this->connection->getConnection();
        $sql = "UPDATE Product SET quantity = quantity - 1 WHERE id = $id";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = [];
        }
    
        return $data;
    }

    /*
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
    
    */
    function closeConnection() {
        $this->connection->close();
    }
}