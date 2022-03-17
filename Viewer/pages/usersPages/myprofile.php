<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$_SESSION['site'] = "Meu Perfil";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/perfil.css">  
</head>
<body>
    <?php 
    if(isset($_SESSION['message'])){
        echo "<div class='popup'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    include_once "$root/Viewer/pages/partials/headerLogado.html";
    ?>
    <main>
        <table>
            <tr>
                <th>
                    <h1>Seja bem-vindo!</h1>
                </th>
            </tr>
            <tr>
                <th>
                    <form action="../../Controller/Router.php" method="POST">
                        <p><input type="submit" value="Deletar Usuário" name="delete" class="btn"></p>
                        <p><input type="submit" value="Atualizar Dados" name="update" class="btn"></p>
                        <p><input type="submit" value="Logout" name="logout" class="btn">
                           <input type="submit" value="Home" name="home" class="btn"></p>
                    </form>
                </th>
            </tr>
        </table>
    </main>
</body>
</html>