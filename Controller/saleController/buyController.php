<?php 

if($_POST['submit'] == "Comprar"){
    $_SESSION['quantity'] = $_POST['quantity'];
    header("Location: ../../comprar-produto/".$_POST['id-prod']);
} else {
    include_once "$root/Model/sales.php";
    $quantity = $_SESSION['quantity'];
    $idProd = $_POST['id-product'];
    $idPerson = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
    $idOwner = mysqli_fetch_assoc($prod->getProdById($idProd))['Id_Owner'];
    if(mysqli_fetch_assoc($users->getUserById($idPerson))['Credits'] - (mysqli_fetch_assoc($prod->getProdById($idProd))['Price'] * $quantity) >= 0 && mysqli_fetch_assoc($prod->getProdById($idProd))['Quantity'] > 0){
        if($quantity <= mysqli_fetch_assoc($prod->getProdById($idProd))['Quantity']){
            $price = mysqli_fetch_assoc($prod->getProdById($idProd))['Price'] * $quantity;
            $result = mysqli_fetch_assoc($users->getUserById($idPerson))['Credits'] - $price;
            if($users->updateUserCredit($idPerson, $result) && $users->updateUserCredit($idOwner, $price + mysqli_fetch_assoc($users->getUserById($idOwner))['Credits']) && $prod->updateProdQuantity($idProd, mysqli_fetch_assoc($prod->getProdById($idProd))['Quantity'] - $quantity) && $sales->postSale($idPerson, $idOwner, $quantity, $price, mysqli_fetch_assoc($prod->getProdById($idProd))['Name'])){
                if(mysqli_fetch_assoc($prod->getProdById($idProd))['Quantity'] <= 0){
                    $prod->deleteProduct($idProd);
                }
                $_SESSION['message'] = "Compra efetuada com sucesso";
                header("Location: ../../home");
            } else {
                $_SESSION['message'] = "Algo deu errado";
                header("Location: ../../home");
            }
        } else {
            echo "chegou aqui";
        }
    } else {
        $_SESSION['message'] = "Créditos insuficientes";
        header("Location: ../../produto/".$idProd);
    }
}