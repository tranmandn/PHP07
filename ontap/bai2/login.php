<?php
require "connect.php";
session_start();
$email = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email'])) {
        $error = "email is required";
    } else {$email = $_POST['email'];}
    if (empty($_POST['password'])) {
        $error = "password is required";
    } else {$password = $_POST['password'];}
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = 'Invalid email format';
    }
    if(isset($email) && isset($password)){
        $sql="select * from customer where email = '$email' and password = '$password'";
        $result = $conn->query($sql);
        if($result->num_rows == 0)
        {
            echo "Email or Password is not correct, please try again";
        }else {
            while ($row = $result->fetch_assoc()) {
                $email = $row['email'];
                $password = $row['password'];
                $_SESSION['login'] = array("email" => "$email", "password" => $password);
            }
            header('Location: bai2.php');
        }

    }

}
?>
<form method="post" action="login.php">
    <input type="email" placeholder="email" name="email">
    <input type="password" placeholder="password" name="password">
    <input type="submit">
</form>

