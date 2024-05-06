<?php

require_once ("../../model/connectdb.php");
require_once ("../../model/seller/getProductinOrder.php");


function fetchProductInOrder($orderID)
{
    global $mysqli;

    return getProductInOrder($mysqli, $orderID);
}
function fetchProductInOrderAll($orderID)
{
    global $mysqli;
    $orderList = getListOrderAll($mysqli, $orderID);

    $groupedOrders = null;
    foreach ($orderList as $order) {
        $orderId = $order['idOrder'];
        if (!isset($groupedOrders[$orderId])) {
            $groupedOrders = [
                'userName' => $order['userName'],
                'total' => $order['total'],
                'note' => $order['note'],
                'statusOrder' => $order['statusOrder'],
                'isReported' => $order['isReported'],
                'idAccount' => $order['idAccount'],
                'email' => $order['email'],
                'phone' => $order['phone'],
                'idOrder' => $orderId,
                'dateCreated' => $order['dateCreated'],
                'product' => []
            ];
        }
        $groupedOrders[$orderId]['product'][] = [
            'proName' => $order['proName'],
            'proPrice' => $order['proPrice'],
            'quantity' => $order['quantity']
        ];
    }
    // Output orders as JSON
    echo json_encode($groupedOrders);
}
?>