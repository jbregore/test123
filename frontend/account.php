
<!DOCTYPE html>
<html>
<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"></link>

	<!--icon-->
	<link rel="shortcut icon" href="myIcon.ico">

	<!--fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<div class="header" id="myHeader"><!--start header-->
		<div class="container"> <!--start container-->

			<div class="navbar"> <!--start navbar-->
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
				<img src="assets/images/menu.png" class="menu-icon" onclick="menuToggle()">
			</div> <!--end navbar-->

			<div class="row"> <!--start row-->
				<div class="col-2"> <!--start col-->
					<h1>HGHMNDS</h1>
					<p>Never out of place. <br> Smart clothing for everyday living.</p>
					<a href="" class="btn">Buy Now &#8594;</a>
				</div> <!--end col-->

				<div class="col-2"> <!--start col-->
					<div class="form-container"> <!--start form-->
						<div class="form-btn">
							<span onclick="login()">Login</span>
							<span onclick="register()">Register</span>
							<hr id="Indicator">
						</div>

						<form id="LoginForm">
							<input type="text" name="" placeholder="Username" required="">
							<input type="password" name="" placeholder="Password" required="">

							<button type="submit" class="btn">Login</button>
							<a href="">Forgot Password</a>
						</form>

						<form method="POST" id="reg-form" enctype="multipart/form-data">
							<input type="text" name="" placeholder="Username" id="txt-user-username" required="" pattern=".{8,}"   required title="Username must be 8-10 characters" maxlength="10">
							<input type="password" name="" placeholder="Password" id="password-user-password" required="" pattern=".{8,}"   required title="Password must be 8-10 characters" maxlength="10">
							<input type="password" name="" placeholder="Confirm Password" id="password-user-password-confirm" required="">

							<button type="submit" class="btn">Register</button>
							<br><br>
							<small id="password-check"></small>
						</form>


					</div> <!--end form-->
				</div> <!--end col-->

			</div><!--end row-->


		</div><!--end container-->
	</div><!--end header-->





	<!----- footer ------>
	<div class="footer"> <!----- start footer ------>
		<div class="container"> <!----- start container ------>
			<div class="row"> <!----- start row ------>
				<div class="footer-col-1"> <!----- start col-1 ------>
					<img src="assets/images/logo.jpg">
				</div> <!----- end col-1 ------>

				<div class="footer-col-2"> <!----- start col-2 ------>
					<h3>Download Our App</h3>
					<p>Download App for Android and Ios in your mobile phone.</p>
					<div class="app-logo">
						<img src="assets/images/store-1.png">
						<img src="assets/images/store-2.png">
					</div>
				</div> <!----- end col-2 ------>

				<div class="footer-col-3"> <!----- start col-3 ------>
					<h3>Useful Links</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
					</ul>
				</div> <!----- end col-3 ------> 

				<div class="footer-col-4"> <!----- start col-4 ------>
					<h3>Follow Us</h3>
					<ul>
						<li><a href="https://www.facebook.com/HGHMNDS" target="_blank">Facebook</a></li>
						<li><a href="https://www.instagram.com/highmindsclothing/" target="_blank">Instagram</a></li>
						<li><a href="">Twitter</a></li>
					</ul>
				</div> <!----- end col-4 ------> 

			</div> <!----- end row ------>
			<hr>
			<p class="copyright">Copyright 2020 - Group 1</p>
		</div> <!----- end container ------>
	</div> <!----- end footer ------>



	<!----- script ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script> 
	<script src="assets/js/script.js"></script>
	<script >
		$(document).ready(function(){

			// ********** reg-form submit ********** //
			$('#reg-form').on('submit', function(event){
				event.preventDefault();
				if($("#password-user-password").val() == $("#password-user-password-confirm").val() &&
					$("#txt-user-username").val() != "admin"){
					document.getElementById('password-check').innerHTML = "";
					if (confirm('Are you sure you want to register?')) {

						//json
						var userreg = {
							user_username: $("#txt-user-username").val(),
							user_password: $('#password-user-password').val(),
							user_status: 'Active'
						};
						$.ajax({
							type:'POST',
							url:'../backend/api/users/create.php',
							data:JSON.stringify(userreg),
							contentType: false,
							// cache: false,
							processData:false,
							success: function(data){
								window.alert(data.message);
								location.reload(true);
							},
							error: function (jqXHR, exception) { 
								error_function(jqXHR, exception);
								location.reload(true);
							}
						});//end ajax
					} //yes
					else {

					}//no
				}//check if parehas
				else{
					document.getElementById('password-check').innerHTML = "Password didn't match";
				}
					

 			});//register


 			//error message
 			function error_function(jqXHR, exception){
 				var msg = '';
 				if (jqXHR.status === 0) {
 					msg = 'Not connect.\n Verify Network.';
 				} else if (jqXHR.status == 400) {
 					msg = 'Bad Request. [400]';
 					window.alert("Please fill all the fields.");
 				}else if (jqXHR.status == 404) {
 					msg = 'Requested page not found. [404]';
 				} else if (jqXHR.status == 500) {
 					msg = 'Internal Server Error [500].';
 					window.alert("Invalid Username");
 				} else if (exception === 'parsererror') {
 					msg = 'Requested JSON parse failed.';
 				} else if (exception === 'timeout') {
 					msg = 'Time out error.';
 				} else if (exception === 'abort') {
 					msg = 'Ajax request aborted.';
 				} else {
 					msg = 'Uncaught Error.\n' + jqXHR.responseText;
 				}
 			}
		});
	</script>
</body>
</html>