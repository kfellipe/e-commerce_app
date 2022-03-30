<?php
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/registrar.css">
</head>
<body>
    <table>
        
        <form action="Controller/Router.php" method="POST">
            <tr>
                <th colspan="2">
                <input placeholder="Usuário" type="text" name="username" id="username">
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input placeholder="Senha" type="password" name="password1" id="senha">
                </th>
            </tr>
            <tr>
                <th colspan="2">
                    <input placeholder="Confirmar senha" type="password" name="password2" id="senha">
                </th>
            </tr>
            <tr>
                <th>
                    <input type="submit" value="Registrar" name="submit" class="btn">
                </th>
                <th>
                    <button type="button" class="btn" name="logar" onclick="header('login')">Logar</button>
                </th>
            </tr>
        </form>
    </table>
</body>
</html>