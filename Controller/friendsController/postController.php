<?php 
$idReceiver = $_POST['id-user'];
$idSender = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
if(mysqli_num_rows($friends->getCheckFriend($idSender, $idReceiver)) > 0){
    $_SESSION['message'] = "Já são amigos";
    header("Location: ../../meu-perfil");
} else {
    if($friends->postFriends($idSender, $idReceiver)){
        $_SESSION['message'] = "Solicitação enviada";
        header("Location: ../../meus-amigos");
    } else {
        $_SESSION['message'] = "Algo deu errado";
        header("Location: ../../home");
    }
}