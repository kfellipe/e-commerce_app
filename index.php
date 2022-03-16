<?php 
session_start();

$_SESSION['site'] = "Home";
header("Location: /home");