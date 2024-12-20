<?php
include 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Delete package logic here
    $packageid = $_GET['id'];
    $query = "DELETE FROM tourpackage WHERE packageid = '$packageid'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect back to manage packages page with success message
        header("Location: ManagePackage11.php?message=Package+deleted+successfully");
        exit;
    } else {
        // Redirect back to manage packages page with error message
        header("Location: ManagePackage11.php?message=Error+deleting+package");
        exit;
    }
} else {
    // Redirect back to manage packages page with error message if ID is not provided
    header("Location: ManagePackage11.php?message=Package+ID+not+provided");
    exit;
}
?>
