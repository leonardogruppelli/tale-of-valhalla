<?php

class Charts_Model extends CI_Model {
    
    public function find_years() {
        $sql = "SELECT YEAR(date) AS year FROM users GROUP BY YEAR(date)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function users_per_month($year) {        
        $sql = "SELECT MONTH(users.date) AS month, COUNT(users.id) AS users FROM users WHERE YEAR(date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->result();        
    }
    
    public function characters_per_class() {        
        $sql = "SELECT classes.name AS class, COUNT(characters.class_id) AS characters FROM characters INNER JOIN classes ON characters.class_id = classes.id GROUP BY classes.id ASC";
        $query = $this->db->query($sql);
        return $query->result();        
    }
    
    public function items_per_buy() {        
        $sql = "SELECT items.name AS item, COUNT(inventory.item_id) AS buys FROM inventory INNER JOIN items ON inventory.item_id = items.id GROUP BY items.id ASC";
        $query = $this->db->query($sql);
        return $query->result();        
    }

}