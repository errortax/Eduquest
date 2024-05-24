<?php
// Start the session
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database
$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // User exists and password is correct
  $_SESSION["username"] = $username; // Store username in session
  header("Location: http://localhost/wt/home.php");
  exit();
} else {
  // User doesn't exist or password is incorrect
  echo "Login failed";
}

$conn->close();
?>