<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getProduct.php");

function fetchProductsByCategory($categoryId) {
    global $mysqli;

    return getProductsByCategory($mysqli, $categoryId);
}
?>
