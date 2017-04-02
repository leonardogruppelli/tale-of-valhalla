<?php

class Items_Model extends CI_Model {
    
    public function select() {
        $this->db->order_by('id');
        return $this->db->get('items')->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM items WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
}