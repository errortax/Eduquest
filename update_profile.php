<?php
// File path: update_password.php

// Database connection parameters
$host = 'localhost';
$dbname = 'users';
$user = 'root';
$pass = '';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form data is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];

        // Basic validation
        if (!empty($username) && !empty($new_password)) {
            // Hash the new password for security
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Prepare the SQL update statement
            $sql = "UPDATE login SET password = :password WHERE username = :username";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Password updated successfully.";
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "Please fill in both fields.";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
