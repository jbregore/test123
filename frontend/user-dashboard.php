<?php
	session_start();
	if(isset($_SESSION['user_id'])){
		
	}
	else{
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
	<input type="hidden" name="" id="user_id">
	<input type="hidden" name="" id="user_username">

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
						<li><a href="logout.php" >Logout</a></li>
					</ul>
				</nav>
				<span id="cart-count">0</span>

				<a href="cart.php"><img src="assets/images/cart.png" width="30px" height="30px;" class="cart-icon" id="open-cart"></a>

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














	<!----- script ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script> 
	<script src="assets/js/script.js"></script>
	<script src="https://www.paypal.com/sdk/js?client-id=AddPIpJncddMsIOBh1Q7dof9I_XtD8AAEdHB-CZma5MFNcgL9I0TBCqv_Nl9HK-Z2-S3eGmOTFVYZU3V&disable-funding=credit,card"></script>
	<script >
		$(document).ready(function(){

			// load_data(); php api fetch
			load_data();
			function load_data(){
				//load shirt
				$.ajax({
					type: 'GET',
					url: '../backend/api/products/fetch_tshirt.php',
					success: function(data){
						var $target_div = $('#fetch-tshirt');
						var tshirt_data = '<div class="row">';
						$.each(data, function(key, value){
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
							tshirt_data += '<button type="submit" class="btn" id="'+value.prod_id+'">Add to cart  <i class="fa fa-shopping-cart" ></i></button>';
							tshirt_data += '</div>';
						});
						tshirt_data += '</div>';
						$target_div.append(tshirt_data);

					}//end success
				});

				//load session of user
			    $.ajax({
			    	type: 'GET',
			   		url: '../backend/api/users/session.php',
			   		success: function(data){
			   			$("#user_id").val(data.user_id);
			   			$("#user_username").val(data.user_username);

			   			//load users 
						var user_id_this = $("#user_id").val();
						var user_idd = {user_id: user_id_this};
						$.ajax({
							type: 'POST',
							url: '../backend/api/cart/cart_count.php',
							data: JSON.stringify(user_idd),
							success: function(data){
								document.getElementById('cart-count').innerHTML = data.totalc.cart_num;
							}
					    });//second ajax
			   		}
			    });
			}//load_data


			//add to cart
			$(document).on('click', '.btn', function(){

				var prod_id = $(this).attr("id");
				var user_id = $("#user_id").val();
				var user_username = $("#user_username").val();

			    var cart_info = {
			    	prod_id: prod_id,
				    user_id: user_id,
				    user_username: user_username
			    };


			    
			    $.ajax({
			    	type: 'POST',
			    	url: '../backend/api/cart/create.php',
			    	data:JSON.stringify(cart_info),
		    		contentType: false,
		    		cache: false,
		    		processData:false,
			    	success:function(data){
			    		//if data message == success
			    		$('#fetch-tshirt').html('');
			    		load_data();
			    	},
			    	error: function (jqXHR, exception) { 
				      	window.alert("This product was already in your cart.");
				    }
			    });
			});//end add to cart

		


			


 		});
 	</script>



 </body>
 </html>