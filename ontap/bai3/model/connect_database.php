<?php
class Connect
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'php07_ontap');
        return $this->conn;
    }
    public function __construct()
    {
        $this->connect();
    }
}
?>