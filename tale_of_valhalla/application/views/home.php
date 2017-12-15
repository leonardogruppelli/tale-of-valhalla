<!-- Main content -->
<section class="content"> 

    <!-- Stats -->
    <?php if (isset($character)) { ?>

        <div class="row">
            <div class="col-sm-4" style="padding-right: 0">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados do Personagem</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-sm-12" style="padding-left: 0; margin-bottom: 20px">
                            <div class="col-sm-7 col-sm-offset-2">
                                <img src="<?= base_url('/characters_images/' . $character->class_id . '.png') ?>" class="img-circle img-thumbnail" style="border-radius: 50% !important; width: 250px; height: 200px; margin-bottom: -5px;">
                            </div>

                            <div class="col-sm-1" style="padding-left: 0">
                                <center>
                                    <div class="level"> <?= $character->level ?> </div>
                                </center>
                            </div>
                        </div>

                        <div class="col-sm-12" style="margin-bottom: 10px">
                            <h2 style="margin-top: 0; margin-bottom: 30px">Atributos</h2>

                            <div class="col-sm-6">
                                <p> <img src="<?= base_url('/icons/health.png') ?>" style="width: 20px; height: 20px;">  <strong>Vida: </strong> <?= $character->health ?> </p>
                            </div>

                            <div class="col-sm-6">
                                <p> <img src="<?= base_url('/icons/mana.png') ?>" style="width: 20px; height: 20px;"> <strong>Mana: </strong> <?= $character->mana ?> </p>
                            </div>

                            <div class="col-sm-6">
                                <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $character->attack ?> </p>
                            </div>

                            <div class="col-sm-6">
                                <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $character->defense ?> </p>
                            </div>

                            <div class="col-sm-6">
                                <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $character->agility ?> </p>
                            </div>

                            <div class="col-sm-6">
                                <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $character->intelligence ?> </p>
                            </div>

                            <div class="col-sm-6"">
                                <p> <img src="<?= base_url('/icons/adventures.png') ?>" style="width: 20px; height: 20px;"> <strong>Aventuras Vencidas: </strong> <?= $character->ai_battle_wins ?> </p>
                            </div>

                            <div class="col-sm-6"">
                                <p> <img src="<?= base_url('/icons/battles.png') ?>" style="width: 20px; height: 20px;"> <strong>Batalhas Vencidas: </strong> <?= $character->battle_wins ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="col-sm-4" style="padding-left: 10px; padding-right: 0">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Personagem mais Forte</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-7 col-sm-offset-2">
                            <img src="<?= base_url('/characters_images/' . $top_stats->class_id . '.png') ?>" class="img-circle img-thumbnail" style="border-radius: 50% !important; width: 200px; height: 150px; margin-bottom: 15px;">
                        </div>

                        <div class="col-sm-1" style="padding-left: 0">
                            <center>
                                <div class="level"> <?= $top_stats->level ?> </div>
                            </center>
                        </div>
                    </div>
                    <?php if ($top_stats->user_id !== $this->session->id) {
                            ?>
                            <div class="col-sm-12" style="margin-bottom: 15px">
                                <form role="form" method="post" action="<?= base_url('battle') ?>">
                                    <input type="hidden" id="opponent_id" name="opponent_id" value="<?= $top_stats->id ?>"/>
                                    <button type="submit" class="btn btn-lg btn-danger btn-fill" style="margin-bottom: 0" data-toggle="confirmation"
                                            data-title="Iniciar batalha com o personagem de <?= $top_stats->user ?>?"
                                            data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                            data-btn-ok-class="btn-success"
                                            data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                            data-btn-cancel-class="btn-danger"
                                            data-popout="true"
                                            data-singleton="true"
                                            role="button">
                                        <i class="ra ra-crossed-axes ra-2x" style="margin-left: 0; margin-right: 0"></i>
                                    </button>
                                </form>
                            </div>
                            <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-sm-4" style="padding-left: 10px; padding-right: 10px">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Personagem com mais Aventuras Vencidas</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-7 col-sm-offset-2">
                            <img src="<?= base_url('/characters_images/' . $top_ai_wins->class_id . '.png') ?>" class="img-circle img-thumbnail" style="border-radius: 50% !important; width: 200px; height: 150px; margin-bottom: 15px;">
                        </div>

                        <div class="col-sm-1" style="padding-left: 0">
                            <center>
                                <div class="level"> <?= $top_ai_wins->level ?> </div>
                            </center>
                        </div>

                        <?php if ($top_ai_wins->user_id !== $this->session->id) { ?>
                                <div class="col-sm-12" style="padding-left: 0; padding-right: 0; margin-bottom: 15px">
                                    <form role="form" method="post" action="<?= base_url('battle') ?>">
                                        <input type="hidden" id="opponent_id" name="opponent_id" value="<?= $top_ai_wins->id ?>"/>
                                        <button type="submit" class="btn btn-lg btn-danger btn-fill" style="margin-bottom: 0" data-toggle="confirmation"
                                                data-title="Iniciar batalha com o personagem de <?= $top_stats->user ?>?"
                                                data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                data-btn-ok-class="btn-success"
                                                data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                data-btn-cancel-class="btn-danger"
                                                data-popout="true"
                                                data-singleton="true"
                                                role="button">
                                            <i class="ra ra-crossed-axes ra-2x" style="margin-left: 0; margin-right: 0"></i>
                                        </button>
                                    </form>
                                </div>
                                <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4" style="padding-left: 10px; padding-right: 0; margin-top: -10px">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Personagem com mais Batalhas Vencidas</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-7 col-sm-offset-2">
                            <img src="<?= base_url('/characters_images/' . $top_wins->class_id . '.png') ?>" class="img-circle img-thumbnail" style="border-radius: 50% !important; width: 200px; height: 150px; margin-bottom: 15px;">
                        </div>

                        <div class="col-sm-1" style="padding-left: 0">
                            <center>
                                <div class="level"> <?= $top_wins->level ?> </div>
                            </center>
                        </div>

                        <?php if ($top_wins->user_id !== $this->session->id) {?>
                                <div class="col-sm-12" style="padding-left: 0; padding-right: 0; margin-bottom: 15px">
                                    <form role="form" method="post" action="<?= base_url('battle') ?>">
                                        <input type="hidden" id="opponent_id" name="opponent_id" value="<?= $top_wins->id ?>"/>
                                        <button type="submit" class="btn btn-lg btn-danger btn-fill" style="margin-bottom: 0" data-toggle="confirmation"
                                                data-title="Iniciar batalha com o personagem de <?= $top_stats->user ?>?"
                                                data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                                data-btn-ok-class="btn-success"
                                                data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                data-btn-cancel-class="btn-danger"
                                                data-popout="true"
                                                data-singleton="true"
                                                role="button">
                                            <i class="ra ra-crossed-axes ra-2x" style="margin-left: 0; margin-right: 0"></i>
                                        </button>
                                    </form>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>