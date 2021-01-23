$(document).ready(function(){
    //change class

    $('#au').addClass('active');
    $('#ad').removeClass('active');
    $('#ap').removeClass('active');
    $('#at').removeClass('active');
});

// ********** nav ********** //
$("#admin-toggle").click(function(){
	$(".admin-nav").toggle(1000);
});

load_data();
function load_data(){
	$.ajax({
		type: 'GET',
		url: '../backend/api/users/fetch.php',
		success: function(data){
			var $users = $('#prod-table');
			var user_data = '<table class="content-table-user">';
			user_data += '<thead>';
			user_data += '<tr>';
			user_data += '<th>Username</th>';
			user_data += '<th>Password</th>';
			user_data += '<th>Status</th>';
			user_data += '<th>Action</th>';
			user_data += '</tr>';
			user_data += '</thead>';
			user_data += '<tbody>';

			$.each(data, function(key, value){
				user_data += '<tr>';
				user_data += '<td>'+value.user_username+'</td>';
				user_data += '<td>'+value.user_password+'</td>';
				user_data += '<td>'+value.user_status+'</td>';
				user_data += '<td>';
				if(value.user_status == "Active"){
					user_data += '<button class="block-btn" id="'+value.user_id+'" >Block</button>';
				}
				else{
					user_data += '<button class="unblock-btn" id="'+value.user_id+'" >Unblock</button>';
				}
				user_data += '</td>';
				user_data += '</tr>';

			});
			user_data += '</tbody>';
			user_data += '</table>';
			$users.append(user_data);
		}
	});
}

// ********** block ********** //
$(document).on('click', '.block-btn', function(){
	if (confirm('Are you sure you want to block?')) {
		var user_id_this = $(this).attr("id");
		var user = {user_id: user_id_this};
		$.ajax({
			type: 'PUT',
			url: '../backend/api/users/block.php',
			data: JSON.stringify(user),
			success:function(data){
				$('#prod-table').html('');
				load_data();
				window.alert(data.message);
			}
		});
	} else {

	}
});


// ********** unblock ********** //
$(document).on('click', '.unblock-btn', function(){
	if (confirm('Are you sure you want to unblock?')) {
		var user_id_this = $(this).attr("id");
		var user = {user_id: user_id_this};
		$.ajax({
			type: 'PUT',
			url: '../backend/api/users/unblock.php',
			data: JSON.stringify(user),
			success:function(data){
				$('#prod-table').html('');
				load_data();
				window.alert(data.message);
			}
		});
	} else {

	}
});

