<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/sign_in');
        }

        if ($this->session->selected_character == 0) {
            $situation = "0";
            $message = "Selecione um personagem.";

            $this->session->set_flashdata('situation', $situation);
            $this->session->set_flashdata('message', $message);
            
            redirect('characters');
        }

        $this->load->model('Inventory_Model', 'inventory');
    }

    public function index() {
        $character_id = $this->session->selected_character;

        $data['inventory'] = $this->inventory->select($character_id);
        
        $session['navigation'] = "inventory";
        $this->session->set_userdata($session);

        $this->load->view('includes/header');
        $this->load->view('Inventory/inventory_view', $data);
        $this->load->view('includes/footer');
    }
    
    public function sell_item($character_id, $user_id, $item_id) {
        if ($this->inventory->sell_item($character_id, $user_id, $item_id)) {
            $this->load->model('Users_Model', 'users');
            $this->load->model('Equipment_Model', 'equipment');

            $user = $this->users->find($user_id);

            $this->equipment->unequip_item($character_id, $item_id);
            
            $session['gold'] = $user->gold;
            $session['gems'] = $user->gems;

            $this->session->set_userdata($session);

            $situation = "1";
            $message = "Item vendido com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao vender item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

    public function sell_item_unique($character_id, $user_id, $item_id) {
        if ($this->inventory->sell_item_unique($character_id, $user_id, $item_id)) {
            $this->load->model('Users_Model', 'users');

            $user = $this->users->find($user_id);

            $session['gold'] = $user->gold;
            $session['gems'] = $user->gems;

            $this->session->set_userdata($session);

            $situation = "1";
            $message = "Item vendido com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao vender item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

}
