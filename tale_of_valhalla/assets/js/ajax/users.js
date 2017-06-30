var url = window.location.href;

if (url.includes('home')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla/';
        var name_has_error;
        var username_has_error;
        var email_has_error;
        var password_has_error;
        var confirm_password_has_error;

        // Login ---------------------------------------------------------------

        // Clicks login button when key "enter" is pressed
        $(document).keyup(function (event) {
            if (event.keyCode === 13) {
                $("#login_button").click();
            }
        });

        // Verify user information
        $("#login_button").click(function () {
            $.get(path + 'ajax/verify_user_information', {username: $('#username').val(), password: $('#password').val()}, function (data) {
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

        //  --------------------------------------------------------------------

        // Verifies if username is valid
        function validate_username(username) {
            var validate_username = /^[A-Za-z0-9]+$/;
            return validate_username.test(username);
        }

        // Verifies if email is valid
        function validate_email(email) {
            var validate_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return validate_email.test(email);
        }

        // Verifies if insert form has errors
        function validate_form() {
            if (name_has_error || username_has_error || email_has_error || password_has_error || confirm_password_has_error) {
                $('#insert_button').prop('disabled', true);
            } else {
                $('#insert_button').prop('disabled', false);
            }
        }

        // Register Form --------------------------------------------------------

        // Displays selected image
        function display_image(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Verify Name
        $("#sign_up_form").on('keyup', '#register_name', function () {

            $.get(path + 'ajax/verify_user_name', {name: $('#register_name').val()}, function (data) {
                if (data) {
                    $('#label_name').attr('data-error', data);

                    $('#register_name').removeClass('valid');
                    $('#register_name').addClass('invalid');
                    name_has_error = true;

                    validate_form();
                } else {
                    $('#register_name').removeClass('invalid');
                    $('#register_name').addClass('valid');
                    name_has_error = false;

                    validate_form();
                }
            });
        });

        // Verify Username
        $("#sign_up_form").on('keyup', '#register_username', function () {
            var username = $('#register_username').val();

            if (username.length < 3) {
                $('#label_username').attr('data-error', 'Nome de usuário muito curto');

                $('#register_username').removeClass('valid');
                $('#register_username').addClass('invalid');
                username_has_error = true;

                validate_form();
            } else {
                if (validate_username(username)) {
                    $.get(path + 'ajax/verify_user_username', {username: $('#register_username').val()}, function (data) {
                        if (data) {
                            $('#label_username').attr('data-error', data);

                            $('#register_username').removeClass('valid');
                            $('#register_username').addClass('invalid');
                            username_has_error = true;

                            validate_form();
                        } else {
                            $('#register_username').removeClass('invalid');
                            $('#register_username').addClass('valid');
                            username_has_error = false;

                            validate_form();
                        }
                    });
                } else {
                    $('#label_name').attr('data-error', 'Nome de usuário inválido');

                    $('#register_username').removeClass('valid');
                    $('#register_username').addClass('invalid');
                    username_has_error = true;

                    validate_form();
                }
            }
        });

        // Verify E-mail
        $("#sign_up_form").on('keyup', '#register_email', function () {
            var email = $('#register_email').val();

            if (validate_email(email)) {
                $.get(path + 'ajax/verify_user_email', {email: $('#register_email').val()}, function (data) {
                    if (data) {
                        $('#label_email').attr('data-error', data);

                        $('#register_email').removeClass('valid');
                        $('#register_email').addClass('invalid');
                        email_has_error = true;

                        validate_form();
                    } else {
                        $('#register_email').removeClass('invalid');
                        $('#register_email').addClass('valid');
                        email_has_error = false;

                        validate_form();
                    }
                });
            } else {
                $('#label_email').attr('data-error', 'E-mail inválido');

                $('#register_email').removeClass('valid');
                $('#register_email').addClass('invalid');
                email_has_error = true;

                validate_form();
            }
        });

        // Verify Password
        $("#sign_up_form").on('keyup', '#register_password', function () {
            var password = $('#register_password').val();

            if (password.length < 6) {
                $('#label_password').attr('data-error', 'Senha muito curta');

                $('#register_password').removeClass('valid');
                $('#register_password').addClass('invalid');
                password_has_error = true;

                validate_form();
            } else {
                $('#register_password').removeClass('invalid');
                $('#register_password').addClass('valid');
                password_has_error = false;

                validate_form();
            }
        });

        // Verify Confirm Password
        $("#sign_up_form").on('blur', '#register_confirm_password', function () {
            var confirm_password = $('#register_confirm_password').val();

            if (confirm_password.length < 6) {
                $('#label_confirm_password').attr('data-error', 'Senha muito curta');

                $('#register_confirm_password').removeClass('valid');
                $('#register_confirm_password').addClass('invalid');
                confirm_password_has_error = true;

                validate_form();
            } else {
                $.get(path + 'ajax/verify_user_password', {confirm_password: $('#register_confirm_password').val(), password: $('#register_password').val()}, function (data) {
                    if (data) {
                        $('#label_confirm_password').attr('data-error', data);

                        $('#register_confirm_password').removeClass('valid');
                        $('#register_confirm_password').addClass('invalid');
                        confirm_password_has_error = true;

                        validate_form();
                    } else {
                        $('#register_confirm_password').removeClass('invalid');
                        $('#register_confirm_password').addClass('valid');
                        confirm_password_has_error = false;

                        validate_form();
                    }
                });
            }
        });

        // Updates Picture (insert modal)
        $("#sign_up_form").on('change', '#register_picture', function () {
            display_image(this);
        });

        // Reset form
        $("#sign_up_form").on('click', '#reset_button', function () {
            $('#register_name').removeClass('valid');
            $('#register_name').removeClass('invalid');
            $('#register_username').removeClass('valid');
            $('#register_username').removeClass('invalid');
            $('#register_email').removeClass('valid');
            $('#register_email').removeClass('invalid');
            $('#register_password').removeClass('valid');
            $('#register_password').removeClass('invalid');
            $('#register_confirm_password').removeClass('valid');
            $('#register_confirm_password').removeClass('invalid');
            $("#image").attr('src', '../icons/user_icon.png');
            $('#insert_button').prop('disabled', false);
        });

        // ---------------------------------------------------------------------

    });
}
