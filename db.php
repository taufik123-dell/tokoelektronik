<?php
$servername = "localhost";
$username = "mobw7774_user_taufik";
$password = "taufik25@";
$dbname = "mobw7774_api_taufik";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
