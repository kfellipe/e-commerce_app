<?php 

include_once "$root/Model/sales.php";
$fetch = mysqli_fetch_assoc($prod->getProdById($url[1]));
if($fetch['Id_Owner'] == mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Id_Person'] || !isset($_SESSION['logado'])){
    header("Location: ../../");
}
if($quantity = 0) {
    header("Location: ../../");
}
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/productsCss/buy.css">
</head>
<body>
    <?php 
    include_once "$root/Viewer/pages/partials/header.php";
    ?>
    <main>
        <section class="container-product_info">
            <div class="title">
                <h2>Confirmar compra</h2>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <th>Nome: </th><td><?= $fetch['Name'] ?></td>
                    </tr>
                    <tr>
                        <th>Vendedor: </th><td><a href="../../perfil/<?= $fetch['Id_Owner'] ?>"><?= mysqli_fetch_assoc($users->getUserById($fetch['Id_Owner']))['Name'] ?></a></td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="container-buy_info">
            <div class="title">
                <h2>Informações da compra</h2>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <th>Preço Unidade</th>
                        <th>Quantidade</th>
                        <th>Total a pagar</th>
                        <th>Creditos na conta</th>
                    </tr>
                    <?php 
                    $priceUnit = $fetch['Price'];
                    $quantity = $_SESSION['quantity'];
                    $priceTot = $priceUnit * $quantity;
                    ?>
                    <tr>
                        <td><?= $priceUnit ?></td>
                        <td><?= $quantity ?></td>
                        <td><?= $priceTot ?></td>
                        <?php 
                        if(mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits'] - $priceTot < 0){
                            echo "<td><span style='color: red;'>".mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits']."</span>(".mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits']." - ".$priceTot." = ".mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits'] - $priceTot.")</td>";
                        } else {
                            echo "<td><span style='color: green;'>".mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits']."</span>(".mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits']." - ".$priceTot." = ".mysqli_fetch_assoc($users->getUserByName($_SESSION['logado']))['Credits'] - $priceTot.")</td>";
                        }
                        ?>
                    </tr>
                </table>
                <a href="../../produto/<?= $fetch['Id_Product'] ?>">Editar informações</a>
            </div>
        </section>
        <section class="btns-action">
            <form action="../../Controller/Router.php" method="POST">
                <input type="hidden" name="id-product" value="<?= $fetch['Id_Product'] ?>">
                <input type="submit" value="Confirmar" name="sub-buy" class="btn">
                <input type="submit" value="Cancelar" name="product" class="btn">
            </form>
        </section>
    </main>
    
</body>
</html>