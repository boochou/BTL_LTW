<?php
require_once '../../core/Database.php';

function addRatings($idOrder, $content, $stars) {
    $conn = Database::connect();
    $today = date("Y-m-d H:i:s");
    $idUser = 2;
    $sql = "INSERT INTO ratings (idOrder, idUser, content, stars, timeRating) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisis", $idOrder, $idUser, $content, $stars, $today);
    $stmt->execute();
}
?>