<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
session_start();

include_once "$root/Model/products.php";

if(unlink(mysqli_fetch_array($prod->getProdById($_SESSION['id-produto']))['Img_Product'])){
    if($prod->deleteProduct($_SESSION['id-produto'])){
        unset($_SESSION['id-produto']);
        $_SESSION['message'] = "Produto deletado com sucesso";
        header("Location: ../meus-anuncios");
    } else {
        $_SESSION['message'] = "Falha ao deletar produto";
        header("Location: ../atualizar-produto/".$_SESSION['id-produto']);
    }
} else {
    $_SESSION['message'] = "Falha ao deletar produto";
    header("Location: ../atualizar-produto/".$_SESSION['id-produto']);
}