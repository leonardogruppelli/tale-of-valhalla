<?php

class Characters_Model extends CI_Model {
    
    public function select_warrior($id) {
        $sql = "SELECT characters.*, classes.name AS class FROM characters INNER JOIN classes ON characters.class_id = classes.id WHERE user_id = $id AND class_id = 1";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function select_archer($id) {
        $sql = "SELECT characters.*, classes.name AS class FROM characters INNER JOIN classes ON characters.class_id = classes.id WHERE user_id = $id AND class_id = 2";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function select_mage($id) {
        $sql = "SELECT characters.*, classes.name AS class FROM characters INNER JOIN classes ON characters.class_id = classes.id WHERE user_id = $id AND class_id = 3";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function select_assassin($id) {
        $sql = "SELECT characters.*, classes.name AS class FROM characters INNER JOIN classes ON characters.class_id = classes.id WHERE user_id = $id AND class_id = 4";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
}