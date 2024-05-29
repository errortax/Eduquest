<?php
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

// Function to sanitize user input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    // Check if username already exists
    $sql = "SELECT * FROM login WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = "Username already taken.";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Insert the new user into the database
        $sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("Location:login.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .signup-container h2 {
            margin-bottom: 20px;
        }

        .signup-container form {
            display: flex;
            flex-direction: column;
        }

        .signup-container form input[type="text"],
        .signup-container form input[type="password"] {
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .signup-container form input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: navy;
            color: white;
            cursor: pointer;
        }

        .signup-container form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <?php
        if (!empty($error)) {
            echo '<p class="error">' . $error . '</p>';
        }
        ?>
        <form action="signup.php" method="post" onsubmit="return handleSignup(event)">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Sign Up">
        </form>
        <br>
        Already have an account?
        <a href="login.php"> Login here</a>
    </div>
</body>

</html>