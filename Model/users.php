<?php
include_once "conn.php";

class users extends conn {
    public function postUser($user, $pass){
        return mysqli_query($this->conn(), "INSERT INTO users(Name, Password) VALUES ('$user', '$pass')");
    }
    public function getAllUsers(){
        return mysqli_query($this->conn(), "SELECT * FROM users");
    }
    public function getUserByName($user){
        return mysqli_query($this->conn(), "SELECT * FROM users WHERE Name = '$user'");
    }
    public function getUserById($id){
        return mysqli_query($this->conn(), "SELECT * FROM users WHERE Id_Person = $id");
    }
    public function getUserBySearch($query){
        return mysqli_query($this->conn(), "SELECT * FROM users WHERE Name LIKE '%$query%'");
    }
    public function getUserProdOwner($id){
        return mysqli_query($this->conn(), "SELECT U.Name FROM users AS U JOIN products as P ON U.Id_Person = $id");
    }
    public function updateUser($userCurr, $userNew, $passNew){
        return mysqli_query($this->conn(), "UPDATE `users` SET `Name` = '$userNew', `Password` = '$passNew' WHERE `Name` = '$userCurr'");
    }
    public function updateUserColor($color){
        return mysqli_query($this->conn(), "UPDATE users SET Colors = '$color' WHERE Id_Person = ".mysqli_fetch_assoc($this->getUserByName($_COOKIE['logado']))['Id_Person']);
    }
    public function updateUserLogged($id, $bool){
        return mysqli_query($this->conn(), "UPDATE users SET Logged = $bool WHERE Id_Person = $id");
    }
    public function updateUserCredit($id, $credit){
        return mysqli_query($this->conn(), "UPDATE users SET Credits = $credit WHERE Id_Person = $id");
    }
    public function deleteUser($user){
        return mysqli_query($this->conn(), "DELETE FROM `users` WHERE `Name` = '$user'");
    }
}
$users = new users;