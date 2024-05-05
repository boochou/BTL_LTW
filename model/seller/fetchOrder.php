<?php
include_once("../../model/connectdb.php");

function getListOrder($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
$orders = getListOrder($mysqli);

function getListOrderFromTo($mysqli, $startDate, $endDate) {
    $sql_get_list_reported_user = mysqli_prepare($mysqli,
        "SELECT orders.id as idOrder, statusOrder, total, payment
        FROM orders
        WHERE dateCreated >= ? AND dateCreated <= ? AND isPaid = 1
        ORDER BY dateCreated ASC;");

    mysqli_stmt_bind_param($sql_get_list_reported_user, 'ss', $startDate, $endDate);
    mysqli_stmt_execute($sql_get_list_reported_user);
    $result = mysqli_stmt_get_result($sql_get_list_reported_user);

    $listOrders = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $listOrders[] = $row;
    }

    mysqli_stmt_close($sql_get_list_reported_user);

    return $listOrders;
}

function getListOrderFromToNotPaid($mysqli, $startDate, $endDate) {
    $sql_get_list_reported_user = mysqli_prepare($mysqli,
        "SELECT orders.id as idOrder, statusOrder, total, payment
        FROM orders
        WHERE dateCreated >= ? AND dateCreated <= ? AND isPaid = 0
        ORDER BY dateCreated ASC;");

    mysqli_stmt_bind_param($sql_get_list_reported_user, 'ss', $startDate, $endDate);
    mysqli_stmt_execute($sql_get_list_reported_user);
    $result = mysqli_stmt_get_result($sql_get_list_reported_user);

    $listOrders = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $listOrders[] = $row;
    }

    mysqli_stmt_close($sql_get_list_reported_user);

    return $listOrders;
}