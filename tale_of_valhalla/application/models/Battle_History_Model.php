<?php

class Battle_History_Model extends CI_Model {

    public function select($character_id) {
        $sql = "SELECT battle_history.*, users.username AS user FROM battle_history INNER JOIN characters ON battle_history.player_two = characters.id INNER JOIN users ON characters.user_id = users.id WHERE battle_history.player_one = $character_id ORDER BY date";
        $query = $this->db->query($sql);
        return $query->result();
    }

}