<!-- Main content -->
<section class="content"> 

    <!-- Items -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Loja</h3>
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

                    <?php if (!$items) { ?>
                        <h5 style="margin-left: 15px; margin-right: 15px;">Nenhum item disponível.</h5>
                    <?php } ?>

                    <?php
                    foreach ($items as $item) {
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

                        <!-- Items -->
                        <div class="col-sm-4">
                            <div class="box box-success">
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
                                        <?php if ($item->class_id != $this->session->selected_class) { ?>
                                            <a href="#" class="btn btn-lg btn-success btn-fill" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Item indisponível para a classe selecionada." disabled>
                                                Comprar
                                            </a>
                                            <?php
                                        } else {
                                            if ($item->unique == 0) {
                                                if ($this->session->gold < $item->buy_price) {
                                                    ?>
                                                    <a href="#" class="btn btn-lg btn-success btn-fill" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Você não possui Ouro suficiente." disabled>
                                                        Comprar
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('/items/buy_item/' . $this->session->selected_character . '/' . $this->session->id . '/' . $item->id) ?>" class="buy-button btn btn-lg btn-success btn-fill" data-toggle="confirmation"
                                                       data-title="Comprar Item?"
                                                       data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                       data-btn-ok-class="btn-success"
                                                       data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                       data-btn-cancel-class="btn-danger"
                                                       data-popout="true"
                                                       data-singleton="true"
                                                       role="button">
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
                                                    <a href="<?= base_url('/items/buy_item_unique/' . $this->session->selected_character . '/' . $this->session->id . '/' . $item->id) ?>" class="buy-button btn btn-lg btn-success btn-fill" data-toggle="confirmation"
                                                       data-title="Comprar Item?"
                                                       data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                       data-btn-ok-class="btn-success"
                                                       data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                       data-btn-cancel-class="btn-danger"
                                                       data-popout="true"
                                                       data-singleton="true"
                                                       role="button">
                                                        Comprar
                                                    </a>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>

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