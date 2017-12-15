<?php

class Battle_Model extends CI_Model {

    public function select_character($character_id) {
        $sql = "SELECT * FROM characters WHERE id = $character_id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function select_opponent($opponent_id) {
        $sql = "SELECT characters.*, users.username FROM characters INNER JOIN users ON characters.user_id = users.id WHERE characters.id = $opponent_id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function remove_potion($character_id, $potion) {
        if ($potion == 1) {
            $sql = "UPDATE characters SET hp_potions = hp_potions - 1 WHERE id = $character_id";
        } else if ($potion == 2) {
            $sql = "UPDATE characters SET large_hp_potions = large_hp_potions - 1 WHERE id = $character_id";
        } else if ($potion == 3) {
            $sql = "UPDATE characters SET mp_potions = mp_potions - 1 WHERE id = $character_id";
        } else if ($potion == 4) {
            $sql = "UPDATE characters SET large_mp_potions = large_mp_potions - 1 WHERE id = $character_id";
        } else if ($potion == 5) {
            $sql = "UPDATE characters SET dexterity_potions = dexterity_potions - 1 WHERE id = $character_id";
        } else if ($potion == 6) {
            $sql = "UPDATE characters SET luck_potions = luck_potions - 1 WHERE id = $character_id";
        }
        $query = $this->db->query($sql);
        return $query;
    }

    public function increase_wins($character_id) {
        $sql = "UPDATE characters SET battle_wins = battle_wins + 1 WHERE id = $character_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function save_history($player_one, $player_two, $player_one_damage, $player_one_damage_taken, $player_two_damage, $player_two_damage_taken, $player_one_hp_potions, $player_one_large_hp_potions, $player_one_mp_potions, $player_one_large_mp_potions, $player_one_dexterity_potions, $player_one_luck_potions, $player_two_hp_potions, $player_two_large_hp_potions, $player_two_mp_potions, $player_two_large_mp_potions, $player_two_dexterity_potions, $player_two_luck_potions, $experience_earned, $gold_earned, $turns, $winner, $date) {
        $sql = "INSERT INTO battle_history (player_one, player_two, player_one_damage, player_one_damage_taken, player_two_damage, player_two_damage_taken, player_one_hp_potions, player_one_large_hp_potions, player_one_mp_potions, player_one_large_mp_potions, player_one_dexterity_potions, player_one_luck_potions, player_two_hp_potions, player_two_large_hp_potions, player_two_mp_potions, player_two_large_mp_potions, player_two_dexterity_potions, player_two_luck_potions, experience_earned, gold_earned, turns, winner, date) VALUES ($player_one, $player_two, $player_one_damage, $player_one_damage_taken, $player_two_damage, $player_two_damage_taken, $player_one_hp_potions, $player_one_large_hp_potions, $player_one_mp_potions, $player_one_large_mp_potions, $player_one_dexterity_potions, $player_one_luck_potions, $player_two_hp_potions, $player_two_large_hp_potions, $player_two_mp_potions, $player_two_large_mp_potions, $player_two_dexterity_potions, $player_two_luck_potions, $experience_earned, $gold_earned, $turns, $winner, '$date')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function reward($character_id, $user_id, $experience, $max_experience, $gold) {
        $character = $this->select_character($character_id);
        $character_experience = $character->experience;
        $character_max_experience = $character->max_experience;

        if (($character_experience + $experience) > $character_max_experience) {
            $experience = ($character_experience + $experience) - $character_max_experience;
            $sql_update_characters = "UPDATE characters SET experience = 0 + $experience, max_experience = $max_experience, level = level + 1, health = health + 25, mana = mana + 25, attack = attack + 5, defense = defense + 5, agility = agility + 5, intelligence = intelligence + 5 WHERE id = $character_id";
        } else {
            $sql_update_characters = "UPDATE characters SET experience = experience + $experience WHERE id = $character_id";
        }

        $sql_update_users = "UPDATE users SET gold = gold + $gold WHERE id = $user_id";
        $query_update_characters = $this->db->query($sql_update_characters);
        $query_update_users = $this->db->query($sql_update_users);
        return $query_update_characters + $query_update_users;
    }

}
