<?php
session_start();

include_once "../Model/products.php";
include_once "../Model/users.php";
$cur = $prod->getByOwner($_SESSION['logado']);
$num = mysqli_num_rows($cur);
$fetchProd = mysqli_fetch_assoc($cur);
if($num > 0){
    do {
        $prod->deleteProduct($fetchProd['Id_Product']);
    } while($fetchProd = mysqli_fetch_assoc($cur));
}
$users->deleteUser($_SESSION['logado']);
session_unset();
$_SESSION['message'] = "Usuário excluido com sucesso!";
header("Location: ../");