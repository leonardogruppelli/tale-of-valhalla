<?php

class Equipment_Model extends CI_Model {

    public function select_equipment($character_id, $type_id) {
        $sql = "SELECT equipment.*, items.*, classes.name AS class, types.name AS type FROM equipment INNER JOIN items ON equipment.item_id = items.id INNER JOIN classes ON items.class_id = classes.id INNER JOIN types ON items.type_id = types.id WHERE equipment.character_id = $character_id AND equipment.type_id = $type_id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function equip_item($character_id, $item_id, $type_id) {
        $sql = "IF EXISTS (SELECT * FROM equipment WHERE character_id = $character_id AND type_id = $type_id) THEN
                    UPDATE characters INNER JOIN equipment ON equipment.type_id = $type_id INNER JOIN items ON items.id = equipment.item_id SET characters.attack = characters.attack - items.attack, characters.defense = characters.defense - items.defense, characters.agility = characters.agility - items.agility, characters.intelligence = characters.intelligence - items.intelligence WHERE characters.id = $character_id;
                    UPDATE inventory INNER JOIN equipment ON equipment.type_id = $type_id SET equiped = 0 WHERE inventory.character_id = $character_id AND inventory.item_id = equipment.item_id;           
                    DELETE FROM equipment WHERE character_id = $character_id AND type_id = $type_id;
                    INSERT INTO equipment (character_id, type_id, item_id) VALUES ($character_id, $type_id, $item_id);
                    UPDATE characters INNER JOIN items ON items.id = $item_id SET characters.attack = characters.attack + items.attack, characters.defense = characters.defense + items.defense, characters.agility = characters.agility + items.agility, characters.intelligence = characters.intelligence + items.intelligence WHERE characters.id = $character_id;
                    UPDATE inventory SET equiped = 1 WHERE character_id = $character_id AND item_id = $item_id;
                ELSE
                    INSERT INTO equipment (character_id, type_id, item_id) VALUES ($character_id, $type_id, $item_id);
                    UPDATE characters INNER JOIN items ON items.id = $item_id SET characters.attack = characters.attack + items.attack, characters.defense = characters.defense + items.defense, characters.agility = characters.agility + items.agility, characters.intelligence = characters.intelligence + items.intelligence WHERE characters.id = $character_id;
                    UPDATE inventory SET equiped = 1 WHERE character_id = $character_id AND item_id = $item_id;
                END IF";

        $query = $this->db->query($sql);
        return $query;
    }
    
    public function unequip_item($character_id, $item_id) {
        $sql = "IF EXISTS (SELECT * FROM equipment WHERE character_id = $character_id AND item_id = $item_id) THEN
                    UPDATE characters INNER JOIN equipment ON equipment.item_id = $item_id INNER JOIN items ON items.id = equipment.item_id SET characters.attack = characters.attack - items.attack, characters.defense = characters.defense - items.defense, characters.agility = characters.agility - items.agility, characters.intelligence = characters.intelligence - items.intelligence WHERE characters.id = $character_id;
                    UPDATE inventory SET equiped = 0 WHERE character_id = $character_id AND item_id = $item_id;
                    DELETE FROM equipment WHERE character_id = $character_id AND item_id = $item_id;
                END IF";

        $query = $this->db->query($sql);
        return $query;
    }

}
