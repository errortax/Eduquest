<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">Eduquest</div>
            <ul>
                <li><a href="home.php">Dashboard</a></li>
            
                <li><a href="courses.php">Courses</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="logout.php" id="logout-btn">Logout</a></li>
            
            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome">
            <h1>Welcome,  
                <?php
            echo $_SESSION["username"];
            ?>!</h1>
            <p>Here's an overview of your progress and upcoming tasks.</p>
        </section>

        <section class="overview">
            <div class="card">
                <h3>Enrolled Courses</h3>
                <p>You are enrolled in 4 courses.</p>
            </div>
            <div class="card">
                <h3>Progress</h3>
                <p>You have completed 75% of your courses.</p>
            </div>
            <div class="card">
                <h3>Upcoming Tasks</h3>
                <p>You have 2 tasks due this week.</p>
            </div>
        </section>

        <section class="courses">
            <h2>Your Courses</h2>
            <div class="course-list">
                <div class="course-card">
                    <h3>HTML Basics</h3>
                    <p>Progress: 80%</p>
                    <a href="html.php">Continue Learning</a>
                </div>
                <div class="course-card">
                    <h3>CSS Fundamentals</h3>
                    <p>Progress: 60%</p>
                    <a href="css.php">Continue Learning</a>
                </div>
                <div class="course-card">
                    <h3>JavaScript Essentials</h3>
                    <p>Progress: 50%</p>
                    <a href="jsp.php">Continue Learning</a>
                </div>
                <div class="course-card">
                    <h3>Bootstrap Mastery</h3>
                    <p>Progress: 40%</p>
                    <a href="bootstrap.html">Continue Learning</a>
                </div>
            </div>
        </section>

        <section class="tasks">
            <h2>Upcoming Tasks</h2>
            <form id="task-form">
                <div class="form-group">
                    <label for="task-name">Task Name:</label>
                    <input type="text" id="task-name" name="task-name" required>
                </div>
                <div class="form-group">
                    <label for="due-date">Due Date:</label>
                    <input type="date" id="due-date" name="due-date" required>
                </div>
                <button type="submit">Add Task</button>
            </form>
            <ul id="task-list">
                <!-- Dynamically added tasks will appear here -->
            </ul>
            <button id="delete-tasks">Delete All Tasks</button>

            <script>
                document.getElementById("delete-tasks").addEventListener("click", function() {
                    document.getElementById('task-list').innerHTML = '';
                });
            </script>
            
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Eduquest. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
