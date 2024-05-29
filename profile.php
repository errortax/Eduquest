<?php
session_start();

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
$stmt = $conn->prepare("SELECT username, password FROM login WHERE username = ?");
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

<!-- The rest of your profile.php code goes here -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Eduquest</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">Eduquest</div>
            <ul>
            <li><a href="home.php">Dashboard</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a id="zoomLink">Zoom In </a></li>
                <li><a href="logout.php" id="logout-btn">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="profile-header">
            <h1>Your Profile</h1>
            <p>Manage your personal information and view your learning progress.</p>
        </section>

        <section class="profile-info">
            <h2>Personal Information</h2>
            <form>
                <div class="form-group">
                    <label for="first-name">Username:</label>
                    <p class="profile-details">Username: <span class="profile_span" id="username">
                            <?php
                            echo $username;
                            ?>
                        </span></p>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <p class="profile-details">Password: <span class="profile_span" id="password">
                            <?php echo $password; ?>
                        </span></p>
                </div>
           
            
            <div id="edit-options">
                <form id="edit-form" action="update_profile.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $username; ?>">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>">
                    <input type="submit" value="Update Profile" id="update-btn">
                </form>
            </div>
            
          
            </form>
        </section>

      
    </main>
   
    <footer>
        <p>&copy; 2024 Eduquest. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>