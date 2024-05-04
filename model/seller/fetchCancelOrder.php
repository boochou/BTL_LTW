<?php
include_once("../../model/connectdb.php");

function getListCancelOrder($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id AND isCanceled=1;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
$orders = getListCancelOrder($mysqli);
?>
