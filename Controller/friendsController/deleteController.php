<?php
if($friends->deleteFriend($idSender, $idReceiver)){
    $_SESSION['message'] = "Amizade desfeita";
    header("Location: ../../meus-amigos");
} else {
    $_SESSION['message'] = "Algo deu errado";
    header("Location: ../../home");
}