$(document).ready(function() {

    $('#us').addClass('active');
    $('#ut').removeClass('active');
    $('#uh').removeClass('active');
    $('#uo').removeClass('active');




    load_data();

    function load_data() {
        //load session of user
        $.ajax({
            type: 'GET',
            url: '../backend/api/users/session.php',
            success: function(data) {
                $("#user_id").val(data.user_id);
                $("#user_username").val(data.user_username);

                //load users 
                var user_id_this = $("#user_id").val();
                var user_idd = { user_id: user_id_this };
                $.ajax({
                    type: 'POST',
                    url: '../backend/api/cart/cart_count.php',
                    data: JSON.stringify(user_idd),
                    success: function(data) {
                        document.getElementById('cart-count').innerHTML = data.totalc.cart_num;
                    }
                }); //second ajax
            }
        });
    }


    // **************** change pass button **************** //
    $('#settings-form').on('submit', function(event) {
        event.preventDefault();

        if ($("#pass-old-pass").val() == '' || $("#pass-new-pass").val() == '' || $("#pass-conf-pass").val() == '') {
            window.alert("Please fill all the fields");


        } else if ($("#pass-new-pass").val() == $("#pass-conf-pass").val()) {
            if (confirm('Are you sure you want to change?')) {

                //json
                var settings = {
                    user_id: $("#user_id").val(),
                    old_password: $("#pass-old-pass").val(),
                    new_password: $('#pass-conf-pass').val()
                };

                console.log(JSON.stringify(settings));

                $.ajax({
                    type: 'POST',
                    url: '../backend/api/users/user_settings.php',
                    data: JSON.stringify(settings),
                    contentType: false,
                    // cache: false,
                    processData: false,
                    success: function(data) {
                        window.alert(data.message);
                        location.reload(true);
                    },
                    error: function(jqXHR, exception) {
                        window.alert("Wrong password");
                    }
                }); //end ajax
            } //yes
            else {

            } //no
        } else {
            window.alert("Password didn't match");
        }


    });

});