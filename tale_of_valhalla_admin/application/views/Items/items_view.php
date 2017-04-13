<!-- Main content -->
<section class="content"> 

    <!-- Items Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Items</h3>

            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#insertModal" style="float: right; margin-top: -3px">
                <span class="glyphicon glyphicon-plus"></span> Novo Item
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
                                <th>Tipo</th>
                                <th>Classe</th>
                                <th>Raridade</th>
                                <th>Compra</th>
                                <th>Venda</th>
                                <th>Nível</th>
                                <th>Atq.</th>
                                <th>Def.</th>
                                <th>Agi.</th>
                                <th>Int.</th>
                                <th>Único</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$items) { ?>
                                <tr>
                                    <td colspan="15">Nenhum item cadastrado.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($items as $item) {
                                $id = $item->id;

                                if ($item->rarity == 1) {
                                    $rarity = "Comum";
                                } else if ($item->rarity == 2) {
                                    $rarity = "Raro";
                                } else if ($item->rarity == 3) {
                                    $rarity = "Épico";
                                } else {
                                    $rarity = "Lendário";
                                }
                                ?>

                                <tr>
                                    <td style="vertical-align: middle"> <center> <?= $item->id ?> </center> </td>
                            <td style="vertical-align: middle"> <?= $item->name ?> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->type ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->class ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $rarity ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->buy_price ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->sell_price ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->level ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->attack ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->defense ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->agility ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->intelligence ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $item->unique == 0 ? "Não" : "Sim" ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <img src="<?= base_url('/items_images/' . $item->image) ?>" class="img-rounded img-thumbnail" style="width: 85px; height: 75px;"> </center> </td>
                            <td style="vertical-align: middle" width="15%">
                            <center>
                                <a href="#" data-id="<?= $item->id ?>" class="alter-button btn btn-warning" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <a href="<?= base_url('items/delete/' . $item->id . '') ?>" class="btn btn-danger" data-toggle="confirmation"
                                   data-title="Deletar Item?"
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
                <h4 class="modal-title">Inserir Item</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('items/insert') ?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="name" autofocus required>
                                <span id="icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="type"> Tipo: </label>
                                <select class="form-control" name="type_id" id="type" required>
                                    <option value=""> Selecione o tipo do Item </option>
                                    <?php foreach ($types as $type) { ?>
                                        <option value="<?= $type->id ?>"> <?= $type->name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="class"> Classe: </label>
                                <select class="form-control" name="class_id" id="class" required>
                                    <option value=""> Selecione a classe do Item </option>
                                    <?php foreach ($classes as $class) { ?>
                                        <option value="<?= $class->id ?>"> <?= $class->name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rarity"> Raridade: </label>
                                <select class="form-control" name="rarity" id="rarity" required>
                                    <option value=""> Selecione a raridade do Item </option>
                                    <option value="1"> Comum </option>
                                    <option value="2"> Raro </option>
                                    <option value="3"> Épico </option>
                                    <option value="4"> Lendário </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="form_buy_price" class="form-group has-feedback">
                                <label for="buy_price"> Compra: </label>
                                <input type="number" class="form-control" name="buy_price" id="buy_price" min="0" value="0" required>
                                <span id="icon_buy_price" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sell_price"> Venda: </label>
                                <input type="number" class="form-control" name="sell_price" id="sell_price" value="0" readonly>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div id="form_level" class="form-group has-feedback">
                                <label for="level"> Nível: </label>
                                <input type="number" class="form-control" name="level" id="level" min="0" max="99" value="0" required>
                                <span id="icon_level" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="unique"> Único: </label>
                                <select class="form-control" name="unique" id="unique" required>
                                    <option value="0"> Não </option>
                                    <option value="1"> Sim </option>
                                </select>
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

                        <hr>

                        <center>
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <img id="picture" src="<?= base_url('icons/item_icon.png') ?>" class="img-rounded img-thumbnail avatar" width="100px" height="100px">
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
                <h4 class="modal-title">Alterar Item</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('items/alter') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="alter_id">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="alter_form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="alter_name" autofocus required>
                                <span id="alter_icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="type"> Tipo: </label>
                                <select class="form-control" name="type_id" id="alter_type" required>
                                    <option> Selecione o tipo de Item </option>
                                    <?php foreach ($types as $type) { ?>
                                        <option value="<?= $type->id ?>"> <?= $type->name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="class"> Classe: </label>
                                <select class="form-control" name="class_id" id="alter_class" required>
                                    <option value=""> Selecione a classe do Item </option>
                                    <?php foreach ($classes as $class) { ?>
                                        <option value="<?= $class->id ?>"> <?= $class->name ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="rarity"> Raridade: </label>
                                <select class="form-control" name="rarity" id="alter_rarity" required>
                                    <option> Selecione a raridade do Item </option>
                                    <option value="1"> Comum </option>
                                    <option value="2"> Raro </option>
                                    <option value="3"> Épico </option>
                                    <option value="4"> Lendário </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_buy_price" class="form-group has-feedback">
                                <label for="buy_price"> Compra: </label>
                                <input type="number" class="form-control" name="buy_price" id="alter_buy_price" min="0" required>
                                <span id="alter_icon_buy_price" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sell_price"> Venda: </label>
                                <input type="number" class="form-control" name="sell_price" id="alter_sell_price" min="0" readonly>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div id="alter_form_level" class="form-group has-feedback">
                                <label for="level"> Nível: </label>
                                <input type="number" class="form-control" name="level" id="alter_level" min="0" max="99" required>
                                <span id="alter_icon_level" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="unique"> Único: </label>
                                <select class="form-control" name="unique" id="alter_unique" required>
                                    <option value="0"> Não </option>
                                    <option value="1"> Sim </option>
                                </select>
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