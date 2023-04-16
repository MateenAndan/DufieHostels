<?php
// db_config.php

// Database configuration
$db_host = 'localhost';
$db_name = 'dufie_hostels';
$db_user = 'root';
$db_password = '';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

    // Set the error mode to throw exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Uncomment the line below to show a success message (for testing purposes only)
    // echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // Display an error message if the connection fails
    echo "Connection failed: " . $e->getMessage();
}
