<?php
$name = $city = $date = $sex = "";
$nameErr = $cityErr = $dateErr = $sexErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['name'] == null) {
        $nameErr = "<span style='color: red; font-weight: bold'>* Name is Required</span>";
    } else {
        $name = $_POST['name'];
    }
    if ($_POST['date'] == null) {
        $dateErr = "<span style='color: red; font-weight: bold'>* Date is Required</span>";
    } else {
        $date = $_POST['date'];
    }
    if ($_POST['city'] == null) {
        $cityErr = "<span style='color: red; font-weight: bold'>* City is Required</span>";
    } else {
        $city = $_POST['city'];
    }
    if (empty($_POST['sex'])) {
        $sexErr = "<span style='color: red; font-weight: bold'>* Sex is Required</span>";
    } else {
        $sex = $_POST['sex'];
    }

}
$d = strtotime($date);
$x = date('Y', $d);
$y = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Horizontal form</h2>
    <form class="form-horizontal" action="index.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2">Your Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="date" placeholder="Enter Your Name" name="name"><span class = "error"><?php echo $nameErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Date of Birth:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="date" name="date"><span class = "error"><?php echo $dateErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">City:</label>
            <div class="col-sm-10">
                <select class="form-control" name="city"><span class = "error"><?php echo $cityErr;?></span>
                    <option value="">Please Select</option>
                    <option value="danang">Da Nang</option>
                    <option value="hochiminh">TP. Ho Chi Minh</option>
                    <option value="hanoi">Ha Noi</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div>
                <label class="control-label col-sm-2">Sex:</label>
                <div class="radio col-sm-10" >
                    <label><input type="radio" value="male" name="sex">Male</label>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="radio col-sm-10">
                    <label><input type="radio" value="female" name="sex">Female</label>
                </div><div class="col-sm-2"></div><div class="col-sm-10"><span class = "error"><?php echo $sexErr;?></span></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php
include "function.php";
echo weekdays($d);
echo "<br>";
echo birthtoday($x, $y);
echo "<br>";
if ($city == "danang"){
    echo danang();
}
echo "<br>";
if ($sex == "male"){
    echo male();
} else {
    echo female($name);
}
?>
</body>
</html>


