<?php
require_once("../../model/connectdb.php");
include_once("../../model/seller/fetchOrder.php");

// Pagination variables
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;
$orderList = getListOrderWithProduct($mysqli);

$groupedOrders = [];
foreach ($orderList as $order) {
    $orderId = $order['idOrder'];
    if (!isset($groupedOrders[$orderId])) {
        $groupedOrders[$orderId] = [
            'userName' => $order['userName'],
            'total' => $order['total'],
            'note' => $order['note'],
            'statusOrder' => $order['statusOrder'],
            'idOrder' => $orderId,
            'product' => []
        ];
    }
    $groupedOrders[$orderId]['product'][] = [
        'proName' => $order['proName'],
        'proPrice' => $order['proPrice'],
        'quantity' => $order['quantity']
    ];
}
$totalPages = ceil(count($groupedOrders) / $perPage);
$offset = ($page - 1) * $perPage;
$paginatedOrders = array_slice($groupedOrders, $offset, $perPage);
// Output orders as JSON
echo json_encode(array(
    'orders' => array_values($paginatedOrders),
    'totalPages' => $totalPages
));
?>