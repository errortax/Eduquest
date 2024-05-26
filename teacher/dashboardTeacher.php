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
        <h2>Teacher's Dashboard</h2>
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
            <h1>Welcome to the Dashboard</h1>
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
                <input type="hidden" name="sender_id" value="1"> <!-- Teacher's ID -->
                <input type="text" name="receiver_id" placeholder="Student ID" required>
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
    </div>
</body>
</html>
