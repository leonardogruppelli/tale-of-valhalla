<!-- Main content -->
<section class="content"> 

    <!-- Users Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Usuários</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <?php
                if ($this->session->has_userdata('message')) {
                    $message = $this->session->flashdata('message');
                    if ($this->session->flashdata('situation') == '1') {
                        echo "<div class='alert alert-success alert-dismissable'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo $message;
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-danger alert-dismissable'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
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
                                <th>Runas</th>
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
                            <td style="vertical-align: middle"> <center> <?= $user->runes ?> </center> </td>
                            <td> <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla/pictures/<?= $user->picture ?>" class="img-circle img-thumbnail" style="width: 85px; height: 75px;"> </center> </td>
                            <td style="vertical-align: middle" width="15%">
                            <center>
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