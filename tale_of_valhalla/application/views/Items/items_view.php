<div class="row" style="padding-top: 20px;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Itens
            </div>
            <div class="panel-body">
                <?php
                if ($this->session->has_userdata('message')) {
                    $message = $this->session->flashdata('message');
                    if ($this->session->flashdata('type') == '1') {
                        echo "<div class = 'alert alert-success'>";
                        echo $message;
                        echo "</div>";
                    } else {
                        echo "<div class = 'alert alert-danger'>";
                        echo $message;
                        echo "</div>";
                    }
                }
                ?>

                <?php
                foreach ($items as $item) {
                    $id = $item->id;

                    if ($item->type_id == 1) {
                        $type = "Elmo";
                        $icon_type = "helmet";
                    } else if ($item->type_id == 2) {
                        $type = "Armadura";
                        $icon_type = "armor";
                    } else if ($item->type_id == 3) {
                        $type = "Calça";
                        $icon_type = "pants";
                    } else if ($item->type_id == 4) {
                        $type = "Luvas";
                        $icon_type = "gloves";
                    } else if ($item->type_id == 5) {
                        $type = "Botas";
                        $icon_type = "boots";
                    } else {
                        $type = "Arma";
                        $icon_type = "weapon";
                    }

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

                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <a class="rarity"><img src="<?= base_url('/icons/' . $icon_rarity . '.png') ?>" style="width: 25px; height: 25px; margin-bottom: 5px"></a> <br>
                                <strong><?= $item->name ?></strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $item->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                                <hr>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/' . $icon_type . '.png') ?>" style="width: 20px; height: 20px;">  <strong>Tipo: </strong> <?= $type ?> </p>
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

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $item->intelligence ?> </p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <?php
                                if ($item->unique == 0) {
                                    if ($this->session->gold < $item->buy_price) {
                                        ?>
                                        <a href="#" class="buy-button btn btn-lg btn-success btn-fill" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Você não possui Ouro suficiente." disabled>
                                            Comprar
                                        </a>
                                    <?php } else {
                                        ?>
                                        <a href="#" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                            Comprar
                                        </a>
                                        <?php
                                    }
                                } else {
                                    if ($this->session->gems < $item->buy_price) {
                                        ?>
                                        <a href="#" class="buy-button btn btn-lg btn-success btn-fill" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Você não possui Gemas suficientes." disabled>
                                            Comprar
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                            Comprar
                                        </a>
                                        <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>   