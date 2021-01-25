$(document).ready(function () {
	//change class
	$('#af').addClass('active');
	$('#ad').removeClass('active');
	$('#ap').removeClass('active');
	$('#au').removeClass('active');
	$('#at').removeClass('active');

	

	// ********** nav ********** //
	$("#admin-toggle").click(function () {
		$(".admin-nav").toggle(1000);
	});


	// ********** fetch ********** //
	load_data();


});


function load_data() {
	$.ajax({
		type: 'GET',
		url: '../backend/api/feedback/fetch.php',
		success: function (data) {
			console.log(data);
			var $feedback = $('#prod-table');
			var feedback_data = '<table class="content-table-feedback">';
			feedback_data += '<thead>';
			feedback_data += '<tr>';
			feedback_data += '<th>Username</th>';
			feedback_data += '<th>Star</th>';
			feedback_data += '<th>Message</th>';
			feedback_data += '</tr>';
			feedback_data += '</thead>';
			feedback_data += '<tbody>';

			$.each(data, function (key, value) {
				feedback_data += '<tr>';
				feedback_data += '<td>' + value.user_username + '</td>';
				feedback_data += '<td>' + value.star + '</td>';
				feedback_data += '<td>' + value.message + '</td>';
				feedback_data += '</tr>';
			});

			feedback_data += '</tbody>';
			feedback_data += '</table>';
			$feedback.append(feedback_data);
		}
	});
}


