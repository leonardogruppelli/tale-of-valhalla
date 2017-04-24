var url = window.location.href;

if (url.includes('equipment')) {
    $(document).ready(function () {
        var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla/';
        var item_id;
        var item_name;
        var item_type;
        var item_rarity;
        var item_buy_price;
        var item_sell_price;
        var item_level;
        var item_attack;
        var item_defense;
        var item_agility;
        var item_intelligence;
        var item_unique;
        var item_image;
        var helmet_open;
        var armor_open;
        var pants_open;
        var gloves_open;
        var boots_open;
        var weapon_open;

        $('.rarity').popover({
            html: true,
            trigger: 'hover',
            placement: 'right',
            content: function () {
                return '<strong>Raridade de Items: </strong> <br>\n\
                    <img src="./icons/commom.png" width="20px" height="20px"/> Comum <br>\n\
                    <img src="./icons/rare.png" width="20px" height="20px" /> Raro <br>\n\
                    <img src="./icons/epic.png" width="20px" height="20px" /> Épico <br>\n\
                    <img src="./icons/legendary.png" width="20px" height="20px" /> Lendário';
            }
        });

        // Helmet popover
        $('#helmet').popover({
            html: true,
            trigger: 'manual',
            title: function () {
                return '<strong style="font-size: 18px">' + item_name + '</strong>';
            },
            placement: 'left',
            content: function () {
                return '<strong>Ataque:</strong> ' + item_attack + '<br> \n\
                    <strong>Defesa:</strong> ' + item_defense + '<br> \n\
                    <strong>Agilidade:</strong> ' + item_agility + '<br> \n\
                    <strong>Inteligência:</strong> ' + item_intelligence;
            }
        });

        // Loads item information and opens popover
        $('#helmet').click(function () {
            event.preventDefault();
            item_id = $(this).data('id');

            if (helmet_open === true) {
                $('#helmet').popover("hide");

                helmet_open = false;
            } else {
                $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                    var information = data.split(',');

                    item_name = information[0];
                    item_type = information[1];
                    item_rarity = information[2];
                    item_buy_price = information[3];
                    item_sell_price = information[4];
                    item_level = information[5];
                    item_attack = information[6];
                    item_defense = information[7];
                    item_agility = information[8];
                    item_intelligence = information[9];
                    item_unique = information[10];
                    item_image = information[11];

                    $('#helmet').popover("show");

                    helmet_open = true;
                });
            }
        });

        // Armor popover
        $('#armor').popover({
            html: true,
            trigger: 'manual',
            title: function () {
                return '<strong style="font-size: 18px">' + item_name + '</strong>';
            },
            placement: 'left',
            content: function () {
                return '<strong>Ataque:</strong> ' + item_attack + '<br> \n\
                    <strong>Defesa:</strong> ' + item_defense + '<br> \n\
                    <strong>Agilidade:</strong> ' + item_agility + '<br> \n\
                    <strong>Inteligência:</strong> ' + item_intelligence;
            }
        });

        // Loads item information and opens popover
        $('#armor').click(function () {
            event.preventDefault();
            item_id = $(this).data('id');

            if (armor_open === true) {
                $('#armor').popover("hide");

                armor_open = false;
            } else {
                $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                    var information = data.split(',');

                    item_name = information[0];
                    item_type = information[1];
                    item_rarity = information[2];
                    item_buy_price = information[3];
                    item_sell_price = information[4];
                    item_level = information[5];
                    item_attack = information[6];
                    item_defense = information[7];
                    item_agility = information[8];
                    item_intelligence = information[9];
                    item_unique = information[10];
                    item_image = information[11];

                    $('#armor').popover("show");

                    armor_open = true;
                });
            }
        });

        // Pants popover
        $('#pants').popover({
            html: true,
            trigger: 'manual',
            title: function () {
                return '<strong style="font-size: 18px">' + item_name + '</strong>';
            },
            placement: 'left',
            content: function () {
                return '<strong>Ataque:</strong> ' + item_attack + '<br> \n\
                    <strong>Defesa:</strong> ' + item_defense + '<br> \n\
                    <strong>Agilidade:</strong> ' + item_agility + '<br> \n\
                    <strong>Inteligência:</strong> ' + item_intelligence;
            }
        });

        // Loads item information and opens popover
        $('#pants').click(function () {
            event.preventDefault();
            item_id = $(this).data('id');

            if (pants_open === true) {
                $('#pants').popover("hide");

                pants_open = false;
            } else {
                $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                    var information = data.split(',');

                    item_name = information[0];
                    item_type = information[1];
                    item_rarity = information[2];
                    item_buy_price = information[3];
                    item_sell_price = information[4];
                    item_level = information[5];
                    item_attack = information[6];
                    item_defense = information[7];
                    item_agility = information[8];
                    item_intelligence = information[9];
                    item_unique = information[10];
                    item_image = information[11];

                    $('#pants').popover("show");

                    pants_open = true;
                });
            }
        });

        // Gloves popover
        $('#gloves').popover({
            html: true,
            trigger: 'manual',
            title: function () {
                return '<strong style="font-size: 18px">' + item_name + '</strong>';
            },
            placement: 'left',
            content: function () {
                return '<strong>Ataque:</strong> ' + item_attack + '<br> \n\
                    <strong>Defesa:</strong> ' + item_defense + '<br> \n\
                    <strong>Agilidade:</strong> ' + item_agility + '<br> \n\
                    <strong>Inteligência:</strong> ' + item_intelligence;
            }
        });

        // Loads item information and opens popover
        $('#gloves').click(function () {
            event.preventDefault();
            item_id = $(this).data('id');

            if (gloves_open === true) {
                $('#gloves').popover("hide");

                gloves_open = false;
            } else {
                $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                    var information = data.split(',');

                    item_name = information[0];
                    item_type = information[1];
                    item_rarity = information[2];
                    item_buy_price = information[3];
                    item_sell_price = information[4];
                    item_level = information[5];
                    item_attack = information[6];
                    item_defense = information[7];
                    item_agility = information[8];
                    item_intelligence = information[9];
                    item_unique = information[10];
                    item_image = information[11];

                    $('#gloves').popover("show");

                    gloves_open = true;
                });
            }
        });

        // Boots popover
        $('#boots').popover({
            html: true,
            trigger: 'manual',
            title: function () {
                return '<strong style="font-size: 18px">' + item_name + '</strong>';
            },
            placement: 'left',
            content: function () {
                return '<strong>Ataque:</strong> ' + item_attack + '<br> \n\
                    <strong>Defesa:</strong> ' + item_defense + '<br> \n\
                    <strong>Agilidade:</strong> ' + item_agility + '<br> \n\
                    <strong>Inteligência:</strong> ' + item_intelligence;
            }
        });

        // Loads item information and opens popover
        $('#boots').click(function () {
            event.preventDefault();
            item_id = $(this).data('id');

            if (boots_open === true) {
                $('#boots').popover("hide");

                boots_open = false;
            } else {
                $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                    var information = data.split(',');

                    item_name = information[0];
                    item_type = information[1];
                    item_rarity = information[2];
                    item_buy_price = information[3];
                    item_sell_price = information[4];
                    item_level = information[5];
                    item_attack = information[6];
                    item_defense = information[7];
                    item_agility = information[8];
                    item_intelligence = information[9];
                    item_unique = information[10];
                    item_image = information[11];

                    $('#boots').popover("show");

                    boots_open = true;
                });
            }
        });

        // weapon popover
        $('#weapon').popover({
            html: true,
            trigger: 'manual',
            title: function () {
                return '<strong style="font-size: 18px">' + item_name + '</strong>';
            },
            placement: 'left',
            content: function () {
                return '<strong>Ataque:</strong> ' + item_attack + '<br> \n\
                    <strong>Defesa:</strong> ' + item_defense + '<br> \n\
                    <strong>Agilidade:</strong> ' + item_agility + '<br> \n\
                    <strong>Inteligência:</strong> ' + item_intelligence;
            }
        });

        // Loads item information and opens popover
        $('#weapon').click(function () {
            event.preventDefault();
            item_id = $(this).data('id');

            if (weapon_open === true) {
                $('#weapon').popover("hide");

                weapon_open = false;
            } else {
                $.get(path + 'ajax/find_item', {id: item_id}, function (data) {
                    var information = data.split(',');

                    item_name = information[0];
                    item_type = information[1];
                    item_rarity = information[2];
                    item_buy_price = information[3];
                    item_sell_price = information[4];
                    item_level = information[5];
                    item_attack = information[6];
                    item_defense = information[7];
                    item_agility = information[8];
                    item_intelligence = information[9];
                    item_unique = information[10];
                    item_image = information[11];

                    $('#weapon').popover("show");

                    weapon_open = true;
                });
            }
        });

    });

}