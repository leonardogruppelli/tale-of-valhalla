<!-- Main content -->
<section class="content"> 

    <!-- Enemies Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Inimigos</h3>

            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#insertModal" style="float: right; margin-top: -3px">
                <span class="glyphicon glyphicon-plus"></span> Novo Inimigo
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <?php
                if ($this->session->has_userdata('message')) {
                    $message = $this->session->flashdata('message');
                    if ($this->session->flashdata('situation') == '1') {
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
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Ataque</th>
                                <th>Defesa</th>
                                <th>Agilidade</th>
                                <th>Inteligência</th>
                                <th>Vida</th>
                                <th>Mana</th>
                                <th>Poções de HP</th>
                                <th>Poções de MP</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$enemies) { ?>
                                <tr>
                                    <td colspan="12">Nenhum inimigo cadastrado.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($enemies as $enemy) {
                                $id = $enemy->id;
                                ?>

                                <tr>
                                    <td style="vertical-align: middle"> <center> <?= $enemy->id ?> </center> </td>
                            <td style="vertical-align: middle"> <?= $enemy->name ?> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->attack ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->defense ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->agility ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->intelligence ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->health ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->mana ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->hp_potions ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $enemy->mp_potions ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <img src="<?= base_url('/enemies_images/' . $enemy->image) ?>" class="img-rounded img-thumbnail" style="width: 85px; height: 75px;"> </center> </td>
                            <td style="vertical-align: middle" width="15%">
                            <center>
                                <a href="#" data-id="<?= $enemy->id ?>" class="alter-button btn btn-warning" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <a href="<?= base_url('enemies/delete/' . $enemy->id . '') ?>" class="btn btn-danger" data-toggle="confirmation"
                                   data-title="Deletar Inimigo?"
                                   data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-ok"
                                   data-btn-ok-class="btn-success"
                                   data-btn-cancel-label="Não" data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                   data-btn-cancel-class="btn-danger"
                                   data-popout="true"
                                   data-singleton="true"
                                   role="button">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </center>
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modals -->

<!-- Insert -->
<div class="modal fade" id="insertModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inserir Inimigo</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('enemies/insert') ?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="name" autofocus required>
                                <span id="icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_health" class="form-group has-feedback">
                                <label for="health"> Vida: </label>
                                <input type="number" class="form-control" name="health" id="health" min="0" value="0" required>
                                <span id="icon_health" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_mana" class="form-group has-feedback">
                                <label for="mana"> Mana: </label>
                                <input type="number" class="form-control" name="mana" id="mana" min="0" value="0" required>
                                <span id="icon_mana" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_attack" class="form-group has-feedback">
                                <label for="attack"> Ataque: </label>
                                <input type="number" class="form-control" name="attack" id="attack" min="0" value="0" required>
                                <span id="icon_attack" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_defense" class="form-group has-feedback">
                                <label for="defense"> Defesa: </label>
                                <input type="number" class="form-control" name="defense" id="defense" min="0" value="0" required>
                                <span id="icon_defense" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_agility" class="form-group has-feedback">
                                <label for="agility"> Agilidade: </label>
                                <input type="number" class="form-control" name="agility" id="agility" min="0" value="0" required>
                                <span id="icon_agility" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_intelligence" class="form-group has-feedback">
                                <label for="intelligence"> Inteligência: </label>
                                <input type="number" class="form-control" name="intelligence" id="intelligence" min="0" value="0" required>
                                <span id="icon_intelligence" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_hp_potions" class="form-group has-feedback">
                                <label for="hp_potions"> Poções de HP: </label>
                                <input type="number" class="form-control" name="hp_potions" id="hp_potions" min="0" value="0" required>
                                <span id="icon_hp_potions" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_mp_potions" class="form-group has-feedback">
                                <label for="mp_potions"> Poções de MP: </label>
                                <input type="number" class="form-control" name="mp_potions" id="mp_potions" min="0" value="0" required>
                                <span id="icon_mp_potions" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr>

                        <center>
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <img id="picture" src="<?= base_url('icons/user_icon.png') ?>" class="img-rounded img-thumbnail avatar" width="100px" height="100px">
                                    <input type="file" name="image" id="image" class="form-control" accept=".gif,.jpg,.png" required>
                                </div>
                            </div>
                        </center>

                        <hr>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="btn-group btn-block">
                                    <button id="insert_button" type="submit" class="btn btn-lg btn-success btn-form">Cadastrar</button>
                                    <button id="reset_button" type="reset" class="btn btn-lg btn-danger btn-form">Limpar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Alter -->
<div class="modal fade" id="alterModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-yellow">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alterar Inimigo</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('enemies/alter') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="alter_id">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="alter_form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="alter_name" autofocus required>
                                <span id="alter_icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_health" class="form-group has-feedback">
                                <label for="health"> Vida: </label>
                                <input type="number" class="form-control" name="health" id="alter_health" min="0" required>
                                <span id="alter_icon_health" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_mana" class="form-group has-feedback">
                                <label for="mana"> Mana: </label>
                                <input type="number" class="form-control" name="mana" id="alter_mana" min="0" required>
                                <span id="alter_icon_mana" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_attack" class="form-group has-feedback">
                                <label for="attack"> Ataque: </label>
                                <input type="number" class="form-control" name="attack" id="alter_attack" min="0" required>
                                <span id="alter_icon_attack" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_defense" class="form-group has-feedback">
                                <label for="defense"> Defesa: </label>
                                <input type="number" class="form-control" name="defense" id="alter_defense" min="0" required>
                                <span id="alter_icon_defense" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div id="alter_help_defense" class="help-block"></div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_agility" class="form-group has-feedback">
                                <label for="agility"> Agilidade: </label>
                                <input type="number" class="form-control" name="agility" id="alter_agility" min="0" required>
                                <span id="alter_icon_agility" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_intelligence" class="form-group has-feedback">
                                <label for="intelligence"> Inteligência: </label>
                                <input type="number" class="form-control" name="intelligence" id="alter_intelligence" min="0" required>
                                <span id="alter_icon_intelligence" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_hp_potions" class="form-group has-feedback">
                                <label for="hp_potions"> Poções de HP: </label>
                                <input type="number" class="form-control" name="hp_potions" id="alter_hp_potions" min="0" required>
                                <span id="alter_icon_hp_potions" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_mp_potions" class="form-group has-feedback">
                                <label for="mp_potions"> Poções de MP: </label>
                                <input type="number" class="form-control" name="mp_potions" id="alter_mp_potions" min="0" required>
                                <span id="alter_icon_mp_potions" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr>

                        <center>
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <img id="alter_picture" class="img-rounded img-thumbnail avatar" width="150px" height="150px">
                                    <input type="file" name="image" id="alter_image" class="form-control" accept=".gif,.jpg,.png" required>
                                </div>
                            </div>
                        </center>

                        <hr>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="btn-group btn-block">
                                    <button id="alter_button" type="submit" class="btn btn-lg btn-warning btn-form">Alterar</button>
                                    <button id="reset_button" type="reset" class="btn btn-lg btn-danger btn-form">Limpar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>