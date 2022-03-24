<?php

$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/products.php";
if (empty($_SESSION['logado'])){
    header("Location: ../");
} 
if (isset($_GET['id-user'])){
    if($_GET['id-user'] != mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person']){
        header('Location: ../');
    }
} 
if (isset($_GET['id-product'])){
    $IdOwner = mysqli_fetch_array($prod->getProdById($_GET['id-product']))['Id_Owner'];
    $IdLogado = mysqli_fetch_array($users->getUserByName($_SESSION['logado']))['Id_Person'];
    if($IdOwner != $IdLogado){
        $_SESSION['message'] = "$IdOwner / $IdLogado";
        header("Location: ../home");
    }
}