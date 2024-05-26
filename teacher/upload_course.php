<?php
include 'db.php';

// Define directory paths
$base_dir = __DIR__;
$upload_dir = $base_dir . '/uploads/';
$course_dir = $upload_dir . 'courses/';
$assignment_dir = $upload_dir . 'assignments/';

// Create directories if they do not exist
if (!file_exists($course_dir)) {
    mkdir($course_dir, 0777, true);
}

if (!file_exists($assignment_dir)) {
    mkdir($assignment_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_FILES['file'];

    $target_file = $course_dir . basename($file["name"]);

    // Attempt to move the uploaded file
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO courses (title, description, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $target_file);

        if ($stmt->execute()) {
            echo "<script>alert('Course uploaded successfully.')</script>";
            header("Location: dashboardTeacher.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Log detailed error information
        error_log("Failed to move uploaded file: " . $file["tmp_name"] . " to " . $target_file);
        error_log("Error details: " . print_r(error_get_last(), true));
        echo "Error uploading file.";
    }

    $conn->close();
}
?>
