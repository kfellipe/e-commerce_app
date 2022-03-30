<?php 

$_SESSION['site'] = "Atualizar";
include_once "$root/Viewer/pages/partials/head.html";
include_once "$root/Controller/validateController.php";

?>
<link rel="stylesheet" href="../Viewer/css/usersCss/update.css">
</head>
<?php 
include "$root/Viewer/pages/partials/header.php";
?>
<body>
    <form action="../../Controller/Router.php" method="POST">
        <table>
            <tr>
                <th colspan="2">
                    <input type="text" placeholder="<?php echo $_COOKIE['logado']; ?>" name="user" id="user">
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
                    <input type="submit" value="Atualizar dados" name="submit" class="btn">
                </th>
                <th>
                    <button type="button" class="btn" name="meu-perfil" onclick="header('meu-perfil')">Meu Perfil</button>
                </th>
            </tr>
        </table>
    </form>
</body>
</html>