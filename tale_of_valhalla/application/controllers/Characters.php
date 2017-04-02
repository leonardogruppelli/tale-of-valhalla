<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Characters extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/sign_in');
        }
        $this->load->model('Characters_Model', 'characters');
    }

    public function index() {
        $data['warrior'] = $this->characters->select_warrior($this->session->id);
        $data['archer'] = $this->characters->select_archer($this->session->id);
        $data['mage'] = $this->characters->select_mage($this->session->id);
        $data['assassin'] = $this->characters->select_assassin($this->session->id);

        $this->load->view('includes/header');
        $this->load->view('Characters/characters_view', $data);
        $this->load->view('includes/footer');
    }

    public function select_character($class_id) {
        $session['selected_character'] = $class_id;
        $this->session->set_userdata($session);

        redirect('items');
    }

}
