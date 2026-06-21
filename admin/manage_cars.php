<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

include("../config/db.php");

$result = mysqli_query($conn, "SELECT * FROM cars");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Cars - QuickCar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar Admin</div>
    <ul class="nav-links">
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a class="active" href="manage_cars.php">Manage Cars</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_bookings.php">Bookings</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="history-container">
    <h2>Manage Cars</h2>

    <a href="add_car.php" class="book-btn">Add New Car</a>

    <table class="history-table">
        <tr>
            <th>ID</th>
            <th>Car Name</th>
            <th>Price</th>
            <th>Fuel</th>
            <th>Seats</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['car_id']; ?></td>
            <td><?php echo $row['car_name']; ?></td>
            <td>₹<?php echo $row['price_per_day']; ?></td>
            <td><?php echo $row['fuel_type']; ?></td>
            <td><?php echo $row['seats']; ?></td>

            <td>
                <a href="edit_car.php?id=<?php echo $row['car_id']; ?>" class="book-btn">Edit</a>
                <a href="delete_car.php?id=<?php echo $row['car_id']; ?>" class="book-btn" style="background:red;color:#fff;">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>