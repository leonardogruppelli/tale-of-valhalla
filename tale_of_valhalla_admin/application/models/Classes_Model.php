<?php

class Classes_Model extends CI_Model {

    public function select() {
        $this->db->order_by('id');
        return $this->db->get('classes')->result();
    }

}
