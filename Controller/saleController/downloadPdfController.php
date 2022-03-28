<?php
$root = $_SERVER['DOCUMENT_ROOT'];

require "$root/vendor/autoload.php";
include_once "$root/Model/sales.php";
use Dompdf\Dompdf;
$fetch = mysqli_fetch_assoc($sales->getSaleById($_POST['id-sale']));
$nomeComprador = mysqli_fetch_assoc($users->getUserById($fetch['Id_Buyer']))['Name'];
$nomeVendedor = mysqli_fetch_assoc($users->getUserById($fetch['Id_Seller']))['Name'];
$idComprador = $fetch['Id_Buyer'];
$idVendedor = $fetch['Id_Seller'];
$preço = $fetch['Price'];
$quantity = $fetch['Quantity'];
$nomeProduto = $fetch['Name_Product'];
$dompdf = new Dompdf();

$dompdf->loadHtml("
<html>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <style>
    body {
        text-align: center;
    }
    table {
        padding-bottom: 30px;
        border-bottom: 2px solid rgba(0, 0, 0, .2);
        margin-right: auto;
        margin-left: auto;
        width: 80%;
    }
    th {
        text-align: right;
        width: 100%;
    }
    th::after {
        content: ':';
    }
    td {
        text-align: baseline;
        width: 100%;
        text-decoration: underline;
        padding-left: 10px
    }
    td, th {
        padding-top: 20px;
    }
    table, td, th {
        height: 25px;
        font-size: 15pt;
    }
    main {
        border: 2px solid black;
        border-radius: 10px;
        padding-bottom: 40px;
        background: rgba(0, 0, 0, .7);
        font-family: sans-serif;
        color: white;
    }
    h1 {
        font-style: italic;
    }
    main :last-child {
        border: none;
        padding-bottom: 0px;
    }
    </style>
</head>
<body>
    <main>
    <h1>Informações sobre o comprador</h1>
    <table>
        <tr>
            <th>Nome</th>
            <td>$nomeComprador</td>
        </tr>
        <tr>
            <th>Id</th>
            <td>$idComprador</td>
        </tr>
    </table>
    <h1>Informações sobre o vendedor</h1>
    <table>
        <tr>
            <th>Nome</th>
            <td>$nomeVendedor</td>
        </tr>
        <tr>
            <th>Id</th>
            <td>$idVendedor</td>
        </tr>
    </table>
    <h1>Informações sobre o Produto</h1>
    <table>
        <tr>
            <th>Preço</th>
            <td>$preço</td>
        </tr>
        <tr>
            <th>Quantidade</th>
            <td>$quantity</td>
        </tr>
        <tr>
            <th>Nome</th>
            <td>$nomeProduto</td>
        </tr>
    </table>
    </main>
</body>
</html>
");

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$nomepdf = "nota-fiscal-".$nomeComprador."-".$fetch['Name_Product']."-".uniqid().".pdf";
$dompdf->stream($nomepdf, array("Attachment" => true));
?>