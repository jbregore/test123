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

		<!----- ***************** css  ***************** ------>
		<link rel="stylesheet" type="text/css" href="assets/css/cart.css"></link>

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
		<?php include 'user-header.php';?>


		<!----- ***************** main  ***************** ------>
		<div class="small-container cart-page">

			<div id="title-hide">
				<h2 class="title">My Cart</h2>
			</div>

			<div class="modal-body" id="fetch-cart">
				
			</div>
			<div id="paypal-button"> </div>
		</div>
		

		<!----- ***************** Footer  ***************** ------>
		<?php include 'user-footer.php';?> 


		<!----- ***************** feedback modal  ***************** ------>
		<div class="modal-containerr" id="modal-containerr" style="display: none;">
			<div class="modal">

					<div class="small-container"> <!--start small-container-->
						
							<div class="modal-header">
								<span id="close">&times;</span>
								<h2 id="title-ope">Feedback</h2>
							</div><!-----end modal-header ------>


							<div class="modal-body">

								<div class="rating">
									<i class="fa fa-star" data-index="0"></i>
									<i class="fa fa-star" data-index="1"></i>
									<i class="fa fa-star" data-index="2"></i>
									<i class="fa fa-star" data-index="3"></i>
									<i class="fa fa-star" data-index="4"></i>
								</div>

								<div class="message-area">
									<textarea name="message" id="message" rows="8" cols="45" required placeholder="Your Feedback" value="0"></textarea><br>
									<p>Please tell us what do you think, any kind of feedback is highly appreciated.</p>
								</div>
								<button id="feedback-btn">Submit</button>

							</div>

						
					</div> <!--end small-container-->

				
			</div>
		</div>


		<script src="assets/js/jquery-3.5.1.min.js"></script> 
		<script src="assets/js/script.js"></script>
		<script src="https://www.paypal.com/sdk/js?client-id=AddPIpJncddMsIOBh1Q7dof9I_XtD8AAEdHB-CZma5MFNcgL9I0TBCqv_Nl9HK-Z2-S3eGmOTFVYZU3V&disable-funding=credit,card"></script>
		<script src="assets/js/cart.js"></script>
		
	 </body>
 </html>