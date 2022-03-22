<?php
if($friends->deleteFriendRequest($idSender, $idReceiver)){
    $_SESSION['message'] = "Solicitação foi rejeitada";
    header("Location: ../../meus-amigos");
} else {
    $_SESSION['message'] = "Algo deu errado";
    header("Location: ../../meus-amigos");
}