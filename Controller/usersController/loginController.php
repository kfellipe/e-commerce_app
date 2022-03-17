<?php
include_once "../Model/users.php";

if(isset($_POST['logout'])){
    unset($_SESSION['logado']);
    $_SESSION['message'] = "Logout efetuado com sucesso";
    $_SESSION['site'] = "Home";
    header("Location: ../");
} elseif (empty($_POST['Username']) || empty($_POST['Password'])){
    $_SESSION['message'] = "Preencha os campos!";
    #echo "Digite um nome de usuário";
    header("Location: ../");
} else {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $cur = $users->getUserByName($username);
    if(mysqli_num_rows($cur) >= 1){
        if($password == mysqli_fetch_array($cur)['Password']){
            $_SESSION['logado'] = $username;
            $caracteres_sem_acento = array(
                'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
                'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
                'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
                'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
                'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
                'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
                'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
                'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
            );
            $username = strtr($username, $caracteres_sem_acento);
            #echo "logado com sucesso";
            #echo $_SESSION['logado'];
            $_SESSION['site'] = "Meu Perfil";
            header("Location: ../meu-perfil");
        } else {
            unset($_SESSION['logado']);
            $_SESSION['message'] = "Nome ou Senha incorretos!";
            echo "Nome ou Senha incorretos!";
            header("Location: ../");
        }
    } else {
    $_SESSION['message'] = "Usuário não encontrado";
    echo "Usuário nao encontrado";
    header("Location: ../");
    }
}