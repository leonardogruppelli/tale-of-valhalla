<?php

class Charts_Model extends CI_Model {

    public function users_per_month_january($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 01 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_february($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 02 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_march($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 03 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_april($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 04 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_may($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 05 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_june($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 06 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_july($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 07 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_august($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 08 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_september($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 09 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_october($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 10 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_november($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 11 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function users_per_month_december($year) {
        $sql = "SELECT COUNT(users.id) FROM users WHERE MONTH(users.date) = 12 AND YEAR(users.date) = '$year' GROUP BY '$year', MONTH(users.date)";
        $query = $this->db->query($sql);
        return $query->row('COUNT(users.id)');
    }

    public function characters_per_class() {
        $sql = "SELECT classes.name AS class, COUNT(characters.class_id) AS characters FROM characters INNER JOIN classes ON characters.class_id = classes.id GROUP BY classes.id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function items_per_buy() {
        $sql = "SELECT items.name AS item, COUNT(inventory.item_id) AS buys FROM inventory INNER JOIN items ON inventory.item_id = items.id GROUP BY items.id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
