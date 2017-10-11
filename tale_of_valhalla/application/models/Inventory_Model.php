<?php

class Inventory_Model extends CI_Model {

    public function select($character_id) {
        $sql = "SELECT inventory.*, items.*, classes.name AS class, types.name AS type FROM inventory INNER JOIN items ON inventory.item_id = items.id INNER JOIN classes ON items.class_id = classes.id INNER JOIN types ON items.type_id = types.id WHERE inventory.character_id = $character_id ORDER BY inventory.item_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function select_inventory($character_id) {
        $sql = "SELECT inventory.*, items.*, classes.name AS class, types.name AS type FROM inventory INNER JOIN items ON inventory.item_id = items.id INNER JOIN classes ON items.class_id = classes.id INNER JOIN types ON items.type_id = types.id WHERE inventory.character_id = $character_id AND inventory.equiped = 0 ORDER BY inventory.item_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function sell_item($character_id, $user_id, $item_id) {
        $sql_update = "UPDATE users INNER JOIN items ON items.id = $item_id SET users.gold = users.gold + items.sell_price WHERE users.id = $user_id;";
        $query_update = $this->db->query($sql_update);
        $sql_delete = "DELETE FROM inventory WHERE character_id = $character_id AND item_id = $item_id;";
        $query_delete = $this->db->query($sql_delete);
        return $query_update + $query_delete;
    }

    public function sell_item_unique($character_id, $user_id, $item_id) {
        $sql_update = "UPDATE users INNER JOIN items ON items.id = $item_id SET users.gems = users.gems + items.sell_price WHERE users.id = $user_id;";
        $query_update = $this->db->query($sql_update);
        $sql_delete = "DELETE FROM inventory WHERE character_id = $character_id AND item_id = $item_id;";
        $query_delete = $this->db->query($sql_delete);
        return $query_update + $query_delete;
    }
    
    public function sell_hp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold + ($quantity * 15) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET hp_potions = hp_potions - $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function sell_mp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold + ($quantity * 15) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET mp_potions = mp_potions - $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function sell_large_hp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold + ($quantity * 25) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET large_hp_potions = large_hp_potions - $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function sell_large_mp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold + ($quantity * 25) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET large_mp_potions = large_mp_potions - $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function sell_dexterity_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold + ($quantity * 50) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET dexterity_potions = dexterity_potions - $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function sell_luck_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold + ($quantity * 50) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET luck_potions = luck_potions - $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }

}
