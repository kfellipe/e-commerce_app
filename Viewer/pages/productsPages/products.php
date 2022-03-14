<?php 
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/users.php";
include_once "$root/Model/products.php";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";

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
        <form action="../Controller/Router.php" method="POST">
        <section class="container-main-products">
<?php
$id = mysqli_fetch_array($users->get($_SESSION['logado']))['Id_Person'];
for($count = 0; $count < mysqli_num_rows($prod->getByOwner(mysqli_fetch_array($users->get($_SESSION['logado']))['Id_Person'])); $count++){
    echo "<table class='container-products'>
        <tr><th>Nome:". mysqli_fetch_array($prod->getByOwner($id))['Name'] ."</th></tr>
        <tr><th>Preço:". mysqli_fetch_array($prod->getByOwner($id))['Price'] ."</th></tr>
        <tr><th>Quantidade:". mysqli_fetch_array($prod->getByOwner($id))['Quantity'] ."</th></tr>
    </table>"; } 

    echo "<button type='submit' class='container-products' name='create-product'><img src='../Viewer/pages/img/add-icon.png' width='75px' height='75px'></button>";
?>
        </section>
        
        </form>
    </main>
</body>