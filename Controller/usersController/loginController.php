<?php
include_once "$root/Model/users.php";

if($_POST['submit'] === "Logout"){
    $cur = $users->getUserByName($_COOKIE['logado']);
    $fetch = mysqli_fetch_assoc($cur);
    if($users->updateUserLogged(intval($fetch['Id_Person']), 0)){
        $_SESSION['message'] = "Logout efetuado com sucesso";
        $_SESSION['site'] = "Home";
        $username = $_COOKIE['logado'];
        setcookie('logado', '', time() - (1), "/");
        header("Location: ../home");
    }
} elseif (empty($_POST['Username']) || empty($_POST['Password'])){
    $_SESSION['message'] = "Preencha os campos!";
    #echo "Digite um nome de usuário";
    header("Location: ../");
} else {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $cur = $users->getUserByName($username);
    $fetch = mysqli_fetch_assoc($cur);
    if(mysqli_num_rows($cur) >= 1){
        if($fetch['Logged'] == true){
            $_SESSION['message'] = "Usuário já está logado";
            header("Location: ../../home");
        } elseif($password == $fetch['Password']){
            if(isset($_POST['remember'])){
                setcookie('logado', $username, time() + (60 * 60 * 24 * 60), "/");
                $users->updateUserLogged(mysqli_fetch_assoc($users->getUserByName($username))['Id_Person'], 1);
                #echo $_COOKIE['logado'];
                $_SESSION['site'] = "Meu Perfil";
                header("Location: ../meu-perfil");
            } else {
                setcookie('logado', $username, 0, "/");
                #echo $_COOKIE['logado'];
                $_SESSION['site'] = "Meu Perfil";
                header("Location: ../meu-perfil");
            }
        } else {
            $_SESSION['message'] = "Senha incorreta!";
            echo $password." / ".$fetch['Name'];
            header("Location: ../");
        }
    } else {
    $_SESSION['message'] = "Usuário não encontrado";
    echo "Usuário nao encontrado";
    header("Location: ../");
    }
}