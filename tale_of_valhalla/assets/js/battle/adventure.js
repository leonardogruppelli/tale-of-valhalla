var url = window.location.href;

if (url.includes('adventure')) {

    var path = 'http://localhost/tale_of_valhalla/tale_of_valhalla/';
    var user_id = $('#user_id').val();

    // Character atributes
    var character_id;
    var character_class;
    var character_attack;
    var character_defense;
    var character_agility;
    var character_intelligence;
    var character_level;
    var character_health;
    var character_current_health;
    var character_mana;
    var character_current_mana;
    var character_experience;
    var character_max_experience;
    var character_hp_potions;
    var character_large_hp_potions;
    var character_mp_potions;
    var character_large_mp_potions;
    var character_dexterity_potions;
    var character_luck_potions;
    var character_evade = 0.2;
    var character_critic = 0.2;
    var character_used_hp_potions = 0;
    var character_used_large_hp_potions = 0;
    var character_used_mp_potions = 0;
    var character_used_large_mp_potions = 0;
    var character_used_dexterity_potion = 0;
    var character_used_luck_potion = 0;
    var character_used_passive = false;
    var character_damage = 0;

    // Enemy atributes
    var enemy_id;
    var enemy_attack;
    var enemy_defense;
    var enemy_agility;
    var enemy_intelligence;
    var enemy_health;
    var enemy_current_health;
    var enemy_mana;
    var enemy_current_mana;
    var enemy_hp_potions;
    var enemy_large_hp_potions;
    var enemy_mp_potions;
    var enemy_large_mp_potions;
    var enemy_dexterity_potions;
    var enemy_luck_potions;
    var enemy_evade = 0.2;
    var enemy_critic = 0.2;
    var enemy_used_hp_potions = 0;
    var enemy_used_large_hp_potions = 0;
    var enemy_used_mp_potions = 0;
    var enemy_used_large_mp_potions = 0;
    var enemy_used_dexterity_potion = 0;
    var enemy_used_luck_potion = 0;
    var enemy_damage = 0;

    // Game atributes
    var current_turn;
    var turns = 1;
    var interval;
    var percentage;
    var timer = 5;

    // Selects character atributes
    function select_character() {
        character_id = $('#character_id').val();
        character_class = $('#character_class').val();
        character_attack = $('#character_attack').val();
        character_defense = $('#character_defense').val();
        character_agility = $('#character_agility').val();
        character_intelligence = $('#character_intelligence').val();
        character_level = $('#character_level').val();
        character_health = $('#character_health').val();
        character_current_health = $('#character_health').val();
        character_mana = $('#character_mana').val();
        character_current_mana = 0;
        character_experience = $('#character_experience').val();
        character_max_experience = $('#character_max_experience').val();
        character_hp_potions = $('#character_hp_potions').val();
        character_large_hp_potions = $('#character_large_hp_potions').val();
        character_mp_potions = $('#character_mp_potions').val();
        character_large_mp_potions = $('#character_large_mp_potions').val();
        character_dexterity_potions = $('#character_dexterity_potions').val();
        character_luck_potions = $('#character_luck_potions').val();
        $('#hp_potions').text(character_hp_potions);
        $('#large_hp_potions').text(character_large_hp_potions);
        $('#mp_potions').text(character_mp_potions);
        $('#large_mp_potions').text(character_large_mp_potions);
        $('#dexterity_potions').text(character_dexterity_potions);
        $('#luck_potions').text(character_luck_potions);
        $('#character_current_attack').text(character_attack);
        $('#character_current_defense').text(character_defense);
        $('#character_current_agility').text(character_agility);
        $('#character_current_intelligence').text(character_intelligence);
        $('#character_evade').text((character_evade * 100) + "%");
        $('#character_critic').text((character_critic * 100) + "%");
    }

    // Selects enemy atributes
    function select_enemy() {
        enemy_id = $('#enemy_id').val();
        enemy_attack = $('#enemy_attack').val();
        enemy_defense = $('#enemy_defense').val();
        enemy_agility = $('#enemy_agility').val();
        enemy_intelligence = $('#enemy_intelligence').val();
        enemy_health = $('#enemy_health').val();
        enemy_current_health = $('#enemy_health').val();
        enemy_mana = $('#enemy_mana').val();
        enemy_current_mana = 0;
        enemy_hp_potions = $('#enemy_hp_potions').val();
        enemy_large_hp_potions = $('#enemy_large_hp_potions').val();
        enemy_mp_potions = $('#enemy_mp_potions').val();
        enemy_large_mp_potions = $('#enemy_large_mp_potions').val();
        enemy_dexterity_potions = $('#enemy_dexterity_potions').val();
        enemy_luck_potions = $('#enemy_luck_potions').val();
        $('#enemy_current_attack').text(enemy_attack);
        $('#enemy_current_defense').text(enemy_defense);
        $('#enemy_current_agility').text(enemy_agility);
        $('#enemy_current_intelligence').text(enemy_intelligence);
        $('#enemy_current_evade').text((enemy_evade * 100) + "%");
        $('#enemy_current_critic').text((enemy_critic * 100) + "%");
    }

    // Updates all fields
    function update() {
        var character_health_percentage = (character_current_health / character_health) * 100;
        character_health_percentage = character_health_percentage.toFixed(2);
        $('#character_health_bar').attr('aria-valuenow', character_health_percentage).width(character_health_percentage + "%").text(character_current_health + " (" + character_health_percentage + "%)");

        if (character_current_mana !== 0) {
            var character_mana_percentage = (character_current_mana / character_mana) * 100;
            character_mana_percentage = character_mana_percentage.toFixed(2);
            $('#character_mana_bar').attr('aria-valuenow', character_mana_percentage).width(character_mana_percentage + "%").text(character_current_mana + " (" + character_mana_percentage + "%)");
        } else {
            $('#character_mana_bar').attr('aria-valuenow', 0).width(0 + "%").text(character_current_mana + " (" + 0 + "%)");
        }

        var enemy_health_percentage = (enemy_current_health / enemy_health) * 100;
        enemy_health_percentage = enemy_health_percentage.toFixed(2);
        $('#enemy_health_bar').attr('aria-valuenow', enemy_health_percentage).width(enemy_health_percentage + "%").text(enemy_current_health + " (" + enemy_health_percentage + "%)");

        if (enemy_current_mana !== 0) {
            var enemy_mana_percentage = (enemy_current_mana / enemy_mana) * 100;
            enemy_mana_percentage = enemy_mana_percentage.toFixed(2);
            $('#enemy_mana_bar').attr('aria-valuenow', enemy_mana_percentage).width(enemy_mana_percentage + "%").text(enemy_current_mana + " (" + enemy_mana_percentage + "%)");
        } else {
            $('#enemy_mana_bar').attr('aria-valuenow', 0).width(0 + "%").text(enemy_current_mana + " (" + 0 + "%)");
        }

        $('#character_current_attack').text(character_attack);
        $('#character_current_defense').text(character_defense);
        $('#character_current_agility').text(character_agility);
        $('#character_current_intelligence').text(character_intelligence);
        $('#character_evade').text((character_evade * 100) + "%");
        $('#character_critic').text((character_critic * 100) + "%");

        $('#enemy_current_attack').text(enemy_attack);
        $('#enemy_current_defense').text(enemy_defense);
        $('#enemy_current_agility').text(enemy_agility);
        $('#enemy_current_intelligence').text(enemy_intelligence);
        $('#enemy_evade').text((enemy_evade * 100) + "%");
        $('#enemy_critic').text((enemy_critic * 100) + "%");

        $('#turns').text(turns);
    }

    // Creates a hit animation
    function character_hit_animation(damage) {
        $('#character_img_animation').attr('src', 'animation/hit.png');
        $('#character_damage_animation').text(damage);
        $('#character_img_animation').show();
        $('#character_damage_animation').show();

        $('#character_img_animation').add($('#character_damage_animation')).fadeOut(3000);
    }

    // Creates a critical hit animation
    function character_critical_hit_animation(damage) {
        $('#character_img_animation').attr('src', 'animation/critical_hit.png');
        $('#character_damage_animation').text(damage);
        $('#character_img_animation').show();
        $('#character_damage_animation').show();

        $('#character_img_animation').add($('#character_damage_animation')).fadeOut(3000);
    }

    // Creates a hit animation
    function enemy_hit_animation(damage) {
        $('#enemy_img_animation').attr('src', 'animation/hit.png');
        $('#enemy_damage_animation').text(damage);
        $('#enemy_img_animation').show();
        $('#enemy_damage_animation').show();

        $('#enemy_img_animation').add($('#enemy_damage_animation')).fadeOut(3000);
    }

    // Creates a critical hit animation
    function enemy_critical_hit_animation(damage) {
        $('#enemy_img_animation').attr('src', 'animation/critical_hit.png');
        $('#enemy_damage_animation').text(damage);
        $('#enemy_img_animation').show();
        $('#enemy_damage_animation').show();

        $('#enemy_img_animation').add($('#enemy_damage_animation')).fadeOut(3000);
    }

    // Creates a potion animation
    function potion_animation(potion, current_turn) {
        if (current_turn === "character") {
            if (potion === "hp") {
                $('#character_potion_animation').addClass('ra ra-heart-bottle ra-4x');
            } else if (potion === "mp") {
                $('#character_potion_animation').addClass('ra ra-corked-tube ra-4x');
            } else if (potion === "large_hp") {
                $('#character_potion_animation').addClass('ra ra-round-bottom-flask ra-4x');
            } else if (potion === "large_mp") {
                $('#character_potion_animation').addClass('ra ra-flask ra-4x');
            } else if (potion === "dexterity") {
                $('#character_potion_animation').addClass('ra ra-player-dodge ra-4x');
            } else if (potion === "luck") {
                $('#character_potion_animation').addClass('ra ra-player-thunder-struck ra-4x');
            }

            $('#character_potion_animation').show();

            $('#character_potion_animation').fadeOut(1000);
        } else {
            if (potion === "hp") {
                $('#enemy_potion_animation').addClass('ra ra-heart-bottle ra-4x');
            } else if (potion === "mp") {
                $('#enemy_potion_animation').addClass('ra ra-corked-tube ra-4x');
            } else if (potion === "large_hp") {
                $('#enemy_potion_animation').addClass('ra ra-round-bottom-flask ra-4x');
            } else if (potion === "large_mp") {
                $('#enemy_potion_animation').addClass('ra ra-flask ra-4x');
            } else if (potion === "dexterity") {
                $('#enemy_potion_animation').addClass('ra ra-player-dodge ra-4x');
            } else if (potion === "luck") {
                $('#enemy_potion_animation').addClass('ra ra-player-thunder-struck ra-4x');
            }

            $('#enemy_potion_animation').show();

            $('#enemy_potion_animation').fadeOut(1000);
        }
    }

    // Creates a spell animation
    function spell_animation(spell) {
        if (spell === "fury") {
            $('#character_spell_animation').removeClass('ra ra-axe-swing ra-4x');
            $('#character_spell_animation').addClass('ra ra-aura ra-4x');
        } else if (spell === "charge") {
            $('#character_spell_animation').removeClass('ra ra-aura ra-4x');
            $('#character_spell_animation').addClass('ra ra-axe-swing ra-4x');
        } else if (spell === "concentration") {
            $('#character_spell_animation').removeClass('ra arrow-flights ra-4x');
            $('#character_spell_animation').addClass('ra ra-aware ra-4x');
        } else if (spell === "targeted") {
            $('#character_spell_animation').removeClass('ra ra-aware ra-4x');
            $('#character_spell_animation').addClass('ra ra-arrow-flights ra-4x');
        } else if (spell === "meditation") {
            $('#character_spell_animation').removeClass('ra ra-lightning-trio ra-4x');
            $('#character_spell_animation').addClass('ra ra-player-teleport ra-4x');
        } else if (spell === "storm") {
            $('#character_spell_animation').removeClass('ra ra-player-teleport ra-4x');
            $('#character_spell_animation').addClass('ra ra-lightning-trio ra-4x');
        } else if (spell === "stealth") {
            $('#character_spell_animation').removeClass('ra ra-daggers ra-4x');
            $('#character_spell_animation').addClass('ra ra-double-team ra-4x');
        } else if (spell === "eliminate") {
            $('#character_spell_animation').removeClass('ra ra-double-team ra-4x');
            $('#character_spell_animation').addClass('ra ra-daggers ra-4x');
        }

        $('#character_spell_animation').show();

        $('#character_spell_animation').fadeOut(1000);
    }

    // Creates a missed attack animation
    function character_miss_animation() {
        $('#character_miss_animation').addClass('ra ra-player-dodge ra-4x');
        $('#character_miss_animation').show();

        $('#character_miss_animation').fadeOut(3000);
    }

    // Creates a missed attack animation
    function enemy_miss_animation() {
        $('#enemy_miss_animation').addClass('ra ra-player-dodge ra-4x');
        $('#enemy_miss_animation').show();

        $('#enemy_miss_animation').fadeOut(3000);
    }

    // Checks if it's the players turn
    function verify_turn(current_turn) {
        if (current_turn === "enemy") {
            $('#btn_attack').prop("disabled", true);
            $('.btn-spells').prop("disabled", true);
            $('.btn-potions').prop("disabled", true);
            enemy_turn();
        } else {
            $('#btn_attack').prop("disabled", false);

            if (character_current_mana >= 20) {
                $('.btn-spells').prop("disabled", false);
            } else {
                $('.btn-spells').prop("disabled", true);
            }

            if (parseInt(character_class) === 1) {
                if (character_current_mana >= 20 && character_used_passive === false) {
                    $('#li_warrior_spell_1').removeClass("disabled-li");
                } else {
                    $('#li_warrior_spell_1').addClass("disabled-li");
                }

                if (character_current_mana >= 100) {
                    $('#li_warrior_spell_2').removeClass("disabled-li");
                } else {
                    $('#li_warrior_spell_2').addClass("disabled-li");
                }
            }

            if (parseInt(character_class) === 2) {
                if (character_current_mana >= 20 && character_used_passive === false) {
                    $('#li_archer_spell_1').removeClass("disabled-li");
                } else {
                    $('#li_archer_spell_1').addClass("disabled-li");
                }

                if (character_current_mana >= 100) {
                    $('#li_archer_spell_2').removeClass("disabled-li");
                } else {
                    $('#li_archer_spell_2').addClass("disabled-li");
                }
            }

            if (parseInt(character_class) === 3) {
                if (character_current_mana >= 20 && character_used_passive === false) {
                    $('#li_mage_spell_1').removeClass("disabled-li");
                } else {
                    $('#li_mage_spell_1').addClass("disabled-li");
                }

                if (character_current_mana >= 100) {
                    $('#li_mage_spell_2').removeClass("disabled-li");
                } else {
                    $('#li_mage_spell_2').addClass("disabled-li");
                }
            }

            if (parseInt(character_class) === 4) {
                if (character_current_mana >= 20 && character_used_passive === false) {
                    $('#li_assassin_spell_1').removeClass("disabled-li");
                } else {
                    $('#li_assassin_spell_1').addClass("disabled-li");
                }

                if (character_current_mana >= 100) {
                    $('#li_assassin_spell_2').removeClass("disabled-li");
                } else {
                    $('#li_assassin_spell_2').addClass("disabled-li");
                }
            }

            if (character_hp_potions > 0 && character_used_hp_potions < 5) {
                $('#li_hp_potions').removeClass("disabled-li");
            } else {
                $('#li_hp_potions').addClass("disabled-li");
            }

            if (character_large_hp_potions > 0 && character_used_large_hp_potions < 5) {
                $('#li_large_hp_potions').removeClass("disabled-li");
            } else {
                $('#li_large_hp_potions').addClass("disabled-li");
            }

            if (character_mp_potions > 0 && character_used_mp_potions < 5) {
                $('#li_mp_potions').removeClass("disabled-li");
            } else {
                $('#li_mp_potions').addClass("disabled-li");
            }

            if (character_large_mp_potions > 0 && character_used_large_mp_potions < 5) {
                $('#li_large_mp_potions').removeClass("disabled-li");
            } else {
                $('#li_large_mp_potions').addClass("disabled-li");
            }

            if (character_dexterity_potions > 0 && character_used_dexterity_potion < 1) {
                $('#li_dexterity_potions').removeClass("disabled-li");
            } else {
                $('#li_dexterity_potions').addClass("disabled-li");
            }

            if (character_luck_potions > 0 && character_used_luck_potion < 1) {
                $('#li_luck_potions').removeClass("disabled-li");
            } else {
                $('#li_luck_potions').addClass("disabled-li");
            }

            $('.btn-potions').prop("disabled", false);
        }
    }

    // Randomly chooses who executes the first action
    function first_action() {
        var number = Math.floor(Math.random() * 2) + 1;
        if (number === 1) {
            current_turn = "character";
        } else {
            current_turn = "enemy";
        }
        verify_turn(current_turn);
    }

    // Creates a 5 seconds timer, if time reaches 0 the turn ends
    function countdown() {
        interval = setInterval(function () {
            timer--;
            $('#timer').text(timer);
            percentage = (timer / 5) * 100;
            $('#timer_bar').attr('aria-valuenow', timer).width(percentage + "%");
            if (timer <= 3) {
                $('#timer_bar').removeClass('progress-bar-info');
                $('#timer_bar').addClass('progress-bar-warning');
            }

            if (timer <= 1) {
                $('#timer_bar').removeClass('progress-bar-warning');
                $('#timer_bar').addClass('progress-bar-danger');
            }
            if (timer === 0) {
                clearInterval(interval);
                next_turn();
            }
        }, 1000);
    }

    // Goes to the next turn
    function next_turn() {
        if (current_turn === "character") {
            current_turn = "enemy";
        } else {
            current_turn = "character";
        }
        turns++;
        $('#turns').text(turns);

        clearInterval(interval);
        timer = 5;
        $('#timer').text(timer);
        $('#timer_bar').removeClass('progress-bar-danger');
        $('#timer_bar').removeClass('progress-bar-warning');
        $('#timer_bar').addClass('progress-bar-info');
        percentage = (timer / 5) * 100;
        $('#timer_bar').attr('aria-valuenow', timer).width(percentage + "%");
        countdown();
        verify_turn(current_turn);
    }

    // Increases the mana when damage is dealt
    function increase_mana_damage(current_turn) {
        if (current_turn === "character") {
            if ((character_current_mana + 5) <= character_mana) {
                character_current_mana = character_current_mana + 5;
            } else {
                character_current_mana = character_mana;
            }
        } else {
            if ((enemy_current_mana + 5) <= enemy_mana) {
                enemy_current_mana = enemy_current_mana + 5;
            } else {
                enemy_current_mana = enemy_mana;
            }
        }
    }

    // Increases the mana when damage is taken
    function increase_mana_damaged(current_turn) {
        if (current_turn === "character") {
            if ((enemy_current_mana + 10) <= enemy_mana) {
                enemy_current_mana = enemy_current_mana + 10;
            } else {
                enemy_current_mana = enemy_mana;
            }
        } else {
            if ((character_current_mana + 10) <= character_mana) {
                character_current_mana = character_current_mana + 10;
            } else {
                character_current_mana = character_mana;
            }
        }
    }

    // Disables potion buttons when a potion is used
    function used_potion() {
        $('#li_hp_potions').addClass("disabled-li");
        $('#li_large_hp_potions').addClass("disabled-li");
        $('#li_mp_potions').addClass("disabled-li");
        $('#li_large_mp_potions').addClass("disabled-li");
        $('#li_dexterity_potions').addClass("disabled-li");
        $('#li_luck_potions').addClass("disabled-li");
    }

    // Disables spell buttons when a spell is used
    function used_spell() {
        if (parseInt(character_class) === 1) {
            $('#li_warrior_spell_2').addClass("disabled-li");
        }

        if (parseInt(character_class) === 2) {
            $('#li_archer_spell_2').addClass("disabled-li");
        }

        if (parseInt(character_class) === 3) {
            $('#li_mage_spell_2').addClass("disabled-li");
        }

        if (parseInt(character_class) === 4) {
            $('#li_assassin_spell_2').addClass("disabled-li");
        }
    }

    // Disables passive button when a passive spell is used
    function used_passive() {
        if (parseInt(character_class) === 1) {
            $('#li_warrior_spell_1').addClass("disabled-li");
        }

        if (parseInt(character_class) === 2) {
            $('#li_archer_spell_1').addClass("disabled-li");
        }

        if (parseInt(character_class) === 3) {
            $('#li_mage_spell_1').addClass("disabled-li");
        }

        if (parseInt(character_class) === 4) {
            $('#li_assassin_spell_1').addClass("disabled-li");
        }

        character_used_passive = true;
    }

    // Does damage to the adversary based on the attacker's attack and the attacked's defense divided by 2
    function hit(current_turn) {
        var damage;
        if (current_turn === "character") {
            damage = character_attack - (enemy_defense / 2);
            damage = Math.round(damage);
            if (damage <= 0) {
                character_hit_animation(0);
                update();
                next_turn();
            } else {
                if ((enemy_current_health - damage) > 0) {
                    enemy_current_health = enemy_current_health - damage;
                    character_damage = parseInt(character_damage) + parseInt(damage);
                    increase_mana_damage(current_turn);
                    increase_mana_damaged(current_turn);
                    character_hit_animation(damage);
                    update();
                    next_turn();
                } else {
                    enemy_current_health = 0;
                    character_damage = parseInt(character_damage) + parseInt(damage);
                    character_hit_animation(damage);
                    update();
                    end_battle();
                }
            }
        } else {
            damage = enemy_attack - (character_defense / 2);
            damage = Math.round(damage);
            if (damage <= 0) {
                enemy_hit_animation(0);
                update();
                next_turn();
            } else {
                if ((character_current_health - damage) > 0) {
                    character_current_health = character_current_health - damage;
                    enemy_damage = parseInt(enemy_damage) + parseInt(damage);
                    increase_mana_damage(current_turn);
                    increase_mana_damaged(current_turn);
                    enemy_hit_animation(damage);
                    update();
                    next_turn();
                } else {
                    character_current_health = 0;
                    enemy_damage = enemy_damage + damage;
                    enemy_hit_animation(damage);
                    update();
                    end_battle();
                }
            }
        }
    }

    // Does damage to the adversary based on the attacker's attack and intelligence, and the attacked's defense divided by 4
    function especial_hit(current_turn) {
        var damage = (parseInt(enemy_attack) + parseInt(enemy_intelligence)) - (character_defense / 4);
        damage = Math.round(damage);
        if (damage <= 0) {
            enemy_hit_animation(0);
            update();
            next_turn();
        } else {
            if ((character_current_health - damage) > 0) {
                character_current_health = character_current_health - damage;
                enemy_current_mana = 0;
                enemy_damage = parseInt(enemy_damage) + parseInt(damage);
                increase_mana_damage(current_turn);
                increase_mana_damaged(current_turn);
                enemy_hit_animation(damage);
                update();
                next_turn();
            } else {
                enemy_current_mana = 0;
                character_current_health = 0;
                enemy_damage = parseInt(enemy_damage) + parseInt(damage);
                enemy_hit_animation(damage);
                update();
                end_battle();
            }
        }
    }

    // Does damage to the adversary based on the attacker's attack ignoring the attacked's defense
    function critical_hit(current_turn) {
        var damage;
        if (current_turn === "character") {
            damage = character_attack;
            damage = Math.round(damage);
            if ((enemy_current_health - damage) > 0) {
                enemy_current_health = enemy_current_health - damage;
                character_damage = parseInt(character_damage) + parseInt(damage);
                character_damage = Math.round(character_damage);
                increase_mana_damage(current_turn);
                increase_mana_damaged(current_turn);
                character_critical_hit_animation(damage);
                update();
                next_turn();
            } else {
                enemy_current_health = 0;
                character_damage = parseInt(character_damage) + parseInt(damage);
                character_damage = Math.round(character_damage);
                character_critical_hit_animation(damage);
                update();
                end_battle();
            }
        } else {
            damage = enemy_attack;
            damage = Math.round(damage);
            if ((character_current_health - damage) > 0) {
                character_current_health = character_current_health - damage;
                enemy_damage = parseInt(enemy_damage) + parseInt(damage);
                enemy_damage = Math.round(enemy_damage);
                increase_mana_damage(current_turn);
                increase_mana_damaged(current_turn);
                enemy_critical_hit_animation(damage);
                update();
                next_turn();
            } else {
                character_current_health = 0;
                enemy_damage = parseInt(enemy_damage) + parseInt(damage);
                enemy_damage = Math.round(enemy_damage);
                enemy_critical_hit_animation(damage);
                update();
                end_battle();
            }
        }
    }

    // Does damage to the adversary based on the attacker's attack and intelligence ignoring the attacked's defense
    function critical_especial_hit(current_turn) {
        var damage = parseInt(enemy_attack) + parseInt(enemy_intelligence);
        damage = Math.round(damage);
        if ((character_current_health - damage) > 0) {
            character_current_health = character_current_health - damage;
            enemy_current_mana = 0;
            enemy_damage = parseInt(enemy_damage) + parseInt(damage);
            enemy_damage = Math.round(enemy_damage);
            increase_mana_damage(current_turn);
            increase_mana_damaged(current_turn);
            enemy_critical_hit_animation(damage);
            update();
            next_turn();
        } else {
            character_current_health = 0;
            enemy_current_mana = 0;
            enemy_damage = parseInt(enemy_damage) + parseInt(damage);
            enemy_critical_hit_animation(damage);
            update();
            end_battle();
        }
    }

    // Tries to attack the adversary based on the attacked's evade rate
    function attack(current_turn) {
        var evade = Math.random();
        var critic = Math.random();
        if (current_turn === "character") {
            if (evade > enemy_evade) {
                if (critic < character_critic) {
                    critical_hit(current_turn);
                } else {
                    hit(current_turn);
                }
            } else {
                character_miss_animation();
                next_turn();
            }
        } else {
            if (evade > character_evade) {
                if (critic < enemy_critic) {
                    critical_hit(current_turn);
                } else {
                    hit(current_turn);
                }
            } else {
                enemy_miss_animation();
                next_turn();
            }
        }
        update();
    }

    // Uses warrior's second spell
    function fury() {
        character_attack = parseInt(character_attack) + parseInt((character_attack * 0.10));
        character_defense = parseInt(character_defense) + parseInt((character_defense * 0.10));
        character_current_mana = character_current_mana - 20;
        spell_animation("fury");
        used_passive();
        update();
    }

    // Tries to attack the enemy with the warrior's second spell based on the attacked's evade rate
    function charge() {
        var evade = Math.random();
        var critic = Math.random();
        var damage;

        if (evade > enemy_evade) {
            if (critic < character_critic) {
                damage = parseInt(character_attack) + parseInt(character_defense);
                damage = Math.round(damage);
                if ((enemy_current_health - damage) > 0) {
                    enemy_current_health = enemy_current_health - damage;
                    character_current_mana = character_current_mana - 100;
                    character_damage = parseInt(character_damage) + parseInt(damage);
                    increase_mana_damage(current_turn);
                    increase_mana_damaged(current_turn);
                    character_critical_hit_animation(damage);
                    update();
                    next_turn();
                } else {
                    enemy_current_health = 0;
                    character_current_mana = character_current_mana - 100;
                    character_damage = character_damage + damage;
                    character_critical_hit_animation(damage);
                    update();
                    end_battle();
                }
            } else {
                damage = (parseInt(character_attack) + parseInt(character_defense)) - (enemy_defense / 2);
                damage = Math.round(damage);
                if (damage <= 0) {
                    character_hit_animation(0);
                    update();
                    next_turn();
                } else {
                    if ((enemy_current_health - damage) > 0) {
                        enemy_current_health = enemy_current_health - damage;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        increase_mana_damage(current_turn);
                        increase_mana_damaged(current_turn);
                        character_hit_animation(damage);
                        update();
                        next_turn();
                    } else {
                        enemy_current_health = 0;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        character_hit_animation(damage);
                        update();
                        end_battle();
                    }
                }
            }
        } else {
            character_current_mana = character_current_mana - 100;
            character_miss_animation();
            next_turn();
        }
        spell_animation("charge");
        used_spell();
        update();
    }

    // Uses archer's second spell
    function concentration() {
        character_attack = parseInt(character_attack) + parseInt((character_attack * 0.10));
        enemy_evade = enemy_evade - 0.1;
        character_current_mana = character_current_mana - 10;
        spell_animation("concentration");
        used_passive();
        update();
    }

    // Tries to attack the enemy with the archer's second spell based on the attacked's evade rate
    function targeted() {
        var evade = Math.random();
        var critic = Math.random();
        var damage;

        if (evade > enemy_evade) {
            if (critic < character_critic) {
                damage = parseInt(character_attack) + parseInt(character_agility);
                damage = Math.round(damage);
                if ((enemy_current_health - damage) > 0) {
                    enemy_current_health = enemy_current_health - damage;
                    character_current_mana = character_current_mana - 100;
                    character_damage = parseInt(character_damage) + parseInt(damage);
                    increase_mana_damage(current_turn);
                    increase_mana_damaged(current_turn);
                    character_critical_hit_animation(damage);
                    update();
                    next_turn();
                } else {
                    enemy_current_health = 0;
                    character_current_mana = character_current_mana - 100;
                    character_damage = character_damage + damage;
                    character_critical_hit_animation(damage);
                    update();
                    end_battle();
                }
            } else {
                damage = (parseInt(character_attack) + parseInt(character_agility)) - (enemy_defense / 2);
                damage = Math.round(damage);
                if (damage <= 0) {
                    character_hit_animation(0);
                    update();
                    next_turn();
                } else {
                    if ((enemy_current_health - damage) > 0) {
                        enemy_current_health = enemy_current_health - damage;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        increase_mana_damage(current_turn);
                        increase_mana_damaged(current_turn);
                        character_hit_animation(damage);
                        update();
                        next_turn();
                    } else {
                        enemy_current_health = 0;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        character_hit_animation(damage);
                        update();
                        end_battle();
                    }
                }
            }
        } else {
            character_current_mana = character_current_mana - 100;
            character_miss_animation();
            next_turn();
        }
        spell_animation("targeted");
        used_spell();
        update();
    }

    // Uses mage's second spell
    function meditation() {
        character_defense = parseInt(character_defense) + parseInt((character_defense * 0.20));
        character_intelligence = parseInt(character_intelligence) + parseInt((character_intelligence * 0.30));
        character_current_mana = character_current_mana - 20;
        spell_animation("meditation");
        used_passive();
        update();
    }

    // Tries to attack the enemy with the mage's second spell based on the attacked's evade rate
    function storm() {
        var evade = Math.random();
        var critic = Math.random();
        var damage;

        if (evade > enemy_evade) {
            if (critic < character_critic) {
                damage = parseInt(character_attack) + parseInt(character_intelligence);
                damage = Math.round(damage);
                if ((enemy_current_health - damage) > 0) {
                    enemy_current_health = enemy_current_health - damage;
                    character_current_mana = character_current_mana - 100;
                    character_damage = parseInt(character_damage) + parseInt(damage);
                    increase_mana_damage(current_turn);
                    increase_mana_damaged(current_turn);
                    character_critical_hit_animation(damage);
                    update();
                    next_turn();
                } else {
                    enemy_current_health = 0;
                    character_current_mana = character_current_mana - 100;
                    character_damage = character_damage + damage;
                    character_critical_hit_animation(damage);
                    update();
                    end_battle();
                }
            } else {
                damage = (parseInt(character_attack) + parseInt(character_intelligence)) - (enemy_defense / 2);
                damage = Math.round(damage);
                if (damage <= 0) {
                    character_hit_animation(0);
                    update();
                    next_turn();
                } else {
                    if ((enemy_current_health - damage) > 0) {
                        enemy_current_health = enemy_current_health - damage;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        increase_mana_damage(current_turn);
                        increase_mana_damaged(current_turn);
                        character_hit_animation(damage);
                        update();
                        next_turn();
                    } else {
                        enemy_current_health = 0;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        character_hit_animation(damage);
                        update();
                        end_battle();
                    }
                }
            }
        } else {
            character_current_mana = character_current_mana - 100;
            character_miss_animation();
            next_turn();
        }
        spell_animation("storm");
        used_spell();
        update();
    }

    // Uses assassin's second spell
    function stealth() {
        character_defense = parseInt(character_defense) + parseInt((character_defense * 0.10));
        character_evade = character_evade + 0.2;
        character_current_mana = character_current_mana - 20;
        spell_animation("stealth");
        used_passive();
        update();
    }

    // Tries to attack the enemy with the assassin's second spell based on the attacked's evade rate
    function eliminate() {
        var evade = Math.random();
        var critic = Math.random();
        var damage;

        if (evade > enemy_evade) {
            if (critic < character_critic) {
                damage = parseInt(character_attack / 2) + parseInt(character_agility) + parseInt(character_intelligence);
                damage = Math.round(damage);
                if ((enemy_current_health - damage) > 0) {
                    enemy_current_health = enemy_current_health - damage;
                    character_current_mana = character_current_mana - 100;
                    character_damage = parseInt(character_damage) + parseInt(damage);
                    increase_mana_damage(current_turn);
                    increase_mana_damaged(current_turn);
                    character_critical_hit_animation(damage);
                    update();
                    next_turn();
                } else {
                    enemy_current_health = 0;
                    character_current_mana = character_current_mana - 100;
                    character_damage = character_damage + damage;
                    character_critical_hit_animation(damage);
                    update();
                    end_battle();
                }
            } else {
                damage = (parseInt(character_attack) + parseInt(character_agility) + parseInt(character_intelligence)) - (enemy_defense / 2);
                damage = Math.round(damage);
                if (damage <= 0) {
                    character_hit_animation(0);
                    update();
                    next_turn();
                } else {
                    if ((enemy_current_health - damage) > 0) {
                        enemy_current_health = enemy_current_health - damage;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        increase_mana_damage(current_turn);
                        increase_mana_damaged(current_turn);
                        character_hit_animation(damage);
                        update();
                        next_turn();
                    } else {
                        enemy_current_health = 0;
                        character_current_mana = character_current_mana - 100;
                        character_damage = parseInt(character_damage) + parseInt(damage);
                        character_hit_animation(damage);
                        update();
                        end_battle();
                    }
                }
            }
        } else {
            character_current_mana = character_current_mana - 100;
            character_miss_animation();
            next_turn();
        }
        spell_animation("eliminate");
        used_spell();
        update();
    }

    // Increases the current health by 25
    function hp_potion(current_turn) {
        var restored_health = 25;
        if (current_turn === "character") {
            if ((character_current_health + restored_health) >= character_health) {
                character_current_health = character_health;
            } else {
                character_current_health = character_current_health + restored_health;
            }
            $.get(path + 'adventure/remove_potion', {character_id: character_id, potion: 1});
            character_hp_potions--;
            $('#hp_potions').text(character_hp_potions);
            character_used_hp_potions++;
        } else {
            if ((enemy_current_health + restored_health) >= enemy_health) {
                enemy_current_health = enemy_health;
            } else {
                enemy_current_health = enemy_current_health + restored_health;
            }
            enemy_hp_potions--;
            enemy_used_hp_potions++;
        }
        potion_animation("hp", current_turn);
        used_potion();
        update();
    }

    // Increases the current health by 50
    function large_hp_potion(current_turn) {
        var restored_health = 50;
        if (current_turn === "character") {
            if ((character_current_health + restored_health) >= character_health) {
                character_current_health = character_health;
            } else {
                character_current_health = character_current_health + restored_health;
            }
            $.get(path + 'adventure/remove_potion', {character_id: character_id, potion: 2});
            character_large_hp_potions--;
            $('#large_hp_potions').text(character_large_hp_potions);
            character_used_large_hp_potions++;
        } else {
            if ((enemy_current_health + restored_health) >= enemy_health) {
                enemy_current_health = enemy_health;
            } else {
                enemy_current_health = enemy_current_health + restored_health;
            }
            enemy_large_hp_potions--;
            enemy_used_large_hp_potions++;
        }
        potion_animation("large_hp", current_turn);
        used_potion();
        update();
    }

    // Increases the current mana by 25
    function mp_potion(current_turn) {
        var restored_mana = 25;
        if (current_turn === "character") {
            if ((character_current_mana + restored_mana) >= character_mana) {
                character_current_mana = character_mana;
            } else {
                character_current_mana = character_current_mana + restored_mana;
            }
            $.get(path + 'adventure/remove_potion', {character_id: character_id, potion: 3});
            character_mp_potions--;
            $('#mp_potions').text(character_mp_potions);
            character_used_mp_potions++;
        } else {
            if ((enemy_current_mana + restored_mana) >= enemy_mana) {
                enemy_current_mana = enemy_mana;
            } else {
                enemy_current_mana = enemy_current_mana + restored_mana;
            }
            enemy_mp_potions--;
            enemy_used_mp_potions++;
        }

        if (character_current_mana >= 20) {
            $('.btn-spells').prop("disabled", false);
        } else {
            $('.btn-spells').prop("disabled", true);
        }

        if (parseInt(character_class) === 1) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_warrior_spell_1').removeClass("disabled-li");
            } else {
                $('#li_warrior_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_warrior_spell_2').removeClass("disabled-li");
            } else {
                $('#li_warrior_spell_2').addClass("disabled-li");
            }
        }

        if (parseInt(character_class) === 2) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_archer_spell_1').removeClass("disabled-li");
            } else {
                $('#li_archer_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_archer_spell_2').removeClass("disabled-li");
            } else {
                $('#li_archer_spell_2').addClass("disabled-li");
            }
        }

        if (parseInt(character_class) === 3) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_mage_spell_1').removeClass("disabled-li");
            } else {
                $('#li_mage_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_mage_spell_2').removeClass("disabled-li");
            } else {
                $('#li_mage_spell_2').addClass("disabled-li");
            }
        }

        if (parseInt(character_class) === 4) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_assassin_spell_1').removeClass("disabled-li");
            } else {
                $('#li_assassin_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_assassin_spell_2').removeClass("disabled-li");
            } else {
                $('#li_assassin_spell_2').addClass("disabled-li");
            }
        }
        potion_animation("mp", current_turn);
        used_potion();
        update();
    }

    // Increases the current mana by 50
    function large_mp_potion(current_turn) {
        var restored_mana = 50;
        if (current_turn === "character") {
            if ((character_current_mana + restored_mana) >= character_mana) {
                character_current_mana = character_mana;
            } else {
                character_current_mana = character_current_mana + restored_mana;
            }
            $.get(path + 'adventure/remove_potion', {character_id: character_id, potion: 4});
            character_large_mp_potions--;
            $('#large_mp_potions').text(character_large_mp_potions);
            character_used_large_mp_potions++;
        } else {
            if ((enemy_current_mana + restored_mana) >= enemy_mana) {
                enemy_current_mana = enemy_mana;
            } else {
                enemy_current_mana = enemy_current_mana + restored_mana;
            }
            enemy_large_mp_potions--;
            enemy_used_large_mp_potions++;
        }

        if (character_current_mana >= 20) {
            $('.btn-spells').prop("disabled", false);
        } else {
            $('.btn-spells').prop("disabled", true);
        }

        if (parseInt(character_class) === 1) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_warrior_spell_1').removeClass("disabled-li");
            } else {
                $('#li_warrior_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_warrior_spell_2').removeClass("disabled-li");
            } else {
                $('#li_warrior_spell_2').addClass("disabled-li");
            }
        }

        if (parseInt(character_class) === 2) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_archer_spell_1').removeClass("disabled-li");
            } else {
                $('#li_archer_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_archer_spell_2').removeClass("disabled-li");
            } else {
                $('#li_archer_spell_2').addClass("disabled-li");
            }
        }

        if (parseInt(character_class) === 3) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_mage_spell_1').removeClass("disabled-li");
            } else {
                $('#li_mage_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_mage_spell_2').removeClass("disabled-li");
            } else {
                $('#li_mage_spell_2').addClass("disabled-li");
            }
        }

        if (parseInt(character_class) === 4) {
            if (character_current_mana >= 20 && character_used_passive === false) {
                $('#li_assassin_spell_1').removeClass("disabled-li");
            } else {
                $('#li_assassin_spell_1').addClass("disabled-li");
            }

            if (character_current_mana >= 100) {
                $('#li_assassin_spell_2').removeClass("disabled-li");
            } else {
                $('#li_assassin_spell_2').addClass("disabled-li");
            }
        }
        potion_animation("large_mp", current_turn);
        used_potion();
        update();
    }

    // Increases the evade rate to 50%
    function dexterity_potion(current_turn) {
        if (current_turn === "character") {
            character_evade = character_evade + 0.1;
            $.get(path + 'adventure/remove_potion', {character_id: character_id, potion: 5});
            character_dexterity_potions--;
            $('#dexterity_potions').text(character_dexterity_potions);
            character_used_dexterity_potion++;
        } else {
            enemy_evade = enemy_evade + 0.1;
            enemy_dexterity_potions--;
            enemy_used_dexterity_potion++;
        }
        potion_animation("dexterity", current_turn);
        used_potion();
        update();
    }

    // Increases the critic rate to 50%
    function luck_potion(current_turn) {
        if (current_turn === "character") {
            character_critic = character_critic + 0.1;
            $.get(path + 'adventure/remove_potion', {character_id: character_id, potion: 6});
            character_luck_potions--;
            $('#luck_potions').text(character_luck_potions);
            character_used_luck_potion++;
        } else {
            enemy_critic = enemy_critic + 0.1;
            enemy_luck_potions--;
            enemy_used_luck_potion++;
        }
        potion_animation("luck", current_turn);
        used_potion();
        update();
    }

    // Starts battle
    select_character();
    select_enemy();
    update();
    first_action();
    $('#timer').text(timer);
    $('#timer_bar').removeClass('progress-bar-danger');
    $('#timer_bar').removeClass('progress-bar-warning');
    $('#timer_bar').addClass('progress-bar-info');
    percentage = (timer / 5) * 100;
    $('#timer_bar').attr('aria-valuenow', timer).width(percentage + "%");
    countdown();

    // When Attack button is clicked
    $('#btn_attack').click(function () {
        attack(current_turn);
    });

    // When Warrior's First Spell button is clicked
    $('#btn_warrior_spell_1').click(function () {
        charge();
    });

    // When Warrior's Second Spell button is clicked
    $('#btn_warrior_spell_2').click(function () {
        fury();
    });

    // When Archer's First Spell button is clicked
    $('#btn_archer_spell_1').click(function () {
        concentration();
    });

    // When Archer's Second Spell button is clicked
    $('#btn_archer_spell_2').click(function () {
        targeted();
    });

    // When Mage's First Spell button is clicked
    $('#btn_mage_spell_1').click(function () {
        meditation();
    });

    // When Mage's Second Spell button is clicked
    $('#btn_mage_spell_2').click(function () {
        storm();
    });

    // When Assassin's First Spell button is clicked
    $('#btn_assassin_spell_1').click(function () {
        stealth();
    });

    // When Assassin's Second Spell button is clicked
    $('#btn_assassin_spell_2').click(function () {
        eliminate();
    });

    // When HP Potion button is clicked
    $('#btn_hp_potions').click(function () {
        hp_potion(current_turn);
    });

    // When Large HP Potion button is clicked
    $('#btn_large_hp_potions').click(function () {
        large_hp_potion(current_turn);
    });

    // When MP Potion button is clicked
    $('#btn_mp_potions').click(function () {
        mp_potion(current_turn);
    });

    // When Large MP Potion button is clicked
    $('#btn_large_mp_potions').click(function () {
        large_mp_potion(current_turn);
    });

    // When Dexterity Potion button is clicked
    $('#btn_dexterity_potions').click(function () {
        dexterity_potion(current_turn);
    });

    // When Luck Potion button is clicked
    $('#btn_luck_potions').click(function () {
        luck_potion(current_turn);
    });

    // Defines what action the enemy is going to make
    function enemy_turn() {
        setTimeout(function () {
            if (enemy_current_health > enemy_health / 2) {
                if (enemy_current_mana < enemy_mana) {
                    if (enemy_mp_potions > 0 && enemy_used_mp_potions < 5) {
                        mp_potion(current_turn);
                    } else {
                        if (enemy_large_mp_potions > 0 && enemy_used_large_mp_potions < 5) {
                            large_mp_potion(current_turn);
                        }
                    }
                }
            } else {
                if (enemy_hp_potions > 0 && enemy_used_hp_potions < 5) {
                    hp_potion(current_turn);
                } else {
                    if (enemy_large_hp_potions > 0 && enemy_used_large_hp_potions < 5) {
                        large_hp_potion(current_turn);
                    }
                }
            }
            setTimeout(function () {
                if (enemy_current_mana === enemy_mana) {
                    especial_attack(current_turn);
                } else {
                    attack(current_turn);
                }
            }, 1000);
        }, 3000);
    }

    // Finishes the battle. Saves the match in the players AI Battle history and updates it's character's stats
    function end_battle() {
        clearInterval(interval);
        var experience;
        var gold;
        var max_experience;

        if (character_current_health === 0) {
            experience = Math.round(((25 * character_level) / 2) + (character_damage * 0.03) + (enemy_damage * 0.03) + turns);
            gold = Math.round(((5 * character_level) / 2) + (character_damage * 0.02) + (enemy_damage * 0.02) + turns);
            max_experience = 50 * (parseInt(character_level) + 1);
            $.get(path + 'adventure/save_history', {character_id: character_id, enemy_id: enemy_id, player_damage: character_damage, player_damage_taken: enemy_damage, enemy_damage: enemy_damage, enemy_damage_taken: character_damage, player_hp_potions: character_used_hp_potions, player_large_hp_potions: character_used_large_hp_potions, player_mp_potions: character_used_mp_potions, player_large_mp_potions: character_used_large_mp_potions, player_dexterity_potions: character_used_dexterity_potion, player_luck_potions: character_used_luck_potion, enemy_hp_potions: enemy_used_hp_potions, enemy_large_hp_potions: enemy_used_large_hp_potions, enemy_mp_potions: enemy_used_mp_potions, enemy_large_mp_potions: enemy_used_large_mp_potions, enemy_dexterity_potions: enemy_used_dexterity_potion, enemy_luck_potions: enemy_used_luck_potion, experience_earned: experience, gold_earned: gold, turns: turns, won: 2});
            $.get(path + 'adventure/reward', {character_id: character_id, user_id: user_id, experience: experience, max_experience: max_experience, gold: gold});
            show_rewards(experience, gold, 2);
        } else if (enemy_current_health === 0) {
            experience = Math.round(((50 * character_level) / 2) + (character_damage * 0.05) + (enemy_damage * 0.05) + turns);
            gold = Math.round(((10 * character_level) / 2) + (character_damage * 0.04) + (enemy_damage * 0.04) + turns);
            max_experience = 50 * (parseInt(character_level) + 1);
            $.get(path + 'adventure/increase_wins', {character_id: character_id});
            $.get(path + 'adventure/save_history', {character_id: character_id, enemy_id: enemy_id, player_damage: character_damage, player_damage_taken: enemy_damage, enemy_damage: enemy_damage, enemy_damage_taken: character_damage, player_hp_potions: character_used_hp_potions, player_large_hp_potions: character_used_large_hp_potions, player_mp_potions: character_used_mp_potions, player_large_mp_potions: character_used_large_mp_potions, player_dexterity_potions: character_used_dexterity_potion, player_luck_potions: character_used_luck_potion, enemy_hp_potions: enemy_used_hp_potions, enemy_large_hp_potions: enemy_used_large_hp_potions, enemy_mp_potions: enemy_used_mp_potions, enemy_large_mp_potions: enemy_used_large_mp_potions, enemy_dexterity_potions: enemy_used_dexterity_potion, enemy_luck_potions: enemy_used_luck_potion, experience_earned: experience, gold_earned: gold, turns: turns, won: 1});
            $.get(path + 'adventure/reward', {character_id: character_id, user_id: user_id, experience: experience, max_experience: max_experience, gold: gold});
            show_rewards(experience, gold, 1);
        }
    }

    // Shows the reward modal
    function show_rewards(experience, gold, won) {
        var current_experience;
        var max_experience;
        var experience_percentage;

        if (won === 1) {
            $('#modalColor').addClass('bg-green');
            $('#modal_title').text("Venceu!");
        } else {
            $('#modalColor').addClass('bg-red');
            $('#modal_title').text("Perdeu...");
        }

        if ((parseInt(character_experience) + parseInt(experience)) > character_max_experience) {
            max_experience = 50 * (parseInt(character_level) + 1);
            current_experience = (parseInt(character_experience) + parseInt(experience)) - character_max_experience;
            $('#level').text(parseInt(character_level) + 1);
            $('#icon_level_up').removeAttr('hidden');
        } else {
            max_experience = character_max_experience;
            current_experience = parseInt(character_experience) + parseInt(experience);
            $('#level').text(character_level);
        }

        experience_percentage = (current_experience / max_experience) * 100;
        experience_percentage = experience_percentage.toFixed(2);

        $('#experience_bar').attr('aria-valuenow', experience_percentage).attr('aria-valuemax', max_experience).width(experience_percentage + "%").text(current_experience + " (" + experience_percentage + "%)");

        $('#experience').text(current_experience);
        $('#max_experience').text(max_experience);

        $('#earned_experience').append(experience);
        $('#earned_gold').append(gold);
        $('#rewardsModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    // Goes to the home page
    $('#proceed_button').click(function () {
        window.location.replace("http://localhost/tale_of_valhalla/tale_of_valhalla/play/adventures");
    });
}