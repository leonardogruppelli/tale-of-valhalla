<?php

class Types_Model extends CI_Model {

    public function select() {
        $this->db->order_by('id');
        return $this->db->get('types')->result();
    }

}
