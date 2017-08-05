<?php
require "connect_model.php";
class users extends ConectModel {
    public function selectUser() {
        $queryUser = mysqli_query($this->conn,"SELECT * FROM users");
        $users = array();
        while ( ($row = mysqli_fetch_object($queryUser)) != NULL ) {
            $users[] = $row;
        }
        return $users;
    }
    public function selectUserWhere($id) {
        $queryUser = mysqli_query($this->conn,"SELECT * FROM users WHERE id = $id");
        $users = array();
        while ( ($row = mysqli_fetch_object($queryUser)) != NULL ) {
            $users[] = $row;
        }
        return $users;
    }
    public function adduser($name, $username, $password, $image, $phone, $email, $date){
        mysqli_query($this->conn,"INSERT INTO users (name, username, password, image, phone, email, date) VALUES ('$name', '$username', '$password', '$image', '$phone', '$email', '$date')");
        return true;
    }
    public function deleteUser($id) {
            mysqli_query($this->conn,"DELETE FROM users WHERE id = $id");
            return true;
    }
    public function edituser($id, $name, $username, $password, $image, $phone, $email) {
        mysqli_query($this->conn,"UPDATE users SET name = '$name', username = '$username', password = '$password', image = '$image', phone = '$phone', email = '$email' where id = $id");
        return true;
    }
}
class validate {
    var $error = "Please check correctly information";
    var $emailError = "Fill correcly email";
    public function CheckError($name, $username, $password, $phone, $email, $image){
        if (empty($name) || empty($username) || empty($password) || empty($phone) || empty($email) || empty($image)){
            return true;
        } else {return false;}

    }
    public function checkEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {return false;}
    }
}





?>