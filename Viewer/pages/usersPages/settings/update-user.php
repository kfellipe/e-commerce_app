<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

include_once "$root/Model/users.php";

$cur = $users->getUserByName($_COOKIE['logado']);
$fetch = mysqli_fetch_assoc($cur);

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/Viewer/css/default.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Viewer/css/usersCss/settings/update-user.css">
</head>
<body>
<form action="/Controller/Router.php" method="POST" target="_parent">
<main>
    <h1>Atualizar Nome</h1>
        <input type="text" placeholder="<?= $fetch['Name'] ?>" name="user" id="user">
    <h1>Atualizar senha</h1>
    <div class="pass">
        <input type="text" name="new-pass" placeholder="Nova senha(opcional)" id="new-pass">
        <input type="text" name="confirm-pass" placeholder="Confirmar senha" id="confirm-pass">
    </div>
       <input type="submit" value="Atualizar dados" name="submit" class="btn">
</main>
</form>
<script src="/Viewer/js/settings/update-user.js"></script>
</body>
</html>