<?php
session_start();
if (isset($_SESSION['user_id'])) {
} else {
	header("Location: account.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!----- ***************** css  ***************** ------>
	<link rel="stylesheet" type="text/css" href="assets/css/user_dash.css">
	</link>

	<!----- ***************** icon  ***************** ------>
	<link rel="shortcut icon" href="myIcon.ico">

	<!----- ***************** fonts  ***************** ------>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
	<input type="hidden" name="" id="user_id">
	<input type="hidden" name="" id="user_username">



	<!----- ***************** header  ***************** ------>
	<?php include 'user-header.php'; ?>



	<!----- ***************** settings  ***************** ------>

	<div class="small-container-settings" id="myProduct">

		<div id="title-hide">
			<h2 class="title">Change Password</h2>
		</div>

		<div class="modal-body-settings">
			<form id="settings-form">
				<label for="old-pass">Old Password :</label>
				<input type="password" id="pass-old-pass" required="" pattern=".{8,}" maxlength="10"><br>

				<label for="new-pass">New Password :</label>
				<input type="password" id="pass-new-pass" required="" pattern=".{8,}" maxlength="10"><br>

				<label for="conf-pass">Confirm Password :</label>
				<input type="password" id="pass-conf-pass" required="" pattern=".{8,}" maxlength="10"><br>

				<button type="submit" id="pass-btn">Change</button>
			</form>
		</div>


	</div>




	<!----- ***************** Footer  ***************** ------>
	<?php include 'user-footer.php'; ?>



	<!----- ***************** Script  ***************** ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="https://www.paypal.com/sdk/js?client-id=AddPIpJncddMsIOBh1Q7dof9I_XtD8AAEdHB-CZma5MFNcgL9I0TBCqv_Nl9HK-Z2-S3eGmOTFVYZU3V&disable-funding=credit,card"></script>
	<script src="assets/js/user_settings.js"></script>



</body>

</html>