<?php

include_once './Services/DatabaseConnection.php';

class UserRepository{

    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function selectById($id) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            $result = $stmt->get_result();

            $stmt->close();
            //$conn->close();
    
            return $result;
        } else { 
            return false;
        }
    }

    function updateMoney($id_user, $valueMoney) {
        $conn = $this->connection->getConnection();
        $sql = "UPDATE users SET money = money + $valueMoney WHERE id = $id_user";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $data = [];
        }
    
        return $data;
    }
    /*
    function findEmailExists($email) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT COUNT(*) as count FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
    
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
    
            $stmt->close();
    
            return ($row['count'] > 0);
        } else {
            return false;
        }
    }  */  

    function selectByEmail($email) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("s", $email);
            $stmt->execute();
    
            $result = $stmt->get_result();

            $stmt->close();
            //$conn->close();
    
            return $result;
        } else { 
            return false;
        }
    }
    

    function insert($username, $email, $password, $rg, $cpf, $cellphone, $type, $money) {
        $conn = $this->connection->getConnection();
    
        $sql = "INSERT INTO users (username, email, password, rg, cpf, cellphone, type, money) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssssssss", $username, $email, $password, $rg, $cpf, $cellphone, $type, $money);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                $result = true;
            } else {
                $result = false;
            }
    
            $stmt->close();
        } else {
            return false;
        }

        //$conn->close();
        return $result;
    }

    function update($username, $email, $rg, $cpf, $cellphone, $type, $id ) {
        $conn = $this->connection->getConnection();
    
        $sql = "UPDATE users SET username = ?, email = ?, rg = ?, cpf = ?, cellphone = ?, type = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssssssi", $username, $email, $rg, $cpf, $cellphone, $type, $id);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                $result = true;
            } else {
                $result = false;
            }
    
            $stmt->close();
            //$conn->close();
    
            return $result;
        } else {
            
            return false;
        }
    }

    function updatePassword($email, $newPassword) {
        $conn = $this->connection->getConnection();
    
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ss", $newPassword, $email);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                $result = true;
            } else {
                $result = false;
            }
    
            $stmt->close();
    
            return $result;
        } else {
            
            return false;
        }
    }


    function closeConnection() {
        $this->connection->close();
    }
}