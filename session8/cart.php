<?php
session_start();
include "connect.php";
if(isset($_GET['id'])){
        $id = $_GET['id'];
    $sql = "Select * from product where id = $id";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
        $description = $row['description'];
        $cart = array("name" => $name, "image" => $image, "price" => $price, 'description' => $description, 'number' => 1);
    }
    if(!isset($_SESSION['cart'][$id])) {

        $_SESSION['cart'][$id] = $cart;

    }
    //Nếu như đã có giỏ hàng cảu sản phẩm id thì chỉ cần tăng số lượng nó lên 1 đơn vị
    else {

        $_SESSION['cart'][$id]['number']++;

    }
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Social Buttons CSS -->
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"><div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Mr.Man</a>
        </div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-archive fa-fw"></i> Product<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="product.php"><i class="fa fa-list fa-fw"></i> List Product</a>
                            </li>
                            <li>
                                <a href="cart.php"><i class="fa fa-shopping-cart fa-fw"></i> Cart</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Product
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Product's name</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Image</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key =>$value) {
                                    $name = $_SESSION['cart'][$key]['name'];
                                    $number = $_SESSION['cart'][$key]['number'];
                                    $price = $_SESSION['cart'][$key]['price'];
                                    $image = $_SESSION['cart'][$key]['image'];
                                    $description = $_SESSION['cart'][$key]['description'];
                                    $xprice = $number * $price;
                                    echo "<tr>
                                        <td>$name</td>
                                        <td>$number</a></td>
                                        <td>$xprice</td>
                                        <td><img src='$image' alt='$image' width='100px' height='100px'</td>
                                        <td>$description</td>
                                    </tr>";
                                }
                            }
                            ?>
                            </tbody>
                        </table><button type="button" class="btn btn-danger"><a href="destroy.php" style="text-decoration: none; color: black">Erase Cart</a></button>
                    </div>
                </div>
            </div>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="vendor/metisMenu/metisMenu.min.js"></script>
        <!-- DataTables JavaScript -->
        <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
</body>
</html>