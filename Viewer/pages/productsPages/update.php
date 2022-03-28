<?php 

include_once "$root/Controller/validateController.php";
include_once "$root/Model/products.php";
$_SESSION['site'] = "Atualizar Produto";
$id = $url[1];
$_SESSION['id-produto'] = $id;
if(mysqli_num_rows($prod->getProdById($id)) <= 0){
    $_SESSION['message'] = "Produto não encontrado";
    header("Location: ../meus-anuncios");
}
include_once "$root/Viewer/pages/partials/head.html";
$cur = mysqli_fetch_assoc($prod->getProdById($id));
?>
<link rel="stylesheet" href="../Viewer/css/productsCss/update.css">
</head>
<body>
<?php 
include_once "$root/Viewer/pages/partials/header.php"; 
if(isset($_SESSION['message'])){
    echo "<div class='popup'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}
?>
<main>
    <form action="../Controller/Router.php" method="POST">
        <table>
            <tr>
                <th><input type="text" name="name" placeholder="<?= $cur['Name'] ?>"></th>
            </tr>
            <tr><th><input type="text" name="price" placeholder="<?= $cur['Price'] ?>"></th></tr>
            <tr><th><input type="text" name="quantity" placeholder="<?= $cur['Quantity'] ?>"></th></tr>
            <tr><th colspan="2">
                <div class="btns">
                    <input type="submit" value="Atualizar produto" name="submit" class="btn">
                    <button type="button" name="meus-anuncios" onclick="header('meus-anuncios')" class="btn">Meus Anuncios</button>
                </div></th></tr>
                <tr><th colspan="2">
                <button type="button" class="btn" onclick="header('deletar-produto')" name="deletar-produto">Deletar</button>
            </th></tr>
            </form>
        </table>
    </main>
</body>
</html>