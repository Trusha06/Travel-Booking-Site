<?php
include('Inc/Header.php');
include('Inc/config.php');

// Connect to the database
$conn = new mysqli($servername, $dbusername, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a session is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['userid'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: Userlogin.php");
    exit();
}

// Get the user ID of the logged-in user
$userid = $_SESSION['userid'];

// Fetch data from the booking table
$sql = "SELECT packageName, person, amount FROM booking WHERE userid =  $userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the selected package
    while ($row = $result->fetch_assoc()) {
        $packageName = $row["packageName"];
        $person = $row["person"];
        $amount = $row["amount"];
    }
} else {
    echo "No package selected for the logged-in user.";
}

// Fetch the username of the logged-in user
$sql_username = "SELECT username FROM user WHERE userid = $userid";
$result_username = $conn->query($sql_username);

if ($result_username->num_rows > 0) {
    $row_username = $result_username->fetch_assoc();
    $username = $row_username["username"];
} else {
    $username = "Guest";
}

$conn->close();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a new connection to insert payment data
    $conn = new mysqli($servername, $dbusername, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Calculate total amount
    $totalAmount = $_POST['amount'] * $_POST['person'];

    // Prepare SQL statement to insert payment data
    $stmt = $conn->prepare("INSERT INTO payment (userid, packagename, totalamount, city, state, pincode, cardholdername, cardnumber, exp_month, exp_Year, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    $stmt->bind_param("isissssssss", $userid, $packageName, $totalAmount, $_POST['city'], $_POST['state'], $_POST['pincode'], $_POST['cardName'], $_POST['cardNumber'], $_POST['expM'], $_POST['expYear'], $_POST['cvv']);



    // Execute the prepared statement
    if ($stmt->execute()) {

        // Set session variable with the message
        $_SESSION['payment_message'] = "Payment successfully Processed.";
        // Payment successfully processed, redirect to feedback page with success message
        header("Location: feedback.php?status=success");

        exit(); // Ensure that script execution stops after redirect
    } else {

        // Set session variable with the error message
        $_SESSION['payment_message'] = "Error processing payment: " . $conn->error;
        // Payment failed, redirect to feedback page with error message
        header("Location: feedback.php?status=error");
        exit(); // Ensure that script execution stops after redirect
    }











    // Close statement and connection
    $stmt->close();
    $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/payment.css">

</head>

<body>
    <div class="container">

        <form method="POST">

            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>Amount Per Person</span>
                        <input type="number" name="amount" id="amount" value="<?php echo $amount; ?>" readonly>

                    </div>

                    <div class="inputBox">
                        <span>Total Amount</span>
                        <input type="number" name="totalamount" id="totalAmount" readonly>
                    </div>

                    <div class="inputBox">
                        <span>Package Name :</span>
                        <input type="text" value="<?php echo $packageName; ?>" name="packageName" readonly>
                    </div>

                    <div class="inputBox">
                        <span>Userame :</span>
                        <input type="text" value="<?php echo $username; ?>" name="username" readonly>

                    </div>
                    <div class="inputBox">
                        <span>Person:</span>
                        <input type="number" value="<?php echo $person; ?>" name="person" id="person" readonly>
                    </div>
                    <!-- <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" placeholder="Email" name="email" required>
                    </div> -->

                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="Enter Your City Name" name="city">
                    </div>


                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="State Name" name="state">
                        </div>
                        <div class="inputBox">
                            <span>pin code :</span>
                            <input type="text" placeholder="123 456" name="pincode">
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="img/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" placeholder="Card Holder Name" name="cardName" required>
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="text" placeholder="1111-2222-3333-4444" name="cardNumber" required>
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="Ex:january" name="expM" required>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="text" placeholder="Ex:2022" name="expYear" required>
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="password" placeholder="1234" name="cvv" required>
                        </div>
                    </div>

                </div>

            </div>

            <input type="submit" value="proceed to checkout" class="submit-btn" name="checkout">

        </form>

    </div>
    <!-- Footer Start -->
    <?php include('Inc/Footer.php'); ?>
    <!-- Footer End -->

    <!--JAVA Scirpt For Multiply Per Person Amount * Totalamount-->
    <script>
        // Calculate and update the total amount
        document.addEventListener('DOMContentLoaded', function() {
            var amountPerPerson = document.getElementById('amount').value;
            var person = document.getElementById('person').value;
            var totalAmountField = document.getElementById('totalAmount');

            function calculateTotalAmount() {
                var totalAmount = amountPerPerson * person;
                totalAmountField.value = totalAmount;
            }

            calculateTotalAmount();

            // Recalculate total amount if the number of persons changes
            document.getElementById('person').addEventListener('input', function() {
                person = this.value;
                calculateTotalAmount();
            });
        });
    </script>
</body>

</html>