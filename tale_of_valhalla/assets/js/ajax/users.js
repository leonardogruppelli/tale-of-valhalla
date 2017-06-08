var url = window.location.href;

if (url.includes('home')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla/';
        var user_id;
        var user_name;
        var name_has_error;
        var user_username;
        var username_has_error;
        var user_email;
        var email_has_error;
        var password_has_error;
        var confirm_password_has_error;
        var user_picture;
        
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

        // Verifies if it's only numbers
        function validate_number(number) {
            var validate_number = /^[0-9]/;
            return validate_number.test(number);
        }

        // Verifies if insert form has errors
        function validate_form() {
            if (name_has_error || username_has_error || email_has_error || password_has_error || confirm_password_has_error || gold_has_error || gems_has_error) {
                $('.modal-body #insert_button').prop('disabled', true);
            } else {
                $('.modal-body #insert_button').prop('disabled', false);
            }
        }

        // Verifies if alter form has errors
        function validate_form_alter() {
            if (alter_name_has_error || alter_username_has_error || alter_email_has_error || alter_gold_has_error || alter_gems_has_error) {
                $('.modal-body #alter_button').prop('disabled', true);
            } else {
                $('.modal-body #alter_button').prop('disabled', false);
            }
        }

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
                    name_has_error = true;

                    validate_form();

                    popover.options.content = "Informe nome e sobrenome";

                    $('#name').popover("show");
                } else {
                    $('.modal-body #form_name').removeClass('has-error');
                    $('.modal-body #form_name').addClass('has-success');
                    $('.modal-body #help_name').html('');
                    $('.modal-body #icon_name').removeClass('glyphicon-remove');
                    $('.modal-body #icon_name').addClass('glyphicon-ok');
                    name_has_error = false;

                    validate_form();

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
                username_has_error = true;

                validate_form();

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
                            username_has_error = true;

                            validate_form();

                            popover.options.content = "Nome de usuário já existente";

                            $('#username').popover("show");
                        } else {
                            $('.modal-body #form_username').removeClass('has-error');
                            $('.modal-body #form_username').addClass('has-success');
                            $('.modal-body #icon_username').removeClass('glyphicon-remove');
                            $('.modal-body #icon_username').addClass('glyphicon-ok');
                            username_has_error = false;

                            validate_form();

                            $('#username').popover("hide");
                        }
                    });
                } else {
                    $('.modal-body #form_username').removeClass('has-success');
                    $('.modal-body #form_username').addClass('has-error');
                    $('.modal-body #icon_username').removeClass('glyphicon-ok');
                    $('.modal-body #icon_username').addClass('glyphicon-remove');
                    username_has_error = true;

                    validate_form();

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
                        email_has_error = true;

                        validate_form();

                        popover.options.content = "E-mail já utilizado";

                        $('#email').popover("show");
                    } else {
                        $('.modal-body #form_email').removeClass('has-error');
                        $('.modal-body #form_email').addClass('has-success');
                        $('.modal-body #icon_email').removeClass('glyphicon-remove');
                        $('.modal-body #icon_email').addClass('glyphicon-ok');
                        email_has_error = false;

                        validate_form();

                        $('#email').popover("hide");
                    }
                });
            } else {
                $('.modal-body #form_email').removeClass('has-success');
                $('.modal-body #form_email').addClass('has-error');
                $('.modal-body #icon_email').removeClass('glyphicon-ok');
                $('.modal-body #icon_email').addClass('glyphicon-remove');
                email_has_error = true;

                validate_form();

                popover.options.content = "E-mail inválido";

                $('#email').popover("show");
            }
        });

        // Password popover
        $('#password').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Password
        $("#insertModal").on('keyup', '#password', function () {
            var password = $('#password').val();
            var popover = $('#password').data('bs.popover');

            if (password.length < 6) {
                $('.modal-body #form_password').removeClass('has-success');
                $('.modal-body #form_password').addClass('has-error');
                $('.modal-body #icon_password').removeClass('glyphicon-ok');
                $('.modal-body #icon_password').addClass('glyphicon-remove');
                password_has_error = true;

                validate_form();

                popover.options.content = "Senha muito curta";

                $('#password').popover("show");
            } else {
                $('.modal-body #form_password').removeClass('has-error');
                $('.modal-body #form_password').addClass('has-success');
                $('.modal-body #icon_password').removeClass('glyphicon-remove');
                $('.modal-body #icon_password').addClass('glyphicon-ok');
                password_has_error = false;

                validate_form();

                $('#password').popover("hide");
            }
        });

        // Confirm Password popover
        $('#confirm_password').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Confirm Password
        $("#insertModal").on('blur', '#confirm_password', function () {
            var popover = $('#confirm_password').data('bs.popover');

            $.get(path + 'ajax/verify_user_password', {confirm_password: $('#confirm_password').val(), password: $('#password').val()}, function (data) {
                if (data) {
                    $('.modal-body #form_confirm_password').removeClass('has-success');
                    $('.modal-body #form_confirm_password').addClass('has-error');
                    $('.modal-body #icon_confirm_password').removeClass('glyphicon-ok');
                    $('.modal-body #icon_confirm_password').addClass('glyphicon-remove');
                    confirm_password_has_error = true;

                    validate_form();

                    popover.options.content = "Senha inválida";

                    $('#confirm_password').popover("show");
                } else {
                    $('.modal-body #form_confirm_password').removeClass('has-error');
                    $('.modal-body #form_confirm_password').addClass('has-success');
                    $('.modal-body #icon_confirm_password').removeClass('glyphicon-remove');
                    $('.modal-body #icon_confirm_password').addClass('glyphicon-ok');
                    confirm_password_has_error = false;

                    validate_form();

                    $('#confirm_password').popover("hide");
                }
            });
        });

        // Gold popover
        $('#gold').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Gold
        $("#insertModal").on('keyup', '#gold', function () {
            var number = $('#gold').val();
            var popover = $('#gold').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_gold').removeClass('has-error');
                $('.modal-body #form_gold').addClass('has-success');
                $('.modal-body #icon_gold').removeClass('glyphicon-remove');
                $('.modal-body #icon_gold').addClass('glyphicon-ok');
                gold_has_error = false;

                validate_form();

                $('#gold').popover("hide");
            } else {
                $('.modal-body #form_gold').removeClass('has-success');
                $('.modal-body #form_gold').addClass('has-error');
                $('.modal-body #icon_gold').removeClass('glyphicon-ok');
                $('.modal-body #icon_gold').addClass('glyphicon-remove');
                gold_has_error = true;

                validate_form();

                popover.options.content = "Ouro inválido";

                $('#gold').popover("show");
            }
        });

        // Gems popover
        $('#gems').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Gems
        $("#insertModal").on('keyup', '#gems', function () {
            var number = $('#gems').val();
            var popover = $('#gems').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_gems').removeClass('has-error');
                $('.modal-body #form_gems').addClass('has-success');
                $('.modal-body #icon_gems').removeClass('glyphicon-remove');
                $('.modal-body #icon_gems').addClass('glyphicon-ok');
                gems_has_error = false;

                validate_form();

                $('#gems').popover("hide");
            } else {
                $('.modal-body #form_gems').removeClass('has-success');
                $('.modal-body #form_gems').addClass('has-error');
                $('.modal-body #icon_gems').removeClass('glyphicon-ok');
                $('.modal-body #icon_gems').addClass('glyphicon-remove');
                gems_has_error = true;

                validate_form();

                popover.options.content = "Gemas inválidas";

                $('#gems').popover("show");
            }
        });

        // Updates Picture (insert modal)
        $("#insertModal").on('change', '#picture', function () {
            display_image(this);
        });

        // Reset form (insert)
        $("#insertModal").on('click', '#reset_button', function () {
            $('.modal-body #form_name').removeClass('has-success');
            $('.modal-body #form_name').removeClass('has-error');
            $('#name').popover("hide");
            $('.modal-body #form_username').removeClass('has-success');
            $('.modal-body #form_username').removeClass('has-error');
            $('#username').popover("hide");
            $('.modal-body #form_email').removeClass('has-success');
            $('.modal-body #form_email').removeClass('has-error');
            $('#email').popover("hide");
            $('.modal-body #form_password').removeClass('has-success');
            $('.modal-body #form_password').removeClass('has-error');
            $('#password').popover("hide");
            $('.modal-body #form_confirm_password').removeClass('has-success');
            $('.modal-body #form_confirm_password').removeClass('has-error');
            $('#confirm_password').popover("hide");
            $('.modal-body #form_gold').removeClass('has-success');
            $('.modal-body #form_gold').removeClass('has-error');
            $('#gold').popover("hide");
            $('.modal-body #form_gems').removeClass('has-success');
            $('.modal-body #form_gems').removeClass('has-error');
            $('#gems').popover("hide");
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
            $('.modal-body #icon_gold').removeClass('glyphicon-ok');
            $('.modal-body #icon_gold').removeClass('glyphicon-remove');
            $('.modal-body #icon_gems').removeClass('glyphicon-ok');
            $('.modal-body #icon_gems').removeClass('glyphicon-remove');
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

        // Alter Name popover
        $('#alter_name').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Name
        $("#alterModal").on('keyup', '#alter_name', function () {
            var popover = $('#alter_name').data('bs.popover');

            $.get(path + 'ajax/verify_user_name', {name: $('#alter_name').val()}, function (data) {
                if (data) {
                    $('.modal-body #alter_form_name').removeClass('has-success');
                    $('.modal-body #alter_form_name').addClass('has-error');
                    $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                    $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                    alter_name_has_error = true;

                    validate_form_alter();

                    popover.options.content = "Informe nome e sobrenome";

                    $('#alter_name').popover("show");
                } else {
                    $('.modal-body #alter_form_name').removeClass('has-error');
                    $('.modal-body #alter_form_name').addClass('has-success');
                    $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
                    $('.modal-body #alter_icon_name').addClass('glyphicon-ok');
                    alter_name_has_error = false;

                    validate_form_alter();

                    $('#alter_name').popover("hide");
                }
            });
        });

        // Alter Username popover
        $('#alter_username').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Username
        $("#alterModal").on('keyup', '#alter_username', function () {
            var username = $('#alter_username').val();
            var popover = $('#alter_username').data('bs.popover');

            if (username.length < 3) {
                $('.modal-body #alter_form_username').removeClass('has-success');
                $('.modal-body #alter_form_username').addClass('has-error');
                $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_username').addClass('glyphicon-remove');
                alter_username_has_error = true;

                validate_form_alter();

                popover.options.content = "Nome de usuário muito curto";

                $('#alter_username').popover("show");
            } else {
                if (validate_username(username)) {
                    $.get(path + 'ajax/verify_user_username_alter', {username: $('#alter_username').val(), id: $('#alter_id').val()}, function (data) {
                        if (data) {
                            $('.modal-body #alter_form_username').removeClass('has-success');
                            $('.modal-body #alter_form_username').addClass('has-error');
                            $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
                            $('.modal-body #alter_icon_username').addClass('glyphicon-remove');
                            alter_username_has_error = true;

                            validate_form_alter();

                            popover.options.content = "Nome de usuário já existente";

                            $('#alter_username').popover("show");
                        } else {
                            $('.modal-body #alter_form_username').removeClass('has-error');
                            $('.modal-body #alter_form_username').addClass('has-success');
                            $('.modal-body #alter_icon_username').removeClass('glyphicon-remove');
                            $('.modal-body #alter_icon_username').addClass('glyphicon-ok');
                            alter_username_has_error = false;

                            validate_form_alter();

                            $('#alter_username').popover("hide");
                        }
                    });
                } else {
                    $('.modal-body #alter_form_username').removeClass('has-success');
                    $('.modal-body #alter_form_username').addClass('has-error');
                    $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
                    $('.modal-body #alter_icon_username').addClass('glyphicon-remove');
                    alter_username_has_error = true;

                    validate_form_alter();

                    popover.options.content = "Nome de usuário inválido";

                    $('#alter_username').popover("show");
                }
            }
        });

        // Alter e-mail popover
        $('#alter_email').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify E-mail
        $("#alterModal").on('blur', '#alter_email', function () {
            var email = $('#alter_email').val();
            var popover = $('#alter_email').data('bs.popover');

            if (validate_email(email)) {
                $.get(path + 'ajax/verify_user_email_alter', {email: $('#alter_email').val(), id: $('#alter_id').val()}, function (data) {
                    if (data) {
                        $('.modal-body #alter_form_email').removeClass('has-success');
                        $('.modal-body #alter_form_email').addClass('has-error');
                        $('.modal-body #alter_icon_email').removeClass('glyphicon-ok');
                        $('.modal-body #alter_icon_email').addClass('glyphicon-remove');
                        alter_email_has_error = true;

                        validate_form_alter();

                        popover.options.content = "E-mail já existente";

                        $('#alter_email').popover("show");
                    } else {
                        $('.modal-body #alter_form_email').removeClass('has-error');
                        $('.modal-body #alter_form_email').addClass('has-success');
                        $('.modal-body #alter_icon_email').removeClass('glyphicon-remove');
                        $('.modal-body #alter_icon_email').addClass('glyphicon-ok');
                        alter_email_has_error = false;

                        validate_form_alter();

                        $('#alter_email').popover("hide");
                    }
                });
            } else {
                $('.modal-body #alter_form_email').removeClass('has-success');
                $('.modal-body #alter_form_email').addClass('has-error');
                $('.modal-body #alter_icon_email').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_email').addClass('glyphicon-remove');
                alter_email_has_error = true;

                validate_form_alter();

                popover.options.content = "E-mail inválido";

                $('#alter_email').popover("show");
            }
        });

        // Gold popover
        $('#alter_gold').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Gold
        $("#alterModal").on('keyup', '#alter_gold', function () {
            var number = $('#alter_gold').val();
            var popover = $('#alter_gold').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_gold').removeClass('has-error');
                $('.modal-body #alter_form_gold').addClass('has-success');
                $('.modal-body #alter_icon_gold').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_gold').addClass('glyphicon-ok');
                alter_gold_has_error = false;

                validate_form_alter();

                $('#alter_gold').popover("hide");
            } else {
                $('.modal-body #alter_form_gold').removeClass('has-success');
                $('.modal-body #alter_form_gold').addClass('has-error');
                $('.modal-body #alter_icon_gold').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_gold').addClass('glyphicon-remove');
                alter_gold_has_error = true;

                validate_form_alter();

                popover.options.content = "Ouro inválido";

                $('#alter_gold').popover("show");
            }
        });

        // Gems popover
        $('#alter_gems').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Gems
        $("#alterModal").on('keyup', '#alter_gems', function () {
            var number = $('#alter_gems').val();
            var popover = $('#alter_gems').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_gems').removeClass('has-error');
                $('.modal-body #alter_form_gems').addClass('has-success');
                $('.modal-body #alter_icon_gems').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_gems').addClass('glyphicon-ok');
                alter_gems_has_error = false;

                validate_form_alter();

                $('#alter_gems').popover("hide");
            } else {
                $('.modal-body #alter_form_gems').removeClass('has-success');
                $('.modal-body #alter_form_gems').addClass('has-error');
                $('.modal-body #alter_icon_gems').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_gems').addClass('glyphicon-remove');
                alter_gems_has_error = true;

                validate_form_alter();

                popover.options.content = "Gemas inválidas";

                $('#alter_gems').popover("show");
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
            $('#alter_name').popover("hide");
            $('.modal-body #alter_form_username').removeClass('has-success');
            $('.modal-body #alter_form_username').removeClass('has-error');
            $('#alter_username').popover("hide");
            $('.modal-body #alter_form_email').removeClass('has-success');
            $('.modal-body #alter_form_email').removeClass('has-error');
            $('#alter_email').popover("hide");
            $('.modal-body #alter_form_gold').removeClass('has-success');
            $('.modal-body #alter_form_gold').removeClass('has-error');
            $('#alter_gold').popover("hide");
            $('.modal-body #alter_form_gems').removeClass('has-success');
            $('.modal-body #alter_form_gems').removeClass('has-error');
            $('#alter_gems').popover("hide");
            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_username').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_username').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_email').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_email').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_gold').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_gold').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_gems').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_gems').removeClass('glyphicon-remove');
            $('.modal-body #alter_button').prop('disabled', false);
        });

        // -------------------------------------------------------------------------

    });
}
