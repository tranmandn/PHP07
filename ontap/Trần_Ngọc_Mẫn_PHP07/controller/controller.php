<?php
require 'model/model.php';
class Controller {
    private $model = NULL;

    public function __construct() {
        $this->model = new model();
    }
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        if ( !$op || $op == 'categories' ) {
            $this->listCategory();
        } elseif ( $op == 'product' ) {
            $this->listProduct();
        } elseif ( $op == 'detail' ) {
            $this->listProductDetail();
        } else {
            $this->showError("Page not found", "Page for operation ".$op." was not found!");
        }
    }
    public function listCategory() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        $category = $this->model->getAllCategory();
        include 'views/categories.php';
    }
    public function listProduct() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        $product = $this->model->getProduct($id);
        include 'views/product.php';
    }
    public function listProductDetail() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        $productDetail = $this->model->getAllProduct($id);
        include 'views/product_detail.php';
    }
    public function showError($title, $message) {
        include 'views/error.php';
    }
}



?>