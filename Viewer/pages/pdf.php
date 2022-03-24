<?php 
use Dompdf\Dompdf;

$nomeComprador = "Kauã";
$nomeVendedor = "Pedro";
$emailComprador = "kauazeta87@gmail.com";
$emailVendedor = "pedrostevanato@gmail.com";
$valorPago = 25;
$dompdf = new Dompdf();

$dompdf->loadHtml("<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap' rel='stylesheet'>
    <style>
        html {
            background: linear-gradient(90deg,rgb(21, 223, 238), rgb(0, 141, 197));
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 50px;
            border: 2px solid black;
            font-family: 'Kanit', sans-serif;
            padding-bottom: 40px;
            background: rgba(0, 0, 0, .1);
            box-shadow: 2px -2px 10px rgba(0, 0, 0, .5);
            border-radius: 20px;
            overflow: hidden;
        }
        h1 {
            font-style: italic;
        }
        table {
            width: 80%;
            padding: 1px;
            }
        th, td {
            font-size: 15pt;
            width: 50%;
            height: 50px;
            border-bottom: 2px solid transparent;
            border-image: linear-gradient(to right, rgba(0, 0, 0, 0), black, rgba(0, 0, 0, 0));
            border-image-slice: 1;
        }
        td {
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <main>
    <h1>Informações sobre o comprador</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <td>". $nomeComprador ."</td>
            </tr>
        </thead>    
        <tr>
            <th>Email</th>
            <td>". $emailComprador ."</td>
        </tr>
    </table>
    <h1>Informações sobre o vendedor</h1>
    <table>
        <tr>
            <th>Nome</th>
            <td>". $nomeVendedor ."</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>". $emailVendedor ."</td>
        </tr>
    </table>
    <h1>Informaçõe sobre a transação</h1>
    <table>
        <tr>
            <th>Valor pago</th>
            <td>". $valorPago ."</td>
        </tr>
        <tr>
            <th>Valor recebido</th>
            <td>". $valorPago ."</td>
        </tr>
        <tr>
            <th>Descontos</th>
            <td>0%</td>
        </tr>
    </table>
    </main>
</body>
</html>
");

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();
$nomepdf = "nota-fiscal-".$nomeComprador.uniqid().".pdf";
$dompdf->stream($nomepdf);
