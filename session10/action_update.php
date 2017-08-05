<?php
require "model.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_FILES["image"]["name"];
    $target_file = 'image/';
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file.$image);
    $edituser = new users();
    $edituser ->edituser($id, $name, $username, $password, $image, $phone, $email);
    Header('Location: list_user.php');
}


?>