<?php
$servername = "localhost"; // Or your DB server IP/hostname
$username = "root";       // Default XAMPP username
$password = "";           // Default XAMPP password (empty)
$dbname = "maxfitness";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully"; // Optional: for testing connection, remove for production
?>
