$(document).ready(function() {
    //change class
    $('#af').addClass('active');
    $('#ad').removeClass('active');
    $('#ap').removeClass('active');
    $('#au').removeClass('active');
    $('#at').removeClass('active');



    // ********** nav ********** //
    $("#admin-toggle").click(function() {
        $(".admin-nav").toggle(1000);
    });


    // ********** fetch ********** //
    load_data();


    // **************** delete **************** //
    $(document).on('click', '.del-btn', function() {

        if (confirm('Are you sure you want to delete?')) {
            var feed_id_this = $(this).attr("id");
            var feedback = { feedback_id: feed_id_this };
            $.ajax({
                type: 'DELETE',
                url: '../backend/api/feedback/delete.php',
                data: JSON.stringify(feedback),
                success: function(data) {
                    location.reload();
                }
            });
        } else {

        }
    });


});


function load_data() {
    $.ajax({
        type: 'GET',
        url: '../backend/api/feedback/fetch.php',
        success: function(data) {
            console.log(data);
            var $feedback = $('#prod-table');
            var feedback_data = '<table class="content-table-feedback">';
            feedback_data += '<thead>';
            feedback_data += '<tr>';
            feedback_data += '<th>Username</th>';
            feedback_data += '<th>Star</th>';
            feedback_data += '<th>Message</th>';
            feedback_data += '<th>Action</th>';
            feedback_data += '</tr>';
            feedback_data += '</thead>';
            feedback_data += '<tbody>';

            $.each(data, function(key, value) {
                feedback_data += '<tr>';
                feedback_data += '<td>' + value.user_username + '</td>';
                feedback_data += '<td>' + value.star + '</td>';
                feedback_data += '<td>' + value.message + '</td>';
                feedback_data += '<td><button class="del-btn" id="' + value.feedback_id + '" >Delete</button></td>';
                feedback_data += '</tr>';
            });

            feedback_data += '</tbody>';
            feedback_data += '</table>';
            $feedback.append(feedback_data);
        }
    });
}