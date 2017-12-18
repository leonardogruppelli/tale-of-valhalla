<?php

class Enemies_Model extends CI_Model {

    public function select() {
        $this->db->order_by('id');
        return $this->db->get('enemies')->result();
    }

    public function insert($enemy) {
        return $this->db->insert('enemies', $enemy);
    }

    public function update($enemy) {
        $this->db->where('id', $enemy['id']);
        return $this->db->update('enemies', $enemy);
    }

    public function delete($id) {
        $sql = "UPDATE enemies SET deleted=1 WHERE id=$id";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function ativate($id) {
        $sql = "UPDATE enemies SET deleted=0 WHERE id=$id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function find($id) {
        $sql = "SELECT * FROM enemies WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find_name($name) {
        $sql = "SELECT * FROM enemies WHERE name='$name'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return isset($row);
    }

    public function find_name_alter($id) {
        $sql = "SELECT name FROM enemies WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query->row()->name;
    }

}
