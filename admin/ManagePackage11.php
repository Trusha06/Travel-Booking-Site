<?php
include 'includes/config.php';


// Check if a session is not already active before starting a new session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the update message is set
if (isset($_SESSION['update_message'])) {
    // Display the update message
    echo '<div class="alert alert-success text-center">' . $_SESSION['update_message'] . '</div>';
    // Unset the update message session variable to clear it
    unset($_SESSION['update_message']);
}


// Retrieve all packages from the database
$query = "SELECT * FROM tourpackage";
$result = mysqli_query($conn, $query);

// Retrieve message from URL if present
$message = isset($_GET['message']) ? $_GET['message'] : '';



?>

<!DOCTYPE HTML>
<html>

<head>
    <title>TMS | Manage Packages</title>
    <!-- Include your CSS and JS files here -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .text-center {
    text-align: center;
}

    </style>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <!-- tables -->
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />
    <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();

            $('#table-breakpoint').basictable({
                breakpoint: 768
            });

            $('#table-swap-axis').basictable({
                swapAxis: true
            });

            $('#table-force-off').basictable({
                forceResponsive: false
            });

            $('#table-no-resize').basictable({
                noResize: true
            });

            $('#table-two-axis').basictable();

            $('#table-max-height').basictable({
                tableWrapper: true
            });
        });
    </script>
    <!-- //tables -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->

</head>

<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <?php include('includes/header.php'); ?>

                <div class="clearfix"></div>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Manage Packages</li>
            </ol>

            <div class="grid-form">
                <?php if (!empty($message)) : ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif; ?>
               
                <div class="grid-form1">
                    <h3>Manage Packages</h3>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <table>
                                <tr>
                                    <th>Package Name</th>
                                    <th>Package Price</th>
                                    <th>Detail</th>
                                    <th>PcakageImage-1</th>
                                    <th>PcakageImage-2</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['packagename'] . "</td>";
                                    echo "<td>" . $row['packprice'] . "</td>";
                                    echo "<td>" . $row['detail'] . "</td>";
                                    echo "<td><img src='uploads/" . $row['pic1'] . "' alt='Package Image 1'></td>";
                                    echo "<td><img src='uploads/" . $row['pic2'] . "' alt='Package Image 2'></td>";
                                    echo "<td>" . $row['startdate'] . "</td>";
                                    echo "<td>" . $row['enddate'] . "</td>";
                                    echo "<td>";
                                    if (isset($row['packageid'])) {
                                        echo "<a href='update-package.php?id=" . $row['packageid'] . "'>Edit</a> | <a href='delete_package.php?id=" . $row['packageid'] . "'>Delete</a>";
                                    }
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-block">
                <!-- Additional content for the manage packages page can be added here -->
            </div>

            <?php include('includes/footer.php'); ?>
        </div>

        <?php include('includes/sidebarmenu.php'); ?>
        <div class="clearfix"></div>
    </div>

    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>