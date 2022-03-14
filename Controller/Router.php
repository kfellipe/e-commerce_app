<?php
session_start();
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

if (isset($_POST['login'])){
    header("Location: ../login");
} elseif (isset($_POST['home'])){
    header("Location: ../home");
} elseif (isset($_POST['register'])){
    header("Location: ../registrar");
} elseif (isset($_POST['sub-register'])){
    include_once "registrarController.php";
} elseif (isset($_POST['delete'])){
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    header("Location: ../deletar/$username");
} elseif (isset($_POST['sub-delete'])){
    include_once "deleteController.php";
} elseif (isset($_POST['sub-update'])){
    include_once "updateController.php";
} elseif (isset($_POST['update'])){
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    header("Location: ../atualizar/$username");
} elseif (isset($_POST['perfil'])){
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    header("Location: ../perfil/$username");
} elseif (isset($_POST['logout'])){
    include_once "loginController.php";
} elseif (isset($_POST['logar'])){
    include_once "loginController.php";
} elseif (isset($_POST['product'])){
    header("Location: ../meus-anuncios");
}