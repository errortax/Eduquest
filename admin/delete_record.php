<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_dashboard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = $_POST['table'];
$id = $_POST['id'];

$delete_query = "DELETE FROM $table WHERE id = $id";

if ($conn->query($delete_query) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
