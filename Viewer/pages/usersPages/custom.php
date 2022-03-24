<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
$_SESSION['site'] = "Customizar perfil";
include_once "$root/Model/users.php";
$fetch = mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Colors'];
$colors = explode('/', $fetch);

include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../../Viewer/css/usersCss/custom.css">
<style>
    .container-custom {
        background: linear-gradient(to left, <?= $colors[1] ?>, <?= $colors[0] ?>);
    }
</style>
</head>
<body>
<?php 
include_once "$root/Viewer/pages/partials/header.php";
?>
<form action="../../Controller/Router.php" method="POST">
    <main>
        <section class="container-color_custom">
            <section class="container-btns">
                <input type="color" onchange="color()" value="<?= $colors[0] ?>" id="color1" name="color1">
                <input type="color" onchange="color()" value="<?= $colors[1] ?>" id="color2" name="color2">
            </section>
            <div class="container-custom" id="container-custom" onmouseover="applycolors()" onmouseout="defaultcolor()">
                <div class="container-header"></div>
                <div class="container-main"></div>
            </div>
        </section>
        <section class="container-btn_action">
            <input type="submit" value="Meu Perfil" name="meu-perfil" class="btn">
            <input type="submit" value="Aplicar" name="custom-save" class="btn">
        </section>    
    </main>
</form>
<script>
    function color(){
        let color1 = window.document.getElementById('color1').value;
        let color2 = window.document.getElementById('color2').value;
        //console.log(color);
        window.document.getElementById('container-custom').style = "background: linear-gradient(to left, "+color2+", "+color1+")";
    }
    function applycolors(){
        let color1 = window.document.getElementById('color1').value;
        let color2 = window.document.getElementById('color2').value;
        //console.log(color);
        window.document.getElementsByTagName('body')[0].style = "background: linear-gradient(to left, "+color2+", "+color1+")";
    }
    function defaultcolor(){
        window.document.getElementsByTagName('body')[0].style = "background: linear-gradient(to left, <?= $colors[1] ?>, <?= $colors[0] ?>)";
    }
</script>
</body>
</html>