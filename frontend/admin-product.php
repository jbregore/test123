<?php
include 'admin-header.php';
?>


<!----- ***************** main  ***************** ------>
<main>
	<h2>Products</h2>
	<div id="prod-table">  

	</div>

	<button class="btn" id="add-btn">
		<i class="fa fa-plus-circle"></i>Add Product
	</button>
</main>



<!----- ***************** modal  ***************** ------>
<div class="modal-container" id="modal-container" style="display: none;">
	<div class="modal">
		<form method="POST" id="product-form" enctype="multipart/form-data">
			<div class="modal-header">
				<span id="close">&times;</span>
				<h2 id="title-ope">Add Product</h2>
			</div>

			<div class="modal-body">
				<div class="col-70">
					<label for="prod-category">Category :</label>
					<select name="prod-category" id="sel-prod-category">
						<option value="t-shirt" selected>T-shirt</option>
						<option value="hoodie">Hoodie</option>
						<option value="other">Cap</option>
					</select><br>

					<label for="prod-brand">Brand :</label>
					<select name="prod-brand" id="sel-prod-brand" >
						<option value="hghmnds" selected>HGHMNDS</option>
						<option value="kalmado">KALMADO</option>
					</select><br>

					<label for="prod-name">Product Name :</label>
					<input type="text" name="prod-name" id="txt-prod-name" ><br>

					<label for="prod-price">Price :</label>
					<input type="text" name="prod-price" id="txt-prod-price" maxlength="4" 
					onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" ><br>

					<label for="prod-qty">Quantity :</label>
					<input type="text" name="prod-qty" id="txt-prod-qty" maxlength="3"
					onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"><br>

					<label for="prod-status">Status :</label>
					<select name="prod-status" id="sel-prod-status" >
						<option value="available" selected>Available</option>
						<option value="navailable">Not Available</option>
					</select><br>
				</div>

				<div class="col-30">
					<img id="img-prod">
					<label class="upload-btn" for="upload">Upload File</label>
					<input type="file" name="prod-img" id="upload" onchange="previewFile()" accept="image/x-png,image/gif,image/jpeg" >

					<input type="hidden" name="action" id="action" value="add_product">
					<button type="submit" class="add-btn" name="form-action" id="form-action">
						<i class="fa fa-plus-circle"></i>
					Add Product</button>
				</div>
			</div>
		</form>
	</div>
</div>



<!----- ***************** script  ***************** ------>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/admin_product.js"></script>