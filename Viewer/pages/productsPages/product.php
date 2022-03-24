<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/products.php";
$_SESSION['site'] = mysqli_fetch_assoc($prod->getProdById($_GET['id-product']))['Name'];
$Id = $_GET['id-product'];
$num = mysqli_num_rows($prod->getProdById($Id));
if($num <= 0){
    $_SESSION['message'] = "Produto não encontrado";
    header("Location: ../home");
}
include_once "$root/Viewer/pages/partials/head.html";


?>
<link rel="stylesheet" href="../Viewer/css/productsCss/product.css">
</head>
<body>
<?php 
include_once "$root/Viewer/pages/partials/header.php";
$fetch = mysqli_fetch_assoc($prod->getProdById($Id));
if(isset($_SESSION['message'])){
    echo "<div class='popup'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}

?>

<main>
    <section class="container-item">
        <section class="container-img">
            <img class="img-product" src="<?= $fetch['Img_Product']; ?>" alt="">
        </section>
        <section class="container-info">
            <div class="container-info_title">
                <h2><?= $fetch['Name']; ?></h2>
            </div>
            <div class="container-info_price">
                <p><strong>R$ <?= $fetch['Price']; ?></strong></p>
            </div>
            <div class="container-info_quantity">
                <p>em estoque: <?= $fetch['Quantity']; ?></p>
            </div>
            <div class="container-info_announcer">
                <h3><a href="../perfil/<?= $fetch['Id_Owner'] ?>"><?= mysqli_fetch_assoc($users->getUserById($fetch['Id_Owner']))['Name'] ?></a></h3>
            </div>
            <form action="../../Controller/Router.php" method="POST">
                <div class="container-buy">
                    <?php 
                    if(isset($_SESSION['logado'])){
                        $idLogado = mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person'];
                        if($fetch['Id_Owner'] == $idLogado){
                            echo "<input type='submit' value='Editar' name='update-product' class='btn'>
                            <input type='hidden' name='id-produto' value='".$fetch['Id_Product']."'";
                        } else {
                            echo "<p>Quantidade:  
                            <input type='number' value='1' max='".$fetch['Quantity']."' min='1' name='quantity' id='quantity'></p>
                            <input type='submit' value='Comprar' class='btn' name='buy'>
                            <input type='hidden' name='id-product' value='".$fetch['Id_Product']."'>";
                        }
                    } else {
                        echo "<input type='submit' value='Logar' name='login' class='btn'>";
                    }
                        ?>
                </div>
            </form>
        </section>
    </section>
</main>

</body>
</html>