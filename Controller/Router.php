<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
if(explode("/", $_GET['url'])[0] === "home"){
    include "$root/Viewer/pages/home.php";
} elseif (isset($_POST['query'])){
    $_SESSION['array-query'] = ["query" => $_POST['query'], "filter" => $_POST['filter']];
    header("Location: ../../home");
}
class conf {
    public $root;
    public $url;
    public $value;
    public function __construct(){
        $this->root = $_SERVER['DOCUMENT_ROOT'];
        $this->url = explode("/", $_GET['url']);
        if(isset($_POST['submit'])){
            $this->value = $_POST['submit'];
        }
    }
}

class url extends conf {
    public function user($dest, $page){
        if($this->url[0] === $dest){
            $root = $this->root;
            $url = $this->url;
            include $this->root."/Viewer/pages/usersPages/".$page;
        }
    }
    public function prod($dest, $page){
        if($this->url[0] === $dest){
            $root = $this->root;
            $url = $this->url;
            include $this->root."/Viewer/pages/productsPages/".$page;
        }
    }
}
if(isset($_POST['submit'])){
    class sub extends conf {
        public function saleCont($cond, $cont){
            if($this->value === $cond){
                $root = $this->root;
                include_once $root."/Controller/saleController/".$cont."Controller.php";
            }
        }
        public function prodCont($cond, $cont){
            if($this->value === $cond){
                $root = $this->root;
                include_once $root."/Controller/productsController/".$cont."Controller.php";
            }
        } 
        public function friendCont($cond, $cont){
            if($this->value === $cond){
                $root = $this->root;
                include_once "$root/Model/friends.php";
                $idReceiver = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
                $idSender = $_POST['id-user'];
                include_once $root."/Controller/friendsController/".$cont."Controller.php";
            }
        }
        public function userCont($cond, $cont){
            if($this->value === $cond){
                $root = $this->root;
                include_once $this->root."/Controller/usersController/".$cont."Controller.php";
            }
        }
        public function debug(){
            echo $this->value;
        }
    }
    $sub = new sub();

    $sub->userCont("Logout", "login");
    $sub->userCont("Logar", "login");
    $sub->userCont("Registrar", "registrar");
    $sub->userCont("Aplicar", "custom");
    $sub->userCont("Atualizar dados", "update");
    $sub->userCont("Deletar usuario", "delete");
    $sub->userCont("Salvar configurações", "config");

    $sub->friendCont("Aceitar", "accept");
    $sub->friendCont("Recusar", "reject");
    $sub->friendCont("Enviar solicitação", "post");
    $sub->friendCont("Cancelar", "cancel");
    $sub->friendCont("Desfazer amizade", "delete");

    $sub->prodCont("Atualizar produto", "update");
    $sub->prodCont("Deletar produto", "delete");
    $sub->prodCont("Cadastrar produto", "post");

    $sub->saleCont("Comprar", "buy");
    $sub->saleCont("Confirmar compra", "buy");

}
$url = new url();

$url->user("customizar-perfil", "custom.php");
$url->user("deletar-usuario", "delete.php");
$url->user("transacoes", "historic.php");
$url->user("login", "login.php");
$url->user("meus-amigos", "myfriends.php");
$url->user("meu-perfil", "myprofile.php");
$url->user("perfil", "profile.php");
$url->user("cadastrar-usuario", "registrar.php");
$url->user("atualizar-usuario", "update.php");
$url->user("configuracoes", "settings.php");

$url->prod("comprar-produto", "buy.php");
$url->prod("cadastrar-produto", "create.php");
$url->prod("meus-anuncios", "myproducts.php");
$url->prod("produto", "product.php");
$url->prod("atualizar-produto", "update.php");
$url->prod("deletar-produto", "delete.php");