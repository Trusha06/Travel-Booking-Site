   <!-- Navbar Start -->
   <?php include('Inc/Header.php'); ?>
    <!-- Navbar End -->
    <html>
        <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        </head>

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Packages</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
   <!-- Packages Start -->
  <form action="booking.php">
   <div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
            <h1>Perfect Tour Packages</h1>
        </div>
        <div class="row">
            <?php
            include('Inc/config.php');

            $query = "SELECT packagename, packprice, detail, pic1, pic2, startdate, enddate FROM tourpackage";
            $result = $conn->query($query);
            if(isset($_SESSION['username'])){
                // Username is set in the session, user is logged in
                $loggedIn = true;
            } else {
                // Username is not set in the session, user is not logged in
                $loggedIn = false;
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $packageName = $row['packagename'];
                $packagePrice = $row['packprice'];
                $packageDetail = $row['detail'];
                $pic1 = $row['pic1'];
                $pic2 = $row['pic2'];
                $startDate = $row['startdate'];
                $endDate = $row['enddate'];

                // Create the slider markup
                
                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '<div class="package-item bg-white mb-2">';
                echo '<div class="owl-carousel owl-theme">';
                echo '<div class="item"><img class="img-fluid" src="uploads/' . $pic1 . '" alt="' . $packageName . '"></div>';
                echo '<div class="item"><img class="img-fluid" src="uploads/' . $pic2 . '" alt="' . $packageName . '"></div>';
                echo '</div>';
                echo '<div class="p-4">';
                echo '<div class="d-flex justify-content-between mb-3">';
                echo '<small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>' . $packageName . '</small>';
                echo '<small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>' . $startDate . ' - ' . $endDate . '</small>';
                echo '</div>';
                echo '<a class="h5 text-decoration-none" href="">' . $packageDetail . '</a>';
                echo '<div class="border-top mt-4 pt-4">';
                echo '<div class="d-flex justify-content-between">';
                echo '<h5 class="m-0">₹' . $packagePrice . '</h5>';
                if($loggedIn){
                    echo '<a href="Booking.php?package=' . urlencode($packageName) . '&price=' . urlencode($packagePrice) . '" class="btn btn-primary">Book</a>'; // Add the Book button here
                } else {
                    echo '<a href="userlogin.php" class="btn btn-primary">Login to Book</a>'; // Redirect to user login page
                }
            
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
</form>
            
    <!-- Packages End -->


    
    <!-- Footer Start -->
    <?php include('Inc/Footer.php'); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


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
    <script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<i class='fa fa-chevron-left'>Prev</i>", "<i class='fa fa-chevron-right'>Next</i>"],
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  });
});
</script>

</body>

</html>