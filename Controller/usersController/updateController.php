<?php 
session_start();
include_once "../Model/users.php";
$caracteres_sem_acento = array(
    'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
    'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
    'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 
    'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
    'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
    'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 
    'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f', 'Ú'=>'U', 'ù'=>'u',
    'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
);

if($_POST['user'] == ""){
    $_POST['user'] = $_SESSION['logado'];
    if($_POST['passNew'] == "" && $_POST['passCurr'] == ""){
        $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
        $_SESSION['message'] = "Nenhuma alteração feita!";
        #echo "nenhuma alteração feita";
        header("Location: ../perfil/".$username);
    } else {
        $passCurrently = $_POST['passCurr'];
        $passNew = $_POST['passNew'];
    }
}
if(mysqli_num_rows($users->getUserByName($_POST['user'])) >= 1){
    $_SESSION['message'] = "Nome de usuário já existe!";
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    #echo "usuario ja existe";
    header("Location: ../perfil/".$username);
} elseif ($_POST['user'] != "") {
    $userNew = $_POST['user'];
    if($_POST['passCurr'] == "" && $_POST['passNew'] == ""){
        $passCurrently = mysqli_fetch_array($users->getUserByName($_SESSION['logado']))['Password'];
        $passNew = mysqli_fetch_array($users->getUser($_SESSION['logado']))['Password'];
    }
    if(mysqli_fetch_array($users->getUserByName($_SESSION['logado']))['Password'] == $passCurrently){
        $userCurr = $_SESSION['logado'];
        $_SESSION['logado'] = $userNew;
        $users->updateUserByName($userCurr, $userNew, $passNew);
        $userNew = strtr($userNew, $caracteres_sem_acento);
        $_SESSION['message'] = "Atualizado com sucesso!";
        #echo "atualizado com sucesso";
        header("Location: ../perfil/".$userNew);
    } else {
        $_SESSION['message'] = "Senha não coincide";
        $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
        #echo "senha errada";
        header("Location: ../perfil/".$username);
    }
}