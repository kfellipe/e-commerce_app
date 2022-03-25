<?php 

include_once "$root/Controller/validateController.php";
include_once "$root/Model/products.php";
$_SESSION['site'] = "Atualizar Produto";
$id = $url[1];
$_SESSION['id-produto'] = $id;
$cur = mysqli_fetch_array($prod->getProdById($id));
if(mysqli_num_rows($prod->getProdById($id)) <= 0){
    $_SESSION['message'] = "Produto não encontrado";
    header("Location: ../meus-anuncios");
}
include_once "$root/Viewer/pages/partials/head.html";

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
            <tr>
                <th><input type="text" name="name" placeholder="<?= $cur['Name']?>"></th>
            </tr>
            <tr><th><input type="text" name="price" placeholder="<?= $cur['Price'] ?>"></th></tr>
            <tr><th><input type="text" name="quantity" placeholder="<?= $cur['Quantity'] ?>"></th></tr>
            <tr><th colspan="2">
                <div class="btns">
                    <input type="submit" value="Atualizar" name="sub-update-product" class="btn">
                    <input type="submit" value="Voltar" name="meus-anuncios" class="btn">
                </div></th></tr>
                <tr><th colspan="2">
                <input type="submit" name="delete-product" value="Deletar" class="btn">
            </th></tr>
            </form>
        </table>
    </main>
</body>
</html>