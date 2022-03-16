<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

$Id = $_GET['id'];

include_once "$root/Model/products.php";
include_once "$root/Viewer/pages/partials/head.html";


?>
<link rel="stylesheet" href="../Viewer/css/productsCss/product.css">
</head>
<body>
<?php 

if(isset($_SESSION['logado'])){
    include_once "$root/Viewer/pages/partials/headerLogado.html";
} else {
    include_once "$root/Viewer/pages/partials/header.html";
}

?>

<main>
    <section class="container-item">
        <section class="container-img">
            <img class="img-product" src="<?= mysqli_fetch_array($prod->getById($Id))['Img_Product']; ?>" alt="">
        </section>
        <section class="container-info">
            <div class="container-info_title">
                <h2><?= mysqli_fetch_array($prod->getById($Id))['Name']; ?></h2>
            </div>
            <div class="container-info_price">
                <p><strong>R$ <?= mysqli_fetch_array($prod->getById($Id))['Price']; ?></strong></p>
            </div>
            <div class="container-info_quantity">
                <p>em estoque: <?= mysqli_fetch_array($prod->getById($Id))['Quantity']; ?></p>
            </div>
        </section>
    </section>
</main>

</body>
</html>