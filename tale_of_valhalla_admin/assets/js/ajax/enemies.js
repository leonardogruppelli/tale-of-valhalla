var url = window.location.href;

if (url.includes('enemies')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla_admin/';
        var enemy_id;
        var enemy_name;
        var name_has_error;
        var alter_name_has_error;
        var enemy_attack;
        var attack_has_error;
        var alter_attack_has_error;
        var enemy_defense;
        var defense_has_error;
        var alter_defense_has_error;
        var enemy_agility;
        var agility_has_error;
        var alter_agility_has_error;
        var enemy_intelligence;
        var intelligence_has_error;
        var alter_intelligence_has_error;
        var enemy_health;
        var health_has_error;
        var alter_health_has_error;
        var enemy_mana;
        var mana_has_error;
        var alter_mana_has_error;
        var enemy_hp_potions;
        var hp_potions_has_error;
        var alter_hp_potions_has_error;
        var enemy_mp_potions;
        var mp_potions_has_error;
        var alter_mp_potions_has_error;
        var enemy_image;

        // Insert Modal --------------------------------------------------------

        // Verifies if name is valid
        function validate_name(name) {
            var validate_name = /^[a-zA-Z\s]*$/;
            return validate_name.test(name);
        }

        // Verifies if it's only numbers
        function validate_number(number) {
            var validate_number = /^[0-9]/;
            return validate_number.test(number);
        }

        // Displays selected image (insert modal)
        function display_image(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picture').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Verifies if insert form has errors
        function validate_form() {
            if (name_has_error || attack_has_error || defense_has_error || agility_has_error || intelligence_has_error || health_has_error || mana_has_error || hp_potions_has_error || mp_potions_has_error) {
                $('.modal-body #insert_button').prop('disabled', true);
            } else {
                $('.modal-body #insert_button').prop('disabled', false);
            }
        }

        // Verifies if alter form has errors
        function validate_form_alter() {
            if (alter_name_has_error || alter_attack_has_error || alter_defense_has_error || alter_agility_has_error || alter_intelligence_has_error || alter_health_has_error || alter_mana_has_error || alter_hp_potions_has_error || alter_mp_potions_has_error) {
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
                    $.get(path + 'ajax/verify_enemy_name', {name: $('#name').val()}, function (data) {
                        if (data) {
                            $('.modal-body #form_name').removeClass('has-success');
                            $('.modal-body #form_name').addClass('has-error');
                            $('.modal-body #icon_name').removeClass('glyphicon-ok');
                            $('.modal-body #icon_name').addClass('glyphicon-remove');
                            name_has_error = true;

                            validate_form();

                            popover.options.content = "Inimigo já existente";

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

                    popover.options.content = "Nome inválido";

                    $('#name').popover("show");
                }
            }
        });

        // Attack popover
        $('#attack').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Attack
        $("#insertModal").on('keyup', '#attack', function () {
            var number = $('#attack').val();
            var popover = $('#attack').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_attack').removeClass('has-error');
                $('.modal-body #form_attack').addClass('has-success');
                $('.modal-body #icon_attack').removeClass('glyphicon-remove');
                $('.modal-body #icon_attack').addClass('glyphicon-ok');
                attack_has_error = false;

                validate_form();

                $('#attack').popover("hide");
            } else {
                $('.modal-body #form_attack').removeClass('has-success');
                $('.modal-body #form_attack').addClass('has-error');
                $('.modal-body #icon_attack').removeClass('glyphicon-ok');
                $('.modal-body #icon_attack').addClass('glyphicon-remove');
                attack_has_error = true;

                validate_form();

                popover.options.content = "Ataque inválido";

                $('#attack').popover("show");
            }
        });

        // Defense popover
        $('#defense').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Defense
        $("#insertModal").on('keyup', '#defense', function () {
            var number = $('#defense').val();
            var popover = $('#defense').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_defense').removeClass('has-error');
                $('.modal-body #form_defense').addClass('has-success');
                $('.modal-body #icon_defense').removeClass('glyphicon-remove');
                $('.modal-body #icon_defense').addClass('glyphicon-ok');
                defense_has_error = false;

                validate_form();

                $('#defense').popover("hide");
            } else {
                $('.modal-body #form_defense').removeClass('has-success');
                $('.modal-body #form_defense').addClass('has-error');
                $('.modal-body #icon_defense').removeClass('glyphicon-ok');
                $('.modal-body #icon_defense').addClass('glyphicon-remove');
                defense_has_error = true;

                validate_form();

                popover.options.content = "Defesa inválida";

                $('#defense').popover("show");
            }
        });

        // Agility popover
        $('#agility').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Agility
        $("#insertModal").on('keyup', '#agility', function () {
            var number = $('#agility').val();
            var popover = $('#agility').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_agility').removeClass('has-error');
                $('.modal-body #form_agility').addClass('has-success');
                $('.modal-body #icon_agility').removeClass('glyphicon-remove');
                $('.modal-body #icon_agility').addClass('glyphicon-ok');
                agility_has_error = false;

                validate_form();

                $('#agility').popover("hide");
            } else {
                $('.modal-body #form_agility').removeClass('has-success');
                $('.modal-body #form_agility').addClass('has-error');
                $('.modal-body #icon_agility').removeClass('glyphicon-ok');
                $('.modal-body #icon_agility').addClass('glyphicon-remove');
                agility_has_error = true;

                validate_form();

                popover.options.content = "Agilidade inválida";

                $('#agility').popover("show");
            }
        });

        // Intelligence popover
        $('#intelligence').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Intelligence
        $("#insertModal").on('keyup', '#intelligence', function () {
            var number = $('#intelligence').val();
            var popover = $('#intelligence').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_intelligence').removeClass('has-error');
                $('.modal-body #form_intelligence').addClass('has-success');
                $('.modal-body #icon_intelligence').removeClass('glyphicon-remove');
                $('.modal-body #icon_intelligence').addClass('glyphicon-ok');
                intelligence_has_error = false;

                validate_form();

                $('#intelligence').popover("hide");
            } else {
                $('.modal-body #form_intelligence').removeClass('has-success');
                $('.modal-body #form_intelligence').addClass('has-error');
                $('.modal-body #icon_intelligence').removeClass('glyphicon-ok');
                $('.modal-body #icon_intelligence').addClass('glyphicon-remove');
                intelligence_has_error = true;

                validate_form();

                popover.options.content = "Inteligência inválida";

                $('#intelligence').popover("show");
            }
        });
        
        // Health popover
        $('#health').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Health
        $("#insertModal").on('keyup', '#health', function () {
            var number = $('#health').val();
            var popover = $('#health').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_health').removeClass('has-error');
                $('.modal-body #form_health').addClass('has-success');
                $('.modal-body #icon_health').removeClass('glyphicon-remove');
                $('.modal-body #icon_health').addClass('glyphicon-ok');
                health_has_error = false;

                validate_form();

                $('#health').popover("hide");
            } else {
                $('.modal-body #form_health').removeClass('has-success');
                $('.modal-body #form_health').addClass('has-error');
                $('.modal-body #icon_health').removeClass('glyphicon-ok');
                $('.modal-body #icon_health').addClass('glyphicon-remove');
                health_has_error = true;

                validate_form();

                popover.options.content = "Vida inválida";

                $('#health').popover("show");
            }
        });
        
        // Mana popover
        $('#mana').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Mana
        $("#insertModal").on('keyup', '#mana', function () {
            var number = $('#mana').val();
            var popover = $('#mana').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_mana').removeClass('has-error');
                $('.modal-body #form_mana').addClass('has-success');
                $('.modal-body #icon_mana').removeClass('glyphicon-remove');
                $('.modal-body #icon_mana').addClass('glyphicon-ok');
                mana_has_error = false;

                validate_form();

                $('#mana').popover("hide");
            } else {
                $('.modal-body #form_mana').removeClass('has-success');
                $('.modal-body #form_mana').addClass('has-error');
                $('.modal-body #icon_mana').removeClass('glyphicon-ok');
                $('.modal-body #icon_mana').addClass('glyphicon-remove');
                mana_has_error = true;

                validate_form();

                popover.options.content = "Mana inválida";

                $('#mana').popover("show");
            }
        });
        
        // HP Potions popover
        $('#hp_potions').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify HP Potions
        $("#insertModal").on('keyup', '#hp_potions', function () {
            var number = $('#hp_potions').val();
            var popover = $('#hp_potions').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_hp_potions').removeClass('has-error');
                $('.modal-body #form_hp_potions').addClass('has-success');
                $('.modal-body #icon_hp_potions').removeClass('glyphicon-remove');
                $('.modal-body #icon_hp_potions').addClass('glyphicon-ok');
                hp_potions_has_error = false;

                validate_form();

                $('#hp_potions').popover("hide");
            } else {
                $('.modal-body #form_hp_potions').removeClass('has-success');
                $('.modal-body #form_hp_potions').addClass('has-error');
                $('.modal-body #icon_hp_potions').removeClass('glyphicon-ok');
                $('.modal-body #icon_hp_potions').addClass('glyphicon-remove');
                hp_potions_has_error = true;

                validate_form();

                popover.options.content = "Poções de HP inválidas";

                $('#hp_potions').popover("show");
            }
        });
        
        // MP Potions popover
        $('#hp_potions').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify MP Potions
        $("#insertModal").on('keyup', '#mp_potions', function () {
            var number = $('#mp_potions').val();
            var popover = $('#mp_potions').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_mp_potions').removeClass('has-error');
                $('.modal-body #form_mp_potions').addClass('has-success');
                $('.modal-body #icon_mp_potions').removeClass('glyphicon-remove');
                $('.modal-body #icon_mp_potions').addClass('glyphicon-ok');
                mp_potions_has_error = false;

                validate_form();

                $('#mp_potions').popover("hide");
            } else {
                $('.modal-body #form_mp_potions').removeClass('has-success');
                $('.modal-body #form_mp_potions').addClass('has-error');
                $('.modal-body #icon_mp_potions').removeClass('glyphicon-ok');
                $('.modal-body #icon_mp_potions').addClass('glyphicon-remove');
                mp_potions_has_error = true;

                validate_form();

                popover.options.content = "Poções de MP inválidas";

                $('#mp_potions').popover("show");
            }
        });

        // Updates Image (insert modal)
        $("#insertModal").on('change', '#image', function () {
            display_image(this);
        });

        // Reset form (insert)
        $("#insertModal").on('click', '#reset_button', function () {
            $('.modal-body #form_name').removeClass('has-success');
            $('.modal-body #form_name').removeClass('has-error');
            $('#name').popover("hide");
            $('.modal-body #form_attack').removeClass('has-success');
            $('.modal-body #form_attack').removeClass('has-error');
            $('#attack').popover("hide");
            $('.modal-body #form_defense').removeClass('has-success');
            $('.modal-body #form_defense').removeClass('has-error');
            $('#defense').popover("hide");
            $('.modal-body #form_agility').removeClass('has-success');
            $('.modal-body #form_agility').removeClass('has-error');
            $('#agility').popover("hide");
            $('.modal-body #form_intelligence').removeClass('has-success');
            $('.modal-body #form_intelligence').removeClass('has-error');
            $('#intelligence').popover("hide");
            $('.modal-body #form_health').removeClass('has-success');
            $('.modal-body #form_health').removeClass('has-error');
            $('#health').popover("hide");
            $('.modal-body #form_mana').removeClass('has-success');
            $('.modal-body #form_mana').removeClass('has-error');
            $('#mana').popover("hide");
            $('.modal-body #form_hp_potions').removeClass('has-success');
            $('.modal-body #form_hp_potions').removeClass('has-error');
            $('#hp_potions').popover("hide");
            $('.modal-body #form_mp_potions').removeClass('has-success');
            $('.modal-body #form_mp_potions').removeClass('has-error');
            $('#mp_potions').popover("hide");
            $('.modal-body #icon_name').removeClass('glyphicon-ok');
            $('.modal-body #icon_name').removeClass('glyphicon-remove');
            $('.modal-body #icon_attack').removeClass('glyphicon-ok');
            $('.modal-body #icon_attack').removeClass('glyphicon-remove');
            $('.modal-body #icon_defense').removeClass('glyphicon-ok');
            $('.modal-body #icon_defense').removeClass('glyphicon-remove');
            $('.modal-body #icon_agility').removeClass('glyphicon-ok');
            $('.modal-body #icon_agility').removeClass('glyphicon-remove');
            $('.modal-body #icon_intelligence').removeClass('glyphicon-ok');
            $('.modal-body #icon_intelligence').removeClass('glyphicon-remove');
            $('.modal-body #icon_health').removeClass('glyphicon-ok');
            $('.modal-body #icon_health').removeClass('glyphicon-remove');
            $('.modal-body #icon_mana').removeClass('glyphicon-ok');
            $('.modal-body #icon_mana').removeClass('glyphicon-remove');
            $('.modal-body #icon_hp_potions').removeClass('glyphicon-ok');
            $('.modal-body #icon_hp_potions').removeClass('glyphicon-remove');
            $('.modal-body #icon_mp_potions').removeClass('glyphicon-ok');
            $('.modal-body #icon_mp_potions').removeClass('glyphicon-remove');
            $('.modal-body #insert_button').prop('disabled', false);
        });

        // ---------------------------------------------------------------------

        // Alter Modal ---------------------------------------------------------

        // Displays selected image (alter modal)
        function display_image_alter(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#alter_picture').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Loads item information and opens alter modal
        $('.alter-button').click(function () {
            event.preventDefault();
            enemy_id = $(this).data('id');

            $.get(path + 'ajax/find_enemy', {id: enemy_id}, function (data) {
                var information = data.split(',');

                enemy_name = information[0];
                enemy_attack = information[1];
                enemy_defense = information[2];
                enemy_agility = information[3];
                enemy_intelligence = information[4];
                enemy_health = information[5];
                enemy_mana = information[6];
                enemy_hp_potions = information[7];
                enemy_mp_potions = information[8];
                enemy_image = information[9];

                $('#alterModal').modal('show');
            });
        });

        // Updates the Alter Modal inputs with user information
        $('#alterModal').on("show.bs.modal", function () {
            $('.modal-body #alter_id').val(enemy_id);
            $('.modal-body #alter_name').val(enemy_name);
            $('.modal-body #alter_attack').val(enemy_attack);
            $('.modal-body #alter_defense').val(enemy_defense);
            $('.modal-body #alter_agility').val(enemy_agility);
            $('.modal-body #alter_intelligence').val(enemy_intelligence);
            $('.modal-body #alter_health').val(enemy_health);
            $('.modal-body #alter_mana').val(enemy_mana);
            $('.modal-body #alter_hp_potions').val(enemy_hp_potions);
            $('.modal-body #alter_mp_potions').val(enemy_mp_potions);
            $('.modal-body #alter_picture').attr('src', './enemies_images/' + enemy_image);
        });

        // Alter Name popover
        $('#alter_name').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Name
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
                    $.get(path + 'ajax/verify_enemy_name_alter', {name: $('#alter_name').val(), id: $('#alter_id').val()}, function (data) {
                        if (data) {
                            $('.modal-body #alter_form_name').removeClass('has-success');
                            $('.modal-body #alter_form_name').addClass('has-error');
                            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                            $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                            alter_name_has_error = true;

                            validate_form_alter();

                            popover.options.content = "Inimigo já existente";

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

                    popover.options.content = "Nome inválido";

                    $('#alter_name').popover("show");
                }
            }
        });

        // Attack popover
        $('#alter_attack').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Attack
        $("#alterModal").on('keyup', '#alter_attack', function () {
            var number = $('#alter_attack').val();
            var popover = $('#alter_attack').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_attack').removeClass('has-error');
                $('.modal-body #alter_form_attack').addClass('has-success');
                $('.modal-body #alter_icon_attack').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_attack').addClass('glyphicon-ok');
                alter_attack_has_error = false;

                validate_form_alter();

                $('#alter_attack').popover("hide");
            } else {
                $('.modal-body #alter_form_attack').removeClass('has-success');
                $('.modal-body #alter_form_attack').addClass('has-error');
                $('.modal-body #alter_icon_attack').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_attack').addClass('glyphicon-remove');
                alter_attack_has_error = true;

                validate_form_alter();

                popover.options.content = "Ataque inválido";

                $('#alter_attack').popover("show");
            }
        });

        // Defense popover
        $('#alter_defense').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Defense
        $("#alterModal").on('keyup', '#alter_defense', function () {
            var number = $('#alter_defense').val();
            var popover = $('#alter_defense').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_defense').removeClass('has-error');
                $('.modal-body #alter_form_defense').addClass('has-success');
                $('.modal-body #alter_icon_defense').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_defense').addClass('glyphicon-ok');
                alter_defense_has_error = false;

                validate_form_alter();

                $('#alter_defense').popover("hide");
            } else {
                $('.modal-body #alter_form_defense').removeClass('has-success');
                $('.modal-body #alter_form_defense').addClass('has-error');
                $('.modal-body #alter_icon_defense').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_defense').addClass('glyphicon-remove');
                alter_defense_has_error = true;

                validate_form_alter();

                popover.options.content = "Defesa inválida";

                $('#alter_defense').popover("show");
            }
        });

        // Agility popover
        $('#alter_agility').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Agility
        $("#alterModal").on('keyup', '#alter_agility', function () {
            var number = $('#alter_agility').val();
            var popover = $('#alter_agility').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_agility').removeClass('has-error');
                $('.modal-body #alter_form_agility').addClass('has-success');
                $('.modal-body #alter_icon_agility').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_agility').addClass('glyphicon-ok');
                alter_agility_has_error = false;

                validate_form_alter();

                $('#alter_agility').popover("hide");
            } else {
                $('.modal-body #alter_form_agility').removeClass('has-success');
                $('.modal-body #alter_form_agility').addClass('has-error');
                $('.modal-body #alter_icon_agility').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_agility').addClass('glyphicon-remove');
                alter_agility_has_error = true;

                validate_form_alter();

                popover.options.content = "Agilidade inválida";

                $('#alter_agility').popover("show");
            }
        });

        // Intelligence popover
        $('#alter_intelligence').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Intelligence
        $("#alterModal").on('keyup', '#alter_intelligence', function () {
            var number = $('#alter_intelligence').val();
            var popover = $('#alter_intelligence').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_intelligence').removeClass('has-error');
                $('.modal-body #alter_form_intelligence').addClass('has-success');
                $('.modal-body #alter_icon_intelligence').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_intelligence').addClass('glyphicon-ok');
                alter_intelligence_has_error = false;

                validate_form_alter();

                $('#alter_intelligence').popover("hide");
            } else {
                $('.modal-body #alter_form_intelligence').removeClass('has-success');
                $('.modal-body #alter_form_intelligence').addClass('has-error');
                $('.modal-body #alter_icon_intelligence').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_intelligence').addClass('glyphicon-remove');
                alter_intelligence_has_error = true;

                validate_form_alter();

                popover.options.content = "Inteligência inválida";

                $('#alter_intelligence').popover("show");
            }
        });
        
        // Health popover
        $('#alter_health').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Health
        $("#alterModal").on('keyup', '#alter_health', function () {
            var number = $('#alter_health').val();
            var popover = $('#alter_health').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_health').removeClass('has-error');
                $('.modal-body #alter_form_health').addClass('has-success');
                $('.modal-body #alter_icon_health').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_health').addClass('glyphicon-ok');
                alter_health_has_error = false;

                validate_form_alter();

                $('#alter_health').popover("hide");
            } else {
                $('.modal-body #alter_form_health').removeClass('has-success');
                $('.modal-body #alter_form_health').addClass('has-error');
                $('.modal-body #alter_icon_health').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_health').addClass('glyphicon-remove');
                alter_health_has_error = true;

                validate_form_alter();

                popover.options.content = "Vida inválida";

                $('#alter_health').popover("show");
            }
        });
        
        // Mana popover
        $('#alter_mana').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Mana
        $("#alterModal").on('keyup', '#alter_mana', function () {
            var number = $('#alter_mana').val();
            var popover = $('#alter_mana').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_mana').removeClass('has-error');
                $('.modal-body #alter_form_mana').addClass('has-success');
                $('.modal-body #alter_icon_mana').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_mana').addClass('glyphicon-ok');
                alter_mana_has_error = false;

                validate_form_alter();

                $('#alter_mana').popover("hide");
            } else {
                $('.modal-body #alter_form_mana').removeClass('has-success');
                $('.modal-body #alter_form_mana').addClass('has-error');
                $('.modal-body #alter_icon_mana').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_mana').addClass('glyphicon-remove');
                alter_mana_has_error = true;

                validate_form();

                popover.options.content = "Mana inválida";

                $('#alter_mana').popover("show");
            }
        });
        
        // HP Potions popover
        $('#alter_hp_potions').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify HP Potions
        $("#alterModal").on('keyup', 'alter_#hp_potions', function () {
            var number = $('#alter_hp_potions').val();
            var popover = $('#alter_hp_potions').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_hp_potions').removeClass('has-error');
                $('.modal-body #alter_form_hp_potions').addClass('has-success');
                $('.modal-body #alter_icon_hp_potions').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_hp_potions').addClass('glyphicon-ok');
                alter_hp_potions_has_error = false;

                validate_form_alter();

                $('#alter_hp_potions').popover("hide");
            } else {
                $('.modal-body #alter_form_hp_potions').removeClass('has-success');
                $('.modal-body #alter_form_hp_potions').addClass('has-error');
                $('.modal-body #alter_icon_hp_potions').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_hp_potions').addClass('glyphicon-remove');
                alter_hp_potions_has_error = true;

                validate_form_alter();

                popover.options.content = "Poções de HP inválidas";

                $('#alter_hp_potions').popover("show");
            }
        });
        
        // MP Potions popover
        $('#alter_hp_potions').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify MP Potions
        $("#alterModal").on('keyup', '#alter_mp_potions', function () {
            var number = $('#alter_mp_potions').val();
            var popover = $('#alter_mp_potions').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_mp_potions').removeClass('has-error');
                $('.modal-body #alter_form_mp_potions').addClass('has-success');
                $('.modal-body #alter_icon_mp_potions').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_mp_potions').addClass('glyphicon-ok');
                alter_mp_potions_has_error = false;

                validate_form_alter();

                $('#alter_mp_potions').popover("hide");
            } else {
                $('.modal-body #alter_form_mp_potions').removeClass('has-success');
                $('.modal-body #alter_form_mp_potions').addClass('has-error');
                $('.modal-body #alter_icon_mp_potions').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_mp_potions').addClass('glyphicon-remove');
                alter_mp_potions_has_error = true;

                validate_form_alter_();

                popover.options.content = "Poções de MP inválidas";

                $('#alter_mp_potions').popover("show");
            }
        });

        // Updates Image (alter modal)
        $("#alterModal").on('change', '#alter_image', function () {
            display_image_alter(this);
        });

        // Reset form (alter)
        $("#alterModal").on('click', '#reset_button', function () {
            $('.modal-body #alter_form_name').removeClass('has-success');
            $('.modal-body #alter_form_name').removeClass('has-error');
            $('#alter_name').popover("hide");
            $('.modal-body #alter_form_attack').removeClass('has-success');
            $('.modal-body #alter_form_attack').removeClass('has-error');
            $('#alter_attack').popover("hide");
            $('.modal-body #alter_form_defense').removeClass('has-success');
            $('.modal-body #alter_form_defense').removeClass('has-error');
            $('#alter_defense').popover("hide");
            $('.modal-body #alter_form_agility').removeClass('has-success');
            $('.modal-body #alter_form_agility').removeClass('has-error');
            $('#alter_agility').popover("hide");
            $('.modal-body #alter_form_intelligence').removeClass('has-success');
            $('.modal-body #alter_form_intelligence').removeClass('has-error');
            $('#alter_intelligence').popover("hide");
            $('.modal-body #alter_form_health').removeClass('has-success');
            $('.modal-body #alter_form_health').removeClass('has-error');
            $('#alter_health').popover("hide");
            $('.modal-body #alter_form_mana').removeClass('has-success');
            $('.modal-body #alter_form_mana').removeClass('has-error');
            $('#alter_mana').popover("hide");
            $('.modal-body #alter_form_hp_potions').removeClass('has-success');
            $('.modal-body #alter_form_hp_potions').removeClass('has-error');
            $('#alter_hp_potions').popover("hide");
            $('.modal-body #alter_form_mp_potions').removeClass('has-success');
            $('.modal-body #alter_form_mp_potions').removeClass('has-error');
            $('#alter_mp_potions').popover("hide");
            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_attack').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_attack').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_defense').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_defense').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_agility').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_agility').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_intelligence').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_intelligence').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_health').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_health').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_mana').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_mana').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_hp_potions').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_hp_potions').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_mp_potions').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_mp_potions').removeClass('glyphicon-remove');
            $('.modal-body #alter_button').prop('disabled', false);
        });

        // ---------------------------------------------------------------------

    });
}