<?php
$array = array(
    "email" => "tranmandn@gmail.com",
    "phone" => "0909999999",
    "date" => "2017/07/29",
    "name" => "man",
    "username" => "tranman",
    "website" => "man.vn",
    "image" => "man.jpeg",
    "password" => "123456",
    "id" => "1",
    "car" => "audi",
    "sex" => "male",
    "color" => "yellow",
    "hight" => "2m",
    "age" => "26",
    "hair" => "black",
);
foreach (@$array as $key => $value) {
    if ($key == "email"){
        echo $value . " Đây là email của bạn";
    }
    if ($key == "phone") {
        session_start();
        $_SESSION["phone"] = $value;
    }
    if ($key == "date") {
        echo "<br>" . date("l") . "<br>";
    }
}
print_r($_SESSION);


?>