<?php
// create_exhibitors_table.php - Run this once to create the exhibitors table
require_once 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS exhibitors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  org_name VARCHAR(255) NOT NULL,
  contact_name VARCHAR(255) NOT NULL,
  contact_phone VARCHAR(50) NOT NULL,
  contact_email VARCHAR(255) NOT NULL,
  org_profile TEXT NOT NULL,
  num_titles INT NOT NULL,
  booth_requirements TEXT NOT NULL,
  special_requests TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($mysqli->query($sql) === TRUE) {
    echo "Table 'exhibitors' created or already exists.";
} else {
    echo "Error creating table: " . $mysqli->error;
}
$mysqli->close();
?> 