<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Controller/validateController.php";
include_once "$root/Model/products.php";
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="../Viewer/css/productsCss/delete.css">
</head>
<body>
<?php 
include_once "$root/Viewer/pages/partials/headerLogado.html";
?>

<main>
    <h1>deletar produto</h1>    
    <form action="../../Controller/Router.php" method="POST">
        <div class="btns">
            <input type="submit" class="btn" name="sub-delete-product" value="Deletar">
            <input type="submit" class="btn" name="update-product" value="Voltar">
        </div>
    </form>
</main>
</body>
</html>