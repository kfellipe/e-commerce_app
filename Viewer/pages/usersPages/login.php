<?php 
$_SESSION['site'] = "Logar";
if(isset($_COOKIE['logado'])){
    setcookie('logado', '', time()-(1), "/");
}
include_once $_SERVER['DOCUMENT_ROOT']."/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/login.css">
</head>
<body>
    <?php
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<div class='popup'>$message</div>";
        }
    ?>
    <main>
        <form action="../../Controller/Router.php" method="POST">
        <table>
            <tr><th colspan="2"> 
                <input type="text" placeholder="Usuário" name="Username" id="Username">
            </tr></th>
            <tr><th colspan="2">
            <input type="password" placeholder="Senha" name="Password" id="Password">
            </tr></th>
            <tr><th>     
                <input type="submit" value="Logar" name="submit" class="btn" id="login">
                <button type="button" class="btn" name="registrar" onclick="header('cadastrar-usuario')">Registrar</button>
            </th>
            </tr><tr>
            <th colspan="2">
                <button onclick="header('home')" type="button" name="home" class="btn">Home</button>
            </th></tr>
            <tr><th colspan="2"><input type="checkbox" class="check" name="remember" id="remember" class="check-label"><label for="remember">Lembrar de mim</label></th></tr>
            </table>    
        </form>
        <div class="logo">
            <img  width="auto" height="100%" src="../../Viewer/img/github.png" alt="">
        </div>
    </main>
</body>
</html>