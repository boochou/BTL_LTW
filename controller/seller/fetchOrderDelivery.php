<?php
include_once("../../model/connectdb.php");
include_once ('../../model/seller/fetchOrder.php');

function fetchListOrderDelivery() {
    global $mysqli;
    return getListOrderDeliveried($mysqli);
}
?>