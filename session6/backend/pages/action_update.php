<?php
include "../include/connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $id = $_POST['product_id'];
    $category = $_POST['category'];
    $manufacturer = $_POST['manufacturer'];
    $image = $_FILES["image"]["name"];
    $target_file = '../uploads/';
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file.$image);
    $sql = "update product set name = '$name', price = '$price', image = '$image', category_id = '$category', manufacturer_id = '$manufacturer' where product_id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        header('Location: update.php?error=1');
    }

    $conn->close();

}







?>