<?php 

$_SESSION['site'] = "Meus Anuncios";

include_once "$root/Model/products.php";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";

$cur = $prod->getProdByOwner(mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person']);
$fetch = mysqli_fetch_assoc($cur);
$num = mysqli_num_rows($cur);

?>
<link rel="stylesheet" href="Viewer/css/productsCss/home.css">
<link rel="stylesheet" href="Viewer/css/productsCss/myproducts.css">
</head>
<body>
<?php 

if(isset($_SESSION['message'])){
    echo "<div class='popup'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}

include_once "$root/Viewer/pages/partials/header.php"; ?>
    <main>
        <section class="container-main_products">
<?php
    if($num > 0){
        do {
            echo "
                    <div class='container-products' onclick='update_product(".$fetch['Id_Product'].")'>
                    <div class='img-produto'><img src='".$fetch['Img_Product']."'></div>
                    <table onclick='product(".$fetch['Id_Product'].")' class='container-product-infos'>
                    <tr><th>Nome: ". $fetch['Name'] ."</th></tr>
                    <tr><th>Preço: R$ ". $fetch['Price'] ."</th></tr>
                    <tr><th>Estoque: ". $fetch['Quantity'] ."</th></tr>
                    </table>
                    </div>";
        } while($fetch = mysqli_fetch_assoc($cur));
    }
?>
        <form action="../Controller/Router.php" method="POST">
            <button type='submit' class='container-products' name='create-product'>
                <img src='../Viewer/img/add-icon.png' width='75px' height='75px'>
            </button>
        </section>
        </form>
    </main>
    <script>
        function update_product(id){
            location.href = "../atualizar-produto/"+id;
        }
    </script>
</body>
</html>