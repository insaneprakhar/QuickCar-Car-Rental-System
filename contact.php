<!DOCTYPE html>
<html>
<head>
    <title>Contact Us – QuickCar</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<nav class="navbar">
    <div class="logo">QuickCar</div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
        <li><a href="about.php">About</a></li>
        <li><a class="active" href="contact.php">Contact</a></li>
        <li><a href="login.php" class="login-btn">Login</a></li>
    </ul>
</nav>

<div class="contact-container">
    <h2>Contact Us</h2>

    <form>
        <label>Your Name:</label>
        <input type="text" placeholder="Enter your name" required>

        <label>Email:</label>
        <input type="email" placeholder="Enter your email" required>

        <label>Message:</label>
        <textarea placeholder="Type your message" required></textarea>

        <button class="book-btn">Send Message</button>
    </form>
</div>

</body>
</html>