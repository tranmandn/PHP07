<?php
session_start();
if(isset($_SESSION['name'])) {
    echo "Congratulations login successfully<br> Welcome " . $_SESSION['name'];
}else {header('Location: login.php');}
?>