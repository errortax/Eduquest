
<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_dashboard');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the current row number
if (!isset($_SESSION['row_num'])) {
    $_SESSION['row_num'] = 0;
}

// Get the total number of rows
$total_rows = $conn->query("SELECT COUNT(*) as count FROM courses")->fetch_assoc()['count'];

// Handle the previous button
if (isset($_POST['prev'])) {
    if ($_SESSION['row_num'] > 0) {
        $_SESSION['row_num']--;
    }
}

// Handle the next button
if (isset($_POST['next'])) {
    if ($_SESSION['row_num'] < $total_rows - 1) {
        $_SESSION['row_num']++;
    }
} 

// Check if there are any rows in the courses table
if ($total_rows === 0) {
    echo "No courses available";
} else {
    // Get the current row
    $result = $conn->query("SELECT * FROM courses LIMIT 1 OFFSET {$_SESSION['row_num']}");

    if ($result === false) {
        // The query failed, display an error message
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows === 0) {
        // The query didn't return any rows, display a message
        echo "No courses available";
    } else {
        // Fetch the row as an associative array
        $row = $result->fetch_assoc();

        // Get the PDF path
        $pdf_path = $row['file_path']; // Replace 'file_path' with the actual column name in your database

        // Get the description
        $description = $row['description']; // Replace 'description' with the actual column name in your database

    }
}
?>



<form form action="newhtml.php" method="post" id="navigationForm">
    <input type="submit" name="prev" value="Previous">
    <input type="submit" name="next" value="Next">
</form>
<script>
document.getElementById('navigationForm').addEventListener('submit', function(e) {
    var rowNumber = <?php echo $_SESSION['row_num']; ?>;
    var totalRows = <?php echo $total_rows; ?>;
    if (rowNumber >= totalRows - 1) {
        e.preventDefault(); // Stop the form from submitting
        alert('You have reached the end of the courses. Starting from the beginning.');
        location.reload(); // Refresh the page
    }
});
</script>





<!DOCTYPE html>
<html>
<head>
    <title>Course List</title>
    <link rel="stylesheet" type="text/css" href="newhtml.css">
</head>
<body>
    <h1>Available Courses</h1>
    <ul>
        <?php 
        // Get the current row
        $result = $conn->query("SELECT * FROM courses LIMIT 1 OFFSET {$_SESSION['row_num']}");

        if ($result === false) {
            // The query failed, display an error message
            echo "Error: " . $conn->error;
        } elseif ($result->num_rows === 0) {
            // The query didn't return any rows, display a message
            echo "No courses available";
        } else {
            if ($row = $result->fetch_assoc()): ?>
                <li>
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                <a href="/wt/teacher/uploads/courses/<?php echo htmlspecialchars(basename($row['file_path'])); ?>" target="_blank">Learn More</a>
                </li>
            <?php endif;
        }
        ?>
      
    </ul>
   
    <form action="home.php">
        <input type="submit" value="Back">
    </form>
</body>
</html>

<?php
$conn->close();
?>