<?php
// Check if a session is not already active before starting a new session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/config.php';


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
	// Retrieve package details based on ID
	$packageid = $_GET['id'];
	$query = "SELECT * FROM tourpackage WHERE packageid = '$packageid'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
	// Retrieve form data
	$packageid = $_POST['packageid'];
	$packagename = $_POST['packagename'];
	$packprice = $_POST['packprice'];
	$detail = $_POST['detail'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

	// File upload handling for pic1
	if ($_FILES['pic1']['name']) {
		$pic1_name = $_FILES['pic1']['name'];
		$pic1_tmp_name = $_FILES['pic1']['tmp_name'];
		$pic1_type = $_FILES['pic1']['type'];
		$pic1_size = $_FILES['pic1']['size'];

		$pic1_ext = strtolower(pathinfo($pic1_name, PATHINFO_EXTENSION));
		$pic1_new_name = 'pic1_' . uniqid() . '.' . $pic1_ext; // Unique filename with prefix and timestamp

		$pic1_target = "../admin/uploads/" . $pic1_new_name;

		if (move_uploaded_file($pic1_tmp_name, $pic1_target)) {
			// Update pic1 in the database
			$pic1 = $pic1_target;
		} else {
			echo "Error uploading pic1.";
			exit;
		}
	} else {
		// If no new pic1 uploaded, keep the existing one
		$pic1 = $row['pic1'];
	}

	// File upload handling for pic2
	if ($_FILES['pic2']['name']) {
		$pic2_name = $_FILES['pic2']['name'];
		$pic2_tmp_name = $_FILES['pic2']['tmp_name'];
		$pic2_type = $_FILES['pic2']['type'];
		$pic2_size = $_FILES['pic2']['size'];

		$pic2_ext = strtolower(pathinfo($pic2_name, PATHINFO_EXTENSION));
		$pic2_new_name = 'pic2_' . uniqid() . '.' . $pic2_ext; // Unique filename with prefix and timestamp

		$pic2_target = "../admin/uploads/" . $pic2_new_name;

		if (move_uploaded_file($pic2_tmp_name, $pic2_target)) {
			// Update pic2 in the database
			$pic2 = $pic2_target;
		} else {
			echo "Error uploading pic2.";
			exit;
		}
	} else {
		// If no new pic2 uploaded, keep the existing one
		$pic2 = $row['pic2'];
	}


	// Update data in the database
	$query = "UPDATE tourpackage SET packagename = '$packagename', packprice = '$packprice', detail = '$detail', startdate = '$startdate', enddate = '$enddate', pic1 = '$pic1', pic2 = '$pic2' WHERE packageid = '$packageid'";
	$result = mysqli_query($conn, $query);

	if ($result) {
        // Set session message
        $_SESSION['update_message'] = "Package updated successfully.";
        // Redirect to ManagePackage.php
        header("Location: ManagePackage11.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TRAVELLER | Admin Package Updation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/morris.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<script src="js/jquery-2.1.4.min.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>

</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<?php include('includes/header.php'); ?>

				<div class="clearfix"> </div>
			</div>

			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Tour Package </li>
			</ol>

			<!-- Update Package Form -->
			<div class="grid-form">
				<div class="grid-form1">
					

					<h3>Update Package</h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Package Name" value="<?php echo isset($row['packagename']) ? $row['packagename'] : ''; ?>" required>
									</div>
								</div>
								<!-- Add file input fields for pic1 and pic2 -->
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image-1</label>
									<div class="col-sm-8">
										<input type="file" name="pic1" id="pic1">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image-2</label>
									<div class="col-sm-8">
										<input type="file" name="pic2" id="pic2">
									</div>
								</div>
								<!-- End of file input fields -->
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packprice" id="packprice" placeholder="Package Price" value="<?php echo isset($row['packprice']) ? $row['packprice'] : ''; ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" cols="50" name="detail" id="detail" placeholder="Package Details" required><?php echo isset($row['detail']) ? $row['detail'] : ''; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Start Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="startdate" id="startdate" value="<?php echo isset($row['startdate']) ? $row['startdate'] : ''; ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">End Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="enddate" id="enddate" value="<?php echo isset($row['enddate']) ? $row['enddate'] : ''; ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<input type="hidden" name="packageid" value="<?php echo isset($row['packageid']) ? $row['packageid'] : ''; ?>">
										<button type="submit" name="submit" class="btn-primary btn">Update</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<?php include('includes/footer.php'); ?>

			<!-- Sidebar Menu -->
			<?php include('includes/sidebarmenu.php'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- /Bootstrap Core JavaScript -->

</body>

</html>