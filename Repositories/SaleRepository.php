<?php 

include_once './Services/DatabaseConnection.php';

class SaleRepository {
    public $connection;

    function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    function selectAllUserDataById($id_user) {
        $conn = $this->connection->getConnection();
        $sql = "SELECT * FROM Sale WHERE id_client = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("i", $id_user);
            $stmt->execute();
    
            $result = $stmt->get_result();

            $stmt->close();
    
            return $result;
        } else { 
            return false;
        }
    }

    function closeConnection() {
        $this->connection->closeConnection();
    }
}