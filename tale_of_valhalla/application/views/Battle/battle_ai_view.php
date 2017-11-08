<!-- Main content -->
<section class="content"> 
    <div class="row row-inside">

        <!-- Character -->
        <div class="col-sm-5" style="padding-left: 0; padding-right: 0;">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $this->session->username ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-6">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $this->session->id ?>">
                        <input type="hidden" id="character_id" name="character_id" value="<?= $character->id ?>">
                        <input type="hidden" id="character_attack" name="character_attack" value="<?= $character->attack ?>">
                        <input type="hidden" id="character_defense" name="character_defense" value="<?= $character->defense ?>">
                        <input type="hidden" id="character_agility" name="character_agility" value="<?= $character->agility ?>">
                        <input type="hidden" id="character_intelligence" name="character_intelligence" value="<?= $character->intelligence ?>">
                        <input type="hidden" id="character_level" name="character_level" value="<?= $character->level ?>">
                        <input type="hidden" id="character_health" name="character_health" value="<?= $character->health ?>">
                        <input type="hidden" id="character_mana" name="character_mana" value="<?= $character->mana ?>">
                        <input type="hidden" id="character_hp_potions" name="character_hp_potions" value="<?= $character->hp_potions ?>">
                        <input type="hidden" id="character_large_hp_potions" name="character_large_hp_potions" value="<?= $character->large_hp_potions ?>">
                        <input type="hidden" id="character_mp_potions" name="character_mp_potions" value="<?= $character->mp_potions ?>">
                        <input type="hidden" id="character_large_mp_potions" name="character_large_mp_potions" value="<?= $character->large_mp_potions ?>">
                        <input type="hidden" id="character_dexterity_potions" name="character_dexterity_potions" value="<?= $character->dexterity_potions ?>">
                        <input type="hidden" id="character_luck_potions" name="character_luck_potions" value="<?= $character->luck_potions ?>">

                        <img src="<?= base_url('/characters_images/' . $this->session->selected_class . '.png') ?>" class="img-rounded img-thumbnail" style="width: 250px; height: 350px; margin-bottom: 15px;">
                    </div>
                    <div class="col-sm-6">
                        <div class="row row-inside">
                            <div class="col-sm-2" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Vida">
                                <img src="<?= base_url('/icons/health.png') ?>" style="width: 20px; height: 20px; margin-top: -3px; margin-right: -5px;">
                            </div>
                            <div class="col-sm-10">
                                <div class="progress">
                                    <div id="character_health_bar" class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuemin="0" aria-valuemax="<?= $character->health ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Mana">
                                <img src="<?= base_url('/icons/mana.png') ?>" style="width: 20px; height: 20px; margin-top: -3px; margin-right: -5px;">
                            </div>
                            <div class="col-sm-10">
                                <div class="progress">
                                    <div id="character_mana_bar" class="progress-bar progress-bar-info" role="progressbar"
                                         aria-valuemin="0" aria-valuemax="<?= $character->mana ?>">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: 15px;">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('/icons/stats1.png') ?>" style="width: 25px; height: 25px; float: left;">
                                </div>
                                <div class="col-sm-6">
                                    <center>
                                        <span style="font-size: 18px;"><strong>Atributos</strong></span>
                                    </center>
                                </div>
                                <div class="col-sm-3">
                                    <img src="<?= base_url('/icons/stats2.png') ?>" style="width: 25px; height: 25px; float: right;">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Ataque">
                                    <img src="<?= base_url('/icons/attack.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Atq: </strong><?= $character->attack ?></span>
                                </div>

                                <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Defesa">
                                    <span style="float: right;"><img src="<?= base_url('/icons/defense.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Def: </strong><?= $character->defense ?></span></span>
                                </div>

                                <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Agilidade">
                                    <img src="<?= base_url('/icons/agility.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Agi: </strong><?= $character->agility ?></span>
                                </div>

                                <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Inteligência">
                                    <span style="float: right;"><img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Int: </strong><?= $character->intelligence ?></span></span>
                                </div>

                                <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Chance de Esquiva">
                                    <img src="<?= base_url('/icons/evade.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Esq: </strong><span id="character_evade" style="font-size: 14px;"></span></span>
                                </div>

                                <div class="col-sm-6" style="margin-bottom: 10px;"  data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Chance de Crítico">
                                    <span style="float: right;"><img src="<?= base_url('/icons/critic.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Crt: </strong><span id="character_critic" style="font-size: 14px;"></span></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img-block">
                            <div class="img-animation">
                                <center>
                                    <img id="enemy_img_animation" style="width: 100px; height: 100px;" hidden />
                                </center>
                                <p id="enemy_damage_animation" hidden></p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        <!-- Actions -->
        <div class="col-sm-2">                              
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ações</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <button type="button" id="btn_attack" class="btn btn-large btn-danger" style="width: 100%; margin-bottom: 10px">Ataque</button>
                        <button type="button" id="btn_especial_attack" class="btn btn-large btn-primary" style="width: 100%; margin-bottom: 10px">Ataque Especial</button>
                        <div class="btn-group" style="width: 100%; margin-bottom: 15px;">
                            <button type="button" class="btn-potions btn btn-large btn-success" style="width: 80%">Poções</button>
                            <button type="button" class="btn-potions btn btn-large btn-success dropdown-toggle" style="width: 20%" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" style="width: 100%">
                                <li id="li_hp_potions"><a id="btn_hp_potions">Poções de HP <span id="hp_potions" class="badge"></span></a></li>
                                <li id="li_large_hp_potions"><a id="btn_large_hp_potions">Poções de HP+ <span id="large_hp_potions" class="badge"></span></a></li>
                                <li id="li_mp_potions"><a id="btn_mp_potions">Poções de MP <span id="mp_potions" class="badge"></span></a></li>
                                <li id="li_large_mp_potions"><a id="btn_large_mp_potions">Poções de MP+ <span id="large_mp_potions" class="badge"></span></a></li>
                                <li id="li_dexterity_potions"><a id="btn_dexterity_potions">Poções de Destreza <span id="dexterity_potions" class="badge"></span></a></li>
                                <li id="li_luck_potions"><a id="btn_luck_potions">Poções de Sorte <span id="luck_potions" class="badge"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Turnos</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <center>
                            <h1 id="turns" style="font-size: 50px; margin-top: -10px;"></h1>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enemy -->
        <div class="col-sm-5" style="padding-left: 0; padding-right: 0;">                              
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $enemy->name ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-6" style="padding: 0">
                        <div class="col-sm-12">
                            <div class="row row-inside">
                                <div class="col-sm-10">
                                    <div class="progress">
                                        <div id="enemy_health_bar"  class="progress-bar progress-bar-success" role="progressbar"
                                             aria-valuemin="0" aria-valuemax="<?= $enemy->health ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Vida">
                                    <img src="<?= base_url('/icons/health.png') ?>" style="width: 20px; height: 20px; margin-top: -3px; margin-right: -5px;">
                                </div>
                                <div class="col-sm-10">
                                    <div class="progress">
                                        <div id="enemy_mana_bar" class="progress-bar progress-bar-info" role="progressbar"
                                             aria-valuemin="0" aria-valuemax="<?= $enemy->mana ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Mana">
                                    <img src="<?= base_url('/icons/mana.png') ?>" style="width: 20px; height: 20px; margin-top: -3px; margin-right: -5px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12" style="margin-bottom: 15px;">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('/icons/stats1.png') ?>" style="width: 25px; height: 25px; float: left;">
                                    </div>
                                    <div class="col-sm-6">
                                        <center>
                                            <span style="font-size: 18px;"><strong>Atributos</strong></span>
                                        </center>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('/icons/stats2.png') ?>" style="width: 25px; height: 25px; float: right;">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Ataque">
                                        <img src="<?= base_url('/icons/attack.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Atq: </strong><?= $enemy->attack ?></span>
                                    </div>

                                    <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Defesa">
                                        <span style="float: right;"><img src="<?= base_url('/icons/defense.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px;"><strong>Def: </strong><?= $enemy->defense ?></span></span>
                                    </div>

                                    <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Agilidade">
                                        <img src="<?= base_url('/icons/agility.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Agi: </strong><?= $enemy->agility ?></span>
                                    </div>

                                    <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Inteligência">
                                        <span style="float: right;"><img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Int: </strong><?= $enemy->intelligence ?></span></span>
                                    </div>

                                    <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Chance de Esquiva">
                                        <img src="<?= base_url('/icons/evade.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Esq: </strong><span id="enemy_evade" style="font-size: 14px;"></span></span>
                                    </div>

                                    <div class="col-sm-6" style="margin-bottom: 10px;" data-toggle="popover" data-placement="left" data-trigger="hover" data-content="Chance de Crítico">
                                        <span style="float: right;"><img src="<?= base_url('/icons/critic.png') ?>" style="width: 25px; height: 25px;"> <span style="font-size: 14px"><strong>Crt: </strong><span id="enemy_critic" style="font-size: 14px;"></span></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="img-block">
                                <div class="img-animation">
                                    <center>
                                        <img id="character_img_animation" style="width: 100px; height: 100px;" hidden />
                                    </center>
                                    <p id="character_damage_animation" hidden></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input type="hidden" id="enemy_id" name="enemy_id" value="<?= $enemy->id ?>">
                        <input type="hidden" id="enemy_attack" name="enemy_attack" value="<?= $enemy->attack ?>">
                        <input type="hidden" id="enemy_defense" name="enemy_defense" value="<?= $enemy->defense ?>">
                        <input type="hidden" id="enemy_agility" name="enemy_agility" value="<?= $enemy->agility ?>">
                        <input type="hidden" id="enemy_intelligence" name="enemy_intelligence" value="<?= $enemy->intelligence ?>">
                        <input type="hidden" id="enemy_health" name="enemy_health" value="<?= $enemy->health ?>">
                        <input type="hidden" id="enemy_mana" name="enemy_mana" value="<?= $enemy->mana ?>">
                        <input type="hidden" id="enemy_hp_potions" name="enemy_hp_potions" value="<?= $enemy->hp_potions ?>">
                        <input type="hidden" id="enemy_large_hp_potions" name="enemy_large_hp_potions" value="<?= $enemy->large_hp_potions ?>">
                        <input type="hidden" id="enemy_mp_potions" name="enemy_mp_potions" value="<?= $enemy->mp_potions ?>">
                        <input type="hidden" id="enemy_large_mp_potions" name="enemy_large_mp_potions" value="<?= $enemy->large_mp_potions ?>">
                        <input type="hidden" id="enemy_dexterity_potions" name="enemy_dexterity_potions" value="<?= $enemy->dexterity_potions ?>">
                        <input type="hidden" id="enemy_luck_potions" name="enemy_luck_potions" value="<?= $enemy->luck_potions ?>">

                        <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/enemies_images/<?= $enemy->image ?>" class="img-rounded img-thumbnail" style="width: 250px; height: 350px; margin-bottom: 15px; float: right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rewards Modal -->
<div class="modal fade" id="rewardsModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div id="modalColor" class="modal-header">
                <h1 id="modal_title" class="modal-title" style="text-align: center; margin-top: -2px"></h1>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-6">
                        <h3><strong>Experiência: </strong></h3><h3 id="earned_experience"></h3>
                    </div>

                    <div class="col-sm-6">
                        <h3><strong>Ouro: </strong></h3><h3 id="earned_gold"></h3>
                    </div>

                    <hr>

                    <div class="col-sm-12">
                        <button id="proceed_button" type="button" class="btn btn-lg btn-success btn-fill">Prosseguir</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>