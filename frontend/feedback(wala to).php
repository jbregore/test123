<!DOCTYPE html>
<html>
<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"></link> -->

	<!--icon-->
	<link rel="shortcut icon" href="myIcon.ico">

	<!--fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">	

	<style type="text/css">
		html{
			scroll-behavior: smooth;
		}

		*{
			margin:0;
			padding: 0;
			box-sizing: border-box;
		}

		body{
			font-family: 'Poppins', sans-serif;
		}

		h2{
			margin-left: 30px;
			padding-bottom: 10px;
			color: #777;
			font-weight: 500;
			font-size: 20px;
		}



		/*------ container ------*/
		.container p{
			color: white;
			font-size: 24px;
		}

		.container{
			max-width: 1300px;
			margin: auto;
			padding-bottom: 50px;
		}

		.row{
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-around;

		}

		.col-2{
			flex-basis: 50%;
			min-width: 500px;
			padding-left: 50px;
			padding-right: 50px;
		}



		.modal-container{
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			background-color: rgba(0,0,0,0.5);
			display: flex;
			align-items: center;
			justify-content: center;

		}

		.modal{
			background-color: white;
			width: 480px;
			max-width: 100%;
			border-radius: 7px;
			text-align: center;
			height: 480px;
		}

		#close {
			color: white;
			float: right;
			font-size: 22px;
			font-weight: bold;
		}

		#close:hover,
		#close:focus {
			color: #ff523b;
			text-decoration: none;
			cursor: pointer;
		}

		.modal-header {
			padding: 10px;
			padding-bottom: 50px;
			background-color: #3E3B3B;
			height: 50px;
			border-top-right-radius: 7px;
			border-top-left-radius: 7px;
		}

		.modal-header h2{
			float: left;
			color: white;
			padding-top: 10px;
		}

		.rating {
			padding-top: 26px;
			padding-bottom: 15px;
		}

		.rating .fa{
			/*color: #ff523b;*/
			color: #D6D1D1;
			font-size: 40px;
		}	

		.rating .fa:hover{
			cursor: pointer;
		}

		textarea:focus{
			outline: none;
		}
		textarea{
			padding: 10px 20px;
			color: #555;
			margin: 6px 0;
			border-radius: 5px;
			font-size: 14px;
			resize: none;
			overflow: auto;
			width: 100%;
			border: none;
			border: 1px solid #ccc;
			font-family: 'Poppins', sans-serif;
		}

		.message-area{
			padding: 0 20px;
		}	

		.message-area p {
			color: #555;
			font-size: 14px;
			margin-bottom: 20px;
		}

		input[type=submit]{
			margin-right: 10px 20px;
			display: inline-block;
			background: #ff523b;
			color: white;
			padding: 8px 30px;
			border-radius: 30px;
			font-size:16px;
			text-decoration: none;
			transition: background 0.5s;
			cursor: pointer;
			border: none;
			width: 90%;
			height: 40px;
		}

		input[type=submit]:hover{
			background: #563434;
		}






		@media only screen and (max-width: 600px){
			
			.row{
				text-align: center;
			}

			.modal{
				background-color: white;
				max-width: 100%;
				border-radius: 7px;
				text-align: center;
				margin-right: 30px;
				margin-left: 30px;
			}

			.modal-header h2{
				font-size: 16px;
				margin-left: 10px;
			}

			#close {
				font-size: 20px;
			}

			.rating .fa,
			.ratingg .fa{
				color: #ff523b;
				font-size: 30px;
			}

		}





	</style>

</head>
<body>
	
	<div class="modal-container" id="modal-container" >
		<div class="modal">

				<div class="small-container"> <!--start small-container-->
					<form method="POST" id="product-form" enctype="multipart/form-data">
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
								<textarea name="message" id="message" rows="8" cols="45" required placeholder="Your Feedback"></textarea><br>
								<p>Please tell us what do you think, any kind of feedback is highly appreciated.</p>
							</div>
							<input type="submit">

						</div>

					</form>
				</div> <!--end small-container-->

			
		</div>
	</div>














	

	<!----- script ------>
	<!-- <script src="assets/js/script.js"></script> -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script>

		var rated_index = -1;
		$(document).ready(function (){
			reset_star_colors();

			$('.fa-star').on('click', function () {
				rated_index = parseInt($(this).data('index'));
				star_rating = rated_index + 1;
				console.log(star_rating);
			});

			$('.fa-star').mouseover(function () {
				reset_star_colors();

				var current_index = parseInt($(this).data('index'));

				for (var i = 0; i <= current_index; i++){
					$('.fa-star:eq('+i+')').css('color', '#ff523b');
				}
			});


			$('.fa-star').mouseleave(function () {
				reset_star_colors();

				if(rated_index != -1){
					for (var i = 0; i <= rated_index; i++){
						$('.fa-star:eq('+i+')').css('color', '#ff523b');
					}
				}
			});

		});

		function reset_star_colors(){
			$('.fa-star').css('color', '#D6D1D1');
		}

	</script>

</body>
</html>