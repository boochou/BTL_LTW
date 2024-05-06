<?php
include_once ("../../model/connectdb.php");

function getListOrder($mysqli)
{
    $sql_get_list_reported_user = mysqli_query(
        $mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total, note
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id ORDER BY idOrder DESC;"
    );

    $listuser = array();

    if (mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListOrderWithProduct($mysqli)
{
    $sql_get_list_reported_user = mysqli_query(
        $mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice,
        product_in_order.quantity as quantity 
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct 
        ORDER BY idOrder DESC;"
    );

    $listuser = array();

    if (mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
$orders = getListOrder($mysqli);

function getListOrderFromTo($mysqli, $startDate, $endDate)
{
    $sql_get_list_reported_user = mysqli_prepare(
        $mysqli,
        "SELECT orders.id as idOrder, statusOrder, total, payment
        FROM orders
        WHERE dateCreated >= ? AND dateCreated <= ? AND payment = 'Ship COD'
        ORDER BY dateCreated ASC;"
    );

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

function getListOrderFromToNotPaid($mysqli, $startDate, $endDate)
{
    $sql_get_list_reported_user = mysqli_prepare(
        $mysqli,
        "SELECT orders.id as idOrder, statusOrder, total, payment
        FROM orders
        WHERE dateCreated >= ? AND dateCreated <= ? AND payment='MOMO'
        ORDER BY dateCreated ASC;"
    );

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
function getListOrderCompleted($mysqli)
{
    $sql_get_list_reported_user = mysqli_query(
        $mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total, note
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id AND statusOrder = 'Đã hoàn thành' ORDER BY idOrder DESC;;"
    );

    $listuser = array();

    if (mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListOrderPrepared($mysqli)
{
    $sql_get_list_reported_user = mysqli_query(
        $mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total, note
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id AND statusOrder = 'Chờ chuẩn bị' ORDER BY idOrder DESC;;"
    );

    $listuser = array();

    if (mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListOrderDeliveried($mysqli)
{
    $sql_get_list_reported_user = mysqli_query(
        $mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total, note
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id AND statusOrder = 'Đang giao hàng' ORDER BY idOrder DESC;"
    );

    $listuser = array();

    if (mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}