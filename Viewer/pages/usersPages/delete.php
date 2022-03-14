<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="../Viewer/css/usersCss/delete.css">
</head>
<body>
    <main>
        <table>
            <tr><th><h1>Tem certeza que deseja apagar o usuário "<?= $_SESSION['logado']; ?>" do sistema?</h1></th></tr>
            <form action="../Controller/Router.php" method="POST">
                    <tr><th><input class="btn" type="submit" value="Deletar" name="sub-delete">
                    <input class="btn" type="submit" value="Voltar" name="perfil"></th></tr>
            </form>
        </table>
    </main>
</body>
</html>