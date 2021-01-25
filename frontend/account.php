
<!DOCTYPE html>
<html>
<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!----- ***************** css  ***************** ------>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"></link>

	<!----- ***************** icon  ***************** ------>
	<link rel="shortcut icon" href="myIcon.ico">

	<!----- ***************** fonts  ***************** ------>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

	<!----- ***************** header  ***************** ------>
	<div class="header" id="myHeader">
		<div class="container"> 

			<div class="navbar"> 
				<div class="logo">
					<h1>HGHMNDS</h1>
				</div>

				<nav>
					<ul id="menuItems">
						<li><a href="index.php#myHeader">Home</a></li>
						<li><a href="index.php#myProduct">Products</a></li>
						<li><a href="index.php#myAbout">About</a></li>
						<li><a href="index.php#myContact">Contact</a></li>
						<li><a href="account.html" class="active">Account</a></li>
					</ul>
				</nav>
				<img src="assets/images/cart.png" width="30px" height="30px;">
				<img src="assets/images/menu.png" class="menu-icon" onclick="menuToggleAccount()">
			</div> 

			<div class="row"> 
				<div class="col-2"> 
					<h1>HGHMNDS</h1>
					<p>Never out of place. <br> Smart clothing for everyday living.</p>
					<a href="" class="btn">Buy Now &#8594;</a>
				</div> 

				<div class="col-2"> 
					<div class="form-container"> 
						<div class="form-btn">
							<span onclick="login()">Login</span>
							<span onclick="register()">Register</span>
							<hr id="Indicator">
						</div>

						<form method="POST" id="LoginForm" enctype="multipart/form-data">
							<input type="text" name="" placeholder="Username" id="login-user-username" required=""
							pattern=".{8,}" maxlength="10">
							<input type="password" name="" placeholder="Password" id="login-user-password" required="" pattern=".{8,}" maxlength="10">

							<button type="submit" class="btn">Login</button>
							<a href="">Forgot Password</a>

							<br><br>
							<small id="login-check"></small>
						</form>

						<form method="POST" id="reg-form" enctype="multipart/form-data">
							<input type="text" name="" placeholder="Username" id="txt-user-username" required="" pattern=".{8,}"   required title="Username must be 8-10 characters" maxlength="10">
							<input type="password" name="" placeholder="Password" id="password-user-password" required="" pattern=".{8,}"   required title="Password must be 8-10 characters" maxlength="10">
							<input type="password" name="" placeholder="Confirm Password" id="password-user-password-confirm" required="">

							<button type="submit" class="btn">Register</button>
							<br><br>
							<small id="password-check"></small>
						</form>
					</div>
				</div> 
			</div>
		</div>
	</div>



	<!----- ***************** Footer  ***************** ------>
	<?php include 'user-footer.php';?>



	<!----- ***************** Script  ***************** ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script> 
	<script src="assets/js/script.js"></script>
	
</body>
</html>