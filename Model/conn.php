<?php 
class conn {
    protected function conn(){
        return mysqli_connect("localhost", "root", "", "db");
    }
}