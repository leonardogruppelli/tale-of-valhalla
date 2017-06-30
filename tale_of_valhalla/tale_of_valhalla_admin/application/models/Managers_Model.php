<?php

class Managers_Model extends CI_Model {
    
    public function verify($email, $password) {
        $sql = "SELECT * FROM managers WHERE email=? and password=?";
        $query = $this->db->query($sql, array($email, md5($password)));
        return $query->row();
    }
    
}