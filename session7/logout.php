<?php
session_start();
session_destroy();
echo "Logout successful";
?>
<div style="color: red; text-align: center;"><button><a style="text-decoration: none" href="login.php">Go to login page</a></button></div>
