<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "food-order-service";
    define('SITEURL','http://localhost/Final_submission/');
    $conn = mysqli_connect($serverName,$userName,$password) or die(mysqli_connect_error());
    $db_select = mysqli_select_db($conn, $dbName) or die(mysqli_connect_error());

 ?>