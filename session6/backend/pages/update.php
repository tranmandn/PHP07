<?php
include "../include/connect.php";
if(isset($_GET['id'])) {
    $idget = $_GET['id'];
        $sql = "select * from product WHERE product_id = $idget";
        $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['product_id'];
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $image = $row['image'];
            $category = $row['category_id'];
            $manufacturer = $row['manufacturer_id'];
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

    <title>Update</title>

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
        include "../include/sidebar.php";
        ?>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="row"><div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="action_update.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" value="<?php echo $name; ?>" name="product_name">
                                            <input type="hidden" class="form-control" name="product_id" value="<?php echo $id; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="number" class="form-control" value="<?php echo $price;?>" name="price">
                                        </div>
                                        <div class="form-group">
                                            <label>Category:</label>
                                            <select class="form-control" name="category">
                                                <option value="<?php echo $category; ?>">Please choose another</option>
                                                <?php
                                                include "../include/connect.php";
                                                $sql = "SELECT * FROM category";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $categoryid = $row["category_id"];
                                                        $categoryname = $row["category_name"];
                                                        echo "<option value='$categoryid'>" . $categoryname . "</option>";
                                                    }
                                                }
                                                $conn->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacturer:</label>
                                            <select class="form-control" name="manufacturer">
                                                <option value="<?php echo $manufacturer; ?>">please choose another</option>
                                                <?php
                                                include "../include/connect.php";
                                                $sql = "SELECT * FROM manufacturer";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $manufacturerid = $row['manufacturer_id'];
                                                        $manufacturername = $row['manufacturer_name'];
                                                        echo "<option value='$manufacturerid'>" . $row["manufacturer_name"] . "</option>";
                                                    }
                                                }
                                                $conn->close();
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" rows="3" name="description"><?php echo $description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" value="<?php echo $image; ?>" name="image">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit">Update</button>
                                        <button type="reset" style="float: right" class="btn btn-default">Reset</button>
                                    </form>
                                    <span class = "error">
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