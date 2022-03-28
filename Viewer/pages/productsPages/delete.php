<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Controller/validateController.php";
include_once "$root/Model/products.php";
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="../Viewer/css/productsCss/delete.css">
</head>
<body>
<?php 
include_once "$root/Viewer/pages/partials/header.php";
?>

<main>
    <h1>deletar produto</h1>    
    <form action="../../Controller/Router.php" method="POST">
        <div class="btns">
            <input type="submit" class="btn" name="submit" value="Deletar produto">
            <button class="btn" type="button" onclick="header('meus-anuncios')" name="meu-perfil">Meus Anuncios</button>
        </div>
    </form>
</main>
</body>
</html>