<?php

class Users_Model extends CI_Model {

    public function select() {
        $this->db->order_by('id');
        return $this->db->get('users')->result();
    }

    public function insert($name, $username, $email, $password, $picture, $gold, $gems) {
        $sql = "INSERT INTO users (name, username, email, password, picture, gold, gems) VALUES('$name','$username', '$email', MD5('$password'), '$picture', '$gold', '$gems')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function update($id, $name, $username, $email, $picture, $gold, $gems) {
        $sql = "UPDATE users SET name='$name', username='$username', email='$email', picture='$picture', gold='$gold', gems='$gems' WHERE id=$id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function user_has_character($id) {
        $sql = "SELECT users.* FROM users INNER JOIN characters ON characters.user_id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function verify($email, $password) {
        $sql = "SELECT * FROM users WHERE email=? AND password=?";
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
