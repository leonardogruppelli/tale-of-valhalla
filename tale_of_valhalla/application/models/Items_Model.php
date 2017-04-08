<?php

class Items_Model extends CI_Model {

    public function select($character_id) {
        $sql = "SELECT items.*, classes.name AS class, types.name AS type FROM items INNER JOIN classes ON items.class_id = classes.id INNER JOIN types ON items.type_id = types.id WHERE items.id NOT IN (SELECT inventory.item_id FROM inventory WHERE inventory.character_id = $character_id) ORDER BY id";
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
    
    public function find($id) {
        $sql = "SELECT * FROM items WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
