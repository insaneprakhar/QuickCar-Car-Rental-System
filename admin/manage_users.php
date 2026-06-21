<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

include("../config/db.php");

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users - QuickCar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar Admin</div>
    <ul class="nav-links">
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="manage_cars.php">Manage Cars</a></li>
        <li><a class="active" href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_bookings.php">Bookings</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="history-container">
    <h2>Manage Users</h2>

    <table class="history-table">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>