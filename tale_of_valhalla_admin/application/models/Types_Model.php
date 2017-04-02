<?php

class Types_Model extends CI_Model {
    
    public function select() {
        $this->db->order_by('id');
        return $this->db->get('types')->result();
    }

    public function insert($type) {
        return $this->db->insert('types', $type);
    }

    public function update($type) {
        $this->db->where('id', $type['id']);
        return $this->db->update('types', $type);
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('types');
    }
    
    public function find($id) {
        $sql = "SELECT * FROM types WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function find_name($name) {
        $sql = "SELECT * FROM types WHERE name='$name'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return isset($row);
    }
    
    public function find_name_alter($id) {
        $sql = "SELECT name FROM types WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query->row()->name;
    }
    
}