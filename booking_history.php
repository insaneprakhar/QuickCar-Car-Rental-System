<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("config/db.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT b.*, c.car_name 
        FROM bookings b 
        JOIN cars c ON b.car_id = c.car_id
        WHERE b.user_id = $user_id 
        ORDER BY b.booking_id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings – QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar</div>
    <ul class="nav-links">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a class="active" href="booking_history.php">My Bookings</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="history-container">
    <h2>My Booking History</h2>

    <table class="history-table">
        <tr>
            <th>Car Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['car_name']; ?></td>
            <td><?php echo $row['start_date']; ?></td>
            <td><?php echo $row['end_date']; ?></td>
            <td>₹<?php echo $row['total_price']; ?></td>
            <td><?php echo $row['payment_status']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>