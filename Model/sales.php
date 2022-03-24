<?php

include_once "products.php";

class sales extends prod {

    public function postSale($buyer, $seller, $quantity, $price, $name){
        return mysqli_query($this->conn(),"INSERT INTO sales(Id_Buyer, Id_Seller, Quantity, Price, Name_Product) VALUES($buyer, $seller, $quantity, $price, '$name')");
    }
    public function getSaleByMember($id){
        return mysqli_query($this->conn(), "SELECT * FROM sales WHERE Id_Buyer = $id OR Id_Seller = $id");
    }
    public function getSaleById($id){
        return mysqli_query($this->conn(), "SELECT * FROM sales WHERE Id_Sale = $id");
    }
    public function updateSale(){

    }
    public function deleteSaleByOwner($id){
        return mysqli_query($this->conn(), "DELETE FROM sales WHERE Id_Buyer = $id OR Id_Seller = $id");
    }
    public function deleteSale($id){
        return mysqli_query($this->conn(), "DELETE FROM sales WHERE Id_Sale = $id");
    }
}
$sales = new sales();