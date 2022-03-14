<?php
include_once "conn.php";

class users extends conn {
    public function post($user, $pass){
        return mysqli_query($this->conn(), "INSERT INTO users(Name, Password) VALUES ('$user', '$pass')");
    }
    public function get($user){
        return mysqli_query($this->conn(), "SELECT * FROM `users` WHERE `Name` = '$user'");
    }
    public function update($userCurr, $userNew, $passNew){
        return mysqli_query($this->conn(), "UPDATE `users` SET `Name` = '$userNew', `Password` = '$passNew' WHERE `Name` = '$userCurr'");
    }
    public function delete($user){
        return mysqli_query($this->conn(), "DELETE FROM `users` WHERE `Name` = '$user'");
    }
}
$users = new users;