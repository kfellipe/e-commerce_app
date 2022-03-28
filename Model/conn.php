<?php 

require $_SERVER['DOCUMENT_ROOT']."/config.php";

class conn extends config {
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME);
    }
}