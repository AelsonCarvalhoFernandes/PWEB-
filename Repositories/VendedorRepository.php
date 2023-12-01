<?php

include_once './Services/DatabaseConnection.php';

class VendedorRepository{

    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function insert($username, $email, $password, $rg, $cpf, $telefone, $tipo){
       $conn = $this->connection->getConnection();
       $sql = "
            insert into Vendedor (username, email, password, cnpj_rg, cnpj_cpf, telefone, type) values ('$username', '$email', '$password', '$rg', '$cpf', '$telefone', '$tipo');
       ";

       $conn->execute_query($sql);
       $conn->close();
    }

    function update($id, $username, $email, $rg, $cpf, $telefone, $type){
        $conn = $this->connection->getConnection();
        /*
        $sql = "update Vendedor set username = $username, email = $email, password = $password, cnpj_rg = $rg, cnpj_cpf = $cpf, telefone = $telefone where id = $id;
        ";*/

        $stmt = $conn->prepare("UPDATE Vendedor SET username = ?, email = ?, cnpj_rg = ?, cnpj_cpf = ?, telefone = ?, type = ? WHERE id = ?");

        if ($stmt) {
            $stmt->bind_param("ssssssi", $username, $email, $rg, $cpf, $telefone, $type, $id);
    
            $stmt->execute();
            $stmt->close();
        }
    
        $conn->close();

        /*
        $conn->execute_query($sql);
        $conn->close();*/
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
        $sql = "SELECT * FROM Vendedor WHERE email = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            
            $stmt->bind_param("s", $email);
            $stmt->execute();
    
            $result = $stmt->get_result();

            $stmt->close();
            $conn->close();
    
            return $result;
        } else {
            
            return false;
        }
    }

    function updateCarteira($id, $valor){
        $conn = $this->connection->getConnection();
        $sql = "update Vendedor set carteira = $valor where id = $id;
        ";

        $conn->execute_query($sql);
        $conn->close();
    }

    function deleteById($id){
        $conn = $this->connection->getConnection();
        $sql = "delete from Vendedor where id = $id";

        $conn->execute_query($sql);
        $conn->close();
    }
}