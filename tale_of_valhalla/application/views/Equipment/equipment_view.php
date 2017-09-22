<!-- Main content -->
<section class="content"> 
    <div class="row row-inside">

        <!-- Equipment -->
        <div class="col-sm-1" style="padding-left: 0;">
            <div class="box box-default">
                <div class="box-header with-border" style="margin-bottom: 10px;">
                    <h3 class="box-title">Equipamento</h3>
                </div>

                <?php
                if (isset($helmet)) {
                    ?>

                    <!-- Helmet -->
                    <div class="row row-inside">
                        <div class="col-sm-12" style="margin-top: 5px">
                            <center>
                                <?php
                                if ($helmet->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($helmet->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($helmet->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <a data-html="true" data-toggle="popover" data-trigger="hover"
                                   title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 20px; height: 20px; margin-bottom: 5px'> <br>
                                   <strong style='font-size: 16px'><?= $helmet->name ?></strong></center>" 
                                   data-content="<strong>Ataque:</strong> <?= $helmet->attack ?> <br>
                                   <strong>Defesa:</strong> <?= $helmet->defense ?> <br>
                                   <strong>Agilidade:</strong> <?= $helmet->agility ?> <br>
                                   <strong>Inteligência:</strong> <?= $helmet->intelligence ?>">
                                    <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $helmet->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                </a>
                            </center>

                            <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $helmet->id . '/' . $helmet->type_id) ?>" class="btn btn-md btn-warning btn-fill" role="button">Desequipar</a>

                        </div>
                    </div>

                <?php } else { ?>

                    <!-- Helmet -->
                    <div class="row row-inside">
                        <div class="col-sm-12" style="margin-top: 5px">
                            <center> <img src="<?= base_url('/equipments/helmet.png') ?>" class="img-rounded" style="width: 60px; height: 60px; margin-top: -5px; margin-bottom: 10px;"> </center>
                        </div>
                    </div>

                <?php } ?>

                <?php
                if (isset($armor)) {
                    ?>

                    <!-- Armor -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center>
                                <?php
                                if ($armor->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($armor->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($armor->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <a data-html="true" data-toggle="popover" data-trigger="hover"
                                   title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 20px; height: 20px; margin-bottom: 5px'> <br>
                                   <strong style='font-size: 16px'><?= $armor->name ?></strong></center>" 
                                   data-content="<strong>Ataque:</strong> <?= $armor->attack ?> <br>
                                   <strong>Defesa:</strong> <?= $armor->defense ?> <br>
                                   <strong>Agilidade:</strong> <?= $armor->agility ?> <br>
                                   <strong>Inteligência:</strong> <?= $armor->intelligence ?>">
                                    <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $armor->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                </a>
                            </center>

                            <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $armor->id . '/' . $armor->type_id) ?>" class="btn btn-md btn-warning btn-fill" role="button">Desequipar</a>
                        </div>
                    </div>

                <?php } else { ?>

                    <!-- Armor -->
                    <div class="col-sm-12">
                        <center> <img src="<?= base_url('/equipments/armor.png') ?>" class="img-rounded" style="width: 60px; height: 60px; margin-top: -5px; margin-bottom: 10px;"> </center>
                    </div>

                <?php } ?>

                <?php
                if (isset($pants)) {
                    ?>

                    <!-- Pants -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center>
                                <?php
                                if ($pants->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($pants->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($pants->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <a data-html="true" data-toggle="popover" data-trigger="hover"
                                   title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 20px; height: 20px; margin-bottom: 5px'> <br>
                                   <strong style='font-size: 16px'><?= $pants->name ?></strong></center>" 
                                   data-content="<strong>Ataque:</strong> <?= $pants->attack ?> <br>
                                   <strong>Defesa:</strong> <?= $pants->defense ?> <br>
                                   <strong>Agilidade:</strong> <?= $pants->agility ?> <br>
                                   <strong>Inteligência:</strong> <?= $pants->intelligence ?>">
                                    <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $pants->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                </a>
                            </center>

                            <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $pants->id . '/' . $pants->type_id) ?>" class="btn btn-md btn-warning btn-fill" role="button">Desequipar</a>                       
                        </div>
                    </div>

                <?php } else { ?>

                    <!-- Pants -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/equipments/pants.png') ?>" class="img-rounded" style="width: 60px; height: 60px; margin-top: -5px; margin-bottom: 10px;"> </center>
                        </div>
                    </div>

                <?php } ?>

                <?php
                if (isset($gloves)) {
                    ?>

                    <!-- Gloves -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center>
                                <?php
                                if ($gloves->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($gloves->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($gloves->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <a data-html="true" data-toggle="popover" data-trigger="hover"
                                   title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 20px; height: 20px; margin-bottom: 5px'> <br>
                                   <strong style='font-size: 16px'><?= $gloves->name ?></strong></center>" 
                                   data-content="<strong>Ataque:</strong> <?= $gloves->attack ?> <br>
                                   <strong>Defesa:</strong> <?= $gloves->defense ?> <br>
                                   <strong>Agilidade:</strong> <?= $gloves->agility ?> <br>
                                   <strong>Inteligência:</strong> <?= $gloves->intelligence ?>">
                                    <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $gloves->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                </a>
                            </center>

                            <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $gloves->id . '/' . $gloves->type_id) ?>" class="btn btn-md btn-warning btn-fill" role="button">Desequipar</a>
                        </div>
                    </div>

                <?php } else { ?>

                    <!-- Gloves -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/equipments/gloves.png') ?>" class="img-rounded" style="width: 60px; height: 60px; margin-top: -5px; margin-bottom: 10px;"> </center>                                 
                        </div>
                    </div>

                <?php } ?>

                <?php
                if (isset($boots)) {
                    ?>

                    <!-- Boots -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center>
                                <?php
                                if ($boots->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($boots->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($boots->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <a data-html="true" data-toggle="popover" data-trigger="hover"
                                   title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 20px; height: 20px; margin-bottom: 5px'> <br>
                                   <strong style='font-size: 16px'><?= $boots->name ?></strong></center>" 
                                   data-content="<strong>Ataque:</strong> <?= $boots->attack ?> <br>
                                   <strong>Defesa:</strong> <?= $boots->defense ?> <br>
                                   <strong>Agilidade:</strong> <?= $boots->agility ?> <br>
                                   <strong>Inteligência:</strong> <?= $boots->intelligence ?>">
                                    <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $boots->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                </a>
                            </center>

                            <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $boots->id . '/' . $boots->type_id) ?>" class="btn btn-md btn-warning btn-fill" role="button">Desequipar</a>
                        </div>
                    </div>

                <?php } else { ?>

                    <!-- Boots -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/equipments/boots.png') ?>" class="img-rounded" style="width: 60px; height: 60px; margin-top: -5px; margin-bottom: 10px;"> </center>
                        </div>
                    </div>

                <?php } ?>

                <?php
                if (isset($weapon)) {
                    ?>

                    <!-- Weapon -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center>
                                <?php
                                if ($weapon->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($weapon->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($weapon->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <a data-html="true" data-toggle="popover" data-trigger="hover"
                                   title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 20px; height: 20px; margin-bottom: 5px'> <br>
                                   <strong style='font-size: 16px'><?= $weapon->name ?></strong></center>" 
                                   data-content="<strong>Ataque:</strong> <?= $weapon->attack ?> <br>
                                   <strong>Defesa:</strong> <?= $weapon->defense ?> <br>
                                   <strong>Agilidade:</strong> <?= $weapon->agility ?> <br>
                                   <strong>Inteligência:</strong> <?= $weapon->intelligence ?>">
                                    <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $weapon->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                </a>
                            </center>

                            <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $weapon->id . '/' . $weapon->type_id) ?>" class="btn btn-md btn-warning btn-fill" role="button">Desequipar</a>
                        </div>
                    </div>

                <?php } else { ?>

                    <!-- Weapon -->
                    <div class="row row-inside">
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/equipments/weapon.png') ?>" class="img-rounded" style="width: 60px; height: 60px; margin-top: -5px; margin-bottom: 10px;"> </center>                                           
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

        <!-- Stats -->
        <div class="col-sm-2" style="padding-left: 0;">                              
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Atributos</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <p style="font-size: 15px"><img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px; margin-right: 5px">
                                        <strong>Ataque:</strong> <?= $stats->attack ?> 
                                        <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px; margin-left: 5px">
                                    </p>
                                    <p style="font-size: 15px"><img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px; margin-right: 5px">
                                        <strong>Defesa:</strong> <?= $stats->defense ?> 
                                        <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px; margin-left: 5px">
                                    </p>
                                    <p style="font-size: 15px"><img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px; margin-right: 5px">
                                        <strong>Agilidade:</strong> <?= $stats->agility ?> 
                                        <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px; margin-left: 5px">
                                    </p>
                                    <p style="font-size: 15px"><img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px; margin-right: 5px">
                                        <strong>Inteligência:</strong> <?= $stats->intelligence ?> 
                                        <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px; margin-left: 5px">
                                    </p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory -->
        <div class="col-sm-9" style="width: 73%;padding-left: 0; padding-right: 0;">                              
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Inventário</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <?php if (!$inventory) { ?>
                                <h5 style="margin-left: 15px; margin-right: 15px;">Você não possui nenhum item no inventário.</h5>
                            <?php } ?>

                            <?php
                            foreach ($inventory as $item) {
                                $id = $item->id;

                                if ($item->rarity == 1) {
                                    $icon_rarity = "commom";
                                } else if ($item->rarity == 2) {
                                    $icon_rarity = "rare";
                                } else if ($item->rarity == 3) {
                                    $icon_rarity = "epic";
                                } else {
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <!-- Inventory -->
                                <div class="col-sm-1">

                                    <center>
                                        <?php
                                        if ($item->rarity == 1) {
                                            $icon_rarity = "commom";
                                        } else if ($item->rarity == 2) {
                                            $icon_rarity = "rare";
                                        } else if ($item->rarity == 3) {
                                            $icon_rarity = "epic";
                                        } else {
                                            $icon_rarity = "legendary";
                                        }
                                        ?>

                                        <a data-html="true" data-toggle="popover" data-trigger="hover"
                                           title="<center> <img src='<?= base_url('/icons/' . $icon_rarity . '.png') ?>' style='width: 18px; height: 20px; margin-bottom: 5px'> <br>
                                           <strong style='font-size: 16px'><?= $item->name ?></strong></center>" 
                                           data-content="<strong>Ataque:</strong> <?= $item->attack ?> <br>
                                           <strong>Defesa:</strong> <?= $item->defense ?> <br>
                                           <strong>Agilidade:</strong> <?= $item->agility ?> <br>
                                           <strong>Inteligência:</strong> <?= $item->intelligence ?>">
                                            <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $item->image ?>" class="img-rounded" style="width: 100%; height: 80px">
                                        </a>
                                    </center>

                                    <a href="<?= base_url('/equipment/equip_item/' . $this->session->selected_character . '/' . $item->id . '/' . $item->type_id) ?>" class="btn btn-md btn-info btn-fill" role="button" style="margin-bottom: 0">Equipar</a>

                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>