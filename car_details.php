<?php
session_start();
include("config/db.php");

if (!isset($_GET['id'])) {
    header("Location: cars.php");
    exit();
}

$car_id = (int)$_GET['id'];   // basic protection

$query = "SELECT * FROM cars WHERE car_id = $car_id LIMIT 1";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 0){
    echo "Car not found";
    exit();
}

$car = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $car['car_name']; ?> - QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">QuickCar</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php" class="active">Cars</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>

        <?php if(isset($_SESSION['user_id'])) { ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php" class="login-btn">Logout</a></li>
        <?php } else { ?>
            <li><a href="login.php" class="login-btn">Login</a></li>
        <?php } ?>
    </ul>
</nav>

<!-- DETAILS SECTION -->
<div class="details-section">

    <div class="details-img">
        <img src="assets/images/<?php echo $car['image']; ?>" alt="Car">
    </div>

    <div class="details-info">

        <h2><?php echo $car['car_name']; ?></h2>

        <p><strong>Price:</strong> ₹<?php echo $car['price_per_day']; ?> / Day</p>

        <?php if(isset($car['category'])) { ?>
        <p><strong>Category:</strong> <?php echo $car['category']; ?></p>
        <?php } ?>

        <p><strong>Fuel Type:</strong> <?php echo $car['fuel_type']; ?></p>

        <p><strong>Seats:</strong> <?php echo $car['seats']; ?></p>

        <?php if(isset($car['transmission'])) { ?>
        <p><strong>Transmission:</strong> <?php echo $car['transmission']; ?></p>
        <?php } ?>

        <?php if(isset($car['luggage'])) { ?>
        <p><strong>Luggage:</strong> <?php echo $car['luggage']; ?> Bags</p>
        <?php } ?>

        <p><strong>Model Year:</strong> <?php echo $car['model_year']; ?></p>

        <br>

        <a href="booking.php?id=<?php echo $car['car_id']; ?>" class="book-btn">
            Book Now
        </a>

    </div>

</div>

</body>
</html>