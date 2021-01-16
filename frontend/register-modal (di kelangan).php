<!DOCTYPE html>
<html>
<head>

	<title>Register modal</title>
	<style type="text/css">
		
		*{
			margin: 0;
			padding: 0;
			text-decoration: none;
		}

		body{
			font-family: 'Poppins', sans-serif;
		}

		h2{
			margin-left: 30px;
			padding-bottom: 10px;
			color: #777;
			font-weight: 500;
		}

		/************** admin products **************/

		/* table */
		#prod-table{
			height: 500px;
			overflow: auto;
			margin: 0 30px;
		}

		.btn{
			margin-left: 30px;
			margin-top: 10px;
			width: 120px;
			display: inline-block;
			background: #337ab7;
			color: white;
			padding: 8px 10px;
			font-size: 14px;
			border: none;
			cursor: pointer;
		}

		.btn:focus{
			outline: none;
		}

		.btn i{
			font-size: 14px;
			padding: 3px;
		}

		.view-btn{
			display: inline-block;
			background: #27ae60;
			color: white;
			padding: 5px 8px;
			font-size: 14px;
			border: none;
			cursor: pointer;
		}

		.edit-btn{
			display: inline-block;
			background: #f39c12;
			color: white;
			padding: 5px 8px;
			font-size: 14px;
			border: none;
			cursor: pointer;
		}

		.del-btn{
			display: inline-block;
			background: #ff523b;
			color: white;
			padding: 5px 8px;
			font-size: 14px;
			border: none;
			cursor: pointer;
		}

		.content-table{
			font-size: 16px;
			border-collapse: collapse;
		}

		.content-table table {
			border-spacing: 0;
			border: 1px solid #ddd;
		}

		.content-table th,
		.content-table td {
			text-align: left;
			padding: 15px 20px;
			min-width: 130px;
		}

		.content-table th:last-of-type{
			min-width: 200px;
		}

		.content-table th{
			font-weight: 500;
		}

		.content-table td{
			color: #777;
		}

		.content-table th{
			position: sticky;
			top: 0;
			background-color: #3E3B3B;
			color: white;
			text-align: left;
		}

		.content-table tbody tr{
			border-bottom: 1px solid #dddddd;
		}

		.content-table tbody tr:nth-child(even){
			background-color: #f3f3f3;
		}

		.content-table tbody tr:last-of-type {
			border-bottom: 1px solid #777;
		}


		/************** modal products **************/
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
			width: 800px;
			max-width: 100%;
			border-radius: 7px;
			text-align: center;
			height: 530px;
		}

		#close {
			color: white;
			float: right;
			font-size: 28px;
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

		.modal-body{
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-around;
		}

		.col-70{
			flex-basis: 60%;
			text-align: left;
			padding-top: 30px;
			padding-left: 30px;
		}

		.col-70 label{
			color: #4A4949;
			font-size: 16px;
			flex-basis: 30%;
		}

		.col-70 select{
			width: 140px;
			margin: 3px 20px 10px 0;
			padding: 5px;
			outline: none;
			font-size: 14px;
			color: #777;
		}

		.col-70 input[type=text],
		.col-70 input[type=number],
		.col-70 input[type=date],
		.col-70 input[type=email],
		.col-70 input[type=password]{
			width: 90%;
			margin: 3px 20px 10px 0;
			padding: 5px;
			outline: none;
			font-size: 14px;
			color: #777;
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		.col-30{
			flex-basis: 30%;
			padding-top: 60px;
			padding-right: 20px;
			text-align: left;
		}

		.col-30 img{
			margin-top: -30px;
			width: 250px;
			height: 270px;
			margin-bottom: 20px;
		}

		.col-30 input[type=file]{
			display: none;
		}


		.col-30 .upload-btn {
			display: inline-block;
			background: #337ab7;
			color: white;
			padding: 3px 7px;
			font-size: 14px;
			border: none;
			cursor: pointer;
			text-align: center;
		}

		.col-30 .add-btn{
			display: inline-block;
			background: #337ab7;
			color: white;
			padding: 5px 10px;
			font-size: 14px;
			border: none;
			text-align: center;
			cursor: pointer;
		}

		.col-30 .add-btn:focus{
			outline: none;
		}

		.col-30 .add-btn i{
			font-size: 14px;
			padding: 3px;
		}

		.reg-btn{
			margin: auto;
			width: 100%;
			display: inline-block;
			background: #ff523b;
			color: white;
			padding: 10px 15px;
			font-size: 14px;
			border: none;
			cursor: pointer;
		}

	</style>

	<!--fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<!-- ********************************************************************************************** -->
<!-- modal add product -->
<div class="modal-container" id="modal-container" >
	<div class="modal">
		<form method="POST" id="product-form" enctype="multipart/form-data">
			<div class="modal-header">
				<span id="close">&times;</span>
				<h2 id="title-ope">Register</h2>
			</div><!-----end modal-header ------>

			<div class="modal-body">
				<div class="col-70">
					<label for="user-name">Name :</label>
					<input type="text" name="user-name" id="txt-user-name" ><br>

					<label for="user-phone">Phone :</label>
					<input type="text" name="user-phone" id="txt-user-phone" maxlength="11" 
					onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" ><br>

					<table>
						<tr>
							<td style="min-width: 300px;">
								<label for="user-bday">Birthdate :</label>
							</td>
							<td style="max-width: 140px;">
								<label for="user-gender">Gender :</label>
							</td>
						</tr>
						<tr>
							<td style="min-width: 300px;">
								<input type="date" name="user-bday" id="date-user-bday">
							</td>
							<td style="max-width: 140px;">
								<select name="user-gender" id="sel-user-gender" >
									<option value="male" selected>Male</option>
									<option value="female">Female</option>
								</select>
							</td>
						</tr>
					</table>


					<label for="user-username">Username/Email :</label>
					<input type="email" name="user-username" id="email-user-username" ><br>

					<label for="user-password">Password :</label>
					<input type="password" name="user-password" id="password-user-password" ><br>

					<label for="user-conf-password">Confirm Password :</label>
					<input type="password" name="user-conf-password" id="password-user-conf-password" ><br>

				</div><!-----end col-70 ------>
				<div class="col-30">
					<img src="assets/images/register-img.jpg">

					<!-- <input type="hidden" name="action" id="action" value="add_product">
					<button type="submit" class="add-btn" name="form-action" id="form-action">
						<i class="fa fa-plus-circle"></i>
					Add Product</button> -->
					<button type="submit" class="reg-btn" name="form-action" id="form-action">Register Now</button>

					<input type="checkbox" checked=""><small> I accept the terms and conditions.</small>
				</div><!-----end col-30 ------>
				
			</div><!-----end modal-body ------>
		</form>
	</div><!-----end modal------>
</div>
</body>
</html>