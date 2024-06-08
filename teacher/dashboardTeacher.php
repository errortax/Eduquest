<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_dashboard');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="sidebar">
        <h2><a href="dashboardTeacher.php" style="text-decoration: none;" id="teacher"> Teacher's Dashboard </a></h2>
        <nav>
            <ul>
                <li><a href="#course-content">Course Content</a></li>
                <li><a href="#messaging">Messaging</a></li>
                <li><a href="#assignments">Assignments</a></li>
                <li><a href="#progress-tracking">Progress Tracking</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </div>
    <div class="main-content">
        <header>
            <a href="dashboardTeacher.php" style="text-decoration:none">
                <h1>Welcome to the Dashboard,
                    <?php
                    echo $_SESSION["username"];
                    ?>!</h1>
            </a>
        </header>
        <section id="course-content">
            <h2>Course Content</h2>
            <form action="upload_course.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Course Title" required>
                <textarea name="description" placeholder="Course Description" required></textarea>
                <input type="file" name="file" required>
                <button type="submit">Upload</button>
            </form>
        </section>
        <section id="messaging">
            <h2>Messaging</h2>
            <form action="send_message.php" method="POST">
                <input type="hidden" name="sender_username" value="teacher_username"> <!-- Teacher's username -->
                <input type="text" name="receiver_username" placeholder="Student Username" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
        <section id="assignments">
            <h2>Assignments</h2>
            <form action="submit_assignment.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="student_id" value="1"> <!-- Student's ID -->
                <input type="text" name="course_id" placeholder="Course ID" required>
                <input type="file" name="file" required>
                <button type="submit">Submit Assignment</button>
            </form>
        </section>
        <section id="progress-tracking">
            <h2>Progress Tracking</h2>
            <!-- Progress tracking content goes here -->
        </section>

        <section>
        <?php
            // Existing PHP code...
        
            // Query the login_history table
            $result = $conn->query("SELECT username FROM login");
        
            // Check if the query was successful
            if ($result === false) {
                die("Failed to query the database: " . $conn->error);
            }
        
            // Fetch the usernames
            $usernames = $result->fetch_all(MYSQLI_ASSOC);
        ?>
        
        <!-- Start of the HTML table -->
        <table border="1">
            <!-- Table heading -->
            <thead>
                <tr>
                    <th>Username</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <?php foreach ($usernames as $username) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($username['username']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End of the HTML table -->
        </section>

    </div>
</body>

</html>