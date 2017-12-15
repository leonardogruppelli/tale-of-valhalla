<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adventure extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/login');
        }

        if ($this->session->selected_character == 0) {
            $situation = "0";
            $message = "Selecione um personagem.";

            $this->session->set_flashdata('situation', $situation);
            $this->session->set_flashdata('message', $message);

            redirect('characters');
        }

        $this->load->model('Battle_AI_Model', 'battle_ai');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $data = $this->input->post();

        $character_id = $this->session->selected_character;
        $enemy_id = $data["enemy_id"];

        $data['character'] = $this->battle_ai->select_character($character_id);
        $data['enemy'] = $this->battle_ai->select_enemy($enemy_id);

        $session['navigation_battle'] = true;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "ai_battle";
        $this->session->set_userdata($session);

        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('Battle/battle_ai_view', $data);
        $this->load->view('includes/footer');
    }

    public function remove_potion() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));
        $potion = htmlspecialchars(trim($_GET['potion']));

        $this->battle_ai->remove_potion($character_id, $potion);
    }

    public function increase_wins() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));

        $this->battle_ai->increase_wins($character_id);
    }

    public function save_history() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));
        $enemy_id = htmlspecialchars(trim($_GET['enemy_id']));
        $player_damage = htmlspecialchars(trim($_GET['player_damage']));
        $player_damage_taken = htmlspecialchars(trim($_GET['player_damage_taken']));
        $enemy_damage = htmlspecialchars(trim($_GET['enemy_damage']));
        $enemy_damage_taken = htmlspecialchars(trim($_GET['enemy_damage_taken']));
        $player_hp_potions = htmlspecialchars(trim($_GET['player_hp_potions']));
        $player_large_hp_potions = htmlspecialchars(trim($_GET['player_large_hp_potions']));
        $player_mp_potions = htmlspecialchars(trim($_GET['player_mp_potions']));
        $player_large_mp_potions = htmlspecialchars(trim($_GET['player_large_mp_potions']));
        $player_dexterity_potions = htmlspecialchars(trim($_GET['player_dexterity_potions']));
        $player_luck_potions = htmlspecialchars(trim($_GET['player_luck_potions']));
        $enemy_hp_potions = htmlspecialchars(trim($_GET['enemy_hp_potions']));
        $enemy_large_hp_potions = htmlspecialchars(trim($_GET['enemy_large_hp_potions']));
        $enemy_mp_potions = htmlspecialchars(trim($_GET['enemy_mp_potions']));
        $enemy_large_mp_potions = htmlspecialchars(trim($_GET['enemy_large_mp_potions']));
        $enemy_dexterity_potions = htmlspecialchars(trim($_GET['enemy_dexterity_potions']));
        $enemy_luck_potions = htmlspecialchars(trim($_GET['enemy_luck_potions']));
        $experience_earned = htmlspecialchars(trim($_GET['experience_earned']));
        $gold_earned = htmlspecialchars(trim($_GET['gold_earned']));
        $turns = htmlspecialchars(trim($_GET['turns']));
        $won = htmlspecialchars(trim($_GET['won']));
        $datetime = new DateTime();
        $date = $datetime->format("Y-m-d H:i:s");

        $this->battle_ai->save_history($character_id, $enemy_id, $player_damage, $player_damage_taken, $enemy_damage, $enemy_damage_taken, $player_hp_potions, $player_large_hp_potions, $player_mp_potions, $player_large_mp_potions, $player_dexterity_potions, $player_luck_potions, $enemy_hp_potions, $enemy_large_hp_potions, $enemy_mp_potions, $enemy_large_mp_potions, $enemy_dexterity_potions, $enemy_luck_potions, $experience_earned, $gold_earned, $turns, $won, $date);
    }

    public function reward() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));
        $user_id = htmlspecialchars(trim($_GET['user_id']));
        $experience = htmlspecialchars(trim($_GET['experience']));
        $max_experience = htmlspecialchars(trim($_GET['max_experience']));
        $gold = htmlspecialchars(trim($_GET['gold']));

        $this->battle_ai->reward($character_id, $user_id, $experience, $max_experience, $gold);
    }

}
