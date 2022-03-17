<?php 
session_start();
$id = $_SESSION['id-produto'];
unset($_SESSION['id-produto']);
include_once "../Model/products.php";

$Name = $_POST['name'];
$Price = intval($_POST['price']);
$Quantity = intval($_POST['quantity']);


if ($Name == "" && $Price <= 0 && $Quantity <= 0){
    $_SESSION['message'] = "Nenhuma alteração foi feita";
    echo "nenhuma alteração";
    header("Location: ../atualizar-produto/".$id);
} elseif($Price > 0 && $Quantity > 0){
    $prod->updateProduct($id, $Name, $Price, $Quantity);
    $_SESSION['message'] = "Alteração feita com sucesso";
    echo "alterado com sucesso1";
    header("Location: ../meus-anuncios");
} else {
    if ($Name == ""){
        $Name = mysqli_fetch_array($prod->getProdById(2))['Name'];
    }
    if ($Price <= 0){
        $Price = intval(mysqli_fetch_array($prod->getProdById(2))['Price']);
    }
    if ($Quantity <= 0){
        $Quantity = intval(mysqli_fetch_array($prod->getProdById(2))['Quantity']);
    }
    if($Price > 0 && $Quantity > 0){
        $prod->updateProduct($id, $Name, $Price, $Quantity);
        $_SESSION['message'] = "Alteração feita com sucesso";
        echo "alterado com sucesso2";
        header("Location: ../meus-anuncios");
    }
}