<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

include("../config/db.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM cars WHERE car_id=$id");

header("Location: manage_cars.php");
?>