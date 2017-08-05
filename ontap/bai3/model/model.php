<?php

require_once "connect_database.php";
class Model extends Connect {
    private function openDb() {
        if (!$this->conn) {
            throw new Exception("Connection to the database server failed!");
        }
    }

    private function closeDb() {
        mysqli_close($this->conn);
    }
    public function getAllNews($order) {
        $this->openDb();
        if ( !isset($order) ) {
            $order = "title";
        }
        $dbOrder =  mysqli_real_escape_string($this->conn,$order);
        $dbres = mysqli_query($this->conn,"SELECT * FROM news ORDER BY $dbOrder ASC");

        $news = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $news[] = $obj;
        }
        $this->closeDb();
        return $news;
    }
    public function getNewsById($id) {
            $this->openDb();
            $dbId = mysqli_real_escape_string($this->conn,$id);

            $dbres = mysqli_query($this->conn,"SELECT * FROM news WHERE id=$dbId");
            $this->closeDb();
            return mysqli_fetch_object($dbres);
    }
    public function validateNews($title, $category_id, $description, $image) {
        $errors = array();
        if ( !isset($title) || empty($title) ) {
            $errors[] = 'title is required';
        }
        if ( !isset($category_id) || empty($category_id) ) {
            $errors[] = 'category is required';
        }
        if ( !isset($description) || empty($description) ) {
            $errors[] = 'title is required';
        }
        if ( !isset($image) || empty($image) ) {
            $errors[] = 'title is required';
        }
        if (!preg_match("/^[0-9]*$/",$category_id)) {
            $errors[] = "Only number allowed";
        }
    }
    public function createNews($title, $category_id, $description, $image, $created) {
            $this->openDb();
            $this->validateNews($title, $category_id, $description, $image);
            $dbTitle = ($title != NULL)?"'".mysqli_real_escape_string($this->conn,$title)."'":'NULL';
            $dbCategory_Id = ($category_id != NULL)?"'".mysqli_real_escape_string($this->conn,$category_id)."'":'NULL';
            $dbDescription = ($description != NULL)?"'".mysqli_real_escape_string($this->conn,$description)."'":'NULL';
            $dbImage = ($image != NULL)?"'".mysqli_real_escape_string($this->conn,$image)."'":'NULL';
            $dbCreated = ($created != NULL)?"'".mysqli_real_escape_string($this->conn,$created)."'":'NULL';
            mysqli_query($this->conn,"INSERT INTO news (title, category_id, description, image, created) VALUES ($dbTitle, $dbCategory_Id, $dbDescription, $dbImage, $dbCreated)");
            $this->closeDb();
            return mysqli_insert_id($this->conn);
    }
    public function deleteNews( $id ) {
            $this->openDb();
            $dbId = mysqli_real_escape_string($this->conn,$id);
            mysqli_query($this->conn,"DELETE FROM news WHERE id=$dbId");
            $this->closeDb();
    }
    public function getCategory($order) {
        if ( !isset($order) ) {
            $order = "created";
        }
        $this->openDb();
        $dbOrder = mysqli_real_escape_string($this->conn,$order);
        $dbres = mysqli_query($this->conn,"SELECT * FROM category ORDER BY $dbOrder ASC");
        $this->closeDb();
        $category = array();
        while (($obj = mysqli_fetch_object($dbres)) != NULL) {
            $category[] = $obj;
        }
        return $category;
    }
    public function getReadedNews($id) {
        $this->openDb();
        $dbId = mysqli_real_escape_string($this->conn,$id);

        $readedNews = mysqli_query($this->conn,"SELECT * FROM news WHERE id=$dbId");
        while ($row = $readedNews->fetch_assoc()) {
            $title = $row['title'];
            $category_id = $row['category_id'];
            $description = $row['description'];
            $image = $row['image'];
            $created = $row['created'];
            $readed = array("title" => $title, "category_id" => $category_id, "description" => $description, "image" => $image, "created" => $created);
        }
        if (!isset($_SESSION['readed'])) {
            session_start();
            $_SESSION['readed'][$id] = $readed;
        } else {header('Location: '.'views/readed.php');}

    }
    public function eraseReadedList() {
        session_start();
        session_destroy();
    }
}




?>