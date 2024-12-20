<!-- Navbar Start -->
<?php include('Inc/Header.php'); ?>

<!-- Navbar End -->

<?php

// Check if a session is not already active before starting a new session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the payment message is set
if (isset($_SESSION['payment_message'])) {
    // Display the payment message
    echo '<div class="container mt-3"><div class="alert alert-primary" role="alert">' . $_SESSION['payment_message'] . '</div></div>';
    // Unset the payment message session variable to clear it
    unset($_SESSION['payment_message']);
}

include('Inc/config.php');
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO feedback (username,email,message) VALUES ('$username', '$email','$message')";

    if (mysqli_query($conn, $sql)) {
        $success_message = "Thank You For Giving Feedback.";
    } else {
        $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase">FEEDBACK</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Feedback</p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Feedback Start -->
<form name="sentMessage" id="feedbackForm" action="feedback.php" method="post" novalidate="novalidate">
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Feedback</h6>
                <h1>Share Your Experience With US</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="username" name="username" placeholder="Your Username" required="required" data-validation-required-message="Please enter your Username" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                        <?php if (isset($success_message)) { ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?php echo $success_message; ?>
                            </div>
                        <?php } ?>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Feedback End -->

<!-- Footer Start -->
<?php include('Inc/Footer.php'); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="feedback.php" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>