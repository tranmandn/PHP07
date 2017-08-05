<?php
require "connect.php";
session_start();
if(isset($_SESSION['login']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "Select * from fruit where id = $id";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
    echo "Congratulations" . $_SESSION['login']['email'] . "<br>" . $name . " already in cart<br><a href='bai2.php'>Back to list fuit</a>";}
}else {header('Location: login.php');}

?>