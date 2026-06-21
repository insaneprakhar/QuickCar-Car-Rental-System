<?php

if(!isset($_GET['car']) || !isset($_GET['days']) || !isset($_GET['amount'])){
    header("Location: cars.php");
    exit();
}

$car = $_GET['car'];
$days = $_GET['days'];
$amount = $_GET['amount'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed - QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php" class="active">Cars</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
    </ul>
</nav>

<div class="booking-container">

    <h2>Booking Confirmed! 🎉</h2>

    <p>Your car has been successfully booked.</p>

    <hr>

    <p><strong>Car:</strong> <?php echo $car; ?></p>
    <p><strong>Total Days:</strong> <?php echo $days; ?></p>
    <p><strong>Total Amount:</strong> ₹<?php echo $amount; ?></p>

    <br>

    <a href="cars.php" class="book-btn">Book Another Car</a>

</div>

</body>
</html>