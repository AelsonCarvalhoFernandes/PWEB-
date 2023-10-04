<?php

include_once './Services/DatabaseConnection.php';

class VendedorRepository{

    public $connection;

    function __construct()
    {
        $connection = new DatabaseConnection();
    }

    function insert($username, $email, $password, $rg, $cpf, $telefone){
       $conn = $this->connection->getConnection();
       $sql = "
            insert into Vendedor (username, email, password, rg, cpf, telefone) values ('$username', '$email', '$password', '$rg', '$cpf', '$telefone');
       ";

       $conn->execute_query($sql);
       $conn->close();
    }

    function update($id, $username, $email, $password, $rg, $cpf, $telefone){
        $conn = $this->connection->getConnection();
        $sql = "update Vendedor set username = $username, email = $email, password = $password, rg = $rg, cpf = $cpf, telefone = $telefone where id = $id;
        ";

        $conn->execute_query($sql);
        $conn->close();
    }

    function selectById($id){
        $conn = $this->connection->getConnection();
        $sql = "select * from Vendedor where id = $id";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
        
    }

    function selectByEmail($email){
        $conn = $this->connection->getConnection();
        $sql = "select * from Vendedor where email = $email";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }

    function deleteById($id){
        $conn = $this->connection->getConnection();
        $sql = "delete from Vendedor where id = $id";

        $conn->execute_query($sql);
        $conn->close();
    }
}