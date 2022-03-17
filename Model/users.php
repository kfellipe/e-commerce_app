<?php
include_once "conn.php";

class users extends conn {
    public function postUser($user, $pass){
        return mysqli_query($this->conn(), "INSERT INTO users(Name, Password) VALUES ('$user', '$pass')");
    }
    public function getUserByName($user){
        return mysqli_query($this->conn(), "SELECT * FROM `users` WHERE `Name` = '$user'");
    }
    public function getUserById($id){
        return mysqli_query($this->conn(), "SELECT * FROM users WHERE Id_Person = $id");
    }
    public function getUserBySearch($query){
        return mysqli_query($this->conn(), "SELECT * FROM users WHERE Name LIKE '%$query%'");
    }
    public function updateUser($userCurr, $userNew, $passNew){
        return mysqli_query($this->conn(), "UPDATE `users` SET `Name` = '$userNew', `Password` = '$passNew' WHERE `Name` = '$userCurr'");
    }
    public function deleteUser($user){
        return mysqli_query($this->conn(), "DELETE FROM `users` WHERE `Name` = '$user'");
    }
}
$users = new users;