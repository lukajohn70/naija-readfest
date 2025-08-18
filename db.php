<?php
// db.php - Database connection for Naija ReadFest
// Local MAMP configuration
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root'; // Default MAMP MySQL password
$DB_NAME = 'naijareadfest'; // You'll need to create this database

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    // For development, let's not die on connection error, just show a warning
    error_log('Database connection failed: ' . $mysqli->connect_error);
    // You can comment out the line below if you want to continue without database
    // die('Database connection failed: ' . $mysqli->connect_error);
}
?> 