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
$columns = $_POST['columns'];

$update_query = "UPDATE $table SET ";
$update_parts = [];

foreach ($columns as $column => $value) {
    $update_parts[] = "$column = '$value'";
}

$update_query .= implode(", ", $update_parts);
$update_query .= " WHERE id = $id";

if ($conn->query($update_query) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
