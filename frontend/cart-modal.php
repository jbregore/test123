<!-- <?php
// session_start();

// if(isset($_SESSION['user_id'])){
// 		//pass the json data here
// 		//mag query gamit ang user_id
// }
// else{
// 	header("Location: account.php");
// 	exit;
// }

?>
 -->

<!DOCTYPE html>
<html>
<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/user_dash.css"></link>

	<!--icon-->
	<link rel="shortcut icon" href="myIcon.ico">

	<!--fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<div class="header" id="myHeader"><!--start header-->

			<div class="navbar"> <!--start navbar-->
				<div class="logo">
					<h1>HGHMNDS</h1>
				</div>

				<nav>
					<ul id="menuItems">
						<li><a href="" class="active">T-Shirts</a></li>
						<li><a href="">Hoodies</a></li>
						<li><a href="">Cap</a></li>
						<li><a href="">Settings</a></li>
						<li><a href="" >Logout</a></li>
					</ul>
				</nav>
				<span>0</span>
				<img src="assets/images/cart.png" width="30px" height="30px;" class="cart-icon">

				<img src="assets/images/menu.png" class="menu-icon" onclick="menuToggle()">
			</div> <!--end navbar-->
	</div><!--end header-->


	<!-- cart html -->
	<div class="small-container cart-page">
		<table>
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Subtotal</th>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-1.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-2.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-3.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-2.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-3.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-2.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-3.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-2.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
			<tr>
				<td>
					<div class="cart-info">
						<img src="assets/images/products/latest-3.jpg" width="150px;">
						<div>
							<p>Red Printed T-shirt</p>
							<small>Price : $50.00</small>
							<br>
							<a href="">Remove</a>
						</div>
					</div>
				</td>
				<td><input type="number" name="" value="1"></td>
				<td>$50.00</td>
			</tr>
		</table>


		<div class="total-price">
			<table>
				<tr>
					<td>Subtotal</td>
					<td>$200.00</td>
				</tr>
				<tr>
					<td>Tax</td>
					<td>$200.00</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>$200.00</td>
				</tr>
			</table>
		</div>
	</div>
	

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


	<script src="assets/js/jquery-3.5.1.min.js"></script> 
	<script src="assets/js/script.js"></script>

	
 </body>
 </html>