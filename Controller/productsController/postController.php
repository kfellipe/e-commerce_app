<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/products.php";
include_once "$root/Model/users.php";

$File = $_FILES['arquivo'];
$Name = $_POST['name'];
$Price = intval($_POST['price']);
$Quantity = intval($_POST['quantity']);

if (empty($_FILES['arquivo']['name'])){
    $_SESSION['message'] = "Nenhuma imagem enviada";
    header("Location: ../meus-anuncios");
} elseif (empty($_POST['name'])){
    $_SESSION['message'] = "Digite o nome do item";
    header("Location: ../meus-anuncios");
} elseif ($Price <= 0){
    $_SESSION['message'] = "Digite um preço";
    header("Location: ../meus-anuncios");
} elseif ($Quantity <= 0){
    $_SESSION['message'] = "Digite a quantidade em estoque";
    header("Location: ../meus-anuncios");
} else {
    $fileArray = explode(".", $File['name']);
    if(in_array($fileArray[1], ["jpg", "png", "webm", "webm"])){
        $dir = "../Viewer/img/products/";
        $name = uniqid($fileArray[0]).".".$fileArray[1];
        if(move_uploaded_file($File['tmp_name'], $dir . $name)){
            #echo "Arquivo de imagem: $dir$name / Nome: $Name / Preço: $Price / Quantidade: $Quantity";
            $Price = floatval($Price);
            $prod->postProduct($Name, $Price, $Quantity, $dir.$name);
            $_SESSION['message'] = "Produto cadastrado com sucesso";
            header("Location: ../meus-anuncios");
        } else {
            $_SESSION['message'] = "Algo deu errado";
            header("Location: ../meus-anuncios");
        }
    } else {
        $_SESSION['message'] = "Tipo de arquivo não suportado (".$fileArray[1].")";
        header("Location: ../meus-anuncios");
    }
}