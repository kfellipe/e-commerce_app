<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/products.php";
include_once "$root/Model/friends.php";
$fetch = mysqli_fetch_array($prod->getUserById($_GET['id-user']));
$_SESSION['site'] = "Perfil de ".$fetch['Name'];
if(isset($_SESSION['logado'])){
    if(mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person'] == $_GET['id-user']){
        header("Location: ../meu-perfil");
    }
}
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/perfil.css">
</head>
<body>
    <?php 
    include_once "$root/Viewer/pages/partials/header.php";
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        echo "<div class='popup'>$message</div>";
        unset($_SESSION['message']);
    }
    if(isset($_SESSION['message'])){
        echo "<div class='popup'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    ?>
    <main>
        <section class="container-actions">
            <form action="../../Controller/Router.php" method="POST">
                <?php 
                {
                $idLogado = mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person'];
                $idUser = $_GET['id-user'];
                $cur = $friends->getCheckFriend($idUser, $idLogado);
                $fetch = mysqli_fetch_assoc($cur);
                $num = mysqli_num_rows($cur);
                if($num > 0){
                    echo "<input type='hidden' id='id-requested' name='id-user' value='".$_GET['id-user']."'>
                    <input type='submit' class='btn' name='delete-friend' value='Desfazer amizade'>";
                } else {
                    echo "<input type='hidden' id='id-requested' name='id-user' value='".$_GET['id-user']."'>
                    <input type='submit' class='btn' name='sent-friend-request' value='Enviar solicitação'>";
                }
            }$fetch = mysqli_fetch_array($prod->getUserById($_GET['id-user']));
                ?>
                
            </form>
        </section>
        <section class="container-perfil">
            <div class="container-perfil_img">
                <img src="../Viewer/img/user.png" alt="Imagem do usuário" height="70%" width="auto">
            </div>
            <div class="container-perfil_info">
                <div class="container-perfil_info_name">
                    <h1><?= $fetch['Name'] ?></h1>
                </div>
                <div class="container-perfil_info_adds">
                    <strong>Anuncios: <?= mysqli_num_rows($prod->getProdByOwner($fetch['Id_Person'])) ?></strong>
                </div>
            </div>
        </section>
    </main>
</body>
</html>