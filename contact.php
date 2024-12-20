<!--Navbar Start-->
<?php include('Inc/Header.php');?>

<!--Navbar End-->
<?php
include('Inc/config.php');
$success=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
//    $fullname=mysqli_real_escape_string($conn, $_POST['fullname']);
   
    $username = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $fullname =  $_POST['fullname'];

    // Insert data into the database
    $sql = "INSERT INTO contact (full_name, username, email, `subject`, `message`) VALUES ('$fullname', '$username', '$email', '$subject', '$message')";
    
    $result=(mysqli_query($conn, $sql));
    if($result){
        $success=true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// mysqli_close($conn);
?>
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Contact</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <!-- <form name="sentMessage" id="contactForm"  novalidate="novalidate"> -->
    <!-- Form fields -->


    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                <h1>Contact For Any Enquiry</h1>
            </div>
           
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                    <?php
           if($success){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Feedback Submited Successfully!</strong>We Will Be In Touch With You Through Your Email Soon.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
           }
           
           ?>
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm"  action="contact.php" method="POST" novalidate="novalidate">
                            <div class="form-row">
                              
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" name="fullname" placeholder="Your Fullname" required="required" data-validation-required-message="Please enter your Fullname" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" name="name" placeholder="Your Username" required="required" data-validation-required-message="Please enter your Username" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control p-4" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your Email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" name="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit" id="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- </form> -->
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php include('Inc/Footer.php');?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script> -->

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>