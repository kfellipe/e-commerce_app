<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/products.php";

if(empty($_POST['query'])){
    unset($_SESSION['query']);
    unset($_SESSION['filter']);
    $_SESSION['message'] = "Campo de pesquisa vazio";
    header("Location: ../");
} else {
    $_SESSION['query'] = $_POST['query'];
    $_SESSION['filter'] = $_POST['filter'];
    header("Location: ../home");
}