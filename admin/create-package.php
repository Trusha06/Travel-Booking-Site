<?php
include 'includes/config.php';

if (isset($_POST['submit'])) {
	$packagename = $_POST['packagename'];
	$packprice = $_POST['packprice'];
	$detail = $_POST['detail'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];

	// File upload handling for Package Image 1
	$file1 = $_FILES['pic1'];
	$file1_name = $file1['name'];
	$file1_tmp = $file1['tmp_name'];
	$file1_path = '../admin/uploads/' . $file1_name; // Set your desired upload directory

	move_uploaded_file($file1_tmp, $file1_path);

	// File upload handling for Package Image 2
	$file2 = $_FILES['pic2'];
	$file2_name = $file2['name'];
	$file2_tmp = $file2['tmp_name'];
	$file2_path = '../admin/uploads/' . $file2_name; // Set your desired upload directory

	move_uploaded_file($file2_tmp, $file2_path);


	// Example query (make sure to sanitize and validate input to prevent SQL injection)
	$query = "INSERT INTO tourpackage (packagename, packprice, detail, pic1, pic2, startdate, enddate) 
          VALUES ('$packagename', '$packprice', '$detail', '$file1_path', '$file2_path', '$startdate', '$enddate')";


	// Check if the query was successful
	// Execute the query
	if (mysqli_query($conn, $query)) {
		// Display success message
		echo "<div style='text-align: center;'><p>Tour Package Added Successfully!</p></div>";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>TMS | Admin Package Creation</title>

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
		<!--/content-inner-->
		<div class="left-content">
			<div class="mother-grid-inner">
				<!--header start here-->
				<?php include('includes/header.php'); ?>

				<div class="clearfix"> </div>
			</div>
			<!--heder end here-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Create Package </li>
			</ol>
			<!--grid-->
			<div class="grid-form">

				<!---->
				<div class="grid-form1">
					<h3>Create Package</h3>
					<!-- <div class="errorWrap"><strong></strong>: </div>
			<div class="succWrap"><strong></strong>: </div> -->
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Create Package" required>
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packprice" id="packprice" placeholder=" Package Price" required>
									</div>
								</div>




								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" cols="50" name="detail" id="detail" placeholder="Package Details" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image-1</label>
									<div class="col-sm-8">
										<input type="file" name="pic1" id="pic1" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image-2</label>
									<div class="col-sm-8">
										<input type="file" name="pic2" id="pic2" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Start Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="startdate" id="startdate" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">End Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control1" name="enddate" id="enddate" required>
									</div>
								</div>


								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" name="submit" class="btn-primary btn">Create</button>

										<button type="reset" class="btn-inverse btn">Reset</button>
									</div>
								</div>





						</div>

						</form>





						<div class="panel-footer">

						</div>
						</form>
					</div>
				</div>
				<!--//grid-->

				<!-- script-for sticky-nav -->
				<script>
					$(document).ready(function() {
						var navoffeset = $(".header-main").offset().top;
						$(window).scroll(function() {
							var scrollpos = $(window).scrollTop();
							if (scrollpos >= navoffeset) {
								$(".header-main").addClass("fixed");
							} else {
								$(".header-main").removeClass("fixed");
							}
						});

					});
				</script>
				<!-- /script-for sticky-nav -->
				<!--inner block start here-->
				<div class="inner-block">

				</div>
				<!--inner block end here-->
				<!--copy rights start here-->
				<?php include('includes/footer.php'); ?>
				<!--COPY rights end here-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include('includes/sidebarmenu.php'); ?>
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