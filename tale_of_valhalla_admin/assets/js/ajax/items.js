var url = window.location.href;

if (url.includes('items')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla_admin/';
        var item_id;
        var item_name;
        var name_has_error;
        var alter_name_has_error;
        var item_type;
        var item_class;
        var item_rarity;
        var item_buy_price;
        var buy_price_has_error;
        var alter_buy_price_has_error;
        var item_sell_price;
        var item_level;
        var level_has_error;
        var alter_level_has_error;
        var item_attack;
        var attack_has_error;
        var alter_attack_has_error;
        var item_defense;
        var defense_has_error;
        var alter_defense_has_error;
        var item_agility;
        var agility_has_error;
        var alter_agility_has_error;
        var item_intelligence;
        var intelligence_has_error;
        var alter_intelligence_has_error;
        var item_unique;
        var item_image;

        // Insert Modal --------------------------------------------------------

        // Verifies if name is valid
        function validate_name(name) {
            var validate_name = /^[a-zA-ZÀ-ú\s]*$/;
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
            if (name_has_error || buy_price_has_error || level_has_error || attack_has_error || defense_has_error || agility_has_error || intelligence_has_error) {
                $('.modal-body #insert_button').prop('disabled', true);
            } else {
                $('.modal-body #insert_button').prop('disabled', false);
            }
        }

        // Verifies if alter form has errors
        function validate_form_alter() {
            if (alter_name_has_error || alter_buy_price_has_error || alter_level_has_error || alter_attack_has_error || alter_defense_has_error || alter_agility_has_error || alter_intelligence_has_error) {
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
                    $.get(path + 'ajax/verify_item_name', {name: $('#name').val()}, function (data) {
                        if (data) {
                            $('.modal-body #form_name').removeClass('has-success');
                            $('.modal-body #form_name').addClass('has-error');
                            $('.modal-body #icon_name').removeClass('glyphicon-ok');
                            $('.modal-body #icon_name').addClass('glyphicon-remove');
                            name_has_error = true;

                            validate_form();

                            popover.options.content = "Item já existente";

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

        // Buy Price popover
        $('#buy_price').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Buy Price
        $("#insertModal").on('keyup', '#buy_price', function () {
            var number = $('#buy_price').val();
            var popover = $('#buy_price').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_buy_price').removeClass('has-error');
                $('.modal-body #form_buy_price').addClass('has-success');
                $('.modal-body #icon_buy_price').removeClass('glyphicon-remove');
                $('.modal-body #icon_buy_price').addClass('glyphicon-ok');
                buy_price_has_error = false;

                validate_form();

                $('#buy_price').popover("hide");
            } else {
                $('.modal-body #form_buy_price').removeClass('has-success');
                $('.modal-body #form_buy_price').addClass('has-error');
                $('.modal-body #icon_buy_price').removeClass('glyphicon-ok');
                $('.modal-body #icon_buy_price').addClass('glyphicon-remove');
                buy_price_has_error = true;

                validate_form();

                popover.options.content = "Preço inválido";

                $('#buy_price').popover("show");
            }
        });

        // Level popover
        $('#level').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Level
        $("#insertModal").on('keyup', '#level', function () {
            var number = $('#level').val();
            var popover = $('#level').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #form_level').removeClass('has-error');
                $('.modal-body #form_level').addClass('has-success');
                $('.modal-body #icon_level').removeClass('glyphicon-remove');
                $('.modal-body #icon_level').addClass('glyphicon-ok');
                level_has_error = false;

                validate_form();

                $('#level').popover("hide");
            } else {
                $('.modal-body #form_level').removeClass('has-success');
                $('.modal-body #form_level').addClass('has-error');
                $('.modal-body #icon_level').removeClass('glyphicon-ok');
                $('.modal-body #icon_level').addClass('glyphicon-remove');
                level_has_error = true;

                validate_form();

                popover.options.content = "Nível inválido";

                $('#level').popover("show");
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

        // Updates sell price
        $("#insertModal").on('keyup', '#buy_price', function () {
            $.get(path + 'ajax/update_sell_price', {buy_price: $('#buy_price').val()}, function (data) {
                $('.modal-body #sell_price').val(data);
            });
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
            $('.modal-body #form_type').removeClass('has-success');
            $('.modal-body #form_type').removeClass('has-error');
            $('#type').popover("hide");
            $('.modal-body #form_class').removeClass('has-success');
            $('.modal-body #form_class').removeClass('has-error');
            $('#class').popover("hide");
            $('.modal-body #form_rarity').removeClass('has-success');
            $('.modal-body #form_rarity').removeClass('has-error');
            $('#rarity').popover("hide");
            $('.modal-body #form_buy_price').removeClass('has-success');
            $('.modal-body #form_buy_price').removeClass('has-error');
            $('#buy_price').popover("hide");
            $('.modal-body #form_level').removeClass('has-success');
            $('.modal-body #form_level').removeClass('has-error');
            $('#level').popover("hide");
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
            $('.modal-body #icon_name').removeClass('glyphicon-ok');
            $('.modal-body #icon_name').removeClass('glyphicon-remove');
            $('.modal-body #icon_buy_price').removeClass('glyphicon-ok');
            $('.modal-body #icon_buy_price').removeClass('glyphicon-remove');
            $('.modal-body #icon_level').removeClass('glyphicon-ok');
            $('.modal-body #icon_level').removeClass('glyphicon-remove');
            $('.modal-body #icon_attack').removeClass('glyphicon-ok');
            $('.modal-body #icon_attack').removeClass('glyphicon-remove');
            $('.modal-body #icon_defense').removeClass('glyphicon-ok');
            $('.modal-body #icon_defense').removeClass('glyphicon-remove');
            $('.modal-body #icon_agility').removeClass('glyphicon-ok');
            $('.modal-body #icon_agility').removeClass('glyphicon-remove');
            $('.modal-body #icon_intelligence').removeClass('glyphicon-ok');
            $('.modal-body #icon_intelligence').removeClass('glyphicon-remove');
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
            item_id = $(this).data('id');

            $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                var information = data.split(',');

                item_name = information[0];
                item_type = information[1];
                item_class = information[2];
                item_rarity = information[3];
                item_buy_price = information[4];
                item_sell_price = information[5];
                item_level = information[6];
                item_attack = information[7];
                item_defense = information[8];
                item_agility = information[9];
                item_intelligence = information[10];
                item_unique = information[11];
                item_image = information[12];

                $('#alterModal').modal('show');
            });
        });

        // Updates the Alter Modal inputs with user information
        $('#alterModal').on("show.bs.modal", function () {
            $('.modal-body #alter_id').val(item_id);
            $('.modal-body #alter_name').val(item_name);
            $('.modal-body #alter_type').val(item_type);
            $('.modal-body #alter_class').val(item_class);
            $('.modal-body #alter_rarity').val(item_rarity);
            $('.modal-body #alter_buy_price').val(item_buy_price);
            $('.modal-body #alter_sell_price').val(item_sell_price);
            $('.modal-body #alter_level').val(item_level);
            $('.modal-body #alter_attack').val(item_attack);
            $('.modal-body #alter_defense').val(item_defense);
            $('.modal-body #alter_agility').val(item_agility);
            $('.modal-body #alter_intelligence').val(item_intelligence);
            $('.modal-body #alter_unique').val(item_unique);
            $('.modal-body #alter_picture').attr('src', './items_images/' + item_image);
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
                    $.get(path + 'ajax/verify_item_name_alter', {name: $('#alter_name').val(), id: $('#alter_id').val()}, function (data) {
                        if (data) {
                            $('.modal-body #alter_form_name').removeClass('has-success');
                            $('.modal-body #alter_form_name').addClass('has-error');
                            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
                            $('.modal-body #alter_icon_name').addClass('glyphicon-remove');
                            alter_name_has_error = true;

                            validate_form_alter();

                            popover.options.content = "Item já existente";

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

        // Buy Price popover
        $('#alter_buy_price').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Buy Price
        $("#alterModal").on('keyup', '#alter_buy_price', function () {
            var number = $('#alter_buy_price').val();
            var popover = $('#alter_buy_price').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_buy_price').removeClass('has-error');
                $('.modal-body #alter_form_buy_price').addClass('has-success');
                $('.modal-body #alter_icon_buy_price').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_buy_price').addClass('glyphicon-ok');
                alter_buy_price_has_error = false;

                validate_form_alter();

                $('#alter_buy_price').popover("hide");
            } else {
                $('.modal-body #alter_form_buy_price').removeClass('has-success');
                $('.modal-body #alter_form_buy_price').addClass('has-error');
                $('.modal-body #alter_icon_buy_price').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_buy_price').addClass('glyphicon-remove');
                alter_buy_price_has_error = true;

                validate_form_alter();

                popover.options.content = "Preço inválido";

                $('#alter_buy_price').popover("show");
            }
        });

        // Level popover
        $('#alter_level').popover({
            placement: "bottom",
            trigger: "manual"
        });

        // Verify Level
        $("#alterModal").on('keyup', '#alter_level', function () {
            var number = $('#alter_level').val();
            var popover = $('#alter_level').data('bs.popover');

            if (validate_number(number)) {
                $('.modal-body #alter_form_level').removeClass('has-error');
                $('.modal-body #alter_form_level').addClass('has-success');
                $('.modal-body #alter_icon_level').removeClass('glyphicon-remove');
                $('.modal-body #alter_icon_level').addClass('glyphicon-ok');
                alter_level_has_error = false;

                validate_form_alter();

                $('#alter_level').popover("hide");
            } else {
                $('.modal-body #alter_form_level').removeClass('has-success');
                $('.modal-body #alter_form_level').addClass('has-error');
                $('.modal-body #alter_icon_level').removeClass('glyphicon-ok');
                $('.modal-body #alter_icon_level').addClass('glyphicon-remove');
                alter_level_has_error = true;

                validate_form_alter();

                popover.options.content = "Nível inválido";

                $('#alter_level').popover("show");
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

        // Updates sell price
        $("#alterModal").on('keyup', '#alter_buy_price', function () {
            $.get(path + 'ajax/update_sell_price', {buy_price: $('#alter_buy_price').val()}, function (data) {
                $('.modal-body #alter_sell_price').val(data);
            });
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
            $('.modal-body #alter_form_type').removeClass('has-success');
            $('.modal-body #alter_form_type').removeClass('has-error');
            $('#alter_type').popover("hide");
            $('.modal-body #alter_form_class').removeClass('has-success');
            $('.modal-body #alter_form_class').removeClass('has-error');
            $('#alter_class').popover("hide");
            $('.modal-body #alter_form_rarity').removeClass('has-success');
            $('.modal-body #alter_form_rarity').removeClass('has-error');
            $('#alter_rarity').popover("hide");
            $('.modal-body #alter_form_buy_price').removeClass('has-success');
            $('.modal-body #alter_form_buy_price').removeClass('has-error');
            $('#alter_buy_price').popover("hide");
            $('.modal-body #alter_form_level').removeClass('has-success');
            $('.modal-body #alter_form_level').removeClass('has-error');
            $('#alter_level').popover("hide");
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
            $('.modal-body #alter_icon_name').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_name').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_buy_price').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_buy_price').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_level').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_level').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_attack').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_attack').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_defense').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_defense').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_agility').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_agility').removeClass('glyphicon-remove');
            $('.modal-body #alter_icon_intelligence').removeClass('glyphicon-ok');
            $('.modal-body #alter_icon_intelligence').removeClass('glyphicon-remove');
            $('.modal-body #alter_button').prop('disabled', false);
        });

        // ---------------------------------------------------------------------

    });
}