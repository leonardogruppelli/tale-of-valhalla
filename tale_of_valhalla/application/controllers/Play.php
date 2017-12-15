    <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Play extends CI_Controller {

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

        $this->load->model('Enemies_Model', 'enemies');
        $this->load->model('Characters_Model', 'characters');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function adventures() {
        $data['enemies'] = $this->enemies->select();
        
        $session['navigation_battle'] = true;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "ai_battle";
        $this->session->set_userdata($session);
        
        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('play/enemies_view', $data);
        $this->load->view('includes/footer');
    }
    
    public function battles() {
        $data['characters'] = $this->characters->select($this->session->id);
        
        $session['navigation_battle'] = true;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "battle";
        $this->session->set_userdata($session);
        
        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('play/opponents_view', $data);
        $this->load->view('includes/footer');
    }

}
