<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/sign_in');
        }

        if ($this->session->selected_character == 0) {
            redirect('characters');
        }

        $this->load->model('Equipment_Model', 'equipment');
    }

    public function index() {
        $character_id = $this->session->selected_character;

        $data['equipment'] = $this->equipment->select($character_id);

        $this->load->view('includes/header');
        $this->load->view('Equipment/equipment_view', $data);
        $this->load->view('includes/footer');
    }
    
    public function equip_item($character_id, $item_id, $type_id) {
        if ($this->equipment->equip_item($character_id, $item_id, $type_id)) {
            $situation = "1";
            $message = "Item equipado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao equipar item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }
    
    public function unequip_item($character_id, $item_id) {
        if ($this->equipment->unequip_item($character_id, $item_id)) {
            $situation = "1";
            $message = "Item desequipado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao desequipar item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

}
