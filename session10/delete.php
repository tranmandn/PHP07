<?php
require "model.php";
$users = new users();
$id = $_GET['id'];
$deleteuser = $users ->deleteUser($id);
Header('Location: list_user.php');
?>