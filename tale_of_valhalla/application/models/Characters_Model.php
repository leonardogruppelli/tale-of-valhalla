<?php

class Characters_Model extends CI_Model {
    
    public function select($user_id) {
        $sql = "SELECT characters.*, classes.name AS class, users.username AS user FROM characters INNER JOIN classes ON characters.class_id = classes.id INNER JOIN users ON characters.user_id = users.id WHERE characters.user_id != $user_id ORDER BY characters.level DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function select_character($user_id, $class_id) {
        $sql = "SELECT characters.*, classes.name AS class FROM characters INNER JOIN classes ON characters.class_id = classes.id WHERE user_id = $user_id AND class_id = $class_id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function select_stats($character_id) {
        $sql = "SELECT * FROM characters WHERE id = $character_id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function create_warrior($user_id, $class_id) {
        $sql = "INSERT INTO characters (user_id, class_id, attack, defense, agility, intelligence, health, mana, max_experience) VALUES('$user_id','$class_id', '50', '50', '25', '25', '250', '250', '50')";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function create_archer($user_id, $class_id) {
        $sql = "INSERT INTO characters (user_id, class_id, attack, defense, agility, intelligence, health, mana, max_experience) VALUES('$user_id','$class_id', '50', '25', '50', '25', '150', '200', '50')";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function create_mage($user_id, $class_id) {
        $sql = "INSERT INTO characters (user_id, class_id, attack, defense, agility, intelligence, health, mana, max_experience) VALUES('$user_id','$class_id', '25', '25', '50', '50', '100', '100', '50')";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function create_assassin($user_id, $class_id) {
        $sql = "INSERT INTO characters (user_id, class_id, attack, defense, agility, intelligence, health, mana, max_experience) VALUES('$user_id','$class_id', '50', '25', '50', '25', '200', '150', '50')";
        $query = $this->db->query($sql);
        return $query;
    }    
    
}