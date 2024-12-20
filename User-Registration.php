<?php
include('Inc/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    // Insert user data into the database
    $sql = "INSERT INTO user (username, password, firstname, lastname, phone, email, address) 
            VALUES ('$username', '$password', '$firstname', '$lastname', '$phone', '$email', '$address')";
    
    if (mysqli_query($conn, $sql)) {
        // Set session message
        session_start();
        $_SESSION['registration_message'] = 'Registration successful. Please login with your credentials.';

        echo '<script>alert("Registration successful. Please login with your credentials.");</script>';
        // Redirect to login page after successful registration
        echo '<script>window.location = "Userlogin.php";</script>';
        exit();
    }
    
}

?>
<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css-userlogin/style1.css" rel="stylesheet">
</head>

<body>
    <center>
        <a href="" class="navbar-brand">
            <h1 class="m-0 text-primary">Welcome To <span class="text-dark">TRAVEL</span>ER</h1>
        </a>
    </center>
    
    <!-- User Registration Form Start -->
    <div class="wrapper">
        <div class="title">
            Registration Form
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="text" name="firstname" required>
                <label>Firstname</label>
            </div>
            <div class="field">
                <input type="text" name="lastname" required>
                <label>Lastname</label>
            </div>
            <div class="field">
                <input type="text" name="phone" required>
                <label>Phone</label>
            </div>
            <div class="field">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="text" name="address" required>
                <label>Address</label>
            </div>
            <div class="field">
                <input type="submit" value="Register">
            </div>
            <div class="signup-link">
                Already a User? <a href="Userlogin.php">Login now</a>
            </div>
        </form>
    </div>
    <!-- User Registration Form End -->
    
</body>
</html>
