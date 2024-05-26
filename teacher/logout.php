<?php
include('../session.php'); // Replace 'path/to/session.php' with the correct path
session_start();
session_destroy();
header('Location: ../teachermain.php'); // Redirect to the login page
exit;
?>