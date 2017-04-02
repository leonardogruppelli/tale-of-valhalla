<?php

class Classes_Model extends CI_Model {
    
    public function select() {
        $this->db->order_by('id');
        return $this->db->get('classes')->result();
    }

    public function insert($class) {
        return $this->db->insert('classes', $class);
    }

    public function update($class) {
        $this->db->where('id', $class['id']);
        return $this->db->update('classes', $class);
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('classes');
    }
    
    public function find($id) {
        $sql = "SELECT * FROM classes WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function find_name($name) {
        $sql = "SELECT * FROM classes WHERE name='$name'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return isset($row);
    }
    
    public function find_name_alter($id) {
        $sql = "SELECT name FROM classes WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query->row()->name;
    }
    
}