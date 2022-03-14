<?php

include_once "conn.php";
include_once "users.php";

class prod extends conn {
    public function post($name, $price, $quantity, $owner){
        return mysqli_query($this->conn(), "INSERT INTO products(Name, Price, Quantity, Id_Owner) VALUES('$name', '$price', '$quantity', '$owner')");
    }
    public function get($owner, $idproduct){
        if ($owner >=  0){
            return mysqli_query($this->conn(), "SELECT * FROM products WHERE `Id_Product` = '$owner'");
        } elseif ($idproduct >= 0) {
            return mysqli_query($this->conn(), "SELECT * FROM products WHERE `Id_Product` = '$idproduct'");
        } else {
            return mysqli_query($this->conn(), "SELECT * FROM products");
        }
    }
    public function delete(){

    }
    public function update(){

    }
}
$prod = new prod;