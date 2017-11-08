<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AI_Battle_History extends CI_Controller {

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

        $this->load->model('AI_Battle_History_Model', 'ai_battle_history');
    }

    public function index() {
        $character_id = $this->session->selected_character;
        
        $data['ai_battle_history'] = $this->ai_battle_history->select($character_id);

        $session['navigation'] = "ai_battle_history";
        $this->session->set_userdata($session);

        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('History/ai_battle_history_view', $data);
        $this->load->view('includes/footer');
    }

}
