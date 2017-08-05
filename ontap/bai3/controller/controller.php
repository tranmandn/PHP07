<?php
require 'model/model.php';
class Controller {
    private $model = NULL;

    public function __construct() {
        $this->model = new model();
    }

    public function redirect($location) {
        header('Location: '.$location);
    }
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
            if ( !$op || $op == 'news' ) {
                $this->listNews();
            } elseif ( $op == 'category' ) {
                $this->listCategory();
            } elseif ( $op == 'readed' ) {
                $this->listReadedNews();
            } elseif ( $op == 'new' ) {
                $this->saveNews();
            }elseif ( $op == 'delete' ) {
                $this->deleteNews();
            } elseif ( $op == 'erase' ) {
                $this->eraseReaded();
            } elseif ( $op == 'show' ) {
                $this->showNews();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
    }
    public function listNews() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $news = $this->model->getAllNews($orderby);
        include 'views/news.php';
    }
    public function saveNews() {

        $titlePage = 'Add New News';

        $title = '';
        $Category_Id = '';
        $description = '';
        $image = '';
        $created = '';

        $errors = array();

        if ( isset($_POST['form-submitted']) ) {

            $title          = isset($_POST['title']) ?   $_POST['title']  :NULL;
            $Category_Id    = isset($_POST['category_id'])?   $_POST['category_id'] :NULL;
            $description    = isset($_POST['description'])?   $_POST['description'] :NULL;
            $created        = isset($_POST['created'])?   $_POST['created'] :NULL;
            $image          = isset($_FILES['image']['name'])? $_FILES['image']['name']:NULL;
            $target_file = 'public/uploads/';
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file.basename($_FILES["image"]["name"]));
                $this->model->createNews($title, $Category_Id, $description, $image, $created);
                $this->redirect('index.php');
                return;
        }

        include 'views/add_news.php';
    }
    public function deleteNews() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }

        $this->model->deleteNews($id);

        $this->redirect('index.php');
    }
    public function showNews() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $news = $this->model->getNewsById($id);

        include 'views/view.php';
    }
    public function showError($title, $message) {
        include 'views/error.php';
    }
    public function listCategory() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $category = $this->model->getCategory($orderby);
        include 'views/category.php';
    }
    public function listReadedNews() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        $this->model->getReadedNews($id);
        include 'views/readed.php';
    }
    public function eraseReaded() {
        $this->model->eraseReadedList();
        $this->redirect('index.php');
    }
}



?>