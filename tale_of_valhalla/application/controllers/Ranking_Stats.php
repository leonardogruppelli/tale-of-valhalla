<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking_Stats extends CI_Controller {

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

        $this->load->model('Ranking_Model', 'ranking');
    }

    public function index() {
        $data['characters'] = $this->ranking->ranking_stats();

        $session['navigation_battle'] = false;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = true;
        $session['navigation'] = "ranking_stats";
        $this->session->set_userdata($session);

        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('Ranking/ranking_stats_view', $data);
        $this->load->view('includes/footer');
    }

}