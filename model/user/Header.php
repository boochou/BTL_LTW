<?php
class Header {
    public static function getProductInCart() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM product_in_cart WHERE idUser = 2";
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
    public static function getProductById($product_id) {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM product WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            return $product;
        }
        return NULL;
    }
}
?>