<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="../Viewer/css/productsCss/create.css">
</head>
<body>
<?php include_once "$root/Viewer/pages/partials/headerLogado.html"; ?>
    <main>
        <form action="../Controller/Router.php" enctype="multipart/form-data" method="POST">
            <table>
                <tr><th> <input type="text" name="name" placeholder="Nome do item"> </th></tr>
                <tr><th> <input type="text" name="price" placeholder="Preço do item"> </th></tr>
                <tr><th> <input type="text" name="quantity" placeholder="Quantidade do estoque"> </th></tr>
                <tr><th> 
                <label for="selecionar-arquivo" class="btn">Selecione uma foto</label>    
                <input type="file" accept="image/jpg, image/png, image/jpeg" id="selecionar-arquivo" name="arquivo"> </th></tr>
                <tr><th> <input type="submit" name="sub-create-product" value="Cadastrar" class="btn">
                <input name="meus-anuncios" type="submit" value="Meus Anuncios" class="btn"></th></tr>
            </table>
        </form>
    </main>
</body>
</html>