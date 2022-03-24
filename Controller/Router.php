<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

if (isset($_POST['login'])){
    $_SESSION['site'] = "Fazer LogIn";
    header("Location: ../login");
}
elseif (isset($_POST['home'])){
    unset($_SESSION['query']);
    unset($_SESSION['filter']);
    $_SESSION['site'] = "Home";
    header("Location: ../home");
} 
elseif (isset($_POST['register'])){
    $_SESSION['site'] = "Fazer Cadastro";
    header("Location: ../registrar-usuario");
}
elseif (isset($_POST['sub-register'])){
    include_once "usersController/registrarController.php";
} 
elseif (isset($_POST['delete'])){
    header("Location: ../deletar-usuario/".$_POST['id-user']);
}
elseif (isset($_POST['sub-delete'])){
    include_once "usersController/deleteController.php";
} 
elseif (isset($_POST['sub-update'])){
    include_once "usersController/updateController.php";
}
elseif (isset($_POST['update'])){
    $_SESSION['site'] = "Atualizar dados";
    $username = strtr($_SESSION['logado'], $caracteres_sem_acento);
    header("Location: ../atualizar-usuario/$username");
}
elseif (isset($_POST['meu-perfil'])){
    header("Location: ../meu-perfil");
} 
elseif (isset($_POST['logout'])){
    include_once "usersController/loginController.php";
} 
elseif (isset($_POST['logar'])){
    include_once "usersController/loginController.php";
}
 elseif (isset($_POST['meus-anuncios'])){
    $_SESSION['site'] = "Meus anuncios";
    header("Location: ../meus-anuncios");
} 
elseif (isset($_POST['create-product'])){
    $_SESSION['site'] = "Cadastrar produto";
    header("Location: ../cadastrar-produto");
} 
elseif (isset($_POST['sub-create-product'])){
    include_once "productsController/postController.php";
} 
elseif (isset($_POST['sub-update-product'])){
    include_once "productsController/updateController.php";
} 
elseif (isset($_POST['delete-product'])){
    $_SESSION['site'] = "Deletar produto";
    header("Location: ../deletar-produto/".$_SESSION['id-produto']);
} 
elseif (isset($_POST['update-product'])){
    header("Location: ../atualizar-produto/".$_SESSION['id-produto']);
} 
elseif (isset($_POST['sub-delete-product'])){
    include_once "productsController/deleteController.php";
} 
elseif (isset($_POST['query'])){
    $_SESSION['array-query'] = ["query"=>$_POST['query'], "filter"=>$_POST['filter']];
    header("Location: ../home");
} 
elseif (isset($_POST['friends'])){
    header("Location: ../meus-amigos");
} 
elseif (isset($_POST['accept-friend-request']) || isset($_POST['sent-friend-request']) || isset($_POST['reject-friend-request']) || isset($_POST['cancel-friend-request']) || isset($_POST['delete-friend'])){
    include_once "$root/Controller/friendsController/requestController.php";
} 
elseif (isset($_POST['buy'])){
    $_SESSION['quantity'] = $_POST['quantity'];
    header("Location: ../../comprar-produto/".$_POST['id-product']);
} 
elseif(isset($_POST['sub-buy'])){
    include_once "$root/Controller/saleController/buyController.php";
} 
elseif (isset($_POST['historic'])){
    header("Location: ../../transacoes");
}
elseif (isset($_POST['download-pdf'])){
    include_once "$root/Controller/saleController/downloadPdfController.php";
}
elseif (isset($_POST['custom'])){
    header("Location: ../../customizar-perfil");
}
elseif (isset($_POST['custom-save'])){
    include_once "$root/Controller/usersController/customController.php";
}