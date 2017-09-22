<!-- Main content -->
<section class="content"> 

    <!-- Inventory -->
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
                        <div class="col-sm-4">
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
                                                   data-title="Vender Item? (<?= $item->sell_price ?>g)"
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
                                                   data-title="Vender Item? (<?= $item->sell_price ?>g)"
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
</section>