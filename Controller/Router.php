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
    $_SESSION['site'] = "Fazer LogIn";
    header("Location: ../login");
} elseif (isset($_POST['home'])){
    unset($_SESSION['query']);
    unset($_SESSION['filter']);
    $_SESSION['site'] = "Home";
    header("Location: ../home");
} elseif (isset($_POST['register'])){
    $_SESSION['site'] = "Fazer Cadastro";
    header("Location: ../registrar-usuario");
} elseif (isset($_POST['sub-register'])){
    include_once "usersController/registrarController.php";
} elseif (isset($_POST['delete'])){
    $_SESSION['site'] = "Deletar usuário";
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    header("Location: ../deletar-usuario/$username");
} elseif (isset($_POST['sub-delete'])){
    include_once "usersController/deleteController.php";
} elseif (isset($_POST['sub-update'])){
    include_once "usersController/updateController.php";
} elseif (isset($_POST['update'])){
    $_SESSION['site'] = "Atualizar dados";
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    header("Location: ../atualizar-usuario/$username");
} elseif (isset($_POST['meu-perfil'])){
    header("Location: ../meu-perfil");
} elseif (isset($_POST['logout'])){
    include_once "usersController/loginController.php";
} elseif (isset($_POST['logar'])){
    include_once "usersController/loginController.php";
} elseif (isset($_POST['meus-anuncios'])){
    $_SESSION['site'] = "Meus anuncios";
    header("Location: ../meus-anuncios");
} elseif (isset($_POST['create-product'])){
    $_SESSION['site'] = "Cadastrar produto";
    header("Location: ../cadastrar-produto");
} elseif (isset($_POST['sub-create-product'])){
    include_once "productsController/postController.php";
} elseif (isset($_POST['sub-update-product'])){
    include_once "productsController/updateController.php";
} elseif (isset($_POST['delete-product'])){
    $_SESSION['site'] = "Deletar produto";
    header("Location: ../deletar-produto/".$_SESSION['id-produto']);
} elseif (isset($_POST['update-product'])){
    header("Location: ../atualizar-produto/".$_SESSION['id-produto']);
} elseif (isset($_POST['sub-delete-product'])){
    include_once "productsController/deleteController.php";
} elseif (isset($_POST['query'])){
    include_once "productsController/queryController.php";
}