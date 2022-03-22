<?php
$idReceiver = $_POST['id-user'];
$idSender = mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person'];
if($friends->deleteFriendRequest($idSender, $idReceiver)){
    $_SESSION['message'] = "Solicitação foi cancelada";
    header("Location: ../../meus-amigos");
} else {
    $_SESSION['message'] = "Algo deu errado";
    header("Location: ../../meus-amigos");
}