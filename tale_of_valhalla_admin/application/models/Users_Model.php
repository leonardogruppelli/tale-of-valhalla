<?php

class Users_Model extends CI_Model {
    
    public function select() {
        $sql = "SELECT * FROM users WHERE deleted = 0";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert($name, $username, $email, $password, $picture, $gold, $gems, $date) {
        $sql = "INSERT INTO users (name, username, email, password, picture, gold, gems, date) VALUES('$name','$username', '$email', MD5('$password'), '$picture', '$gold', '$gems', '$date')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function update($id, $name, $username, $email, $picture, $gold, $gems) {
        $sql = "UPDATE users SET name = '$name', username = '$username', email = '$email', picture = '$picture', gold = '$gold', gems = '$gems' WHERE id = $id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delete($id) {
        $sql = "UPDATE users SET deleted = 1 WHERE id = $id";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function find($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function verify_user($email, $password) {
        $sql = "SELECT * FROM users WHERE email=? and password=?";
        $query = $this->db->query($sql, array($email, md5($password)));
        return $query->row();
    }
    
    public function find_username($username) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return isset($row);
    }
    
    public function find_username_alter($id) {
        $sql = "SELECT username FROM users WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query->row()->username;
    }
    
    public function find_email($email) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return isset($row);
    }
    
    public function find_email_alter($id) {
        $sql = "SELECT email FROM users WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query->row()->email;
    }
}