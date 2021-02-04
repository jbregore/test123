$(document).ready(function() {
    // **************** settings **************** //
    //trigger settings modal
    $(document).on('click', '#settings', function() {

        $("#modal-container-settings").fadeIn();
        $(".content-table th").css("color", "rgba(255,255,255, 0.1)");
    }); //trigger settings modal



    // **************** close modal **************** //
    //close modal
    $("#close-settings").click(function() {

        $("#modal-container-settings").fadeOut();
        $(".content-table th").css("color", "#fff");
    });



    // **************** change pass button **************** //
    $('#settings-form').on('submit', function(event) {
        event.preventDefault();

        if ($("#pass-old-pass").val() == '' || $("#pass-new-pass").val() == '' || $("#pass-conf-pass").val() == '') {
            window.alert("Please fill all the fields");


        } else if ($("#pass-new-pass").val() == $("#pass-conf-pass").val()) {
            if (confirm('Are you sure you want to change?')) {

                //json
                var settings = {
                    old_password: $("#pass-old-pass").val(),
                    new_password: $('#pass-conf-pass').val()
                };

                console.log(JSON.stringify(settings));

                $.ajax({
                    type: 'POST',
                    url: '../backend/api/users/admin_settings.php',
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





    // $("#pass-btn").click(function() {
    //     if ($("#pass-old-pass").val() == '' || $("#pass-new-pass").val() == '' || $("#pass-conf-pass").val() == '') {
    //         window.alert("Please fill all the fields");


    //     } else if ($("#pass-new-pass").val() == $("#pass-conf-pass").val()) {
    //         if (confirm('Are you sure you want to register?')) {

    //             //json
    //             var settings = {
    //                 old_password: $("#pass-old-pass").val(),
    //                 new_password: $('#pass-conf-pass').val()
    //             };

    //             console.log(JSON.stringify(settings));

    //             // $.ajax({
    //             //     type: 'POST',
    //             //     url: '../backend/api/users/settings.php',
    //             //     data: JSON.stringify(settings),
    //             //     contentType: false,
    //             //     // cache: false,
    //             //     processData: false,
    //             //     success: function(data) {
    //             //         console.log("tarahutil");
    //             //         // window.alert(data.message);
    //             //         // location.reload(true);
    //             //     }
    //             // }); //end ajax
    //         } //yes
    //         else {

    //         } //no
    //     } else {
    //         window.alert("Password didn't match");
    //     }
    // });

});