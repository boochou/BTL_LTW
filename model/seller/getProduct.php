<?php
function getProductsByCategory($mysqli, $categoryId) {
    $sql_get_products = mysqli_query($mysqli,
        "SELECT product.id, product.name, product.quantity, product.description, product.price, product.image, product.isHidden, product.rate,
        category.typeName
        FROM product
        INNER JOIN category ON product.idCategory = category.id
        WHERE product.idCategory = $categoryId AND product.isDeleted = 0
        ORDER BY product.isHidden");

    $products = array();

    if(mysqli_num_rows($sql_get_products) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_products)) {
            $products[] = $row;
        }
    }

    return $products;
}
?>
