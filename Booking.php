<?php include('Inc/Header.php'); ?>
<?php include('Inc/config.php'); 
// Retrieve package details from URL parameters
if (isset($_GET['package']) && isset($_GET['price'])) {
    $packageName = $_GET['package'];
    $packagePrice = $_GET['price'];
} else {
    // If package details are not provided, set default values or handle the error
    $packageName = '';
    $packagePrice = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Booking Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css-userlogin/style1.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Set the background color with some opacity */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            /* Apply a blur effect to the background */
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('img/background.jpg');
            /* Replace 'background.jpg' with the actual image file name */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }
    </style>
   
</head>

<body>
    <div class="container">

        <h1>Booking Form</h1>

        <form method="POST" action="process_booking.php">

            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name">
            </div>
           
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="package-name">Package Name</label>
                <input type="text" id="packagename" name="packagename" value="<?php echo $packageName; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" value="<?php echo $packagePrice; ?>" readonly>

            </div>
            <div class="form-group">
                <label for="person">Number of Persons</label>
                <select id="person" name="person">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Book Now">
            </div>
        </form>
    </div>
</body>
<?php include('Inc/Footer.php');?>
</html>
