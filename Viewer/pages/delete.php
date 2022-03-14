<?php
session_start();
include_once "../pages/partials/head.html";

?>

</head>
<body>
    <h1>Tem certeza que deseja apagar o usuário "" do sistema?</h1>
    <form action="../../Controller/Router.php" method="POST">
        <input type="submit" value="Deletar" name="sub-delete">
        <input type="submit" value="Voltar" name="perfil">
    </form>
</body>
</html>