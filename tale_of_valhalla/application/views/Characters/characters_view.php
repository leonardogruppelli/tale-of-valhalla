<!-- Main content -->
<section class="content"> 

    <!-- Characters -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Personagens</h3>
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
                    if (isset($warrior)) {
                        $warrior_percentage = ($warrior->experience / $warrior->max_experience) * 100;
                        ?>

                        <div class="row row-inside">
                            <div class="col-sm-6">
                                <div class="box box-danger">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= $warrior->class ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center> <img src="<?= base_url('/characters_images/1.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                        <hr>

                                        <div class="col-sm-12">
                                            <center>
                                                <div class="level"> <?= $warrior->level ?> </div>
                                            </center>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $warrior->experience ?>" aria-valuemin="0" aria-valuemax="<?= $warrior->max_experience ?>" style="width: <?= $warrior_percentage ?>%">
                                                </div>
                                            </div>
                                            <h4 style="float: left; margin-top: -10px; margin-bottom: 20px"><?= $warrior->experience ?></h4>    
                                            <h4 style="float: right; margin-top: -10px; margin-bottom: 20px"><?= $warrior->max_experience ?></h4>
                                        </div>

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

                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $warrior->intelligence ?> </p>
                                        </div>

                                        <hr>

                                        <div class="col-sm-12">
                                            <a href="<?= base_url('characters/select_character/' . $this->session->id . '/' . $warrior->class_id) ?>" class="buy-button btn btn-lg btn-info btn-fill" role="button">
                                                Selecionar
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="row row-inside">
                                <div class="col-sm-6">
                                    <div class="box box-danger">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Guerreiro</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/characters_images/1.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                            <hr>

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('characters/create_warrior/' . $this->session->id . '/' . 1) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                                    Criar
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php
                            if (isset($archer)) {
                                $archer_percentage = ($archer->experience / $archer->max_experience) * 100;
                                ?>

                                <div class="col-sm-6">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><?= $archer->class ?></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/characters_images/2.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                            <hr>

                                            <div class="col-sm-12">
                                                <center>
                                                    <div class="level"> <?= $archer->level ?> </div>
                                                </center>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?= $archer->experience ?>" aria-valuemin="0" aria-valuemax="<?= $archer->max_experience ?>" style="width: <?= $archer_percentage ?>%">
                                                    </div>
                                                </div>
                                                <h4 style="float: left; margin-top: -10px; margin-bottom: 20px"><?= $archer->experience ?></h4>    
                                                <h4 style="float: right; margin-top: -10px; margin-bottom: 20px"><?= $archer->max_experience ?></h4>
                                            </div>

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

                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $archer->intelligence ?> </p>
                                            </div>

                                            <hr>

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('characters/select_character/' . $this->session->id . '/' . $archer->class_id) ?>" class="buy-button btn btn-lg btn-info btn-fill" role="button">
                                                    Selecionar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="col-sm-6">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Arqueiro</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center> <img src="<?= base_url('/characters_images/2.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                        <hr>

                                        <div class="col-sm-12">
                                            <a href="<?= base_url('characters/create_archer/' . $this->session->id . '/' . 2) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                                Criar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <?php
                    if (isset($mage)) {
                        $mage_percentage = ($mage->experience / $mage->max_experience) * 100;
                        ?>

                        <div class="row row-inside">
                            <div class="col-sm-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><?= $mage->class ?></h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center> <img src="<?= base_url('/characters_images/3.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                        <hr>

                                        <div class="col-sm-12">
                                            <center>
                                                <div class="level"> <?= $mage->level ?> </div>
                                            </center>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $mage->experience ?>" aria-valuemin="0" aria-valuemax="<?= $mage->max_experience ?>" style="width: <?= $mage_percentage ?>%">
                                                </div>
                                            </div>
                                            <h4 style="float: left; margin-top: -10px; margin-bottom: 20px"><?= $mage->experience ?></h4>    
                                            <h4 style="float: right; margin-top: -10px; margin-bottom: 20px"><?= $mage->max_experience ?></h4>
                                        </div>

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

                                        <div class="col-sm-6" style="margin-bottom: 10px;">
                                            <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $mage->intelligence ?> </p>
                                        </div>

                                        <hr>

                                        <div class="col-sm-12">
                                            <a href="<?= base_url('characters/select_character/' . $this->session->id . '/' . $mage->class_id) ?>" class="buy-button btn btn-lg btn-info btn-fill" role="button">
                                                Selecionar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php } else { ?>

                            <div class="row row-inside">
                                <div class="col-sm-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Mago</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/characters_images/3.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                            <hr>

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('characters/create_mage/' . $this->session->id . '/' . 3) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                                    Criar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php } ?>

                            <?php
                            if (isset($assassin)) {
                                $assassin_percentage = ($assassin->experience / $assassin->max_experience) * 100;
                                ?>

                                <div class="col-sm-6">
                                    <div class="box box-warning">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><?= $assassin->class ?></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <center> <img src="<?= base_url('/characters_images/4.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                            <hr>

                                            <div class="col-sm-12">
                                                <center>
                                                    <div class="level"> <?= $assassin->level ?> </div>
                                                </center>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?= $assassin->experience ?>" aria-valuemin="0" aria-valuemax="<?= $assassin->max_experience ?>" style="width: <?= $assassin_percentage ?>%">
                                                    </div>
                                                </div>
                                                <h4 style="float: left; margin-top: -10px; margin-bottom: 20px"><?= $assassin->experience ?></h4>    
                                                <h4 style="float: right; margin-top: -10px; margin-bottom: 20px"><?= $assassin->max_experience ?></h4>
                                            </div>

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

                                            <div class="col-sm-6" style="margin-bottom: 10px;">
                                                <p> <img src="<?= base_url('/icons/intelligence.png') ?>" style="width: 20px; height: 20px;"> <strong>Inteligência: </strong> <?= $assassin->intelligence ?> </p>
                                            </div>

                                            <hr>

                                            <div class="col-sm-12">
                                                <a href="<?= base_url('characters/select_character/' . $this->session->id . '/' . $assassin->class_id) ?>" class="buy-button btn btn-lg btn-info btn-fill" role="button">
                                                    Selecionar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } else { ?>

                            <div class="col-sm-6">
                                <div class="box box-warning">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Assassino</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <center> <img src="<?= base_url('/characters_images/4.png') ?>" class="img-rounded img-thumbnail" style="width: 200px; height: 250px; margin-bottom: -5px;"> </center>

                                        <hr>

                                        <div class="col-sm-12">
                                            <a href="<?= base_url('characters/create_assassin/' . $this->session->id . '/' . 4) ?>" class="buy-button btn btn-lg btn-success btn-fill" role="button">
                                                Criar
                                            </a>
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