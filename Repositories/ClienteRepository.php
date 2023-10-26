<?php

include_once './Services/DatabaseConnection.php';

class ClienteRepository{

    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function insert($username, $email, $password, $rg, $cpf, $telefone){
       $conn = $this->connection->getConnection();
       echo 'chegou aqui';
       $sql = "
            insert into Cliente (username, email, password, rg, cpf, telefone) values ('$username', '$email', '$password', '$rg', '$cpf', '$telefone');
       ";

       $conn->execute_query($sql);
       $conn->close();
    }

    function update($id, $username, $email, $password, $rg, $cpf, $telefone){
        $conn = $this->connection->getConnection();
        $sql = "update Cliente set username = $username, email = $email, password = $password, rg = $rg, cpf = $cpf, telefone = $telefone where id = $id;
        ";

        $conn->execute_query($sql);
        $conn->close();
    }

    function selectById($id){
        $conn = $this->connection->getConnection();
        $sql = "select * from Cliente where id = $id";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }

    function selectByEmail($email){
        $conn = $this->connection->getConnection();
        $sql = "select * from Cliente where email = $email";

        $data = $conn->execute_query($sql);
        $conn->close();
        return $data;
    }

    function deleteById($id){
        $conn = $this->connection->getConnection();

        $sql = "selete * from Cliente where id = '$id'";

        $data = $conn->query($sql);
        $conn->close();

        return $data->fetch_row();
    }
}