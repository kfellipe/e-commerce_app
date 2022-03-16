<?php
$root = $_SERVER['DOCUMENT_ROOT'];
/*$allowExtensions = ["jpg", "png", "jpeg", "webm"];
if(isset($_POST['submit'])){
    $fileInfos = explode(".", $_FILES['arquivo']['name']);
    if(in_array($fileInfos[1], $allowExtensions)){
        $name = uniqid($fileInfos[0]).".".$fileInfos[1];
        $dir = "$root/Viewer/img/products/".$name;
        var_dump($_FILES['arquivo']);
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir)){
            echo "arquivo movido com sucesso";
        } else {
            echo "Não foi possivel mover o arquivo";
        }
    } else {
        echo "Formato do arquivo nao suportado(".$fileInfos[0].").";
    }
}*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo mysqli_fetch_array(mysqli_query(mysqli_connect("localhost", "root", "", "db"), "SELECT U.Name FROM users AS U INNER JOIN products as P WHERE U.Id_Person = 5"))['Name']; ?>
</body>
</html>