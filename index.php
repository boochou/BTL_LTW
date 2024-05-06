<?php
$router = require_once './core/Routes.php';
$orderIdForPage = isset($_GET['orderId']) ? $_GET['orderId'] : '';
$request_uri = isset($_GET['url']) ? $_GET['url'] : '';
$request_uri = '/' . $request_uri;
if ($request_uri == '' || $request_uri == '/') {
    $request_uri = '/user/homepage';
}
$router->handle($request_uri, $orderIdForPage);
?>
