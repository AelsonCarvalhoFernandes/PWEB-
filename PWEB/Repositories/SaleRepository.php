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

    function buyProduct($id_client, $id_seller, $id_product, $price) {
        $conn = $this->connection->getConnection();
    
        $sql = "INSERT INTO Sale (id_client, id_seller, id_product, price, date) VALUES (?, ?, ?, ?, NOW())";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $id_client, $id_seller, $id_product, $price);
        $stmt->execute();

    }

    function selectDataSaleByIdSeller($id_seller) {
        $conn = $this->connection->getConnection();

        $sql = "SELECT
                S.id_product,
                S.id_client,
                S.id_seller,
                COUNT(S.id_product) as total_product,
                SUM(S.price) as total_price,
                P.name,
                P.quantity

                FROM sale S
                JOIN product P ON S.id_product = P.id
                WHERE S.id_seller = ? 
                GROUP BY S.id_product
                ORDER BY total_product DESC";


        $stmt = $conn->prepare($sql);
    
        if ($stmt) {     
            $stmt->bind_param("i", $id_seller);
            $stmt->execute();
    
            $result = $stmt->get_result();

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