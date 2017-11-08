<!-- Main content -->
<section class="content"> 

    <!-- Items -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Inimigos</h3>
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
                    foreach ($enemies as $enemy) {
                        $id = $enemy->id;
                        ?>

                        <!-- Enemies -->
                        <div class="col-sm-4">
                            <div class="box box-danger">
                                <div class="box-header with-border text-center">
                                    <div class="col-sm-12"><h3 class="box-title"><strong><?= $enemy->name ?></strong></h3></div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/enemies_images/<?= $enemy->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 135px; margin-bottom: -5px;"> </center>

                                    <hr>

                                    <div class="col-sm-6">
                                        <p> <img src="<?= base_url('/icons/health.png') ?>" style="width: 20px; height: 20px;">  <strong>Vida: </strong> <?= $enemy->health ?> </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <p> <img src="<?= base_url('/icons/mana.png') ?>" style="width: 20px; height: 20px;"> <strong>Mana: </strong> <?= $enemy->mana ?> </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $enemy->attack ?> </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $enemy->defense ?> </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $enemy->agility ?> </p>
                                    </div>

                                    <div class="col-sm-6">
                                        <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $enemy->intelligence ?> </p>
                                    </div>

                                    <hr>

                                    <div class="col-sm-12">
                                        <form role="form" method="post" action="<?= base_url('battle_ai') ?>">
                                            <input type="hidden" id="enemy_id" name="enemy_id" value="<?= $enemy->id ?>"/>
                                            <button type="submit" class="btn btn-lg btn-danger btn-fill" data-toggle="confirmation"
                                                    data-title="Iniciar batalha com <?= $enemy->name ?>?"
                                                    data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                    data-btn-ok-class="btn-success"
                                                    data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                    data-btn-cancel-class="btn-danger"
                                                    data-popout="true"
                                                    data-singleton="true"
                                                    role="button">
                                                Batalhar
                                            </button>
                                        </form>
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