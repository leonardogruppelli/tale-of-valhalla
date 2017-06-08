<?php

class Items_Model extends CI_Model {

    public function select() {
        $sql = "SELECT items.*, types.name AS type, classes.name AS class FROM items INNER JOIN types ON items.type_id = types.id INNER JOIN classes ON items.class_id = classes.id WHERE deleted=0 ORDER BY id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insert($item) {
        return $this->db->insert('items', $item);
    }

    public function update($item) {
        $this->db->where('id', $item['id']);
        return $this->db->update('items', $item);
    }

    public function delete($id) {
        $sql = "UPDATE items SET deleted=1 WHERE id=$id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function find($id) {
        $sql = "SELECT * FROM items WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function find_name($name) {
        $sql = "SELECT * FROM items WHERE name='$name'";
        $query = $this->db->query($sql);
        $row = $query->row();
        return isset($row);
    }

    public function find_name_alter($id) {
        $sql = "SELECT name FROM items WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query->row()->name;
    }

}
