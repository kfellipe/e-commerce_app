<?php 
session_start();
$_SESSION['site'] = "Meus Anuncios";
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/users.php";
include_once "$root/Model/products.php";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
$cur = $prod->getProdByOwner();
$fetch = mysqli_fetch_assoc($cur);
$num = mysqli_num_rows($cur);

?>
<link rel="stylesheet" href="Viewer/css/productsCss/products.css">
</head>
<body>
<?php 

if(isset($_SESSION['message'])){
    echo "<div class='popup'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}

include_once "$root/Viewer/pages/partials/headerLogado.html"; ?>
    <main>
        <section class="container-main-products">
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