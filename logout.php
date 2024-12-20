<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: home.php"); // Redirect to the home page after logout
    exit();
}
?>
