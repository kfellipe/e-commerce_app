<?php

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
                <button type="button" class="btns-action" name="friends" onclick="header('meus-amigos')">Meus Amigos</button>
                <button type="button" class="btns-action" name="historic" onclick="header('transacoes')">Compras/Vendas</button>
                <button type="button" class="btns-action" name="myproducts" onclick="header('meus-anuncios')">Meus Anuncios</button>
            </section>
        </form>
        <section class="container-crud_perfil">
            <table>
                <tr>
                    <th>
                        <p>Creditos: R$ <?= mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Credits'] ?></p>
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
                            <p><button type="button" class="btn" name="custom" onclick="header('customizar-perfil')">Customizar</button></p>
                            <p><button type="button" class="btn" name="delete" onclick="header('deletar-usuario')">Deletar Usuário</button></p>
                            <p><button type="button" class="btn" name="update" onclick="header('atualizar-usuario')">Atualizar Usuário</button></p>
                            <p><input type="submit" value="Logout" name="submit" class="btn">
                               <button type="button" class="btn" name="home" onclick="header('home')">Home</button></p>
                               <input type="hidden" name="id-user" value="<?= mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'] ?>">
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