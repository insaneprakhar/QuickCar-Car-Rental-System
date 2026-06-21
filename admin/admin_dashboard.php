<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include("../config/db.php");

$users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"));
$cars = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM cars"));
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - QuickCar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar Admin</div>
    <ul class="nav-links">
        <li><a class="active" href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_cars.php">Manage Cars</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_bookings.php">Bookings</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="dashboard-container">
    <h2>Admin Dashboard</h2>

    <div class="dash-box">
        <h3>Total Users</h3>
        <p><?php echo $users['total']; ?></p>
    </div>

    <div class="dash-box">
        <h3>Total Cars</h3>
        <p><?php echo $cars['total']; ?></p>
    </div>

    <div class="dash-box">
        <h3>Total Bookings</h3>
        <p><?php echo $bookings['total']; ?></p>
    </div>
</div>

</body>
</html>