<?php
include "../include/connect.php";
?>
<?php
$manufacturerErr = $samenameErr = "";
$manufacturer = $congratulation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["manufacturer"])) {
        $manufacturerErr = "Name of Manufacturer is required";
    }else {
        $manufacturer = $_POST["manufacturer"];
        $kq = "SELECT manufacturer_name FROM manufacturer WHERE  manufacturer_name = '$manufacturer'";
        $result = $conn->query($kq);
        if ($result->num_rows > 0){
            $samenameErr = "<span style='color: red; font-weight: bold'>* This name is already available</span>";
        } else {
    $sql = "INSERT INTO manufacturer (manufacturer_name) VALUES ('$manufacturer')";
    if ($conn->query($sql) === TRUE) {

        $congratulation = "<span style='color: green; font-weight: bold'>Manufacturer added successfully</span>";;

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

    <title>Add Manufacturer</title>

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
                <h1 class="page-header">Manufacturer</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row"><div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Manufacturer
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" action="add_manufacturer.php" method="post">
                                    <div class="form-group">
                                        <label>Manufacturer Name</label>
                                        <input class="form-control" placeholder="Enter Manufacturer's Name" name="manufacturer"><span class = "error"><?php echo $manufacturerErr;?></span>
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