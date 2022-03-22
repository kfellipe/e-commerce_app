<?php
if($friends->updateFriendRequest($idSender, $idReceiver)){
        $_SESSION['message'] = "Você e ".mysqli_fetch_assoc($users->getUserById($idSender))['Name']." agora são amigos!";
        header("Location: ../../meus-amigos");
    } else {
        $_SESSION['message'] = "Algo deu errado";
        header("Location: ../../meus-amigos");
    }