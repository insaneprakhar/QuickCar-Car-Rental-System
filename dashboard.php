<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("config/db.php");

$user_id = $_SESSION['user_id'];

$q = "SELECT COUNT(*) AS total FROM bookings WHERE user_id=$user_id";
$r = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($r);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard – QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar</div>
    <ul class="nav-links">
        <li><a class="active" href="dashboard.php">Dashboard</a></li>
        <li><a href="booking_history.php">My Bookings</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="dashboard-container">
    <h2>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h2>

    <div class="dash-box">
        <h3>Total Bookings</h3>
        <p><?php echo $data['total']; ?></p>
    </div>

    <a href="cars.php" class="book-btn">Book a Car</a>
</div>

</body>
</html>