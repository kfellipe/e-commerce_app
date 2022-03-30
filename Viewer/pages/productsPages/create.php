<?php 

include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";

?>
<link rel="stylesheet" href="../Viewer/css/productsCss/create.css">
</head>
<body>
<?php include_once "$root/Viewer/pages/partials/header.php"; ?>
    <form action="../Controller/Router.php" enctype="multipart/form-data" method="POST">
    <main>
            <table>
                <tr><th> <input type="text" name="name" placeholder="Nome do item"> </th></tr>
                <tr><th> <input type="text" name="price" placeholder="Preço do item"> </th></tr>
                <tr><th> <input type="text" name="quantity" placeholder="Quantidade do estoque"> </th></tr>
                <tr><th>
                    <input type="submit" name="submit" value="Cadastrar produto" class="btn">
                    <button type="button" class="btn" name="meus-anuncios" onclick="header('meus-anuncios')">Meus Anuncios</button>
                </th></tr>
            </table>
            <section class="img-upload">
                <div class="img-preview"><img id="preview" src=""><span id="preview-text">Preview da imagem</span></div>
                <label for="arquivo" id="btn-upload" class="btn-upload">Selecione uma foto</label>    
                <input type="file" accept="image/png image/jpeg image/jpg image/webm" id="arquivo" name="arquivo">
            </section>
    </main>
    </form>
    <script src="../Viewer/js/preview.js"></script>
</body>
</html>