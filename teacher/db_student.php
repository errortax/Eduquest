<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn_login = new mysqli($servername, $username, $password, $dbname);

if ($conn_login->connect_error) {
    die("Connection failed: " . $conn_login->connect_error);
}
?>
