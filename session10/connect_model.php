<?php
class ConectModel {
    public $conn;
    public function connect(){
        $this ->conn = new mysqli("localhost", "root", "", "php07_users");
        return $this ->conn;
    }
    public function __construct()
    {
        $this ->connect();
    }
}
?>