<?php
session_start();
session_destroy();
Header('Location: product.php');
?>