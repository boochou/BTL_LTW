<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getProductinOrder.php");


function fetchProductInOrder($orderID) {
    global $mysqli;

    return getProductInOrder($mysqli, $orderID);
}
?>
