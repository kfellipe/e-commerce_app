<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/products.php";
$_SESSION['site'] = "Atualizar Produto";
include_once "$root/Viewer/pages/partials/head.html";
$id = $_GET['id'];
$_SESSION['id-produto'] = $id;
$cur = mysqli_fetch_array($prod->getById($id));

?>
<link rel="stylesheet" href="/Viewer/css/productsCss/update.css">
</head>
<body>
<?php 
include_once "$root/Viewer/pages/partials/headerLogado.html"; 
if(isset($_SESSION['message'])){
    echo "<div class='popup'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}

?>
<main>
    <form action="../Controller/Router.php" method="POST">
        <table>
            <tr><th><input type="text" name="name" placeholder="<?= $cur['Name']?>"></th></tr>
            <tr><th><input type="text" name="price" placeholder="<?= $cur['Price'] ?>"></th></tr>
            <tr><th><input type="text" name="quantity" placeholder="<?= $cur['Quantity'] ?>"></th></tr>
            <tr><th colspan="2">
                <div class="btns">
            <input type="submit" value="Atualizar" name="sub-update-product" class="btn">
            <input type="submit" value="Voltar" name="meus-anuncios" class="btn"></div></th></tr>
        </table>
    </form>
</main>
</body>
</html>