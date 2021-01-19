<?php

	session_start();
	// session_destroy();
	// if(isset($_SESSION['user_id'])){
	// 		//pass the json data here
	// 		//mag query gamit ang user_id
	// }
	// else{
	// 	header("Location: account.php");
	// 	exit;
	// }

	if(isset($_POST['add'])){
		// print_r($_POST['prod_id']);
		if(isset($_SESSION['cart'])){

			$item_array_id = array_column($_SESSION['cart'], "prod_id");

			if(in_array($_POST['prod_id'], $item_array_id)){
				echo "<script> window.alert('Product is already added in the cart.')</script>";
				echo "<script> window.location='user-dashboard.php'</script>";
			}
			else{
				$count = count($_SESSION['cart']);
				$item_array = array(
					'prod_id'=> $_POST['prod_id']
				);
				$_SESSION['cart'][$count] = $item_array;
			}
		}
		else{
			$item_array = array(
				'prod_id'=> $_POST['prod_id']
			);

			//create new session
			$_SESSION['cart'][0] = $item_array;
			// print_r($_SESSION['cart']);
		}//end else
	}

?>


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
				<!-- <span id="cart-count">0</span> -->
				<?php

				if (isset($_SESSION['cart'])){
					$count = count($_SESSION['cart']);
					echo "<span id='cart_count'>$count</span>";
				}else{
					echo "<span id='cart_count'>0</span>";
				}

				?>

				
				<img src="assets/images/cart.png" width="30px" height="30px;" class="cart-icon" id="open-cart">

				<img src="assets/images/menu.png" class="menu-icon" onclick="menuToggle()">
			</div> <!--end navbar-->
	</div><!--end header-->


	<!----- products ------>
	<div class="small-container" id="myProduct"> <!--start small-container-->
		
		<!--Products-->
		<div id="title-hide">
			<h2 class="title">T-shirt Products</h2>
		</div>


		<!-- target fetch -->
		<div id="fetch-tshirt">

			
		</div>

	</div> <!--end small-container-->



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











	<!-- cart modal -->
	<div class="modal-container" id="modal-container" style="display:none;">
		<div class="small-container cart-page">
			<div class="modal-header">
				<span id="close">&times;</span>
				<h2 id="title-ope">My Cart</h2>
			</div><!-----end modal-header ------>

			<div class="modal-body">
				<table>
					<tr>
						<th>Product</th>
						<th>Quantity</th>
						<th>Subtotal</th>
					</tr>

					<tr>
						<td>
							<div class="cart-info">
								<img src="assets/images/products/latest-1.jpg" >
								<div>
									<p>HGHMNDS BPLN2</p>
									<small>Price : Php720.00</small>
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
								<img src="assets/images/products/latest-2.jpg" >
								<div>
									<p>HGHMNDS WPLN1</p>
									<small>Price : Php720.00</small>
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
								<img src="assets/images/products/latest-3.jpg" >
								<div>
									<p>HGHMNDS BPLK2</p>
									<small>Price : Php720.00</small>
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
								<img src="assets/images/products/latest-4.jpg">
								<div>
									<p>HGHMNDS WPLK1</p>
									<small>Price : Php720.00</small>
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
								<img src="assets/images/products/latest-5.jpg" >
								<div>
									<p>KALMADO BLPKN5</p>
									<small>Price : Php700.00</small>
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
								<img src="assets/images/products/latest-6.jpg" >
								<div>
									<p>KALMADO BPLW2</p>
									<small>Price : Php700.00</small>
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
								<img src="assets/images/products/latest-7.jpg" >
								<div>
									<p>KALMADO RPLN4</p>
									<small>Price : Php700.00</small>
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
								<img src="assets/images/products/latest-8.jpg">
								<div>
									<p>KALMADO NPLK3</p>
									<small>Price : Php700.00</small>
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
							<td>Php99999.00</td>
						</tr>
						<tr>
							<td>Price (5) items</td>
							<td>Php99999.00</td>
						</tr>
						<tr>
							<td>Total</td>
							<td>Php99999.00</td>
						</tr>
					</table>
				</div>

			</div><!-----end modal-body ------>
		</div>
	</div>




	<!----- script ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script> 
	<script src="assets/js/script.js"></script>
	<script >
		$(document).ready(function(){
			 // ********** cart modal ********** //
			 //trigger cart modal
			 $(document).on('click', '#open-cart', function(){
			   	$("#modal-container").fadeIn();
			 });//trigger cart modal


			 $("#close").click(function(){
				$("#modal-container").fadeOut();
			 });

			// load_data(); php api fetch
			load_data();
			function load_data(){
				$.ajax({
					type: 'GET',
					url: '../backend/api/products/fetch_tshirt.php',
					success: function(data){
						var $target_div = $('#fetch-tshirt');
						console.log(data);
						var tshirt_data = '<div class="row">';
						$.each(data, function(key, value){
							tshirt_data += '<form action="user-dashboard.php" method="POST">';
							tshirt_data += '<div class="col-4">';
							tshirt_data += '<img src="'+value.prod_photo+'" width="250px" >';
							tshirt_data += '<h4>'+value.prod_name+'</h4>';
							tshirt_data += '<div class="ratingg">';
							tshirt_data += '<i class="fa fa-star"></i>';
							tshirt_data += '<i class="fa fa-star"></i>';
							tshirt_data += '<i class="fa fa-star"></i>';
							tshirt_data += '<i class="fa fa-star"></i>';
							tshirt_data += '<i class="fa fa-star-o"></i>';
							tshirt_data += '</div>';
							tshirt_data += '<p>Php'+value.prod_price+'.00</p>';
							tshirt_data += '<button type="submit" class="btn" name="add">Add to cart  <i class="fa fa-shopping-cart" ></i></button>';
							tshirt_data += '<input type="hidden" name="prod_id" value="'+value.prod_id+'">';
							tshirt_data += '</div>';
							tshirt_data += '</form>';
						});
						tshirt_data += '</div>';
						$target_div.append(tshirt_data);

					}//end success
				});


			}//load_data


 		});
 	</script>
 </body>
 </html>