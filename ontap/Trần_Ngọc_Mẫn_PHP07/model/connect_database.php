<?php
class Connect
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'computer_shop');
        return $this->conn;
    }
    public function __construct()
    {
        $this->connect();
    }
}
?>