var url = window.location.href;

if (url.includes('classes')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla_admin/';
        var class_id;
        var class_name;
        var name_has_error;
        var alter_name_has_error;

        // Insert Modal --------------------------------------------------------

        // Verifies if name is valid
        function validate_name(name) {
            var validate_name = /^[a-zA-Z\s]*$/;
            return validate_name.test(name);
        }
        
        // Verifies if insert form has errors
        function validate_form() {
            if (name_has_error) {
                $('.modal-body #insert_button').prop('disabled', true);
            } else {
                $('.modal-body #insert_button').prop('disabled', false);
            }
        }
        
        // Verifies if insert form has errors
        function validate_form_alter() {
            if (alter_name_has_error) {
                $('.modal-body #alter_button').prop('disabled', true);
            } else {
                $('.modal-body #alter_button').prop('disabled', false);
            }
        }

        // Name popover
        $('#name').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Name
        $("#insertModal").on('keyup', '#name', function () {
            var name = $('#name').val();
            var popover = $('#name').data('bs.popover');

            if (name.length < 3) {
                $('.modal-body #form_name').removeClass('has-success');
                $('.modal-body #form_name').addClass('has-error');
                $('.modal-body #icon_name').removeClass('glyphicon-ok');
                $('.modal-body #icon_name').addClass('glyphicon-remove');
                name_has_error = true;
                
                validate_form();

                popover.options.content = "Nome muito curto";

                $('#name').popover("show");
            } else {
                if (validate_name(name)) {
                    $.get(path + 'ajax/verify_class_name', {name: $('#name').val()}, function (data) {
                        if (data) {
                            $('.modal-body #form_name').removeClass('has-success');
                            $('.modal-body #form_name').addClass('has-error');
                            $('.modal-body #icon_name').removeClass('glyphicon-ok');
                            $('.modal-body #icon_name').addClass('glyphicon-remove');
                            name_has_error = true;
                            
                            validate_form();

                            popover.options.content = "Classe já existente";

                            $('#name').popover("show");
                        } else {
                            $('.modal-body #form_name').removeClass('has-error');
                            $('.modal-body #form_name').addClass('has-success');
                            $('.modal-body #icon_name').removeClass('glyphicon-remove');
                            $('.modal-body #icon_name').addClass('glyphicon-ok');
                            name_has_error = false;
                            
                            validate_form();

                            $('#name').popover("hide");
                        }
                    });
                } else {
                    $('.modal-body #form_name').removeClass('has-success');
                    $('.modal-body #form_name').addClass('has-error');
                    $('.modal-body #icon_name').removeClass('glyphicon-ok');
                    $('.modal-body #icon_name').addClass('glyphicon-remove');
                    name_has_error = true;
                    
                    validate_form();

                    popover.options.content = "Classe inválida";

                    $('#name').popover("show");
                }
            }
        });
        
        // Verifies if form has errors (insert modal)
        if (name_has_error) {
            $('.modal-body #insert_button').prop('disabled', true);
        }
        
        // Reset form (insert)
        $("#insertModal").on('click', '#reset_button', function () {
            $('.modal-body #form_name').removeClass('has-success');
            $('.modal-body #form_name').removeClass('has-error');
            $('#name').popover("hide");
            $('.modal-body #icon_name').removeClass('glyphicon-ok');
            $('.modal-body #icon_name').removeClass('glyphicon-remove');
            $('.modal-body #insert_button').prop('disabled', false);
        });

        // ---------------------------------------------------------------------

        // Alter Modal ---------------------------------------------------------

        // Loads class information and opens alter modal
        $('.alter-button').click(function () {
            event.preventDefault();
            class_id = $(this).data('id');

            $.get(path + 'ajax/find_class', {id: class_id}, function (data) {
                var information = data.split(',');

                class_name = information[0];

                $('#alterModal').modal('show');
            });
        });

        // Updates the Alter Modal inputs with class information
        $('#alterModal').on("show.bs.modal", function () {
            $('.modal-body #alter_id').val(class_id);
            $('.modal-body #alter_name').val(class_name);
        });
        
        // Alter name popover
        $('#alter_name').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify alter name
        $("#alterModal").on('keyup', '#alter_name', function () {
            var name = $('#alter_name').val();
            var popover = $('#alter_name').data('bs.popover');

            if (name.length < 3) {
                $('.modal-body #alter_form_name').removeClass('has-success');
                $('.modal-body #alter_form_name').addClass('has-error');
                $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                alter_name_has_error = true;
                
                validate_form_alter();

                popover.options.content = "Nome muito curto";
                
                $('#alter_name').popover("show");
            } else {
                if (validate_name(name)) {
                    $.get(path + 'ajax/verify_class_name_alter', {name: $('#alter_name').val(), id: $('#alter_id').val()}, function (data) {
                        if (data) {
                            $('.modal-body #alter_form_name').removeClass('has-success');
                            $('.modal-body #alter_form_name').addClass('has-error');
                            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                            $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                            alter_name_has_error = true;
                            
                            validate_form_alter();

                            popover.options.content = "Classe já existente";
                            
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
                } else {
                    $('.modal-body #alter_form_name').removeClass('has-success');
                    $('.modal-body #alter_form_name').addClass('has-error');
                    $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                    $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                    alter_name_has_error = true;
                    
                    validate_form_alter();

                    popover.options.content = "Classe inválida";
                    
                    $('#alter_name').popover("show");
                }
            }
        });
        
        // Verifies if form has errors (alter modal)
        if (alter_name_has_error) {
            $('.modal-body #alter_button').prop('disabled', true);
        }
        
        // Reset form (alter)
        $("#alterModal").on('click', '#reset_button', function () {
            $('.modal-body #alter_form_name').removeClass('has-success');
            $('.modal-body #alter_form_name').removeClass('has-error');
            $('#alter_name').popover("hide");
            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
            $('.modal-body #alter_button').prop('disabled', false);
        });

        // ---------------------------------------------------------------------

    });
}