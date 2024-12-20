<?php include 'Inc/Header.php';
include('Inc/config.php');

// Check if a session is not already active before starting a new session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    // Redirect the user to the login page if not logged in
    header("Location: Userlogin.php");
    exit();
}

// Get the logged-in user's ID from the session
$userid = $_SESSION['userid'];

// Check if the cancel button is clicked
if (isset($_GET['id'])) {
    $cancel_id = $_GET['id'];

    // Retrieve the booking information
    $booking_sql = "SELECT * FROM booking WHERE bookingid = $cancel_id AND userid = $userid";
    $booking_result = mysqli_query($conn, $booking_sql);
    $booking_row = mysqli_fetch_assoc($booking_result);

    // Insert the user ID and total amount into the Cancel Booking table
    $total_amount = $booking_row['person'] * $booking_row['amount'];
    $insert_sql = "INSERT INTO cancel_booking (userid, total_amount) VALUES ($userid, $total_amount)";
    mysqli_query($conn, $insert_sql);



    // Delete the booking with the specified ID for the logged-in user
    $delete_sql = "DELETE FROM booking WHERE bookingid = $cancel_id AND userid = $userid";
    mysqli_query($conn, $delete_sql);

    // Display success message after cancellation
    echo "<script>alert('You have successfully canceled your package.You Get Your Payment Refund Soon.');</script>";
}

// Query to retrieve booked packages for the logged-in user
$sql = "SELECT * FROM booking WHERE userid = $userid";
$result = mysqli_query($conn, $sql);




?>
<link href="css/myacc.css">
</section>
<section class="page-section">
    <div class="container">
        <div class="w-100 justify-content-between d-flex">
            <h4><b>Booked Packages</b></h4>
            <!-- <a href="./?page=edit_account" class="btn btn btn-primary btn-flat"><div class="fa fa-user-cog"></div> Manage Account</a> -->
        </div>
        <hr class="border-warning">
        <table class="table table-stripped text-dark">
            <colgroup>
                <col width="5%">
                <col width="10">
                <col width="25">
                <col width="25">
                <col width="15">
                <col width="10">
            </colgroup>
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Package</th>
                    <th>Person</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    // Calculate total amount by multiplying person and amount
                    $total_amount = $row['person'] * $row['amount'];
                    // Display the booked package information in table rows
                    echo "<tr>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['packagename'] . "</td>";
                    echo "<td>" . $row['person'] . "</td>";
                    echo "<td>₹" . $row['amount'] . "</td>";
                    echo "<td>₹" . $total_amount . "</td>";
                    echo "<td><button class='cancel-btn' onclick='cancelBooking(" . $row['bookingid'] . ")'>Cancel</button></td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
</section>
<style>
    .cancel-btn {
        background-color: #ff0000;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .cancel-btn:hover {
        background-color: #cc0000;
    }
</style>
<script>
    function cancelBooking(bookingId) {
        if (confirm('Are you sure you want to cancel this booking?')) {
            window.location.href = 'myaccount.php?id=' + bookingId;
        }
    }
</script>


<?php include 'Inc/Footer.php'; ?>