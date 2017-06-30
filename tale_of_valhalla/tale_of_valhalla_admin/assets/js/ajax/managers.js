var url = window.location.href;

if (url.includes('sign_in')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla_admin/';

        // Clicks login button when key "enter" is pressed
        $(document).keyup(function (event) {
            if (event.keyCode === 13) {
                $("#login_button").click();
            }
        });

        // Verify manager information
        $("#login_button").click(function () {
            $.get(path + 'ajax/verify_manager_information', {email: $('#email').val(), password: $('#password').val()}, function (data) {
                if (data) {
                    $("#login_alert").removeClass("hidden");
                    $("#login_alert").show();
                    $("#help_login").html(data);
                    $("#login_alert").delay(4000).slideUp(400, function () {
                        $(this).hide();
                    });
                } else {
                    $('#login_form').submit();
                }
            });
        });

    });
}