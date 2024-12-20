<?php
include('config.php');

// Function to get total users
function getTotalUsers() {
    global $conn;
    $query = "SELECT COUNT(*) AS total_users FROM user";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_users'];
}

// Function to get total bookings
function getTotalBookings() {
    global $conn;
    $query = "SELECT COUNT(*) AS total_bookings FROM booking";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_bookings'];
}

// Function to get total cancellations
function getTotalCancellations() {
    global $conn;
    $query = "SELECT COUNT(*) AS total_cancellations FROM cancel_booking";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_cancellations'];
}

// Function to get total revenue
function getTotalRevenue() {
    global $conn;
    $query = "SELECT SUM(totalamount) AS total_revenue FROM payment";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_revenue'];
}
?>
