<?php
$root = $_SERVER['DOCUMENT_ROOT'];
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
                <th colspan="2">
                    <div class="btns">
                        <input type="submit" value="Registrar" name="sub-register" class="btn">
                        <input type="submit" value="Logar" name="login" class="btn">
                    </div>
                </th>
            </tr>
            <tr>
                <th>
                    <input type="submit" value="Voltar" name="home" class="btn">
                </th>      
            </tr>
        </form>
    </table>
</body>
</html>