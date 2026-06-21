<?php
include("config/db.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">QuickCar</div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a class="active" href="login.php" class="login-btn">Login</a></li>
    </ul>
</nav>

<div class="booking-container">
    <h2>User Login</h2>

    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="login" class="book-btn">Login</button>
    </form>
</div>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['name'];

        echo "<script>alert('Login Successful'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

</body>
</html>