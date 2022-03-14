<?php

include_once "conn.php";

class prod extends conn {
    public function post($name, $price, $quantity, $owner){
        return mysqli_query($this->conn(), "INSERT INTO products(Name, Price, Quantity, Id_Owner) VALUES('$name', '$price', '$quantity', '$owner')");
    }
    public function getAll(){
        return mysqli_query($this->conn(), "SELECT * FROM products");
    }
    public function getByOwner($Id){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Id_Owner = $Id");
    }
    public function getById($Id){
        return mysqli_query($this->conn(), "SELECT * FROM products WHERE Id_Product = $Id");
    }
    public function delete($Id){
        return mysqli_query($this->conn(), "DELETE FROM products WHERE Id_Product = $Id");
    }
    public function update($Id, $name, $price, $quantity){
        return mysqli_query($this->conn(), "UPDATE FROM products SET `Name` = $name, `Price` = $price, `Quantity` = $quantity WHERE `Id_Product` = $Id");
    }
}
$prod = new prod;