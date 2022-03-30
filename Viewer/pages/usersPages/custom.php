<?php

$_SESSION['site'] = "Customizar perfil";
include_once "$root/Model/users.php";
$fetch = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']));
$predColor = $fetch['Pred_Color'];
$backColors = explode('/', $fetch['Back_Colors']);
$letter = str_split($fetch['Name'])[0];
$letter = strtoupper($letter);

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
            <h1>Cor predominante</h1>
            <section class="container-pred_color">
                <input type="color" onchange="color()" name="pred-color" value="<?= $predColor ?>" id="pred-color">
            </section>
            <h1>Cor de fundo</h1>
            <section class="container-btns">
                <input type="color" onchange="color()" value="<?= $backColors[0] ?>" id="color1" name="color1">
                <input type="color" onchange="color()" value="<?= $backColors[1] ?>" id="color2" name="color2">
            </section>
            <div class="container-custom" id="container-custom" onmouseover="applycolors()" onmouseout="defaultcolor()">
                <div class="container-header">
                    <span>Passe o mouse ou clique para Previsualizar</span>
                </div>
                <div class="container-main">
                    <div id="letter" class="letter" style="background-image: radial-gradient(<?= $fetch['Pred_Color'] ?> 35%, rgba(0, 0, 0, 0)70%);"><?= $letter ?></div>
                </div>
            </div>
        </section>
        <section class="container-btn_action">
            <button type="button" name="meu-perfil" onclick="header('meu-perfil')" class="btn">Meu Perfil</button>
            <input type="submit" value="Aplicar" name="submit" class="btn">
        </section>    
    </main>
</form>
<script>
    function color(){
        let color1 = window.document.getElementById('color1').value;
        let color2 = window.document.getElementById('color2').value;
        let color3 = window.document.getElementById('pred-color').value;
        //console.log(color);
        window.document.getElementById('container-custom').style = "background: linear-gradient(to left, "+color2+", "+color1+")";
        window.document.getElementById('letter').style = "background-image: radial-gradient("+color3+" 35%, rgba(0, 0, 0, 0)70%)";
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