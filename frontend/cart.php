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
	<link rel="stylesheet" type="text/css" href="assets/css/cart.css"></link>

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
						<li><a href="user-dashboard.php">T-Shirts</a></li>
						<li><a href="">Hoodies</a></li>
						<li><a href="">Cap</a></li>
						<li><a href="">Settings</a></li>
						<li><a href="logout.php" >Logout</a></li>
					</ul>
				</nav>
				<span id="cart-count">0</span>
				<img src="assets/images/cart.png" width="30px" height="30px;" class="cart-icon">

				<img src="assets/images/menu.png" class="menu-icon" onclick="menuToggle()">
			</div> <!--end navbar-->
	</div><!--end header-->


	<!-- cart html -->
	<div class="small-container cart-page">

		<div id="title-hide">
			<h2 class="title">My Cart</h2>
		</div>

		<div class="modal-body" id="fetch-cart">
			
		</div><!-----end modal-body ------>
		<div id="paypal-button"> </div>
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
	<script src="https://www.paypal.com/sdk/js?client-id=AddPIpJncddMsIOBh1Q7dof9I_XtD8AAEdHB-CZma5MFNcgL9I0TBCqv_Nl9HK-Z2-S3eGmOTFVYZU3V&disable-funding=credit,card"></script>
	<script>
		$(document).ready(function(){
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
							open_cart();
						}
					});//second ajax
			   	}
			});

			var total_items = 0;
			var total_price = 0;
			var total_prod = '';
			//load cart
			function open_cart(){
				total_items = 0;
				total_price = 0;
				total_prod = '';
				$('#fetch-cart').html('');
				var user_id_this = $("#user_id").val();
				$.ajax({
					type: 'GET',
					url: '../backend/api/cart/fetch_cart.php',
					data: {user_id:user_id_this},
					success: function(data){

			 			//append
			 			var $target_div = $('#fetch-cart');
			 			var cart_data = '<table>';
			 			cart_data += '<tr>';
			 			cart_data += '<th>Product</th>';
			 			cart_data += '<th>Quantity</th>';
			 			cart_data += '<th>Subtotal</th>';
			 			cart_data += '</tr>';

			 			$.each(data, function(key, value){
			 				cart_data += '<tr>';
			 				cart_data += '<td>';
			 				cart_data += '<div class="cart-info">';
			 				cart_data += '<img src="'+value.prod_photo+'" >';
			 				cart_data += '<div>';
			 				cart_data += '<p>'+value.prod_name+'</p>';
			 				cart_data += '<small>Price : Php'+value.prod_price+'.00</small><br>';
			 				cart_data += '<button class="remove-btn" id="'+value.prod_id+'">Remove</button>';
			 				cart_data += '</div>';
			 				cart_data += '</div>';
			 				cart_data += '</td>';
			 				cart_data += '<td>';
			 				cart_data += '<div class="cart-action">';
			 				cart_data += '<input type="number" name="" value="'+value.prod_qty+'" readonly><br>';
			 				cart_data += '<button class="minus-btn" id="'+value.prod_id+'"> - </button>';
			 				cart_data += '<button class="plus-btn" id="'+value.prod_id+'">+</button>';
			 				cart_data += '</div>';
			 				cart_data += '</td>';
			 				cart_data += '<td>Php '+value.prod_price+'.00</td>';
			 				cart_data += '</tr>';

			 				total_items += value.prod_qty;
			 				total_price += value.prod_price * value.prod_qty;
			 				total_prod += value.prod_name + ",";
			 			});
			 			cart_data += '</table>';
			 			
			 			cart_data += '<div class="total-price">';
			 			cart_data += '<table>';
			 			cart_data += '<tr>';
			 			cart_data += '<td>Total Price ('+total_items+') items</td>';
			 			cart_data += '<td>Php '+total_price+'.00</td>';
			 			cart_data += '</tr>';

			 			cart_data += '</table>';
			 			cart_data += '</div>';


			 			$target_div.append(cart_data);

			 			$("#modal-container").fadeIn();

			 			
			 		}
				});//second ajax
			}

			// paypal button
			paypal.Buttons({
				style:{
					shape:'pill'
				},
				createOrder:function(data, actions){
					return actions.order.create({
						purchase_units:[{
							amount:{
								value:'0.1'
							}
						}]
					});
				},
				onApprove:function(data, actions){
					return actions.order.capture().then(function(details){
			 			//when it successful insert data and remove sa cart
			 			// console.log(details);
			 			window.alert("payment done");


			 			//insert tbl_transaction
						var user_id = $("#user_id").val();
					    var trans_info = {
						    user_id: user_id,
						    paypal_name: details.payer.name.given_name + " " + details.payer.name.surname,
						    paypal_address:details.payer.address.country_code,
						    total_prod:total_prod,
						    total_item:total_items,
						    trans_date:details.create_time,
						    trans_total:total_price+".00"
					    };


					    $.ajax({
					    	type: 'POST',
					    	url: '../backend/api/transaction/create.php',
					    	data:JSON.stringify(trans_info),
				    		contentType: false,
				    		cache: false,
				    		processData:false,
					    	success:function(data){
					    		// console.log("gago");
					    	},
					    	error: function (jqXHR, exception) { 
						      	
						    }
					    });

					    //update tbl_product
			 			var user_id_this = $("#user_id").val();
			 			$.ajax({
			 				type: 'GET',
			 				url: '../backend/api/cart/fetch_cart.php',
			 				data: {user_id:user_id_this},
			 				success: function(data){

			 					//update 1by1 mali sa each data ng fetch cart
			 					$.each(data, function(key, value){
			 						var product = {
			 							prod_id: value.prod_id,
			 							prod_qty: value.prod_qty
			 						}
			 						$.ajax({
			 							type:'PUT',
			 							url:'../backend/api/products/update_qty.php',
			 							data:JSON.stringify(product),
			 							success: function(data){
			 								console.log("horay");
			 							}
			 						});
			 					});//end each

			 				}
			 			});//second ajax


			 			//delete from cart
      					var user = {user_id: user_id_this};
			 			$.ajax({
			 				type: 'DELETE',
			 				url: '../backend/api/cart/delete_qty.php',
			 				data: JSON.stringify(user),
			 				success:function(data){
			 					console.log("gago");
			 				}
			 			});

			 			location.reload(true);


			 			

			 		})
				},
				onCancel:function(data){
			 		//alert payment cancel
			 		window.alert("payment cancel");
			 	}
			}).render("#paypal-button");



			//add qty to cart
			$(document).on('click', '.plus-btn', function(){

				var prod_id = $(this).attr("id");
				var user_id = $("#user_id").val();

			    var cart_info = {
			    	prod_id: prod_id,
				    user_id: user_id
			    };

			    $.ajax({
			    	type: 'PUT',
			    	url: '../backend/api/cart/update.php',
			    	data:JSON.stringify(cart_info),
		    		contentType: false,
		    		cache: false,
		    		processData:false,
			    	success:function(data){
			    		open_cart();
			    	},
			    	error: function (jqXHR, exception) { 
				      	// window.alert("This product was already in your cart.");
				    }
			    });

			});//end add qty to cart

			

			//minus qty to cart
			$(document).on('click', '.minus-btn', function(){

				var prod_id = $(this).attr("id");
				var user_id = $("#user_id").val();

			    var cart_info = {
			    	prod_id: prod_id,
				    user_id: user_id
			    };

			    $.ajax({
			    	type: 'PUT',
			    	url: '../backend/api/cart/update_minus.php',
			    	data:JSON.stringify(cart_info),
		    		contentType: false,
		    		cache: false,
		    		processData:false,
			    	success:function(data){
			    		open_cart();
			    	},
			    	error: function (jqXHR, exception) { 
				      	// window.alert("This product was already in your cart.");
				    }
			    });

			});//end minus qty to cart
			

			//remove to cart
			$(document).on('click', '.remove-btn', function(){

				var prod_id = $(this).attr("id");
				var user_id = $("#user_id").val();

			    var cart_info = {
			    	prod_id: prod_id,
				    user_id: user_id
			    };

			    $.ajax({
			    	type: 'DELETE',
			    	url: '../backend/api/cart/delete.php',
			    	data:JSON.stringify(cart_info),
		    		contentType: false,
		    		cache: false,
		    		processData:false,
			    	success:function(data){
			    		open_cart();
			    	},
			    	error: function (jqXHR, exception) { 
				      	// window.alert("This product was already in your cart.");
				    }
			    });

			});//remove to cart

		});
	</script>
	
 </body>
 </html>