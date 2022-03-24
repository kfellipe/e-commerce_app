<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$_SESSION['site'] = "Meu Perfil";

include_once "$root/Model/friends.php";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/myprofile.css">  
</head>
<body>
    <?php 
    if(isset($_SESSION['message'])){
        echo "<div class='popup'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    include_once "$root/Viewer/pages/partials/header.php";
    ?>
    <main>
        <form action="../../Controller/Router.php" method="POST">
            <section class="container-actions">
                <input type="submit" class="btns-action" name="friends" value="Amigos"  style="cursor: pointer;">
                <input type="submit" class="btns-action" name="historic" value="Compras/Vendas"  style="cursor: pointer;">
                <input type="submit" class="btns-action" name="meus-anuncios" value="Meus Anuncios"  style="cursor: pointer;">
            </section>
        </form>
        <section class="container-crud_perfil">
            <table>
                <tr>
                    <th>
                        <p>Creditos: R$ <?= mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits'] ?></p>
                    </th>
                </tr>
                <tr>
                    <th>
                        <h1>Seja bem-vindo!</h1>
                    </th>
                </tr>
                <tr>
                    <th>
                        <form action="../../Controller/Router.php" method="POST">
                            <p><input type="submit" value="Customizar Perfil" name="custom" class="btn"></p>
                            <p><input type="submit" value="Deletar Usuário" name="delete" class="btn"></p>
                            <p><input type="submit" value="Atualizar Dados" name="update" class="btn"></p>
                            <p><input type="submit" value="Logout" name="logout" class="btn">
                               <input type="submit" value="Home" name="home" class="btn"></p>
                               <input type="hidden" name="id-user" value="<?= mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person'] ?>">
                        </form>
                    </th>
                </tr>
            </table>
        </section>
    </main>
    <script>
        function perfil(x){
            location.href = "../perfil/"+x;
        }
    </script>
</body>
</html>