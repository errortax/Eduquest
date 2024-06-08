<?php
session_start();

// Database connection
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "teacher_dashboard";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("SELECT username, password FROM adminLogin WHERE username = ?");
$stmt->bind_param("s", $_SESSION["username"]);

// Execute the statement
$stmt->execute();

// Bind the result to variables
$stmt->bind_result($username, $password);

// Fetch the data
$stmt->fetch();

// Close the statement and the connection
$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">


<body>
<form action="update_profile.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="new_password" placeholder="New Password" required>
                    <input type="submit" value="Update Profile" id="update-btn">
                </form>
   
</body>

</html>