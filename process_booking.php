<?php

include('Inc/config.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true || !isset($_SESSION['userid'])) {
    header("location: Userlogin.php");
     exit;
 }

// Retrieve user ID from session
$userid = $_SESSION['userid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $packageName = $_POST['packagename'];
    $packageAmount = $_POST['amount'];
    $numberOfPersons = $_POST['person'];

    // Insert data into the booking table
    $insert_query = "INSERT INTO booking (userid,fullname, phone, email, packagename, amount, person) VALUES ('$userid','$fullName', '$phone', '$email', '$packageName', '$packageAmount', '$numberOfPersons')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        // Booking successful, display a JavaScript alert
        echo '<script>alert("Booking is confirmed. Payment incomplete. Please proceed to payment.");</script>';
        // Delay the redirection for a few seconds
        echo '<meta http-equiv="refresh" content="0;url=payment.php">';
       
        exit();
    } else {
        // Handle error
        echo "Error: " . mysqli_error($conn);
    }
    
}
?>
