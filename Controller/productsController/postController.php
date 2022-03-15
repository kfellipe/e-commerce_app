<?php
include_once "../Model/products.php";
include_once "../Model/users.php";

$Name = $_POST['name'];
$Price = intval($_POST['price']);
$Quantity = intval($_POST['quantity']);

if(empty($_POST['name'])){
    $_SESSION['message'] = "Digite o nome do item";
    header("Location: ../meus-anuncios");
} elseif ($Price <= 0){
    $_SESSION['message'] = "Digite um preço";
    header("Location: ../meus-anuncios");
} elseif ($Quantity <= 0){
    $_SESSION['message'] = "Digite a quantidade em estoque";
    header("Location: ../meus-anuncios");
}

$prod->postProduct($Name, $Price, $Quantity);

header("Location: ../meus-anuncios");