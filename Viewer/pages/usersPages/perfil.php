<?php
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/perfil.css">  
</head>
<body>
    <?php if(isset($_SESSION['logado'])){
        include_once "../../../Viewer/pages/partials/headerLogado.html";
    } else {
        include_once "../../../Viewer/pages/partials/header.html";
    } ?>
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