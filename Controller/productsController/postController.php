<?php
session_start();
include_once "../Model/products.php";
include_once "../Model/users.php";

if(empty($_POST['name'])){
    $_SESSION['message'] = "Digite o nome do item";
    header("Location: ../meus-anuncios");
} elseif (empty($_POST['price'])){
    $_SESSION['message'] = "Digite um preço";
    header("Location: ../meus-anuncios");
} elseif (empty($_POST['quantity'])){
    $_SESSION['message'] = "Digite a quantidade em estoque";
    header("Location: ../meus-anuncios");
}
$Name = $_POST['name'];
$Price = $_POST['price'];
$Quantity = $_POST['quantity'];

$prod->post($Name, $Price, $Quantity, mysqli_fetch_array($users->get($_SESSION['logado']))['Id_Person']);

header("Location: ../meus-anuncios");