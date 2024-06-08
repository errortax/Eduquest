<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher_dashboard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sender_id = $_GET['sender_username'];
$receiver_id = $_GET['receiver_username'];

$sql = "SELECT * FROM messages WHERE (sender_username = '$sender_id' AND receiver_username = '$receiver_id') OR (sender_username = '$receiver_id' AND receiver_username = '$sender_id') ORDER BY timestamp ASC";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
echo json_encode($messages);

$conn->close();
?>
