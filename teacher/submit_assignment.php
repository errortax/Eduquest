<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $file = $_FILES['file'];

    $target_dir = "uploads/assignments/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);

    $stmt = $conn->prepare("INSERT INTO assignments (student_id, course_id, file_path) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $student_id, $course_id, $target_file);

    if ($stmt->execute()) {
        echo "Assignment submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
