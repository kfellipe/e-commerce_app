<?php

include_once "$root/Model/sales.php";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/historic.css">
</head>
<body>

    <?php 
    include_once "$root/Viewer/pages/partials/header.php";
    ?>
    <main>
        <?php
        $idLogado = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
        $cur = $sales->getSaleByMember($idLogado);
        $num = mysqli_num_rows($cur);
        $fetch = mysqli_fetch_assoc($cur);
        if($num > 0){
            do {
                echo "<table>
                <tbody>
                    <tr>
                    <th>Comprador</th>
                    <th>Vendedor</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Produto</th>
                    <th>Nota Fiscal</th>
                </tr>
                <tr>
                    <td><a href='../../perfil/".$fetch['Id_Buyer']."'>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Buyer']))['Name']."</a></td>
                    <td><a href='../../perfil/".$fetch['Id_Seller']."'>".mysqli_fetch_assoc($users->getUserByid($fetch['Id_Seller']))['Name']."</a></td>
                    <td>".$fetch['Quantity']."</td>
                    <td>".$fetch['Price']."</td>
                    <td>".$fetch['Name_Product']."</td>
                    <form action='../../Controller/Router.php' method='POST'>
                    <input type='hidden' name='id-sale' value='".$fetch['Id_Sale']."'>
                    <td><input type='submit' name='download-pdf' value='Download' class='download'></td></form>
                </tr>
                </tbody>
            </table>";
            } while($fetch = mysqli_fetch_assoc($cur));
        }
        ?>
    </main>
</body>
</html>
