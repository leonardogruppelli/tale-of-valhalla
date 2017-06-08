<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Characters extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/login');
        }
        $this->load->model('Characters_Model', 'characters');
    }

    public function index() {
        $data['warrior'] = $this->characters->select_character($this->session->id, 1);
        $data['archer'] = $this->characters->select_character($this->session->id, 2);
        $data['mage'] = $this->characters->select_character($this->session->id, 3);
        $data['assassin'] = $this->characters->select_character($this->session->id, 4);
        
        $session['navigation'] = "characters";
        $this->session->set_userdata($session);

        $this->load->view('includes/header');
        $this->load->view('Characters/characters_view', $data);
        $this->load->view('includes/footer');
    }
    
    public function create_warrior($user_id, $class_id) {
        $this->characters->create_warrior($user_id, $class_id);
        
        redirect('characters');
    }
    
    public function create_archer($user_id, $class_id) {
        $this->characters->create_archer($user_id, $class_id);
        
        redirect('characters');
    }
    
    public function create_mage($user_id, $class_id) {
        $this->characters->create_mage($user_id, $class_id);
        
        redirect('characters');
    }
    
    public function create_assassin($user_id, $class_id) {
        $this->characters->create_assassin($user_id, $class_id);
        
        redirect('characters');
    }

    public function select_character($user_id, $class_id) {
        $data['character'] = $this->characters->select_character($user_id, $class_id);
        
        $session['selected_character'] = $data['character']->id;
        $session['selected_class'] = $class_id;
        $this->session->set_userdata($session);

        redirect('equipment');
    }

}
