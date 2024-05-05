<?php
include_once("../../model/connectdb.php");
include_once ('../../model/seller/fetchOrder.php');

function fetchListOrderDone() {
    global $mysqli;
    return getListOrderCompleted($mysqli);
}
?>