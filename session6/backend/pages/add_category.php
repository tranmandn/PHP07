<?php
$categoryErr = $samenameErr = "";
$category = $congratulation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["category"])) {
        $categoryErr = "Name of Category is required";
    }else {
        $category = $_POST["category"];
    include "../include/connect.php";
    $kq = "SELECT category_name FROM category WHERE category_name = '$category'";
    $result = $conn->query($kq);
    if ($result->num_rows > 0) {
        $samenameErr = "<span style='color: red; font-weight: bold'>* This name is already available</span>";
    } else {
    $sql = "INSERT INTO category (category_name) VALUES ('$category')";
    if ($conn->query($sql) === TRUE) {

        $congratulation = "<span style='color: green; font-weight: bold'>Category added successfully</span>";;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Category</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        include "../include/navhead.php";
        ?>

        <?php
        include "../include/navtop.php";
        ?>

        <?php
        include "../include/sidebar.php"
        ?>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row"><div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Category
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="post" action="add_category.php">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" placeholder="Enter Category's Name" name="category"><span class = "error"><?php echo $categoryErr;?></span>
                                        <span class = "error"><?php echo $samenameErr;?></span>
                                    </div>
                                    <button type="submit" class="btn btn-default" name="submit">Add</button>
                                    <button type="reset" style="float: right" class="btn btn-default">Reset</button>
                                </form>
                                <span class = "error"><?php echo $congratulation;?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>