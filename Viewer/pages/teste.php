<?php 

$conn = mysqli_connect("localhost", "root", "", "testes");
$cur = mysqli_query($conn, "SELECT * FROM color");
$fetch = mysqli_fetch_assoc($cur);
$array = explode('/', $fetch['colors']);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            <?= "background: linear-gradient(to left, $array[1], $array[0]);" ?>
        }
    </style>
</head>
<body>
    
</body>
</html>