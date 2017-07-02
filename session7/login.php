<?php
$user = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if($_POST['name'] == NULL)
{
    echo "Please enter your username<br />";
}
else
{
    $user = $_POST['name'];
}
if($_POST['password'] == NULL)
{
    echo "Please enter your password<br />";
}
else
{
    $password = $_POST['password'];
}
if($user && $password){
    $conn = new mysqli("localhost", "root", "", "php07");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="select * from user where name='$user' and password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows == 0)
    {
        echo "Username or password is not correct, please try again";
    }else {
        while ($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];

        }
        header('Location: index.php');
    }

}
}
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Log In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="login.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="name" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button><a href="logout.php" class="btn btn-lg btn-success btn-block">Logout</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

