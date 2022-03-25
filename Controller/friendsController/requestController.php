<?php 
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
include_once "$root/Model/friends.php";
$idReceiver = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
$idSender = $_POST['id-user'];
if(isset($_POST['accept-friend-request'])){
    include_once "acceptController.php";
} elseif(isset($_POST['reject-friend-request'])){
    include_once "rejectController.php";
} elseif(isset($_POST['sent-friend-request'])) {
    include_once "postController.php";
} elseif(isset($_POST['delete-friend'])){
    include_once "deleteController.php";
} else {
    include_once "cancelController.php";
}