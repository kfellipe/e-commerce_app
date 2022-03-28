<?php

include_once "$root/Model/users.php";
$predColor = $_POST['pred-color'];
$color1 = $_POST['color1'];
$color2 = $_POST['color2'];

$users->updateUserColor($color1."/".$color2, $predColor);
$_SESSION['message'] = "Cor alterada!";
header("Location: ../../home");