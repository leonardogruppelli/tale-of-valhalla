<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/sign_in');
        }

        if ($this->session->selected_character == 0) {
            redirect('characters');
        }

        $this->load->model('Items_Model', 'items');
    }

    public function index() {
        $character_id = $this->session->selected_character;

        $data['items'] = $this->items->select($character_id);
        
        $session['navigation'] = "items";
        $this->session->set_userdata($session);

        $this->load->view('includes/header');
        $this->load->view('Items/items_view', $data);
        $this->load->view('includes/footer');
    }

    public function buy_item($character_id, $user_id, $item_id) {
        if ($this->items->buy_item($character_id, $user_id, $item_id)) {
            $this->load->model('Users_Model', 'users');

            $user = $this->users->find($user_id);

            $session['gold'] = $user->gold;
            $session['gems'] = $user->gems;

            $this->session->set_userdata($session);

            $situation = "1";
            $message = "Item comprado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao comprar item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }

    public function buy_item_unique($character_id, $user_id, $item_id) {
        if ($this->items->buy_item_unique($character_id, $user_id, $item_id)) {
            $this->load->model('Users_Model', 'users');

            $user = $this->users->find($user_id);

            $session['gold'] = $user->gold;
            $session['gems'] = $user->gems;

            $this->session->set_userdata($session);

            $situation = "1";
            $message = "Item comprado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao comprar item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }

}
