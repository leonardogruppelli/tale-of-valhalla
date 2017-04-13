<!-- Main content -->
<section class="content"> 

    <!-- Users Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Usuários</h3>

            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#insertModal" style="float: right; margin-top: -3px">
                <span class="glyphicon glyphicon-plus"></span> Novo Usuário
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
                                <th>Nome de Usuário</th>
                                <th>E-mail</th>
                                <th>Ouro</th>
                                <th>Gemas</th>
                                <th>Foto</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$users) { ?>
                                <tr>
                                    <td colspan="8">Nenhum usuário cadastrado.</td>
                                </tr>
                            <?php } ?>
                            <?php foreach ($users as $user) { ?>

                                <?php $id = $user->id; ?>
                                <tr>
                                    <td style="vertical-align: middle"> <center> <?= $user->id ?> </center> </td>
                            <td style="vertical-align: middle"> <?= $user->name ?> </td>
                            <td style="vertical-align: middle"> <?= $user->username ?> </td>
                            <td style="vertical-align: middle"> <?= $user->email ?> </td>
                            <td style="vertical-align: middle"> <center> <?= $user->gold ?> </center> </td>
                            <td style="vertical-align: middle"> <center> <?= $user->gems ?> </center> </td>
                            <td> <center> <img src="<?= base_url('/pictures/' . $user->picture) ?>" class="img-circle img-thumbnail" style="width: 85px; height: 75px;"> </center> </td>
                            <td style="vertical-align: middle" width="15%">
                            <center>
                                <a href="#" data-id="<?= $user->id ?>" class="alter-button btn btn-warning" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <a href="<?= base_url('users/delete/' . $user->id . '') ?>" class="btn btn-danger" data-toggle="confirmation"
                                   data-title="Deletar Usuário?"
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
                <h4 class="modal-title">Inserir Usuário</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('users/insert') ?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="name" autofocus required>
                                <span id="icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="form_username" class="form-group has-feedback">
                                <label for="username"> Nome de Usuário: </label>
                                <input type="text" class="form-control" name="username" id="username" maxlength="15" required>
                                <span id="icon_username" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div id="form_email" class="form-group has-feedback">
                                <label for="email"> E-mail: </label>
                                <input type="email" class="form-control" name="email" id="email" required>
                                <span id="icon_email" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="form_password" class="form-group has-feedback">
                                <label for="password"> Senha: </label>
                                <input type="password" class="form-control" name="password" id="password" minlength="6" maxlength="20" required>
                                <span id="icon_password" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="form_confirm_password" class="form-group has-feedback">
                                <label for="confirm_password"> Confirmar Senha: </label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
                                <span id="icon_confirm_password" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="form_gold" class="form-group has-feedback">
                                <label for="gold"> Ouro: </label>
                                <input type="number" class="form-control" name="gold" id="gold" min="0" value="0">
                                <span id="icon_gold" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="form_gems" class="form-group has-feedback">
                                <label for="gems"> Gemas: </label>
                                <input type="number" class="form-control" name="gems" id="gems" min="0" value="0">
                                <span id="icon_gems" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr>

                        <center>
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <img id="image" src="<?= base_url('icons/user_icon.png') ?>" class="img-rounded img-thumbnail avatar" width="150px" height="150px">
                                    <input type="file" name="picture" id="picture" class="form-control" accept=".gif,.jpg,.png" required>
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
                <h4 class="modal-title">Alterar Usuário</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('users/alter') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="alter_id">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="alter_form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="alter_name" required>
                                <span id="alter_icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="alter_form_username" class="form-group has-feedback">
                                <label for="username"> Nome de Usuário: </label>
                                <input type="text" class="form-control" name="username" id="alter_username" required>
                                <span id="alter_icon_username" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div id="alter_form_email" class="form-group has-feedback">
                                <label for="email"> E-mail: </label>
                                <input type="email" class="form-control" name="email" id="alter_email" required>
                                <span id="alter_icon_email" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="alter_form_gold" class="form-group has-feedback">
                                <label for="gold"> Ouro: </label>
                                <input type="number" class="form-control" name="gold" id="alter_gold" min="0" value="0">
                                <span id="alter_icon_gold" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="alter_form_gems" class="form-group has-feedback">
                                <label for="gems"> Gemas: </label>
                                <input type="number" class="form-control" name="gems" id="alter_gems" min="0" value="0">
                                <span id="alter_icon_gold" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

                        <hr>

                        <center>
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="form-group">
                                    <img id="alter_image" class="img-rounded img-thumbnail avatar" width="150px" height="150px">
                                    <input type="file" name="picture" id="alter_picture" class="form-control" accept=".gif,.jpg,.png" required>
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