<?php

include_once './Services/DatabaseConnection.php';

class ClientRepository{

    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function selectById($id_user) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM client WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("i", $id_user);
            $stmt->execute();
    
            $result = $stmt->get_result();

            $stmt->close();
            //$conn->close();
    
            return $result;
        } else { 
            return false;
        }
    }

    function insert($id_user) {
        $conn = $this->connection->getConnection();
        $sql = "INSERT INTO client (id_user) VALUES (?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("i", $id_user);
            $stmt->execute();
    
            $stmt->close();
            $conn->close();
    
            return true;
        } else { 
            return false;
        }
    }
}