<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_dashboard";
$conn_teachers = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn_teachers->connect_error) {
    die("Connection failed: " . $conn_teachers->connect_error);
}   die("Connection failed: " . $conn->connect_error);

?>
