<?php include("config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">QuickCar</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        <li><a class="active" href="register.php">Register</a></li>
        <li><a href="login.php" class="login-btn">Login</a></li>
    </ul>
</nav>

<div class="booking-container">
    <h2>Create Account</h2>

    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Phone:</label>
        <input type="text" name="phone" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="register" class="book-btn">Register</button>
    </form>
</div>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users (name, email, phone, password)
            VALUES ('$name', '$email', '$phone', '$pass')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: Email already exists');</script>";
    }
}
?>

</body>
</html>
