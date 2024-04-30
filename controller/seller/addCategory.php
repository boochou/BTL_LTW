<?php
include_once("../../model/connectdb.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $idcategory = $_POST["idcategory"];
    $namecategory = $_POST["namecategory"];

    include_once '../../model/seller/addCategory.php';

    $success = addCategory($mysqli,$idcategory, $namecategory);

    if ($success) {
        header("Location: ../../views/seller/?page=product");
        exit();
    } else {
        header("Location: ../../views/seller/?page=product");
        exit();
    }
}
?>
