<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
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

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE login SET username = ?, password = ? WHERE username = ?");
    $stmt->bind_param("sss", $username, $password, $_SESSION["username"]);

    // Execute the statement
    $stmt->execute();

    // Update the session variables
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Redirect back to the profile page
    header("Location: profile.php");
    exit();
}
?>