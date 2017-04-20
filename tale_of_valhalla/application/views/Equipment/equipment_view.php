<!-- Main content -->
<section class="content"> 
    <div class="row row-inside">

        <!-- Equipment -->
        <div class="col-sm-6" style="padding-left: 0;">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Equipamento</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <?php
                            if ($this->session->has_userdata('message')) {
                                $message = $this->session->flashdata('message');
                                if ($this->session->flashdata('situation') == '1') {
                                    echo "<div class='alert alert-success alert-dismissable' style='margin-left: 15px; margin-right: 15px;'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo $message;
                                    echo "</div>";
                                } else {
                                    echo "<div class='alert alert-danger alert-dismissable' style='margin-left: 15px; margin-right: 15px;'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo $message;
                                    echo "</div>";
                                }
                            }
                            ?>

                            <?php
                            if (isset($helmet)) {
                                ?>

                                <!-- Helmet -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Elmo</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $helmet->image ?>" class="img-rounded" style="width: 90px; height: 90px; margin-bottom: -5px;"> </center>

                                            <hr>        

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $helmet->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <!-- Helmet -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Elmo</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/equipments/helmet.png') ?>" class="img-rounded" style="width: 90px; height: 90px; margin-top: -5px; margin-bottom: 10px;"> </center>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php
                            if (isset($armor)) {
                                ?>

                                <!-- Armor -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Armadura</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $armor->image ?>" class="img-rounded" style="width: 90px; height: 90px; margin-bottom: -5px;"> </center>

                                            <hr>        

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $armor->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <!-- Armor -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Armadura</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/equipments/armor.png') ?>" class="img-rounded" style="width: 90px; height: 90px; margin-top: -5px; margin-bottom: 10px;"> </center>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php
                            if (isset($pants)) {
                                ?>

                                <!-- Pants -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Calças</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $pants->image ?>" class="img-rounded" style="width: 90px; height: 90px; margin-bottom: -5px;"> </center>

                                            <hr>        

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $pants->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <!-- Pants -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Calças</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/equipments/pants.png') ?>" class="img-rounded" style="width: 90px; height: 90px; margin-top: -5px; margin-bottom: 10px;"> </center>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php
                            if (isset($gloves)) {
                                ?>

                                <!-- Gloves -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Luvas</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $gloves->image ?>" class="img-rounded" style="width: 90px; height: 90px; margin-bottom: -5px;"> </center>

                                            <hr>        

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $gloves->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <!-- Gloves -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Luvas</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/equipments/gloves.png') ?>" class="img-rounded" style="width: 90px; height: 90px; margin-top: -5px; margin-bottom: 10px;"> </center>
                                        </div>
                                    </div>
                                </div> 

                            <?php } ?>

                            <?php
                            if (isset($boots)) {
                                ?>

                                <!-- Boots -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Botas</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $boots->image ?>" class="img-rounded" style="width: 90px; height: 90px; margin-bottom: -5px;"> </center>

                                            <hr>        

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $boots->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <!-- Boots -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Botas</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/equipments/boots.png') ?>" class="img-rounded" style="width: 90px; height: 90px; margin-top: -5px; margin-bottom: 10px;"> </center>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php
                            if (isset($weapon)) {
                                ?>

                                <!-- Weapon -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Arma</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $weapon->image ?>" class="img-rounded" style="width: 90px; height: 90px; margin-bottom: -5px;"> </center>

                                            <hr>        

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $weapon->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <!-- Weapon -->
                                <div class="col-sm-6">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Arma</h3>  
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/equipments/weapon.png') ?>" class="img-rounded" style="width: 90px; height: 90px; margin-top: -5px; margin-bottom: 10px;"> </center>                            
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inventory -->
        <div class="col-sm-6" style="padding-left: 0; padding-right: 0;">                              
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Inventário</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <?php
                            if ($this->session->has_userdata('message')) {
                                $message = $this->session->flashdata('message');
                                if ($this->session->flashdata('situation') == '1') {
                                    echo "<div class='alert alert-success alert-dismissable' style='margin-left: 15px; margin-right: 15px;'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo $message;
                                    echo "</div>";
                                } else {
                                    echo "<div class='alert alert-danger alert-dismissable' style='margin-left: 15px; margin-right: 15px;'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo $message;
                                    echo "</div>";
                                }
                            }
                            ?>

                            <?php if (!$inventory) { ?>
                                <h5 style="margin-left: 15px; margin-right: 15px;">Você não possui nenhum item no inventário.</h5>
                            <?php } ?>

                            <?php
                            foreach ($inventory as $item) {
                                $id = $item->id;

                                if ($item->unique == 0) {
                                    $icon_unique = "gold";
                                } else {
                                    $icon_unique = "gems";
                                }

                                if ($item->rarity == 1) {
                                    $rarity = "Comum";
                                    $icon_rarity = "commom";
                                } else if ($item->rarity == 2) {
                                    $rarity = "Raro";
                                    $icon_rarity = "rare";
                                } else if ($item->rarity == 3) {
                                    $rarity = "Épico";
                                    $icon_rarity = "epic";
                                } else {
                                    $rarity = "Lendário";
                                    $icon_rarity = "legendary";
                                }
                                ?>

                                <!-- Inventory -->
                                <div class="col-sm-6">
                                    <div class="box box-info">
                                        <div class="box-header with-border text-center">
                                            <div class="col-sm-2 col-sm-offset-5 rarity"><img src="<?= base_url('/icons/' . $icon_rarity . '.png') ?>" style="width: 25px; height: 25px; margin-bottom: 5px;"></div>
                                            <div class="col-sm-12"><h3 class="box-title"><?= $item->name ?></h3></div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $item->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px; margin-bottom: -5px;"> </center>

                                            <hr>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/' . $item->type . '.png') ?>" style="width: 20px; height: 20px;">  <strong>Tipo: </strong> <?= $item->type ?> </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/level.png') ?>" style="width: 20px; height: 20px;">  <strong>Nível: </strong> <?= $item->level ?> </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/' . $icon_unique . '.png') ?>" style="width: 20px; height: 20px;">  <strong>Compra: </strong> <?= $item->buy_price ?> </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/' . $icon_unique . '.png') ?>" style="width: 20px; height: 20px;">  <strong>Venda: </strong> <?= $item->sell_price ?> </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $item->attack ?> </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $item->defense ?> </p>
                                            </div>

                                            <div class="col-sm-6">
                                                <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $item->agility ?> </p>
                                            </div>

                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $item->intelligence ?> </p>
                                            </div>

                                            <hr>

                                            <div class="col-sm-12">
                                                <div class="btn-group btn-block">
                                                    <?php if ($item->equiped == 0) { ?>
                                                        <a href="<?= base_url('/equipment/equip_item/' . $this->session->selected_character . '/' . $item->id . '/' . $item->type_id) ?>" class="btn btn-lg btn-info btn-form" role="button">Equipar</a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $item->id) ?>" class="btn btn-lg btn-warning btn-form" role="button">Desequipar</a>
                                                    <?php } ?>

                                                    <?php if ($item->unique == 0) { ?>
                                                        <a href="<?= base_url('/inventory/sell_item/' . $this->session->selected_character . '/' . $this->session->id . '/' . $item->id) ?>" class="btn btn-lg btn-danger btn-form" data-toggle="confirmation"
                                                           data-title="Vender Item?"
                                                           data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                           data-btn-ok-class="btn-success"
                                                           data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                           data-btn-cancel-class="btn-danger"
                                                           data-popout="true"
                                                           data-singleton="true"
                                                           role="button">
                                                            Vender
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('/inventory/sell_item_unique/' . $this->session->selected_character . '/' . $this->session->id . '/' . $item->id) ?>" class="btn btn-lg btn-danger btn-form" data-toggle="confirmation"
                                                           data-title="Vender Item?"
                                                           data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                           data-btn-ok-class="btn-success"
                                                           data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                           data-btn-cancel-class="btn-danger"
                                                           data-popout="true"
                                                           data-singleton="true"
                                                           role="button">
                                                            Vender
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>