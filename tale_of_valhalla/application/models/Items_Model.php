<?php

class Items_Model extends CI_Model {

    public function select($character_id, $class_id) {
        $sql = "SELECT items.*, classes.name AS class, types.name AS type FROM items INNER JOIN classes ON items.class_id = classes.id INNER JOIN types ON items.type_id = types.id WHERE classes.id = $class_id AND items.deleted = 0 AND items.id NOT IN (SELECT inventory.item_id FROM inventory WHERE inventory.character_id = $character_id) ORDER BY id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function buy_item($character_id, $user_id, $item_id) {
        $sql_update = "UPDATE users INNER JOIN items ON items.id = $item_id SET users.gold = users.gold - items.buy_price WHERE users.id = $user_id;";
        $query_update = $this->db->query($sql_update);
        $sql_insert = "INSERT INTO inventory (character_id, item_id) VALUES('$character_id', '$item_id');";
        $query_insert = $this->db->query($sql_insert);
        return $query_update + $query_insert;
    }

    public function buy_item_unique($character_id, $user_id, $item_id) {
        $sql_update = "UPDATE users INNER JOIN items ON items.id = $item_id SET users.gems = users.gems - items.buy_price WHERE users.id = $user_id;";
        $query_update = $this->db->query($sql_update);
        $sql_insert = "INSERT INTO inventory (character_id, item_id) VALUES('$character_id', '$item_id');";
        $query_insert = $this->db->query($sql_insert);
        return $query_update + $query_insert;
    }

    public function buy_hp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold - ($quantity * 25) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET hp_potions = hp_potions + $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function buy_mp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold - ($quantity * 25) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET mp_potions = mp_potions + $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function buy_large_hp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold - ($quantity * 50) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET large_hp_potions = large_hp_potions + $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function buy_large_mp_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold - ($quantity * 50) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET large_mp_potions = large_mp_potions + $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function buy_dexterity_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold - ($quantity * 100) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET dexterity_potions = dexterity_potions + $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }
    
    public function buy_luck_potions($user_id, $character_id, $quantity) {
        $sql_update_users = "UPDATE users SET gold = gold - ($quantity * 100) WHERE id = $user_id;";
        $query_update_users = $this->db->query($sql_update_users);
        $sql_update_characters = "UPDATE characters SET luck_potions = luck_potions + $quantity WHERE id = $character_id;";
        $query_update_characters = $this->db->query($sql_update_characters);
        return $query_update_users + $query_update_characters;
    }

    public function find($id) {
        $sql = "SELECT * FROM items WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
