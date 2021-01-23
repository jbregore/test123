$(document).ready(function(){
    //change class

    $('#at').addClass('active');
    $('#ad').removeClass('active');
    $('#ap').removeClass('active');
    $('#au').removeClass('active');
});

// ********** nav ********** //
$("#admin-toggle").click(function(){
	$(".admin-nav").toggle(1000);
});

load_data();
function load_data(){
	$.ajax({
		type: 'GET',
		url: '../backend/api/transaction/fetch.php',
		success: function(data){
			console.log(data);
			var $trans = $('#prod-table');
			var trans_data = '<table class="content-table">';
			trans_data += '<thead>';
			trans_data += '<tr>';
			trans_data += '<th>Name</th>';
			trans_data += '<th>Address</th>';
			trans_data += '<th>Total Products</th>';
			trans_data += '<th>Items</th>';
			trans_data += '<th>Transaction Date</th>';
			trans_data += '<th>Transaction Total</th>';
			trans_data += '</tr>';
			trans_data += '</thead>';
			trans_data += '<tbody>';

			$.each(data, function(key, value){
   				trans_data += '<tr>';
   				trans_data += '<td>'+value.paypal_name+'</td>';
   				trans_data += '<td>'+value.paypal_address+'</td>';
   				trans_data += '<td>'+value.total_prod+'</td>';
   				trans_data += '<td>'+value.total_item+'</td>';
   				trans_data += '<td>'+value.trans_date+'</td>';
   				trans_data += '<td>'+value.trans_total+'</td>';
   				trans_data += '</tr>';

   			});

   			trans_data += '</tbody>';
   			trans_data += '</table>';
			$trans.append(trans_data);
		}
	});
}


