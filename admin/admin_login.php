<?php
include("../config/db.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - QuickCar</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="booking-container" style="margin-top:150px;">
    <h2>Admin Login</h2>

    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit" name="login" class="book-btn">Login</button>
    </form>
</div>

</body>
</html>