<?php
include('includes/config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code here

    $adminname = $_POST['adminname'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE adminname='$adminname' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // Login successful, store adminname in session
            $_SESSION['adminname'] = $adminname;

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $login_error = "Invalid adminname or password. Please try again.";
        }
    } else {
        $login_error = "Error: " . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <!-- <title>Neumorphism Login Form UI | CodingNepal</title> -->
      <link rel="stylesheet" href="css-adminlogin/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="content">
         <div class="text">
            Admin Login
         </div>
         <form action="#">
            <div class="field">
               <input type="text" name="adminname" required>
               <span class="fas fa-user"></span>
               <label>Adminname</label>
            </div>
            <br>
            <div class="field">
               <input type="password" name="password" required>
               <span class="fas fa-lock"></span>
               <label>Password</label>
            </div>
            <?php if(isset($login_error)) { ?>
            <div style="color: red;"><?php echo $login_error; ?></div>
        <?php } ?>
            <!-- <div class="forgot-pass">
               <a href="#">Forgot Password?</a>
            </div> -->
            <button>Log in</button>
            <!-- <div class="sign-up">
               Not a member?
               <a href="#">signup now</a>
            </div> -->
         </form>
      </div>
   </body>
</html>