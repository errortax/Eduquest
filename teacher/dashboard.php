<?php
include 'config.php';

if (!isset($_SESSION['teacher_id'])) {
    header("Location: login.php");
    exit();
}

// The rest of your dashboard code (as previously provided)
?>
