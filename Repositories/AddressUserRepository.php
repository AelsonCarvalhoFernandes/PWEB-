<?php


include_once './Services/DatabaseConnection.php';

class AddressUserRepository {
    public $connection;

    function __construct() {
        $this->connection = new DatabaseConnection();
    }

    function findByIdUser($id_user) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM address_user WHERE id_user = ?";
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

    function createUserAddress($id_user) {
        $conn = $this->connection->getConnection();
        $sql = "INSERT INTO address_user (id_user) VALUES (?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("i", $id_user);
            $stmt->execute();
    
            $stmt->close();

            return true;
        } else { 
            return false;
        }
    }

    function insert($id_user, $cep, $street, $number, $neighborhood, $city, $state) {
        $conn = $this->connection->getConnection();
    
        $sql = "INSERT INTO address_user (id_user, cep, rua, numero, bairro, cidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {     
            $stmt->bind_param("issssss", $id_user, $cep, $street, $number, $neighborhood, $city, $state);
            $stmt->execute();
    
            $stmt->close();
            $conn->close();
    
            return true;
        } else { 
            return false;
        }
    }

    function update($cep, $street, $number, $neighborhood, $city, $state, $country, $id_user) {
        $conn = $this->connection->getConnection();
    
        $sql = "UPDATE address_user SET cep = ?, street = ?, number = ?, neighborhood = ?, city = ?, state = ?, country = ? WHERE id_user = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {     
            $stmt->bind_param("sssssssi", $cep, $street, $number, $neighborhood, $city, $state, $country, $id_user);
            $stmt->execute();
    
            $stmt->close();
            //$conn->close();
    
            return true;
        } else { 
            return false;
        }
    }
}