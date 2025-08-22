-- Database Schema for Naija ReadFest Volunteer Meal Booking System

-- Create the database
CREATE DATABASE IF NOT EXISTS naijareadfest_meals;
USE naijareadfest_meals;

-- Volunteers table
CREATE TABLE volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    role ENUM('media', 'marathoner', 'independent_witness', 'timekeeper', 'management', 'medical'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Meal bookings table
CREATE TABLE meal_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    volunteer_id INT NOT NULL,
    booking_date DATE NOT NULL,
    breakfast BOOLEAN DEFAULT FALSE,
    lunch BOOLEAN DEFAULT FALSE,
    dinner BOOLEAN DEFAULT FALSE,
    dietary_requirements TEXT,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (volunteer_id) REFERENCES volunteers(id) ON DELETE CASCADE,
    UNIQUE KEY unique_volunteer_date (volunteer_id, booking_date)
);

-- Meal times table (for reference)
CREATE TABLE meal_times (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meal_type ENUM('breakfast', 'lunch', 'dinner') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default meal times
INSERT INTO meal_times (meal_type, start_time, end_time, description) VALUES
('breakfast', '07:00:00', '09:00:00', 'Continental & Local breakfast with coffee and tea'),
('lunch', '12:00:00', '14:00:00', 'Nigerian cuisine with soft drinks'),
('dinner', '18:00:00', '20:00:00', 'International & Local dinner with beverages');

-- Create indexes for better performance
CREATE INDEX idx_booking_date ON meal_bookings(booking_date);
CREATE INDEX idx_volunteer_email ON volunteers(email);
CREATE INDEX idx_booking_status ON meal_bookings(status);

-- Sample data for testing
INSERT INTO volunteers (name, email, phone) VALUES
('John Doe', 'john.doe@example.com', '+2348012345678'),
('Jane Smith', 'jane.smith@example.com', '+2348098765432'),
('Michael Johnson', 'michael.johnson@example.com', '+2348076543210');

-- Sample meal bookings
INSERT INTO meal_bookings (volunteer_id, booking_date, breakfast, lunch, dinner, dietary_requirements, status) VALUES
(1, '2025-08-12', TRUE, TRUE, FALSE, 'No special requirements', 'confirmed'),
(2, '2025-08-13', TRUE, TRUE, TRUE, 'Vegetarian diet preferred', 'pending'),
(3, '2025-08-14', FALSE, TRUE, TRUE, 'Gluten-free options needed', 'confirmed');
