<?php

include_once "$root/Model/users.php";
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
                    <tr><th><input class="btn" type="submit" value="Deletar usuario" name="submit">
                    <button type="button" class="btn" name="meu-perfil" onclick="header('meu-perfil')">Meu Perfil</button></th></tr>
                    <input type="hidden" name="id-user" value="<?= mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'] ?>">
            </form>
        </table>
    </main>
</body>
</html>