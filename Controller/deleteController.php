<?php
session_start();

include_once "../Model/users.php";

$users->delete($_SESSION['logado']);
session_unset();
$_SESSION['message'] = "Usuário excluido com sucesso!";
header("Location: ../");