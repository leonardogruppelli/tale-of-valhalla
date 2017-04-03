<div class="row" style="padding-top: 20px;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Personagens
            </div>
            <div class="panel-body">
                <?php if (isset($warrior)) { ?>

                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong><?= $warrior->class ?></strong>
                            </div>
                            <div class="panel-body panel-custom panel-warrior">
                                <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                                
                                <hr>
                                
                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $warrior->attack ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $warrior->defense ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $warrior->agility ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $warrior->intelligence ?> </p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/select_character/' . $warrior->class_id . '') ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Selecionar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } else { ?>
                
                <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Guerreiro</strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/create_warrior/' . $this->session->id . '/' . 1) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Criar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } ?>
                
                <?php if (isset($archer)) { ?>

                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong><?= $archer->class ?></strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/archer.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                                
                                <hr>
                                
                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $archer->attack ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $archer->defense ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $archer->agility ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $archer->intelligence ?> </p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/select_character/' . $archer->class_id . '') ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Selecionar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } else { ?>
                
                <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Arqueiro</strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/archer.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/create_archer/' . $this->session->id . '/' . 2) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Criar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } ?>
                
                <?php if (isset($mage)) { ?>

                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong><?= $mage->class ?></strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/mage.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                                
                                <hr>
                                
                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $mage->attack ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $mage->defense ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $mage->agility ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $mage->intelligence ?> </p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/select_character/' . $mage->class_id . '') ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Selecionar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } else { ?>
                
                <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Mago</strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/mage.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/create_mage/' . $this->session->id . '/' . 3) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Criar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } ?>
                
                <?php if (isset($assassin)) { ?>

                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong><?= $assassin->class ?></strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/assassin.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                                
                                <hr>
                                
                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/attack.png') ?>" style="width: 20px; height: 20px;">  <strong>Ataque: </strong> <?= $assassin->attack ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/defense.png') ?>" style="width: 20px; height: 20px;"> <strong>Defesa: </strong> <?= $assassin->defense ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/agility.png') ?>" style="width: 20px; height: 20px;"> <strong>Agilidade: </strong> <?= $assassin->agility ?> </p>
                                </div>

                                <div class="col-sm-6">
                                    <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $assassin->intelligence ?> </p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/select_character/' . $assassin->class_id . '') ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Selecionar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } else { ?>
                
                <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <strong>Assassino</strong>
                            </div>
                            <div class="panel-body panel-custom">
                                <center> <img src="<?= base_url('/backgrounds/assassin.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                            </div>
                            <div class="panel-footer">
                                <a href="<?= base_url('characters/create_assassin/' . $this->session->id . '/' . 4) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                    Criar
                                </a>
                            </div>
                        </div>
                    </div>
                
                <?php } ?>
            </div>
        </div>
    </div>
</div>