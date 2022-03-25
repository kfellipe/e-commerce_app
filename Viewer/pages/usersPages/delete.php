<?php

include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="../Viewer/css/usersCss/delete.css">
</head>
<body>
    <main>
        <table>
            <tr><th><h1>Tem certeza que deseja apagar o usuário "<?= $_COOKIE['logado']; ?>" do sistema?</h1></th></tr>
            <tr><th><h3>(apagará tambêm todos os anuncios do mesmo)</h3></th></tr>
            <form action="../Controller/Router.php" method="POST">
                    <tr><th><input class="btn" type="submit" value="Deletar" name="sub-delete">
                    <input class="btn" type="submit" value="Voltar" name="perfil"></th></tr>
                    <input type="hidden" name="id-user" value="<?= $url[1] ?>">
            </form>
        </table>
    </main>
</body>
</html>