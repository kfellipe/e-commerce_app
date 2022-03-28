<?php
session_start();

include_once "../Model/sales.php";
include_once "../Model/friends.php";
$idUser = $_POST['id-user'];
if(mysqli_num_rows($prod->getProdByOwner($idUser)) > 0){
    $prod->deleteProdByOwner($idUser);
}
if(mysqli_num_rows($friends->getAllFriends($idUser)) > 0){
    $friends->deleteFriendByMember($idUser);
}
$users->deleteUser($_COOKIE['logado']);
setcookie("logado", "", time() - 1, "/");
$_SESSION['message'] = "Usuário excluido com sucesso!";
header("Location: ../");