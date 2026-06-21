<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

include("../config/db.php");

$sql = "SELECT b.*, u.name AS user_name, c.car_name 
        FROM bookings b 
        JOIN users u ON b.user_id = u.user_id
        JOIN cars c ON b.car_id = c.car_id
        ORDER BY b.booking_id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Bookings - QuickCar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar Admin</div>
    <ul class="nav-links">
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_cars.php">Manage Cars</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a class="active" href="manage_bookings.php">Bookings</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="history-container">
    <h2>Manage Bookings</h2>

    <table class="history-table">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Car</th>
            <th>Start</th>
            <th>End</th>
            <th>Price</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['booking_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['car_name']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td>₹<?php echo $row['total_price']; ?></td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>