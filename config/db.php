<?php
$host = "sql102.infinityfree.com";
$user = "if0_42235195";
$pass = "JEP7tkEF66XT85";
$dbname = "if0_42235195_car_rental";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>   