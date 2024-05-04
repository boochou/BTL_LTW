<?php
include_once("../../model/connectdb.php");
include_once ('../../model/seller/fetchCancelOrder.php');

function fetchListCancelOrder() {
    global $mysqli;
    return getListCancelOrder($mysqli);
}
?>
