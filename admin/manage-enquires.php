<?php include('includes/config.php'); ?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TRAVELLER | Admin Manage Enquiries</title>
	<!-- Include necessary styles and scripts -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="css/table-style.css" />
	<link rel="stylesheet" type="text/css" href="css/basictable.css" />
	<script src="js/jquery-2.1.4.min.js"></script>
</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<?php include('includes/header.php'); ?>
				<div class="clearfix"></div>
			</div>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Enquiries</li>
			</ol>
			<div class="agile-grids">
				<div class="agile-tables">
					<div class="w3l-table-info">
						<h2>Manage Enquiries</h2>

						<!-- Success/Error Message -->
						<?php
						if (isset($_GET['message'])) {
							echo "<div class='succWrap'>" . htmlspecialchars($_GET['message']) . "</div>";
						}
						?>

						<!-- Display Table -->
						<table id="table">
							<thead>
								<tr>
									<th>Fullname</th>
									<th>Username</th>
									<th>Email</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM contact";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {
										echo "<tr>";
										echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
										echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
										echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
										echo "<td>" . htmlspecialchars($row["subject"]) . "</td>";
										echo "<td>" . htmlspecialchars($row["message"]) . "</td>";
										// Add Delete Button
										echo "<td><a href='delete_contact.php?id=" . $row["contact_id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
										echo "</tr>";
									}
								} else {
									echo "<tr><td colspan='6'>No enquiries found.</td></tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<?php include('includes/footer.php'); ?>
			</div>
		</div>
		<?php include('includes/sidebarmenu.php'); ?>
	</div>

	<script src="js/bootstrap.min.js"></script>
</body>

</html>
