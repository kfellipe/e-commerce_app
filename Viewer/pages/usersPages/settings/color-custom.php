<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/users.php";

$cur = $users->getUserByName($_COOKIE['logado']);
$fetch = mysqli_fetch_assoc($cur);

$colors = explode("/", $fetch['Back_Colors']);
?>
<html>
<head>
<link rel="stylesheet" href="/Viewer/css/default.css">
<link rel="stylesheet" href="/Viewer/css/usersCss/settings/color-custom.css">
</head>
<body>
    <main>
        <section class="container-color">
        <section class="container-btns">
            <form target="_parent" action="/Controller/Router.php" method="POST">
                <input type="submit" value="Aplicar" name="submit" class="btn">
            
            </section>
            <table>
                <tr>
                    <th>
                        <input type="color" value="<?= $fetch['Pred_Color'] ?>" name="pred-color" id="pred-color">
                    </th>
                </tr>
                <tr>
                    <th>
                        <input type="color" value="<?= $colors[0] ?>" name="color-left" id="color-left">
                        <input type="color" value="<?= $colors[1] ?>" name="color-right" id="color-right">
                    </th>
                </tr>
            </table>
            <div class="container-color_preview" style="background-image: linear-gradient(to right, <?= $colors[0] ?>, <?= $colors[1] ?>)">
                <div class="preview-header">
                    <div class="content-sim"></div>
                </div>
                <div class="preview-main">
                    <div class="img-profile" style="background-image: radial-gradient(<?= $fetch['Pred_Color'] ?> 25%, rgba(0, 0, 0, 0) 70%">
                        <span class="letter">K</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </form>
    <script src="/Viewer/js/settings/color-custom.js"></script>
</body>
</html>