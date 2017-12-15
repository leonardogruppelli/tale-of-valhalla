<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Battle extends CI_Controller {

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

        $this->load->model('Battle_Model', 'battle');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $data = $this->input->post();

        $character_id = $this->session->selected_character;
        $opponent_id = $data["opponent_id"];

        $data['character'] = $this->battle->select_character($character_id);
        $data['opponent'] = $this->battle->select_opponent($opponent_id);

        $session['navigation_battle'] = true;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "battle";
        $this->session->set_userdata($session);

        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('Battle/battle_view', $data);
        $this->load->view('includes/footer');
    }

    public function remove_potion() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));
        $potion = htmlspecialchars(trim($_GET['potion']));

        $this->battle->remove_potion($character_id, $potion);
    }

    public function increase_wins() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));

        $this->battle->increase_wins($character_id);
    }

    public function save_history() {
        $player_one = htmlspecialchars(trim($_GET['character_id']));
        $player_two = htmlspecialchars(trim($_GET['opponent_id']));
        $player_one_damage = htmlspecialchars(trim($_GET['player_one_damage']));
        $player_one_damage_taken = htmlspecialchars(trim($_GET['player_one_damage_taken']));
        $player_two_damage = htmlspecialchars(trim($_GET['player_two_damage']));
        $player_two_damage_taken = htmlspecialchars(trim($_GET['player_two_damage_taken']));
        $player_one_hp_potions = htmlspecialchars(trim($_GET['player_one_hp_potions']));
        $player_one_large_hp_potions = htmlspecialchars(trim($_GET['player_one_large_hp_potions']));
        $player_one_mp_potions = htmlspecialchars(trim($_GET['player_one_mp_potions']));
        $player_one_large_mp_potions = htmlspecialchars(trim($_GET['player_one_large_mp_potions']));
        $player_one_dexterity_potions = htmlspecialchars(trim($_GET['player_one_dexterity_potions']));
        $player_one_luck_potions = htmlspecialchars(trim($_GET['player_one_luck_potions']));
        $player_two_hp_potions = htmlspecialchars(trim($_GET['player_two_hp_potions']));
        $player_two_large_hp_potions = htmlspecialchars(trim($_GET['player_two_large_hp_potions']));
        $player_two_mp_potions = htmlspecialchars(trim($_GET['player_two_mp_potions']));
        $player_two_large_mp_potions = htmlspecialchars(trim($_GET['player_two_large_mp_potions']));
        $player_two_dexterity_potions = htmlspecialchars(trim($_GET['player_two_dexterity_potions']));
        $player_two_luck_potions = htmlspecialchars(trim($_GET['player_two_luck_potions']));
        $experience_earned = htmlspecialchars(trim($_GET['experience_earned']));
        $gold_earned = htmlspecialchars(trim($_GET['gold_earned']));
        $turns = htmlspecialchars(trim($_GET['turns']));
        $winner = htmlspecialchars(trim($_GET['winner']));
        $datetime = new DateTime();
        $date = $datetime->format("Y-m-d H:i:s");

        $this->battle->save_history($player_one, $player_two, $player_one_damage, $player_one_damage_taken, $player_two_damage, $player_two_damage_taken, $player_one_hp_potions, $player_one_large_hp_potions, $player_one_mp_potions, $player_one_large_mp_potions, $player_one_dexterity_potions, $player_one_luck_potions, $player_two_hp_potions, $player_two_large_hp_potions, $player_two_mp_potions, $player_two_large_mp_potions, $player_two_dexterity_potions, $player_two_luck_potions, $experience_earned, $gold_earned, $turns, $winner, $date);
    }

    public function reward() {
        $character_id = htmlspecialchars(trim($_GET['character_id']));
        $user_id = htmlspecialchars(trim($_GET['user_id']));
        $experience = htmlspecialchars(trim($_GET['experience']));
        $max_experience = htmlspecialchars(trim($_GET['max_experience']));
        $gold = htmlspecialchars(trim($_GET['gold']));

        $this->battle->reward($character_id, $user_id, $experience, $max_experience, $gold);
    }

}
