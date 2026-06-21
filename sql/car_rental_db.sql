CREATE DATABASE IF NOT EXISTS if0_42235195_car_rental;
USE if0_42235195_car_rental;

-- USERS TABLE
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ADMIN TABLE
CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(255)
);

INSERT INTO admin (username, password)
VALUES ('admin', 'admin123');   -- You can change later

-- CARS TABLE
CREATE TABLE cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    car_name VARCHAR(100),
    car_type VARCHAR(50),
    model_year INT,
    fuel_type VARCHAR(50),
    seats INT,
    price_per_day INT,
    image VARCHAR(255),
    status VARCHAR(20) DEFAULT 'Available'
);

-- BOOKINGS TABLE
CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    car_id INT,
    start_date DATE,
    end_date DATE,
    total_price INT,
    payment_status VARCHAR(20) DEFAULT 'Paid',
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (car_id) REFERENCES cars(car_id)
);

-- FEEDBACK TABLE
CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);