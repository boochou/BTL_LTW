<?php
class Orders {
    public static function getAllOrders() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM orders WHERE idUser = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }
}
?>