<?php
class ConnectModel
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli('localhost', 'root', 'none', 'php07_oop');
        return $this->conn;
    }
    public function __construct()
    {
        $this->connect();
    }
}
