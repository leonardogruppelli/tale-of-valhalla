var url = window.location.href;

if (url.includes('users') || url.includes('sign_in')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla/';
        var user_id;
        var user_name;
        var user_username;
        var user_email;
        var user_gold;
        var user_gems;
        var user_picture;
        
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
        
        // Clicks login button when key "enter" is pressed
        $(document).keyup(function (event) {
            if (event.keyCode === 13) {
                $("#login_button").click();
            }
        });

        // Verify user information
        $("#login_button").click(function () {
            $.get(path + 'ajax/verify_user_information', {email: $('#email').val(), password: $('#password').val()}, function (data) {
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

        // Insert Modal --------------------------------------------------------

        // Displays selected image (insert modal)
        function display_image(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Name popover
        $('#name').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Name
        $("#insertModal").on('keyup', '#name', function () {
            var popover = $('#name').data('bs.popover');

            $.get(path + 'ajax/verify_user_name', {name: $('#name').val()}, function (data) {
                if (data) {
                    $('.modal-body #form_name').removeClass('has-success');
                    $('.modal-body #form_name').addClass('has-error');
                    $('.modal-body #icon_name').removeClass('glyphicon-ok');
                    $('.modal-body #icon_name').addClass('glyphicon-remove');
                    $('.modal-body #insert_button').prop('disabled', true);

                    popover.options.content = "Informe nome e sobrenome";

                    $('#name').popover("show");
                } else {
                    $('.modal-body #form_name').removeClass('has-error');
                    $('.modal-body #form_name').addClass('has-success');
                    $('.modal-body #help_name').html('');
                    $('.modal-body #icon_name').removeClass('glyphicon-remove');
                    $('.modal-body #icon_name').addClass('glyphicon-ok');
                    $('.modal-body #insert_button').prop('disabled', false);

                    $('#name').popover("hide");
                }
            });
        });

        // Username popover
        $('#username').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Username
        $("#insertModal").on('keyup', '#username', function () {
            var username = $('#username').val();
            var popover = $('#username').data('bs.popover');

            if (username.length < 3) {
                $('.modal-body #form_username').removeClass('has-success');
                $('.modal-body #form_username').addClass('has-error');
                $('.modal-body #icon_username').removeClass('glyphicon-ok');
                $('.modal-body #icon_username').addClass('glyphicon-remove');
                $('.modal-body #insert_button').prop('disabled', true);

                popover.options.content = "Nome de usuário muito curto";

                $('#username').popover("show");
            } else {
                if (validate_username(username)) {
                    $.get(path + 'ajax/verify_user_username', {username: $('#username').val()}, function (data) {
                        if (data) {
                            $('.modal-body #form_username').removeClass('has-success');
                            $('.modal-body #form_username').addClass('has-error');
                            $('.modal-body #icon_username').removeClass('glyphicon-ok');
                            $('.modal-body #icon_username').addClass('glyphicon-remove');
                            $('.modal-body #insert_button').prop('disabled', true);

                            popover.options.content = "Nome de usuário já existente";

                            $('#username').popover("show");
                        }
                    });

                    $('.modal-body #form_username').removeClass('has-error');
                    $('.modal-body #form_username').addClass('has-success');
                    $('.modal-body #icon_username').removeClass('glyphicon-remove');
                    $('.modal-body #icon_username').addClass('glyphicon-ok');
                    $('.modal-body #insert_button').prop('disabled', false);

                    $('#username').popover("hide");
                } else {
                    $('.modal-body #form_username').removeClass('has-success');
                    $('.modal-body #form_username').addClass('has-error');
                    $('.modal-body #icon_username').removeClass('glyphicon-ok');
                    $('.modal-body #icon_username').addClass('glyphicon-remove');
                    $('.modal-body #insert_button').prop('disabled', true);

                    popover.options.content = "Nome de usuário inválido";

                    $('#username').popover("show");
                }
            }
        });

        // E-mail popover
        $('#email').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify E-mail
        $("#insertModal").on('keyup', '#email', function () {
            var email = $('#email').val();
            var popover = $('#email').data('bs.popover');

            if (validate_email(email)) {
                $.get(path + 'ajax/verify_user_email', {email: $('#email').val()}, function (data) {
                    if (data) {
                        $('.modal-body #form_email').removeClass('has-success');
                        $('.modal-body #form_email').addClass('has-error');
                        $('.modal-body #icon_email').removeClass('glyphicon-ok');
                        $('.modal-body #icon_email').addClass('glyphicon-remove');
                        $('.modal-body #insert_button').prop('disabled', true);

                        popover.options.content = "E-mail já utilizado";

                        $('#email').popover("show");
                    }
                });

                $('.modal-body #form_email').removeClass('has-error');
                $('.modal-body #form_email').addClass('has-success');
                $('.modal-body #icon_email').removeClass('glyphicon-remove');
                $('.modal-body #icon_email').addClass('glyphicon-ok');
                $('.modal-body #insert_button').prop('disabled', false);

                $('#email').popover("hide");
            } else {
                $('.modal-body #form_email').removeClass('has-success');
                $('.modal-body #form_email').addClass('has-error');
                $('.modal-body #icon_email').removeClass('glyphicon-ok');
                $('.modal-body #icon_email').addClass('glyphicon-remove');
                $('.modal-body #insert_button').prop('disabled', true);

                popover.options.content = "E-mail inválido";

                $('#email').popover("show");
            }
        });

        // Verify Password
        $("#insertModal").on('keyup', '#password', function () {
            var password = $('#password').val();

            if (password.length < 6) {
                $('.modal-body #form_password').removeClass('has-success');
                $('.modal-body #form_password').addClass('has-error');
                $('.modal-body #icon_password').removeClass('glyphicon-ok');
                $('.modal-body #icon_password').addClass('glyphicon-remove');
                $('.modal-body #insert_button').prop('disabled', true);
            } else {
                $('.modal-body #form_password').removeClass('has-error');
                $('.modal-body #form_password').addClass('has-success');
                $('.modal-body #icon_password').removeClass('glyphicon-remove');
                $('.modal-body #icon_password').addClass('glyphicon-ok');
                $('.modal-body #insert_button').prop('disabled', false);
            }
        });

        // Verify Confirm Password
        $("#insertModal").on('blur', '#confirm_password', function () {
            $.get(path + 'ajax/verify_user_password', {confirm_password: $('#confirm_password').val(), password: $('#password').val()}, function (data) {
                if (data) {
                    $('.modal-body #form_confirm_password').removeClass('has-success');
                    $('.modal-body #form_confirm_password').addClass('has-error');
                    $('.modal-body #icon_confirm_password').removeClass('glyphicon-ok');
                    $('.modal-body #icon_confirm_password').addClass('glyphicon-remove');
                    $('.modal-body #insert_button').prop('disabled', true);
                } else {
                    $('.modal-body #form_confirm_password').removeClass('has-error');
                    $('.modal-body #form_confirm_password').addClass('has-success');
                    $('.modal-body #icon_confirm_password').removeClass('glyphicon-remove');
                    $('.modal-body #icon_confirm_password').addClass('glyphicon-ok');
                    $('.modal-body #insert_button').prop('disabled', false);
                }
            });
        });

        // Updates Picture (insert modal)
        $("#insertModal").on('change', '#picture', function () {
            display_image(this);
        });

        // Reset form (insert)
        $("#insertModal").on('click', '#reset_button', function () {
            $('.modal-body #form_name').removeClass('has-success');
            $('.modal-body #form_name').removeClass('has-error');
            $('.modal-body #form_username').removeClass('has-success');
            $('.modal-body #form_username').removeClass('has-error');
            $('.modal-body #form_email').removeClass('has-success');
            $('.modal-body #form_email').removeClass('has-error');
            $('.modal-body #form_password').removeClass('has-success');
            $('.modal-body #form_password').removeClass('has-error');
            $('.modal-body #form_confirm_password').removeClass('has-success');
            $('.modal-body #form_confirm_password').removeClass('has-error');
            $('.modal-body #icon_name').removeClass('glyphicon-ok');
            $('.modal-body #icon_name').removeClass('glyphicon-remove');
            $('.modal-body #icon_username').removeClass('glyphicon-ok');
            $('.modal-body #icon_username').removeClass('glyphicon-remove');
            $('.modal-body #icon_email').removeClass('glyphicon-ok');
            $('.modal-body #icon_email').removeClass('glyphicon-remove');
            $('.modal-body #icon_password').removeClass('glyphicon-ok');
            $('.modal-body #icon_password').removeClass('glyphicon-remove');
            $('.modal-body #icon_confirm_password').removeClass('glyphicon-ok');
            $('.modal-body #icon_confirm_password').removeClass('glyphicon-remove');
            $('.modal-body #insert_button').prop('disabled', false);
        });


        // ---------------------------------------------------------------------

        // Alter Modal ---------------------------------------------------------

        // Displays selected image (alter modal)
        function display_image_alter(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#alter_image').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Loads user information and opens alter modal
        $('.alter-button').click(function () {
            event.preventDefault();
            user_id = $(this).data('id');

            $.get(path + 'ajax/find_user', {id: user_id}, function (data) {
                var information = data.split(',');

                user_name = information[0];
                user_username = information[1];
                user_email = information[2];
                user_gold = information[3];
                user_gems = information[4];
                user_picture = information[5];

                $('#alterModal').modal('show');
            });
        });

        // Updates the Alter Modal inputs with user information
        $('#alterModal').on("show.bs.modal", function () {
            $('.modal-body #alter_id').val(user_id);
            $('.modal-body #alter_name').val(user_name);
            $('.modal-body #alter_username').val(user_username);
            $('.modal-body #alter_email').val(user_email);
            $('.modal-body #alter_gold').val(user_gold);
            $('.modal-body #alter_gems').val(user_gems);
            $('.modal-body #alter_image').attr('src', './pictures/' + user_picture);
        });

        // Verify Name
        $("#alterModal").on('keyup', '#alter_name', function () {
            $.get(path + 'ajax/verify_user_name', {name: $('#alter_name').val()}, function (data) {
                if (data) {
                    $('.modal-body #alter_form_name').removeClass('has-success');
                    $('.modal-body #alter_form_name').addClass('has-error');
                    $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                    $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                    $('.modal-body #alter_button').prop('disabled', true);
                } else {
                    $('.modal-body #alter_form_name').removeClass('has-error');
                    $('.modal-body #alter_form_name').addClass('has-success');
                    $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
                    $('.modal-body #alter_icon_name').addClass('glyphicon-ok');
                    $('.modal-body #alter_button').prop('disabled', false);
                }
            });
        });

        // Verify Username
        $("#alterModal").on('keyup', '#alter_username', function () {
            var username = $('#alter_username').val();

            if (username.length < 3) {
                $('.modal-body #alter_form_username').removeClass('has-success');
                $('.modal-body #alter_form_username').addClass('has-error');
                $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_username').addClass('glyphicon-remove');
                $('.modal-body #alter_button').prop('disabled', true);
            } else {
                if (validate_username(username)) {
                    $.get(path + 'ajax/verify_user_username_alter', {username: $('#alter_username').val(), id: $('#alter_id').val()}, function (data) {
                        if (data) {
                            $('.modal-body #alter_form_username').removeClass('has-success');
                            $('.modal-body #alter_form_username').addClass('has-error');
                            $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
                            $('.modal-body #alter_icon_username').addClass('glyphicon-remove');
                            $('.modal-body #alter_button').prop('disabled', true);
                        }
                    });

                    $('.modal-body #alter_form_username').removeClass('has-error');
                    $('.modal-body #alter_form_username').addClass('has-success');
                    $('.modal-body #alter_icon_username').removeClass('glyphicon-remove');
                    $('.modal-body #alter_icon_username').addClass('glyphicon-ok');
                    $('.modal-body #alter_button').prop('disabled', false);
                } else {
                    $('.modal-body #alter_form_username').removeClass('has-success');
                    $('.modal-body #alter_form_username').addClass('has-error');
                    $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
                    $('.modal-body #alter_icon_username').addClass('glyphicon-remove');
                    $('.modal-body #alter_button').prop('disabled', true);
                }
            }
        });

        // Verify E-mail
        $("#alterModal").on('blur', '#alter_email', function () {
            var email = $('#alter_email').val();

            if (validate_email(email)) {
                $.get(path + 'ajax/verify_user_email_alter', {email: $('#alter_email').val(), id: $('#alter_id').val()}, function (data) {
                    if (data) {
                        $('.modal-body #alter_form_email').removeClass('has-success');
                        $('.modal-body #alter_form_email').addClass('has-error');
                        $('.modal-body #alter_icon_email').removeClass('glyphicon-ok');
                        $('.modal-body #alter_icon_email').addClass('glyphicon-remove');
                        $('.modal-body #alter_button').prop('disabled', true);
                    }
                });

                $('.modal-body #alter_form_email').removeClass('has-error');
                $('.modal-body #alter_form_email').addClass('has-success');
                $('.modal-body #alter_icon_email').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_email').addClass('glyphicon-ok');
                $('.modal-body #alter_button').prop('disabled', false);
            } else {
                $('.modal-body #alter_form_email').removeClass('has-success');
                $('.modal-body #alter_form_email').addClass('has-error');
                $('.modal-body #alter_icon_email').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_email').addClass('glyphicon-remove');
                $('.modal-body #alter_button').prop('disabled', true);
            }
        });

        // Updates Picture (alter modal)
        $("#alterModal").on('change', '#alter_picture', function () {
            display_image_alter(this);
        });

        // Reset form (alter)
        $("#alterModal").on('click', '#reset_button', function () {
            $('.modal-body #alter_form_name').removeClass('has-success');
            $('.modal-body #alter_form_name').removeClass('has-error');
            $('.modal-body #alter_form_username').removeClass('has-success');
            $('.modal-body #alter_form_username').removeClass('has-error');
            $('.modal-body #alter_form_email').removeClass('has-success');
            $('.modal-body #alter_form_email').removeClass('has-error');
            $('.modal-body #alter_form_password').removeClass('has-success');
            $('.modal-body #alter_form_password').removeClass('has-error');
            $('.modal-body #alter_form_confirm_password').removeClass('has-success');
            $('.modal-body #alter_form_confirm_password').removeClass('has-error');
            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_username').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_email').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_email').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_password').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_password').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_confirm_password').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_confirm_password').removeClass('glyphicon-remove');
            $('.modal-body #alter_button').prop('disabled', false);
        });

        // -------------------------------------------------------------------------

    });
}
