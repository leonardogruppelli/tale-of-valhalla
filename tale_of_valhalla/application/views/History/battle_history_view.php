<!-- Main content -->
<section class="content"> 

    <!-- AI Battle History Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Histórico de Batalhas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Oponente</th>
                                <th>Dano Causado</th>
                                <th>Dano Recebido</th>
                                <th>Poções Utilizadas</th>
                                <th>Poções Utilizadas do Inimigo</th>
                                <th>Experiência Recebida</th>
                                <th>Ouro Recebido</th>
                                <th>Turnos</th>
                                <th>Venceu</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$battle_history) { ?>
                                <tr>
                                    <td colspan="10">Nenhuma batalha encontrada.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($battle_history as $battle_history) {
                                $won_class;
                                $won;
                                if ($battle_history->winner == $this->session->selected_character) {
                                    $won_class = "success";
                                    $won = "Sim";
                                } else {
                                    $won_class = "danger";
                                    $won = "Não";
                                }

                                $character_potions = $battle_history->player_one_hp_potions + $battle_history->player_one_large_hp_potions + $battle_history->player_one_mp_potions + $battle_history->player_one_large_mp_potions + $battle_history->player_one_dexterity_potions + $battle_history->player_one_luck_potions;
                                $opponent_potions = $battle_history->player_two_hp_potions + $battle_history->player_two_large_hp_potions + $battle_history->player_two_mp_potions + $battle_history->player_two_large_mp_potions + $battle_history->player_two_dexterity_potions + $battle_history->player_two_luck_potions;
                                ?>

                                <tr class="<?= $won_class ?>">
                                    <td style="vertical-align: middle"> <?= $battle_history->user ?> </td>
                                    <td style="vertical-align: middle"> <?= $battle_history->player_one_damage ?> </td>
                                    <td style="vertical-align: middle"> <?= $battle_history->player_two_damage ?> </td>
                                    <td style="vertical-align: middle"> <?= $character_potions ?> </td>
                                    <td style="vertical-align: middle"> <?= $opponent_potions ?> </td>
                                    <td style="vertical-align: middle"> <?= $battle_history->experience_earned ?> </td>
                                    <td style="vertical-align: middle"> <?= $battle_history->gold_earned ?> </td>
                                    <td style="vertical-align: middle"> <?= $battle_history->turns ?> </td>
                                    <td style="vertical-align: middle"> <?= $won ?> </td>
                                    <td style="vertical-align: middle"> <?= date_format(new DateTime($battle_history->date), 'd/m/Y G:ia') ?> </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>