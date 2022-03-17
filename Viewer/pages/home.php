<?php 
session_start();
$caracteres_sem_acento = array(
    'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
    'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
    'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 
    'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
    'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
    'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 
    'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f', 'Ú'=>'U', 'ù'=>'u',
    'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
    );
$_SESSION['site'] = "Home";
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/products.php";
include_once "$root/Model/users.php";
include_once "$root/Viewer/pages/partials/head.html";
$cur = $prod->getProdAll();
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
        <section class="container-main_header">
            <form action="../Controller/Router.php" method="POST">
                <input type="search" name="query" placeholder="Pesquisar">
                <label for="filter">Filtro: </label>
                <select class="select" name="filter" id="filter">
                    <option name="filter-product" class="option" value="product">Produto</option>
                    <option class="option" name="filter-user" value="user">Usuário</option>
                </select>
            </form>
            <?php if(isset($_SESSION['query'])){
                echo "<h3>Exibindo resultados relacionados à '".$_SESSION['query']."'</h3>";
            } ?>
        </section>
        <section class="container-main-products">
            <?php 
                if(isset($_SESSION['query'])){
                    if($_SESSION['filter'] == "product"){
                        if(!mysqli_num_rows($prod->getProdBySearch($_SESSION['query'])) <= 0){
                            echo "Nenhum resultado encontrado";
                        } else {
                            $cur = $prod->getProdBySearch($_SESSION['query']);
                            $search = mysqli_fetch_assoc($cur);
                            do {
                                echo "
                            <div class='container-products' onclick='product(".$search['Id_Product'].")'>
                            <div class='img-produto'><img src='".$search['Img_Product']."'></div>
                            <table class='container-product-infos'>
                            <tr><th>". $search['Name'] ."</th></tr>
                            <tr><th>R$ ". $search['Price'] ."</th></tr>
                            <tr><th style='font-size: 10pt'>Anunciante: ". mysqli_fetch_array($prod->getProdUserOwner($search['Id_Owner']))['Name'] ."</th></tr>
                            </table>
                            </div>";
                            } while($search = mysqli_fetch_assoc($cur)); 
                        }
                    } else {
                        if(!mysqli_num_rows($users->getUserBySearch($_SESSION['query'])) <= 0){
                            echo "Nenhum resultado encontrado";
                        } else {
                            echo "Filtro usuário";
                            $cur = $users->getUserBySearch($_SESSION['query']);
                            $fetch = mysqli_fetch_assoc($cur);
                            $urlName = strtr($fetch['Name'], $caracteres_sem_acento);
                            $anuncios = mysqli_num_rows($prod->getProdByOwner($fetch['Id_Person']));
                            do {
                                echo "
                            <div class='container-products' onclick='perfil($urlName)'>
                            <div class='img-produto'><img src='https://img.icons8.com/ios-glyphs/30/000000/user--v1.png'></div>
                            <table class='container-product-infos'>
                            <tr><th>". $fetch['Name'] ."</th></tr>
                            <tr><th>Anuncios: $anuncios</th></tr>
                            </table>
                            </div>";
                            } while($fetch = mysqli_fetch_assoc($cur)); 
                        }
                    }
                } else {
                    if($num > 0){
                        do {
                            echo "
                        <div class='container-products' onclick='product(".$fetch['Id_Product'].")'>
                        <div class='img-produto'><img src='".$fetch['Img_Product']."'></div>
                        <table class='container-product-infos'>
                        <tr><th>". $fetch['Name'] ."</th></tr>
                        <tr><th>R$ ". $fetch['Price'] ."</th></tr>
                        <tr><th style='font-size: 10pt'>Anunciante: ". mysqli_fetch_array($prod->getProdUserOwner($fetch['Id_Owner']))['Name'] ."</th></tr>
                        </table>
                        </div>";
                        } while($fetch = mysqli_fetch_assoc($cur));
                    }
                }
            ?>
        </section>
    </main>
    <script>
        function product(x){
            location.href = "../produto/"+x;
        }
        function perfil(x){
            location.href = "../perfil/"+x;
        }
    </script>
</body>
</html>