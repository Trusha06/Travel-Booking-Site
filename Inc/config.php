<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "localhost"; 
$dbusername = "root"; 
$password = ""; 
$dbname = "travel"; 

// Create connection
$conn = mysqli_connect($servername, $dbusername, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
