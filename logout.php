<?php
include('session.php');
if(session_destroy()) {
    echo "You have been logged out";
    header("Location: index.html");
}
?>

<script src="script.js"></script>