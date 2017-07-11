
<?php
$product_nameErr = $priceErr = $imageErr = $categoryErr = $manufacturerErr = $samenameErr = $sameimageErr = "";
$product_name = $price = $category = $manufacturer = $congratulation = "";
include "../include/connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $date = $_POST["date"];
    if ($_POST['category'] == "") {
        $categoryErr =  "<span style='color: red; font-weight: bold'>* Please select category</span>";
    }
    if ($_POST['manufacturer'] == "") {
        $manufacturerErr =  "<span style='color: red; font-weight: bold'>* Please select manufacturer</span>";
    }
    if (empty($_POST["product_name"])) {
        $product_nameErr = "<span style='color: red; font-weight: bold'>* Name is required</span>";
    }
    if (empty($_POST["price"])) {
        $priceErr = "<span style='color: red; font-weight: bold'>* Price is required</span>";
    }
    if (empty($_FILES["image"]['name'])) {
        $imageErr = "<span style='color: red; font-weight: bold'>* Image is required</span>";

    }

    if(!empty($_POST["product_name"]) && !empty($_POST["price"]) && $_POST["manufacturer"] !== "" && $_POST["category"] !== "" && !empty($_FILES["image"])) {
        $category = $_POST['category'];
        $manufacturer = $_POST['manufacturer'];
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $image = $_FILES["image"]["name"];
        $target_file = '../uploads/';
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file.$image);
        $sql = "SELECT * FROM product WHERE name = '$product_name' AND image = '$image'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
                $samenameErr = "<span style='color: red; font-weight: bold'>* Please enter another name</span>";
                $sameimageErr = "<span style='color: red; font-weight: bold'>* Please choose another image</span>";

        } else {
        $kq = "INSERT INTO product (name, category_id, manufacturer_id, description, price, image, date) VALUES ('$product_name', '$category', '$manufacturer', '$description', '$price', '$image', '$date')";

        if ($conn->query($kq) === TRUE) {

            $congratulation = "<span style='color: green; font-weight: bold'>Product added successfully</span>";

        } else {
            echo "Please Try Again" . $conn->error;
            }
        }
    }
    $conn->close();

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

        <title>Add Product</title>

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
                    <h1 class="page-header">Product</h1>
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
                                    <form role="form" action="add_product.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" placeholder="Enter Product's Name" name="product_name"><span class = "error"><?php echo $product_nameErr;?></span>
                                            <span class = "error"><?php echo $samenameErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="number" class="form-control" placeholder="Enter Product's Price" name="price"><span class = "error"><?php echo $priceErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Category:</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select Category</option>
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
                                            </select><span class = "error"><?php echo $categoryErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Manufacturer:</label>
                                            <select class="form-control" name="manufacturer">
                                                <option value="">Select Manufacturer</option>
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
                                            </select> <span class = "error"><?php echo $manufacturerErr;?></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter Desctiption" name="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" name="image"><span class = "error"><?php echo $imageErr;?></span><span class = "error"><?php echo $sameimageErr;?></span>
                                        </div>
                                        <input type="hidden" name="date" value="<?php echo date("Y-m-d h:i:sa");?>">

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

