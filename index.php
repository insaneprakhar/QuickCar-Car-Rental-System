<?php
session_start();
include("config/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QuickCar – Car Rental System</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/scroll.js" defer></script>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="logo">QuickCar</div>

    <ul class="nav-links">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="cars.php">Cars</a></li>
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

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content reveal">
        <h1>Drive Your Dream Car Today</h1>
        <p>Fast • Affordable • Hassle-free car rentals with QuickCar.</p>
        <a href="cars.php" class="hero-btn">Book Now</a>
    </div>
</section>

<!-- LOGO SLIDER -->
<div class="logo-slider">
    <div class="logo-track">
        <img src="assets/images/logo1.png" />
        <img src="assets/images/logo2.png" />
        <img src="assets/images/logo3.png" />
        <img src="assets/images/logo4.png" />
        <img src="assets/images/logo5.png" />
        <img src="assets/images/logo6.png" />

        <!-- Duplicate logos for infinite effect -->
        <img src="assets/images/logo1.png" />
        <img src="assets/images/logo2.png" />
        <img src="assets/images/logo3.png" />
        <img src="assets/images/logo4.png" />
        <img src="assets/images/logo5.png" />
        <img src="assets/images/logo6.png" />
    </div>
</div>

<!-- FEATURED CARS -->
<section class="section-title reveal">
    <h2>Featured Cars</h2>
</section>

<div class="car-container reveal">

<?php
$query = "SELECT * FROM cars LIMIT 3";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) {
?>

    <div class="car-card">
        <img src="assets/images/<?php echo $row['image']; ?>" alt="Car">
        <h3><?php echo $row['car_name']; ?></h3>
        <p>₹<?php echo $row['price_per_day']; ?> / Day</p>
        <a href="car_details.php?id=<?php echo $row['car_id']; ?>" class="book-btn">View Details</a>
    </div>

<?php } ?>

</div>

<!-- WHY CHOOSE QUICKCAR -->
<section class="why-modern reveal">
    <h2 class="why-title">Enjoy flexibility and unbeatable rates<br>with our city car rentals</h2>

    <div class="why-modern-container reveal">

        <div class="why-item reveal">
            <img src="assets/icons/car.png" class="why-icon">
            <h3>Well maintained vehicles</h3>
            <p>All our cars are well-maintained and regularly serviced, ensuring safe and smooth driving.</p>
        </div>

        <div class="why-item reveal">
            <img src="assets/icons/calendar.png" class="why-icon">
            <h3>Easy online booking</h3>
            <p>Book your car in minutes with our user-friendly online platform. Fast, simple, and convenient!</p>
        </div>

        <div class="why-item reveal">
            <img src="assets/icons/price-tag.png" class="why-icon">
            <h3>Affordable pricing</h3>
            <p>Enjoy competitive rates with no hidden fees. Rent the perfect car without breaking the bank.</p>
        </div>

        <div class="why-item reveal">
            <img src="assets/icons/headphones.png" class="why-icon">
            <h3>24/7 support</h3>
            <p>We’re here to assist you anytime, anywhere. Drive with peace of mind knowing help is just a call away.</p>
        </div>

    </div>
</section>

<!-- HOW IT WORKS - VIDEO + STEPS SECTION -->
<section class="howitworks-wrapper reveal">

    <div class="howitworks-video">
        <video src="assets/videos/howitworks.mp4" autoplay loop muted playsinline></video>
    </div>

    <div class="howitworks-steps">
        <h2>Rent your car in 3 easy steps</h2>

        <div class="step-row">
            <div class="step-number">01</div>
            <div>
                <h3>Choose your car</h3>
                <p>Browse our wide selection of vehicles, from compact cars to spacious SUVs. Pick the perfect ride that suits your needs.</p>
            </div>
        </div>

        <div class="step-row">
            <div class="step-number">02</div>
            <div>
                <h3>Book online</h3>
                <p>Reserve your car in just a few clicks with our user-friendly booking system. Select your dates and confirm instantly.</p>
            </div>
        </div>

        <div class="step-row">
            <div class="step-number">03</div>
            <div>
                <h3>Pick up & drive</h3>
                <p>Visit our nearest pickup location and grab your keys. Enjoy a smooth ride with our reliable & well-maintained vehicles.</p>
            </div>
        </div>

    </div>

</section>

<!-- TESTIMONIALS SECTION -->
<section class="testimonials-section reveal">

    <h2 class="testimonial-title reveal">Feedback from satisfied renters</h2>

    <div class="testimonial-grid reveal">

        <!-- ROW 1 -->
        <div class="testimonial-card">
            <div class="rating">★★★★★</div>
            <p>QuickCar made my business trip completely stress-free. Smooth booking and very clean vehicle.</p>
            <span class="user-name">Mark Stevens</span>
        </div>

        <div class="testimonial-card">
            <div class="rating">★★★★☆</div>
            <p>I rely on rentals frequently. The team here is dependable, friendly, and always helpful.</p>
            <span class="user-name">Lisa Anderson</span>
        </div>

        <div class="testimonial-card">
            <div class="rating">★★★★☆</div>
            <p>Fuel-efficient cars and great service. Perfect for long and short trips alike.</p>
            <span class="user-name">Brian T</span>
        </div>

        <!-- ROW 2 -->
        <div class="testimonial-card">
            <div class="rating">★★★★★</div>
            <p>I booked on short notice and still received excellent service. Very reliable!</p>
            <span class="user-name">Emma Johnson</span>
        </div>

        <div class="testimonial-card">
            <div class="rating">★★★★★</div>
            <p>Spacious and comfortable cars. Customer support is extremely responsive.</p>
            <span class="user-name">Jessica Ramirez</span>
        </div>

        <div class="testimonial-card">
            <div class="rating">★★★★★</div>
            <p>The team made it easy to extend my rental. Affordable and flexible!</p>
            <span class="user-name">Laura J.</span>
        </div>

        <!-- ROW 3 -->
        <div class="testimonial-card">
            <div class="rating">★★★★☆</div>
            <p>Cars are always clean. Pickup and drop-off process is extremely smooth.</p>
            <span class="user-name">David Peterson</span>
        </div>

        <div class="testimonial-card">
            <div class="rating">★★★★★</div>
            <p>Great selection of cars. The booking interface is simple and easy to use.</p>
            <span class="user-name">Sophia Miller</span>
        </div>

        <div class="testimonial-card">
            <div class="rating">★★★★★</div>
            <p>Affordable rates and professional service. I recommend QuickCar to everyone.</p>
            <span class="user-name">John Walker</span>
        </div>

    </div>
</section>
<!-- FOOTER -->
<footer class="footer">
    <p>© 2026 QuickCar. All Rights Reserved.</p>
</footer>

</body>
</html>