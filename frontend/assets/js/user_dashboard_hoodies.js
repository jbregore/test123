
$(document).ready(function () {
	//change class
	$('#uh').addClass('active');
	$('#ut').removeClass('active');
	$('#uo').removeClass('active');


	// **************** fetch **************** //
	load_data();
	function load_data() {
		//load shirt
		$.ajax({
			type: 'GET',
			url: '../backend/api/products/fetch_hoodies.php',
			success: function (data) {
				var $target_div = $('#fetch-hoodie');
				var tshirt_data = '<div class="row">';
				$.each(data, function (key, value) {
					tshirt_data += '<div class="col-4">';
					tshirt_data += '<img src="' + value.prod_photo + '" width="250px" >';
					tshirt_data += '<h4>' + value.prod_name + '</h4>';
					tshirt_data += '<div class="ratingg">';
					tshirt_data += '<i class="fa fa-star"></i>';
					tshirt_data += '<i class="fa fa-star"></i>';
					tshirt_data += '<i class="fa fa-star"></i>';
					tshirt_data += '<i class="fa fa-star"></i>';
					tshirt_data += '<i class="fa fa-star-o"></i>';
					tshirt_data += '</div>';
					tshirt_data += '<p>Php' + value.prod_price + '.00</p>';
					tshirt_data += '<button type="submit" class="btn" id="' + value.prod_id + '">Add to cart  <i class="fa fa-shopping-cart" ></i></button>';
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
			success: function (data) {
				$("#user_id").val(data.user_id);
				$("#user_username").val(data.user_username);

				//load users 
				var user_id_this = $("#user_id").val();
				var user_idd = { user_id: user_id_this };
				$.ajax({
					type: 'POST',
					url: '../backend/api/cart/cart_count.php',
					data: JSON.stringify(user_idd),
					success: function (data) {
						document.getElementById('cart-count').innerHTML = data.totalc.cart_num;
					}
				});//second ajax
			}
		});
	}//load_data



	// **************** add to cart **************** //
	$(document).on('click', '.btn', function () {

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
			data: JSON.stringify(cart_info),
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				//if data message == success
				$('#fetch-hoodie').html('');
				load_data();
			},
			error: function (jqXHR, exception) {
				window.alert("This product was already in your cart.");
			}
		});
	});//end add to cart

});