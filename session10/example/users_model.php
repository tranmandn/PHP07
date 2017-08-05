<?php
require_once 'connect_model.php';

class UsersModel extends ConnectModel {
    
    public function selectUser() {
        $queryUser = mysqli_query($this->conn,"SELECT * FROM users");
        $users = array();
        while ( ($row = mysqli_fetch_object($queryUser)) != NULL ) {
            $users[] = $row;
        }
        return $users;
    }
    
    public function addUser( $name, $username, $password) {
        
        mysqli_query($this->conn,"INSERT INTO users (name, username, password, address) VALUES ('$name', '$username', '$password')");
        return true;
    }
    
    public function deleteUser($id) {
        mysqli_query($this->conn,"DELETE FROM users WHERE id = $id");
    }

    public function editUser($id, $name, $username, $password) {
        
        mysqli_query($this->conn,"UPDATE users SET name = '$name', username = '$username', password = '$password' WHERE id = $id");
        return true;
    }
    
}

?>
