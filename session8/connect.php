<?php
$conn = new mysqli("localhost", "root", "", "php07_product");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>