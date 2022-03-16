<?php 
session_start();

$_SESSION['site'] = "Home";
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/products.php";
include_once "$root/Model/users.php";
include_once "$root/Viewer/pages/partials/head.html";
$cur = $prod->getAll();
$num = mysqli_num_rows($cur);
$fetch = mysqli_fetch_assoc($cur);

?>
<link rel="stylesheet" href="Viewer/css/productsCss/products.css">
</head>
<body>
    <?php if(isset($_SESSION['logado'])){
        include_once "$root/Viewer/pages/partials/headerLogado.html";
    } else  {
        include_once "$root/Viewer/pages/partials/header.html";
    } 
    if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<div class='popup'>$message</div>";
            unset($_SESSION['message']);
        }
    ?>
    <main>
        <section class="container-main-products">
            <?php 
                if($num > 0){
                    do {
                        echo "
                    <div class='container-products' onclick='product(".$fetch['Id_Product'].")'>
                    <div class='img-produto'><img src='".$fetch['Img_Product']."'></div>
                    <table class='container-product-infos'>
                    <tr><th>". $fetch['Name'] ."</th></tr>
                    <tr><th>R$ ". $fetch['Price'] ."</th></tr>
                    <tr><th>Anunciante: ". mysqli_fetch_array($prod->getUserOwner($fetch['Id_Owner']))['Name'] ."</th></tr>
                    </table>
                    </div>";
                    } while($fetch = mysqli_fetch_assoc($cur));
                }
            ?>
        </section>
    </main>
    <script>
        function product(x){
            location.href = "../produto/"+x;
        }
    </script>
</body>
</html>