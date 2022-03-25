<?php 

include_once $_SERVER['DOCUMENT_ROOT']."/Model/users.php";

$cur = $users->getUserByName('Kauã');
$fetch = mysqli_fetch_assoc($cur);

echo $fetch['Password'];