<?php
session_start();

include_once "$root/Model/users.php";

if(isset($_POST['check-1-per-time'])){
    $users->updateUserSaveLogin(1);
} else {
    $users->updateUserSaveLogin(0);
}
$_SESSION['message'] = "Configurações salvas!";
header("location: ../");