<!DOCTYPE html>
<html>

<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!----- ***************** css  ***************** ------>
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"></link> -->

	<!----- ***************** icon  ***************** ------>
	<link rel="shortcut icon" href="myIcon.ico">

	<!----- ***************** fonts  ***************** ------>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<style type="text/css">
		html {
			scroll-behavior: smooth;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Poppins', sans-serif;
		}

		h2 {
			margin-left: 30px;
			padding-bottom: 10px;
			color: #777;
			font-weight: 500;
			font-size: 20px;
		}



		/*------ container ------*/
		.container p {
			color: white;
			font-size: 24px;
		}

		.container {
			max-width: 1300px;
			margin: auto;
			padding-bottom: 50px;
		}

		.row {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-around;

		}

		.col-2 {
			flex-basis: 50%;
			min-width: 500px;
			padding-left: 50px;
			padding-right: 50px;
		}



		.modal-container {
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			background-color: rgba(0, 0, 0, 0.5);
			display: flex;
			align-items: center;
			justify-content: center;

		}

		.modal {
			background-color: white;
			width: 480px;
			max-width: 100%;
			border-radius: 7px;
			text-align: center;
			height: 360px;
		}

		.modal-body {
			margin-top: 20px;
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

		.modal-header h2 {
			float: left;
			color: white;
			padding-top: 10px;
		}

		input[type=password] {
			width: 90%;
			margin: 3px 10px;
			padding: 5px;
			outline: none;
			font-size: 14px;
			color: #777;
		}

		label {
			float: left;
			margin-left: 30px;
			color: #555;
		}

		#pass-btn {
			margin: 20px 20px;
			display: inline-block;
			background: #ff523b;
			color: white;
			padding: 8px 30px;
			border-radius: 30px;
			font-size: 16px;
			text-decoration: none;
			transition: background 0.5s;
			cursor: pointer;
			border: none;
			width: 90%;
			height: 40px;
			outline: none;
			text-align: center;
		}

		#pass-btn:hover {
			background: #563434;
		}

		
	</style>

</head>

<body>
	
	<div class="modal-container" id="modal-container">
		<div class="modal">

			<div class="small-container">

				<div class="modal-header">
					<span id="close">&times;</span>
					<h2 id="title-ope">Change Password</h2>
				</div>


				<div class="modal-body">
					<label for="old-pass">Old Password :</label>
					<input type="password" id="pass-old-pass"><br>

					<label for="new-pass">New Password :</label>
					<input type="password" id="pass-new-pass"><br>

					<label for="conf-pass">Confirm Password :</label>
					<input type="password" id="pass-conf-pass"><br>

					<button id="pass-btn">Change</button>
				</div>
			</div>
		</div>
	</div>



	
	











	<!----- ***************** script  ***************** ------>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script>
	</script>

</body>

</html>