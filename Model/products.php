<?php

include_once "users.php";

class prod extends users {
    public function postProduct($name, $price, $quantity, $img){
        return mysqli_query($this->conn(), "INSERT INTO products(Name, Price, Quantity, Id_Owner, Img_Product) VALUES('$name', '$price', '$quantity', ".mysqli_fetch_array($this->getUserByName($_SESSION['logado']))['Id_Person'].", '$img')");
    }
    public function getProdAll(){
        return mysqli_query($this->conn(), "SELECT * FROM products");
    }
    public function getProdByOwner($Id){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Id_Owner = $Id");
    }
    public function getProdById($Id){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Id_Product = $Id");
    }
    public function getProdBySearch($query){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Name LIKE '%$query%'");
    }
    public function deleteProduct($Id){
        return mysqli_query($this->conn(), "DELETE FROM products WHERE Id_Product = $Id");
    }
    public function deleteProdByOwner($id){
        return mysqli_query($this->conn(), "DELETE FROM products WHERE Id_Owner = $id");
    }
    public function updateProduct($Id, $name, $price, $quantity){
        return mysqli_query($this->conn(), "UPDATE products SET `Name` = '$name', `Price` = '$price', `Quantity` = '$quantity' WHERE `Id_Product` = '$Id'");
    }
    public function updateProdQuantity($idProd, $quantity){
        return mysqli_query($this->conn(), "UPDATE products SET Quantity = $quantity WHERE Id_Product = $idProd");
    }
}
$prod = new prod;