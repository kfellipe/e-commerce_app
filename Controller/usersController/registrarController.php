<?php
session_start();

include_once "../Model/users.php";

$user = $_POST['username'];
$pass = $_POST['password1'];
if(mysqli_fetch_all($users->getUserByName($user))){
    $_SESSION['message'] = "Nome de usuário já existe";
    header("Location: ../");
} elseif (empty($user)){
    $_SESSION['message'] = "Nome de usuáro inválido";
    header("Location: ../");
} elseif (empty($pass)){
    $_SESSION['message'] = "Senha inválida";
    header("Location: ../");
} elseif ($_POST['password1'] == $_POST['password2']){
        $users->postUser($user, $pass);
        $_SESSION['message'] = "Cadastro efetuado com sucesso";
        $_SESSION['logado'] = $user;
        header("Location: ../");
    
} else {
    $_SESSION['message'] = "Senhas não coincidem";
    header("Location: ../");
}
