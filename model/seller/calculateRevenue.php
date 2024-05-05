<?php
function calculateTotalRevenue($mysqli, $startDate, $endDate) {
    $query = "SELECT SUM(total) AS total_revenue
              FROM orders
              WHERE isPaid = 1 AND dateCreated >= ? AND dateCreated <= ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "ss", $startDate, $endDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_revenue'] ?? 0;
    } else {
        return 0;
    }
}
function getTotalRevenue($mysqli) {
    $query = "SELECT SUM(total) AS total_revenue
              FROM orders
              WHERE isPaid = 1";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_revenue'] ?? 0;
    } else {
        return 0;
    }
}
function calculateNotPaidRevenue($mysqli, $startDate, $endDate) {
    $query = "SELECT SUM(total) AS total_revenue
              FROM orders
              WHERE isPaid = 0 AND dateCreated >= ? AND dateCreated <= ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "ss", $startDate, $endDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_revenue'] ?? 0;
    } else {
        return 0;
    }
}
function getNotPaidRevenue($mysqli) {
    $query = "SELECT SUM(total) AS total_revenue
              FROM orders
              WHERE isPaid = 0";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_revenue'] ?? 0;
    } else {
        return 0;
    }
}
?>
