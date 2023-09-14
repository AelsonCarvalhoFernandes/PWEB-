<?php

include '../Services/DatabaseConnection.php';

class VendedorRepository{

    public $connection = new DatabaseConnection();

    function insert($username, $email, $password, $rg, $cpf, $telefone){
       $conn = $this->connection->getConnection();
       $sql = "
            insert into Vendedor (username, email, password, rg, cpf, telefone) values ('$username', '$email', '$password', '$rg', '$cpf', '$telefone');
       ";

       $conn->execute_query($sql);
    }

    function update($id, $username, $email, $password, $rg, $cpf, $telefone){
        $conn = $this->connection->getConnection();
        $sql = "update Vendedor set username = $username, email = $email, password = $password, rg = $rg, cpf = $cpf, telefone = $telefone where id = $id;
        ";
    }

    function selectById($id){
        $conn = $this->connection->getConnection();
        $sql = "select * from Vendedor where id = $id";

        return $conn->execute_query($sql);
    }

    function selectByEmail($email){
        $conn = $this->connection->getConnection();
        $sql = "select * from Vendedor where email = $email";

        return $conn->execute_query($sql);
    }

    function deleteById($id){
        $conn = $this->connection->getConnection();
        $sql = "delete from Vendedor where id = $id";
    }
}