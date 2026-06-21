<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }

include("../config/db.php");

if (isset($_POST['add'])) {

    $name = $_POST['car_name'];
    $type = $_POST['car_type'];
    $model = $_POST['model_year'];
    $fuel = $_POST['fuel_type'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    
    // Upload image
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../assets/images/$image");

    $sql = "INSERT INTO cars (car_name, car_type, model_year, fuel_type, seats, price_per_day, image)
            VALUES ('$name', '$type', '$model', '$fuel', '$seats', '$price', '$image')";

    mysqli_query($conn, $sql);

    header("Location: manage_cars.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Car - QuickCar Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="booking-container">
    <h2>Add New Car</h2>

    <form method="POST" enctype="multipart/form-data">

        <label>Car Name:</label>
        <input type="text" name="car_name" required>

        <label>Type:</label>
        <input type="text" name="car_type" required>

        <label>Model Year:</label>
        <input type="number" name="model_year" required>

        <label>Fuel:</label>
        <input type="text" name="fuel_type" required>

        <label>Seats:</label>
        <input type="number" name="seats" required>

        <label>Price Per Day:</label>
        <input type="number" name="price" required>

        <label>Car Image:</label>
        <input type="file" name="image" required>

        <button type="submit" name="add" class="book-btn">Add Car</button>
    </form>
</div>

</body>
</html>