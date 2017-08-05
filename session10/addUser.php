<?php
require "model.php";
$name = $username = $password = $image = $phone = $email = $date = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $check = new validate();
    $check ->CheckError($_POST['name'], $_POST['username'], $_POST['password'], $_POST['phone'], $_POST['email'], $_FILES['image']['name']);
    $check ->checkEmail($email);
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $image = $_FILES['image']['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $target_file = 'image/';
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file.$image);
    $users = new users();
    if ($users ->adduser($name, $username, $password, $image, $phone, $email, $date) == true){
        Header('Location: list_user.php');
        }
}


?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add User</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <?php
        include "include/navhead.php";
        ?>

        <?php
        include "include/navtop.php";
        ?>

        <?php
        include "include/sidebar.php"
        ?>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add User</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row"><div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Product
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="addUser.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>User's Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter User's Name" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone:</label>
                                        <input type="tel" class="form-control" placeholder="Enter Phone Number" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <input type="file" name="image">
                                    </div>
                                    <input type="hidden" name="date" value="<?php echo date("Y-m-d h:i:sa");?>">

                                    <button type="submit" class="btn btn-default" name="submit">Add</button>
                                    <button type="reset" style="float: right" class="btn btn-default">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>