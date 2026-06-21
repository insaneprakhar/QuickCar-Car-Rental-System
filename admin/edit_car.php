<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); exit(); }
include("../config/db.php");

$car_id = $_GET['id'];

$car = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$car_id"));

if (isset($_POST['update'])) {

    $name = $_POST['car_name'];
    $type = $_POST['car_type'];
    $model = $_POST['model_year'];
    $fuel = $_POST['fuel_type'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];

    $sql = "UPDATE cars SET 
            car_name='$name',
            car_type='$type',
            model_year='$model',
            fuel_type='$fuel',
            seats='$seats',
            price_per_day='$price'
            WHERE car_id=$car_id";

    mysqli_query($conn, $sql);

    header("Location: manage_cars.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Car - QuickCar Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<div class="booking-container">
    <h2>Edit Car</h2>

    <form method="POST">

        <label>Car Name:</label>
        <input type="text" name="car_name" value="<?php echo $car['car_name']; ?>" required>

        <label>Type:</label>
        <input type="text" name="car_type" value="<?php echo $car['car_type']; ?>" required>

        <label>Model Year:</label>
        <input type="number" name="model_year" value="<?php echo $car['model_year']; ?>" required>

        <label>Fuel:</label>
        <input type="text" name="fuel_type" value="<?php echo $car['fuel_type']; ?>" required>

        <label>Seats:</label>
        <input type="number" name="seats" value="<?php echo $car['seats']; ?>" required>

        <label>Price Per Day:</label>
        <input type="number" name="price" value="<?php echo $car['price_per_day']; ?>" required>

        <button type="submit" name="update" class="book-btn">Update Car</button>
    </form>
</div>

</body>
</html>