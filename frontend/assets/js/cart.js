

var rated_index = -1;
var total_items = 0;
var total_price = 0;
var total_prod = '';
var paypal_button_item = '';
var star_rating = 0;

$(document).ready(function(){
	load_cart();
	$('#ut').removeClass('active');

	// **************** paypal button **************** //
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


				document.getElementById('cart-count').innerHTML = "0";
				$("#paypal-button").css("display", "none");
				$("#modal-containerr").fadeIn();
				
				load_cart(); 			

			});// location.reload(true);

		},
		onCancel:function(data){
			//alert payment cancel
			window.alert("payment cancel");
		}
	}).render("#paypal-button");



	// **************** cart **************** //
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
				load_cart();
			},// window.alert("This product was already in your cart.");
			error: function (jqXHR, exception) { 
					      	
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
				load_cart();
			},
			error: function (jqXHR, exception) { 
				// window.alert("This product was already in your cart.");	      	
			}
		});
	});//remove to cart



	// **************** feedbacks **************** //
	$("#close").click(function(){
		$("#modal-containerr").fadeOut();
	});

	$(document).on('click', '#feedback-btn', function(){
		if(star_rating == 0 || $('.message').val() == '0'){
			$("#modal-containerr").fadeOut();
		}
		else{
			window.alert("Feedback sent thank you.");
			$("#modal-containerr").fadeOut();
			var feedback = {
				user_username:$('#user_username').val(),
				star: star_rating,
				message:$('#message').val()

			};
			$.ajax({
				type:'POST',
				url:'../backend/api/feedback/create.php',
				data:JSON.stringify(feedback),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					location.reload(true);
				}
			});


		}
	});

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


// **************** feedbacks **************** //
function reset_star_colors(){
	$('.fa-star').css('color', '#D6D1D1');
}



// **************** cart **************** //
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
			cart_data += '<td id="total-item">Total Price ('+total_items+') items</td>';
			cart_data += '<td>Php '+total_price+'.00</td>';
			cart_data += '</tr>';

			cart_data += '</table>';
			cart_data += '</div>';


			$target_div.append(cart_data);

			$("#modal-container").fadeIn();
			paypal_button_item = $('#total-item').html();
			if(paypal_button_item == "Total Price (0) items"){
				$("#paypal-button").css("display", "none");
			}
			else{
				$("#paypal-button").css("display", "block");
			}


		}
	});//second ajax
}

function load_cart(){
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
}


