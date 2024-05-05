<?php
include_once("../../model/connectdb.php");
include_once ('../../model/seller/fetchOrder.php');

function fetchListOrderPrepare() {
    global $mysqli;
    return getListOrderPrepared($mysqli);
}
?>