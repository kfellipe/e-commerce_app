<?php 

include_once "$root/Model/products.php";
include_once "$root/Model/friends.php";
$fetch = mysqli_fetch_array($prod->getUserById($url[1]));
$_SESSION['site'] = "Perfil de ".$fetch['Name'];
if(isset($_COOKIE['logado'])){
    if(mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'] == $url[1]){
        header("Location: ../meu-perfil");
    }
}
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/responsive/usersCss/profile.css">
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
    $fetch = mysqli_fetch_array($prod->getUserById($url[1]));
    $letter = str_split($fetch['Name']);
    $letter = strtoupper($letter[0]);
    ?>
    <main>
        <section class="container-perfil">
            <div class="container-perfil_img">
                <span class="letter" style="background-image: radial-gradient(<?= $fetch['Pred_Color'] ?> 50%, rgba(0, 0, 0, 0)70%);"><?= $letter ?></span>
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
        <section class="container-actions">
            <form action="../../Controller/Router.php" method="POST">
                <?php 
                if(isset($_COOKIE['logado'])){
                    $idLogado = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
                    $idUser = $url[1];
                    $cur = $friends->getCheckFriend($idUser, $idLogado);
                    $fetch = mysqli_fetch_assoc($cur);
                    $num = mysqli_num_rows($cur);
                    if($num > 0){
                        echo "<input type='hidden' id='id-requested' name='id-user' value='".$url[1]."'>
                        <input type='submit' class='btn' name='submit' value='Desfazer amizade'>";
                    } else {
                        echo "<input type='hidden' id='id-requested' name='id-user' value='".$url[1]."'>
                        <input type='submit' class='btn' name='submit' value='Enviar solicitação'>";
                }
            }
                ?>
                
            </form>
        </section>
    </main>
</body>
</html>