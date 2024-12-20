<html>

<head>
   <link href="css/style.css" rel="stylesheet">
   <link href="css-userlogin/style1.css" rel="stylesheet">

</head>

<body>
   <?php
   include('Inc/config.php');


   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Include database connection code here

      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        
         if (mysqli_num_rows($result) == 1) {
            while($row=mysqli_fetch_assoc($result)){
            // Login successful, store username in session
            
            session_start();
           // $_SESSION['loggedin'] = $loggedin;
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $row['userid'];

            // Redirect to homepage
            header("Location: home.php");
            exit();
            }
         } else {
            $login_error = "Invalid username or password. Please try again.";
         }
      } else {
         $login_error = "Error: " . mysqli_error($conn);
      }
   
   }


   ?>
   <center> <a href="" class="navbar-brand">
         <h1 class="m-0 text-primary">Welcome To <span class="text-dark">TRAVEL</span>ER</h1>
      </a></center>
   <!-- User Login Start -->
   <div class="wrapper">
      <div class="title">
         Login Form
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
         <div class="content">

            <!-- <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div> -->
         </div>
         <div class="field">
            <input type="submit" value="Login">
         </div>
         <?php if (isset($login_error)) { ?>
            <div style="color: red;"><?php echo $login_error; ?></div>
         <?php } ?>
         <div class="signup-link">
            Not a User? <a href="User-Registration.php">Signup now</a>
         </div>
      </form>
   </div>
   <!-- User Login End -->
</body>

</html>