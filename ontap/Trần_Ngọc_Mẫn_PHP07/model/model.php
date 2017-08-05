<?php
require_once "connect_database.php";
class Model extends Connect {
    private function openDb() {
        if (!$this->conn) {
            throw new Exception("Connection to the database server failed!");
        }
    }

    private function closeDb() {
        mysqli_close($this->conn);
    }
    public function getAllCategory() {
        $this->openDb();
        $dbres = mysqli_query($this->conn,"SELECT * FROM categories");

        $category = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $category[] = $obj;
        }
        $this->closeDb();
        return $category;
    }
    public function getProduct($id) {
        $this->openDb();
        $dbId = mysqli_real_escape_string($this->conn,$id);
        $dbres = mysqli_query($this->conn,"SELECT * FROM products WHERE category_id=$dbId");

        $product = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $product[] = $obj;
        }
        $this->closeDb();
        return $product;
    }
    public function getAllProduct($id) {
        $this->openDb();
        $dbId = mysqli_real_escape_string($this->conn,$id);
        $dbres = mysqli_query($this->conn,"SELECT * FROM products WHERE id=$dbId");
        $productDetail = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $productDetail[] = $obj;
        }
        $this->closeDb();
        return $productDetail;
    }



}


?>