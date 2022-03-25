<?php 
session_start();
include_once "../Model/users.php";

if($_POST['user'] == ""){
    $_POST['user'] = $_COOKIE['logado'];
    if($_POST['passNew'] == "" && $_POST['passCurr'] == ""){
        $_SESSION['message'] = "Nenhuma alteração feita!";
        #echo "nenhuma alteração feita";
        header("Location: ../meu-perfil/");
    } else {
        $passCurrently = $_POST['passCurr'];
        $passNew = $_POST['passNew'];
    }
}
if(mysqli_num_rows($users->getUserByName($_POST['user'])) >= 1){
    $_SESSION['message'] = "Nome de usuário já existe!";
    #echo "usuario ja existe";
    header("Location: ../meu-perfil/");
} elseif ($_POST['user'] != "") {
    $userNew = $_POST['user'];
    if($_POST['passCurr'] == "" && $_POST['passNew'] == ""){
        $passCurrently = mysqli_fetch_array($users->getUserByName($_COOKIE['logado']))['Password'];
        $passNew = mysqli_fetch_array($users->getUser($_COOKIE['logado']))['Password'];
    }
    if(mysqli_fetch_array($users->getUserByName($_COOKIE['logado']))['Password'] == $passCurrently){
        $userCurr = $_COOKIE['logado'];
        $_COOKIE['logado'] = $userNew;
        $users->updateUserByName($userCurr, $userNew, $passNew);
        $_SESSION['message'] = "Atualizado com sucesso!";
        #echo "atualizado com sucesso";
        header("Location: ../meu-perfil/");
    } else {
        $_SESSION['message'] = "Senha não coincide";
        #echo "senha errada";
        header("Location: ../meu-perfil/");
    }
}