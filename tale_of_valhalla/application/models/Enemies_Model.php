<?php

class Enemies_Model extends CI_Model {

    public function select() {
        $this->db->order_by('id');
        return $this->db->get('enemies')->result();
    }

    public function find($id) {
        $sql = "SELECT * FROM enemies WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

}
