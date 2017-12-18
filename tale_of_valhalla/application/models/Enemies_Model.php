<?php

class Enemies_Model extends CI_Model {

    public function select() {
        $sql = "SELECT * FROM enemies WHERE deleted = 0";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM enemies WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
