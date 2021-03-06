<!-- Main content -->
<section class="content"> 

    <!-- Items -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Oponentes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Personagem</th>
                                <th>Usuário</th>
                                <th>Classe</th>
                                <th>Nível</th>
                                <th>Vida</th>
                                <th>Mana</th>
                                <th>Ataque</th>
                                <th>Defesa</th>
                                <th>Agilidade</th>
                                <th>Inteligência</th>
                                <th>Batalhar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$characters) { ?>
                                <tr>
                                    <td colspan="10">Nenhum personagem encontrado.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            $index = 0;
                            foreach ($characters as $character) {
                                ?>

                                <tr>
                                    <td style="vertical-align: middle; position: relative; top: 0; left: 0;" width="7%"> 
                            <center> 
                                <img src="<?= base_url('/characters_images/' . $character->class_id . '_cropped.png') ?>" class="img-rounded" style="width: 100%; height: 100%"> 
                            </center> 
                            </td>
                            <td style="vertical-align: middle"> <?= $character->user ?> </td>
                            <td style="vertical-align: middle"> <?= $character->class ?> </td>
                            <td style="vertical-align: middle"> <?= $character->level ?> </td>
                            <td style="vertical-align: middle"> <?= $character->health ?> </td>
                            <td style="vertical-align: middle"> <?= $character->mana ?> </td>
                            <td style="vertical-align: middle"> <?= $character->attack ?> </td>
                            <td style="vertical-align: middle"> <?= $character->defense ?> </td>
                            <td style="vertical-align: middle"> <?= $character->agility ?> </td>
                            <td style="vertical-align: middle"> <?= $character->intelligence ?> </td>
                            <td style="vertical-align: middle" width="10%">
                            <center>
                                <form role="form" method="post" action="<?= base_url('battle') ?>">
                                    <input type="hidden" id="opponent_id" name="opponent_id" value="<?= $character->id ?>"/>
                                    <button type="submit" class="btn btn-lg btn-danger btn-fill" style="margin-bottom: 0" data-toggle="confirmation"
                                            data-title="Iniciar batalha com o personagem de <?= $character->user ?>?"
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
                            </center>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>   