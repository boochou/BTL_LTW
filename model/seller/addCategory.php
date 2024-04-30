<?php

function addCategory($mysqli,$idcategory, $namecategory) {

    $query = "INSERT INTO `category` (`id`, `typeName`) VALUES (?, ?)";

    $stmt = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($stmt, "is", $idcategory, $namecategory);

    $success = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $success;
}
?>
