<?php
$root = $_SERVER['DOCUMENT_ROOT'];

if(empty($_SESSION['array-query']['query'])){
    unset($_SESSION['array-query']['query']);
    unset($_SESSION['array-query']['filter']);
    $_SESSION['message'] = "Campo de pesquisa vazio";
} else {
    $query = $_SESSION['array-query']['query'];
    $filter = $_SESSION['array-query']['filter'];
    if($filter == "product"){
        if(mysqli_num_rows($prod->getProdBySearch($query)) <= 0){
            echo "<h3 class='error'>Nenhum resultado encontrado</h3>";
        } else {
            $cur = $prod->getProdBySearch($query);
            $search = mysqli_fetch_assoc($cur);
            do {
                echo "<script>let produto".$search['Id_Product']." = 'produto/".$search['Id_Product']."';</script>
            <div class='container-products' onclick='header(produto".$search['Id_Product'].")'>
            <div class='img-produto'><img src='".$search['Img_Product']."'></div>
            <table class='container-product-infos'>
            <tr><th>". $search['Name'] ."</th></tr>
            <tr><th>R$ ". $search['Price'] ."</th></tr>
            <tr><th style='font-size: 10pt'>Anunciante: ". mysqli_fetch_array($prod->getUserProdOwner($search['Id_Owner']))['Name'] ."</th></tr>
            </table>
            </div>";
            } while($search = mysqli_fetch_assoc($cur)); 
        }
    } else {
        if(mysqli_num_rows($users->getUserBySearch($query)) <= 0){
            echo "<h3 class='error'>Nenhum resultado encontrado</h3>";
        } else {
            //echo "Filtro usuário";
            $cur = $users->getUserBySearch($query);
            $fetch = mysqli_fetch_assoc($cur);                            
            do {
                $anuncios = mysqli_num_rows($prod->getProdByOwner($fetch['Id_Person']));
                echo "
                <script>
                let perfil".$fetch['Id_Person']." = 'perfil/".$fetch['Id_Person']."';
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
