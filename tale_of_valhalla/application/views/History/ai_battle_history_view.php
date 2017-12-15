<!-- Main content -->
<section class="content"> 

    <!-- AI Battle History Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Histórico de Aventuras</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Inimigo</th>
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
                            <?php if (!$ai_battle_history) { ?>
                                <tr>
                                    <td colspan="10">Nenhuma aventura encontrada.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($ai_battle_history as $ai_battle_history) {
                                $won_class;
                                $won;
                                if ($ai_battle_history->won == 1) {
                                    $won_class = "success";
                                    $won = "Sim";
                                } else {
                                    $won_class = "danger";
                                    $won = "Não";
                                }

                                $character_potions = $ai_battle_history->player_hp_potions + $ai_battle_history->player_large_hp_potions + $ai_battle_history->player_mp_potions + $ai_battle_history->player_large_mp_potions + $ai_battle_history->player_dexterity_potions + $ai_battle_history->player_luck_potions;
                                $enemy_potions = $ai_battle_history->enemy_hp_potions + $ai_battle_history->enemy_large_hp_potions + $ai_battle_history->enemy_mp_potions + $ai_battle_history->enemy_large_mp_potions + $ai_battle_history->enemy_dexterity_potions + $ai_battle_history->enemy_luck_potions;
                                ?>

                                <tr class="<?= $won_class ?>">
                                    <td style="vertical-align: middle"> <?= $ai_battle_history->enemy ?> </td>
                                    <td style="vertical-align: middle"> <?= $ai_battle_history->player_damage ?> </td>
                                    <td style="vertical-align: middle"> <?= $ai_battle_history->enemy_damage ?> </td>
                                    <td style="vertical-align: middle"> <?= $character_potions ?> </td>
                                    <td style="vertical-align: middle"> <?= $enemy_potions ?> </td>
                                    <td style="vertical-align: middle"> <?= $ai_battle_history->experience_earned ?> </td>
                                    <td style="vertical-align: middle"> <?= $ai_battle_history->gold_earned ?> </td>
                                    <td style="vertical-align: middle"> <?= $ai_battle_history->turns ?> </td>
                                    <td style="vertical-align: middle"> <?= $won ?> </td>
                                    <td style="vertical-align: middle"> <?= date_format(new DateTime($ai_battle_history->date), 'd/m/Y G:ia') ?> </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>