<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/products.php";
$fetch = mysqli_fetch_array($prod->getUserByName($_GET['nome']));
$_SESSION['site'] = "Perfil de ".$fetch['Name'];


include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/perfil.css">
</head>
<body>
    <?php 
    include_once "$root/Viewer/pages/partials/headerLogado.html";
    ?>
    <main>
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