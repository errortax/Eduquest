<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_dashboard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sender_id = $_POST['sender_username'];
$receiver_id = $_POST['receiver_username'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (sender_username, receiver_username, message) VALUES ('$sender_id', '$receiver_id', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "Message sent";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
