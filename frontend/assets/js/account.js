$(document).ready(function() {

    // **************** reg form submit **************** //
    $('#reg-form').on('submit', function(event) {
        event.preventDefault();
        if ($("#password-user-password").val() == $("#password-user-password-confirm").val() &&
            $("#txt-user-username").val() != "admin") {
            document.getElementById('password-check').innerHTML = "";
            if (confirm('Are you sure you want to register?')) {

                //json
                var userreg = {
                    user_username: $("#txt-user-username").val(),
                    user_password: $('#password-user-password').val(),
                    user_status: 'Active'
                };
                $.ajax({
                    type: 'POST',
                    url: '../backend/api/users/create.php',
                    data: JSON.stringify(userreg),
                    contentType: false,
                    // cache: false,
                    processData: false,
                    success: function(data) {
                        window.alert(data.message);
                        location.reload(true);
                    },
                    error: function(jqXHR, exception) {
                        error_function(jqXHR, exception);
                        location.reload(true);
                    }
                }); //end ajax
            } //yes
            else {

            } //no
        } //check if parehas
        else {
            document.getElementById('password-check').innerHTML = "Password didn't match";
        }
    }); //register


    // **************** login form submit **************** //
    $('#LoginForm').on('submit', function(event) {
        event.preventDefault();

        //json
        var login_data = {
            login_username: $("#login-user-username").val(),
            login_password: $('#login-user-password').val()
        };


        $.ajax({
            type: 'POST',
            url: '../backend/api/users/login.php',
            data: JSON.stringify(login_data),
            contentType: false,
            // cache: false,
            processData: false,
            success: function(data) {
                console.log(data.position);
                window.alert("Welcome " + data.user_username);
                // window.location = "user-dashboard.php";

            },
            error: function(jqXHR, exception) {
                // document.getElementById('login-check').innerHTML = "Account not found.";
                // $("#login-user-username").val('');
                // $("#login-user-password").val('');
            }
        }); //end ajax


    }); //login

});

// **************** error message **************** //
function error_function(jqXHR, exception) {
    var msg = '';
    if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 400) {
        msg = 'Bad Request. [400]';
        window.alert("Please fill all the fields.");
    } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
        window.alert("Invalid Username");
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
    }
}