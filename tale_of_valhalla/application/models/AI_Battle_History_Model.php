<?php

class AI_Battle_History_Model extends CI_Model {

    public function select($character_id) {
        $sql = "SELECT ai_battle_history.*, enemies.name AS enemy FROM ai_battle_history INNER JOIN enemies ON ai_battle_history.enemy_id = enemies.id WHERE ai_battle_history.character_id = $character_id ORDER BY date";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
