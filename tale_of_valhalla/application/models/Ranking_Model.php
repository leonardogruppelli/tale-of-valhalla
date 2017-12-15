<?php

class Ranking_Model extends CI_Model {

    public function ranking_stats() {
        $sql = "SELECT characters.*, (characters.attack + characters.defense + characters.agility + characters.intelligence) AS stats, users.username AS user, classes.name AS class FROM characters INNER JOIN users ON characters.user_id = users.id INNER JOIN classes ON characters.class_id = classes.id ORDER BY stats DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function top_stats() {
        $sql = "SELECT characters.*, (characters.attack + characters.defense + characters.agility + characters.intelligence) AS stats, users.username AS user, classes.name AS class FROM characters INNER JOIN users ON characters.user_id = users.id INNER JOIN classes ON characters.class_id = classes.id ORDER BY stats DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function ranking_ai_wins() {
        $sql = "SELECT characters.*, users.username AS user, classes.name AS class FROM characters INNER JOIN users ON characters.user_id = users.id INNER JOIN classes ON characters.class_id = classes.id ORDER BY ai_battle_wins DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function top_ai_wins() {
        $sql = "SELECT characters.*, users.username AS user, classes.name AS class FROM characters INNER JOIN users ON characters.user_id = users.id INNER JOIN classes ON characters.class_id = classes.id ORDER BY ai_battle_wins DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function ranking_wins() {
        $sql = "SELECT characters.*, users.username AS user, classes.name AS class FROM characters INNER JOIN users ON characters.user_id = users.id INNER JOIN classes ON characters.class_id = classes.id ORDER BY battle_wins DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function top_wins() {
        $sql = "SELECT characters.*, users.username AS user, classes.name AS class FROM characters INNER JOIN users ON characters.user_id = users.id INNER JOIN classes ON characters.class_id = classes.id ORDER BY battle_wins DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query->row();
    }
}
