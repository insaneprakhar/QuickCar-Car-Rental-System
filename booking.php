<?php
session_start();
include("config/db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: cars.php");
    exit();
}

$car_id = (int)$_GET['id'];

$query = "SELECT * FROM cars WHERE car_id = $car_id LIMIT 1";
$result = mysqli_query($conn, $query);
$car = mysqli_fetch_assoc($result);

if (isset($_POST['book'])) {

    $start = $_POST['start_date'];
    $end = $_POST['end_date'];

    $diff = (strtotime($end) - strtotime($start)) / 86400;

    if ($diff <= 0) {
        echo "<script>alert('End date must be after start date');</script>";
    } else {

        $total = $diff * $car['price_per_day'];

        $user_id = $_SESSION['user_id'];

        $q = "INSERT INTO bookings (user_id, car_id, start_date, end_date, total_price, payment_status)
              VALUES ('$user_id', '$car_id', '$start', '$end', '$total', 'Paid')";

        mysqli_query($conn, $q);

        header("Location: confirm.php?amount=$total&days=$diff&car=" . $car['car_name']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book <?php echo $car['car_name']; ?> - QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">QuickCar</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php" class="active">Cars</a></li>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="logout.php" class="login-btn">Logout</a></li>
    </ul>
</nav>

<div class="booking-container">

    <h2>Book <?php echo $car['car_name']; ?></h2>

    <p><strong>Price per day:</strong> ₹<?php echo $car['price_per_day']; ?></p>

    <form method="POST">

        <label>Start Date:</label>
        <input type="date" name="start_date" required>

        <label>End Date:</label>
        <input type="date" name="end_date" required>

        <button type="submit" name="book" class="book-btn">
            Confirm Booking
        </button>

    </form>

</div>

</body>
</html>