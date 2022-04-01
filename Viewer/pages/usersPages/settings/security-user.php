<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/users.php";
$fetch = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/Viewer/css/default.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Viewer/css/usersCss/settings/security-user.css">
</head>
<body>  
<main>
    <form action="/Controller/Router.php" method="POST" target="_parent">
        <?php  if($fetch['Save_Login'] == 1){
            echo "<input checked='checked' type='checkbox' name='check-1-per-time' id='check-1-per-time'><label for='check-1-per-time'>Logar em um dispositivo por vez</label>";
        } else {
            echo "<input type='checkbox' name='check-1-per-time' id='check-1-per-time'><label for='check-1-per-time'>Logar em um dispositivo por vez</label>";
        } ?>
        
        <input type="submit" value="Salvar configurações" class="btn" name="submit" id="submit">
    </form>

</main>
</body>
</html>