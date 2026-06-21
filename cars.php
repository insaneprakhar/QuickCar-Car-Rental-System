<?php
session_start();
include("config/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QuickCar – Cars</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">QuickCar</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="cars.php">Cars</a></li>
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

<!-- PAGE TITLE -->
<div class="page-header">
    <h2>Available Cars</h2>
</div>

<!-- SEARCH BAR -->
<div style="text-align:center; margin-bottom:30px;">
    <form method="GET">
        <input type="text" name="search" placeholder="Search car name..."
        style="padding:10px; width:250px; border-radius:5px; border:1px solid #ccc;">
        
        <button type="submit"
        style="padding:10px 20px; background:#007bff; color:white; border:none; border-radius:5px;">
        Search
        </button>
    </form>
</div>

<!-- CAR LIST -->
<div class="car-container">

<?php

if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM cars WHERE car_name LIKE '%$search%'";
}else{
    $query = "SELECT * FROM cars";
}

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){

while ($row = mysqli_fetch_assoc($result)) {
?>

    <div class="car-card">
        <img src="assets/images/<?php echo $row['image']; ?>" alt="Car Image">
        <h3><?php echo $row['car_name']; ?></h3>
        <p>₹<?php echo $row['price_per_day']; ?> / Day</p>
        <a href="car_details.php?id=<?php echo $row['car_id']; ?>" class="book-btn">View Details</a>
    </div>

<?php 
}

}else{
    echo "<h3 style='text-align:center;'>No cars found</h3>";
}
?>

</div>

</body>
</html>