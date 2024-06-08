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
    <title>User Dashboard</title>
    <link rel="stylesheet" href="home.css">
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
        <section class="welcome">
            <h1>Welcome,
                <?php
                echo $_SESSION["username"];
                ?>!</h1>
            <p>Here's an overview of your progress and upcoming tasks.</p>
        </section>
        <h2>Your Courses</h2>
        <section class="courses">


            <?php
            // Fetch the courses from the database
            $result = $conn->query("SELECT * FROM courses");

            // Check if there are any courses
            if ($result->num_rows > 0) {
                // Output the courses one by one
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="course-card">';
                    echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                    echo '</div>';
                }
            } else {
                echo '<p>No courses found.</p>';
            }
            ?>
        </section>

        <h2>Your Courses</h2>
        <section class="courses">

            <div class="course-card">
                <h3>HTML Basics</h3>
                <p>
                    Learn the fundamentals of HTML and create your first web page.
                </p>
                <a href="newhtml.php">Continue Learning</a>
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

    <div class="chat-container">
    <div class="close-chat">&times;</div>

    <div class="chat-sidebar">
        <h2>Have Any Query?</h2>
        <form id="sendMessageForm">
            <input type="hidden" id="sender_id" value="1"> <!-- Student ID -->
            <input type="hidden" id="receiver_id" value="2"> <!-- Teacher ID -->
            <textarea id="message" placeholder="Type your message"></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    <div class="chat-main">
        <div id="messages"></div>

    </div>
    </div>
    <style>
        .close-chat {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .close-chat:hover {
        color: red;
    }
        .chat-container {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 300px;
            height: 40vh;
            background-color: #f8f8f8;
            border-left: 1px solid #ddd;
            overflow: auto;
            box-shadow: -2px 0 5px 0 rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .chat-sidebar {
            padding: 20px;
            border-bottom: 1px solid #ddd;
        }

        .chat-sidebar h2 {
            margin: 0 0 20px;
            font-size: 20px;
            color: #333;
        }

        .chat-sidebar textarea {
            width: 100%;
            height: 60px;
            padding: 10px;
            border: 1px solid #ddd;
            resize: none;
        }

        .chat-sidebar button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;

            cursor: pointer;
        }

        .chat-sidebar button:hover {
            background-color: #0056b3;
        }

        .chat-main {
            padding: 20px;
        }

        .chat-main #messages {
            margin-top: 20px;
        }
    </style>
    <script>
        var chatContainer = document.querySelector('.chat-container');
        var closeChat = document.querySelector('.close-chat');
    
        closeChat.addEventListener('click', function() {
            if (chatContainer.style.bottom === '0px') {
                chatContainer.style.bottom = '-40vh'; // Hide the chat container
                closeChat.innerHTML = '&#9650;'; // Change the close button to an up arrow
            } else {
                chatContainer.style.bottom = '0px'; // Show the chat container
                closeChat.innerHTML = '&times;'; // Change the close button to a cross
            }
        });
    </script>


    <footer>
        <p>&copy; 2024 Eduquest. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>