<?php 
$_SESSION['site'] = "Home";

include_once "$root/Model/products.php";
include_once "$root/Model/users.php";
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="Viewer/css/productsCss/home.css">
</head>
<body>
    <?php 
    echo $_COOKIE['logado'];
    include_once "$root/Viewer/pages/partials/header.php";
    if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<div class='popup'>$message</div>";
            unset($_SESSION['message']);
        }
    ?>
    <main>
        <ul></ul>
        <section class="container-main_header">
            <form action="../Controller/Router.php" method="POST">
                <input type="search" name="query" placeholder="Pesquisar">
                <label for="filter">Filtro: </label>
                <select class="select" name="filter" id="filter">
                    <option name="filter-product" class="option" value="product">Produtos</option>
                    <option class="option" name="filter-user" value="user">Usuários</option>
                </select>
            </form>
            <?php 
            {
            $cur = $prod->getProdAll();
            $num = mysqli_num_rows($cur);
            $fetch = mysqli_fetch_assoc($cur);
            if(isset($_SESSION['array-query']['query'])){
                echo "<h3>Exibindo resultados relacionados à '".$_SESSION['array-query']['query']."'</h3>";
            }
?>
        </section>
        <section class="container-main_products">
            <?php 
            if(isset($_SESSION['array-query']['query'])){
                    include_once "$root/Controller/queryController.php";
                    unset($_SESSION['array-query']);
            } else {
                if($num > 0){
                    do {
                        echo "
                        <script>
                        let produto = 'produto/".$fetch['Id_Product']."';
                        </script>
                        <div class='container-products' onclick='header(produto)'>
                        <div class='img-produto'><img src='".$fetch['Img_Product']."'></div>
                        <table class='container-product-infos'>
                        <tr><th>". $fetch['Name'] ."</th></tr>
                        <tr><th>R$ ". $fetch['Price'] ."</th></tr>
                        <tr><th style='font-size: 10pt'>Anunciante: ". mysqli_fetch_array($prod->getUserProdOwner($fetch['Id_Owner']))['Name'] ."</th></tr>
                        </table>
                        </div>";
                        } while($fetch = mysqli_fetch_assoc($cur));
                    }
                }
            }
            ?>
        </section>
        <section class="container-main_users">
            <?php 
                {
                    $cur = $users->getAllUsers();
                    $num = mysqli_num_rows($cur);
                    $fetch = mysqli_fetch_assoc($cur);
                    if($num > 0){
                        if(isset($_COOKIE['logado'])){
                            do {                
                                if($fetch['Id_Person'] != mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person']){
                                    $anuncios = mysqli_num_rows($prod->getProdByOwner($fetch['Id_Person']));
                                    echo "
                                    <script>
                                    let perfil".$fetch['Id_Person']." = 'perfil".$fetch['Id_Person']."/".$fetch['Id_Person']."';
                                    </script>
                                    <div class='container-products' onclick='header(perfil)'>
                                    <div class='img-produto'><img src='https://img.icons8.com/ios-glyphs/30/000000/user--v1.png'></div>
                                    <table class='container-product-infos'>
                                    <tr><th>". $fetch['Name'] ."</th></tr>
                                    <tr><th>Anuncios: $anuncios</th></tr>
                                    </table>
                                    </div>";
                                    }
                            } while($fetch = mysqli_fetch_assoc($cur));
                        } else {
                            do {                
                                $anuncios = mysqli_num_rows($prod->getProdByOwner($fetch['Id_Person']));
                                echo "
                                <script>
                                let perfil".$fetch['Id_Person']." = 'perfil".$fetch['Id_Person']."/".$fetch['Id_Person']."';
                                console.log(perfil);
                                </script>
                                <div class='container-products' onclick='header(perfil".$fetch['Id_Person'].")'>
                                <div class='img-produto'><img src='https://img.icons8.com/ios-glyphs/30/000000/user--v1.png'></div>
                                <table class='container-product-infos'>
                                <tr><th>". $fetch['Name'] ."</th></tr>
                                <tr><th>Anuncios: $anuncios</th></tr>
                                </table>
                                </div>";
                            } while($fetch = mysqli_fetch_assoc($cur));
                        }
                    }
                }
            ?>
        </section>
    </main>
</body>
</html>