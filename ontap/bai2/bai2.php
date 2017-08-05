<a href="login.php">Login</a><a href="logout.php">logout</a><br>
<?php
session_start();
require "connect.php";
$sql = "SELECT * FROM fruit";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        echo "Name: " . $row["name"]. " - price: " . $row["price"]. " usd <a href='cart.php?id=$id'>cart</a><br>";
    }
    }

?>
