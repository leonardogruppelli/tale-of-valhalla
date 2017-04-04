<div class="row" style="padding-top: 20px;">
    <div class="col-lg-12">
        <div class="panel panel-base panel-default">
            <div class="panel-heading">
                Tabela de Tipos
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#insertModal" style="float: right; margin-top: -3px">
                    <span class="glyphicon glyphicon-plus"></span> Novo Tipo
                </button>
            </div>
            <div class="panel-body">
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
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$types) { ?>
                                <tr>
                                    <td colspan="3">Nenhum tipo cadastrado.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($types as $type) {
                                $id = $type->id;
                                ?>

                                <tr>
                                    <td style="vertical-align: middle" width="10%"> <center> <?= $type->id ?> </center> </td>
                            <td style="vertical-align: middle"> <?= $type->name ?> </td>
                            <td style="vertical-align: middle" width="20%">
                            <center>
                                <a href="#" data-id="<?= $type->id ?>" class="alter-button btn btn-warning" role="button">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                                <a href="<?= base_url('types/delete/' . $type->id . '') ?>" class="btn btn-danger" data-toggle="confirmation"
                                   data-title="Deletar Tipo?"
                                   data-btn-ok-label="Sim" data-btn-ok-icon="glyphicon glyphicon-share-alt"
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
</div>

<!-- Modals -->

<!-- Insert -->
<div class="modal fade" id="insertModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inserir Tipo</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('types/insert') ?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="name" autofocus required>
                                <span id="icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

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
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Alterar Tipo</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url('types/alter') ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="alter_id">
                    <div class="row">

                        <div class="col-sm-6">
                            <div id="alter_form_name" class="form-group has-feedback">
                                <label for="name"> Nome: </label>
                                <input type="text" class="form-control" name="name" id="alter_name" autofocus required>
                                <span id="alter_icon_name" class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>

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