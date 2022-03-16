<?php

include_once "users.php";

class prod extends users {
    public function postProduct($name, $price, $quantity, $img){
        return mysqli_query($this->conn(), "INSERT INTO products(Name, Price, Quantity, Id_Owner, Img_Product) VALUES('$name', '$price', '$quantity', ".mysqli_fetch_array($this->getUser($_SESSION['logado']))['Id_Person'].", '$img')");
    }
    public function getAll(){
        return mysqli_query($this->conn(), "SELECT * FROM products");
    }
    public function getByOwner(){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Id_Owner = ".mysqli_fetch_array($this->getUser($_SESSION['logado']))['Id_Person']);
    }
    public function getById($Id){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Id_Product = $Id");
    }
    public function getUserOwner($id){
        return mysqli_query($this->conn(), "SELECT U.Name FROM users AS U JOIN products as P ON U.Id_Person = $id");
    }
    public function deleteProduct($Id){
        return mysqli_query($this->conn(), "DELETE FROM products WHERE Id_Product = $Id");
    }
    public function updateProduct($Id, $name, $price, $quantity){
        return mysqli_query($this->conn(), "UPDATE products SET `Name` = '$name', `Price` = '$price', `Quantity` = '$quantity' WHERE `Id_Product` = '$Id'");
    }
}
$prod = new prod;