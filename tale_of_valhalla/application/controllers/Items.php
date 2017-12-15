<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

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

        $this->load->model('Items_Model', 'items');
    }

    public function index() {
        $character_id = $this->session->selected_character;
        $class_id = $this->session->selected_class;

        $data['items'] = $this->items->select($character_id, $class_id);

        $session['navigation_battle'] = false;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "items";
        $this->session->set_userdata($session);

        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
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

    public function buy_hp_potions() {
        $data = $this->input->post();

        if (($data["quantity"] * 25) > $this->session->gold) {
            $situation = "0";
            $message = "Você não possui ouro suficiente.";
        } else {
            if ($this->items->buy_hp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções compradas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao comprar poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }
    
    public function buy_mp_potions() {
        $data = $this->input->post();

        if (($data["quantity"] * 25) > $this->session->gold) {
            $situation = "0";
            $message = "Você não possui ouro suficiente.";
        } else {
            if ($this->items->buy_mp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções compradas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao comprar poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }
    
    public function buy_large_hp_potions() {
        $data = $this->input->post();

        if (($data["quantity"] * 50) > $this->session->gold) {
            $situation = "0";
            $message = "Você não possui ouro suficiente.";
        } else {
            if ($this->items->buy_large_hp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções compradas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao comprar poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }
    
    public function buy_large_mp_potions() {
        $data = $this->input->post();

        if (($data["quantity"] * 50) > $this->session->gold) {
            $situation = "0";
            $message = "Você não possui ouro suficiente.";
        } else {
            if ($this->items->buy_large_mp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções compradas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao comprar poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }
    
    public function buy_dexterity_potions() {
        $data = $this->input->post();

        if (($data["quantity"] * 100) > $this->session->gold) {
            $situation = "0";
            $message = "Você não possui ouro suficiente.";
        } else {
            if ($this->items->buy_dexterity_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções compradas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao comprar poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }
    
    public function buy_luck_potions() {
        $data = $this->input->post();

        if (($data["quantity"] * 100) > $this->session->gold) {
            $situation = "0";
            $message = "Você não possui ouro suficiente.";
        } else {
            if ($this->items->buy_luck_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções compradas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao comprar poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('items');
    }

}
