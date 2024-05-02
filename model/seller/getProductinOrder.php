<?php
function getProductInOrder($mysqli, $orderID) {

    $sql_get_product_in_order = mysqli_query($mysqli,
        "SELECT product.name, product_in_order.quantity
        FROM product_in_order   
        INNER JOIN product ON product_in_order.idProduct = product.id
        WHERE product_in_order.idOrder = $orderID");

    $product = array();

    if(mysqli_num_rows($sql_get_product_in_order) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_product_in_order)) {
            $product[] = $row;
        }
    }

    return $product;
}
?>
