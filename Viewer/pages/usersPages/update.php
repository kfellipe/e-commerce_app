<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Viewer/pages/partials/head.html";
include_once "$root/Controller/validateController.php";

?>
<link rel="stylesheet" href="../Viewer/css/usersCss/update.css">
</head>
<body>
    <form action="../../Controller/Router.php" method="POST">
        <table>
            <tr>
                <th colspan="2">
                    <input type="text" placeholder="<?php echo $_SESSION['logado']; ?>" name="user" id="user">
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="text" placeholder="Senha Antiga" name="passCurr" id="passCurr">
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="text" placeholder="Senha Nova" name="passNew" id="passNew">
                </th>
            </tr>
            <tr>
                <th>
                    <input type="submit" value="Atualizar Dados" name="sub-update" class="btn">
                </th>
                <th>
                    <input type="submit" value="Voltar" name="perfil" class="btn">
                </th>
            </tr>
        </table>
    </form>
</body>
</html>