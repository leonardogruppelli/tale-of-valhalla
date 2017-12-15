<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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

        $this->load->model('Inventory_Model', 'inventory');
    }

    public function index() {
        $this->load->model('Characters_Model', 'characters');
        $character_id = $this->session->selected_character;

        $data['inventory'] = $this->inventory->select($character_id);
        $data['character'] = $this->characters->select_stats($this->session->selected_character);

        $session['navigation_battle'] = false;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "inventory";
        $this->session->set_userdata($session);

        $this->load->model('Users_Model', 'users');
        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
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

    public function sell_hp_potions() {
        $data = $this->input->post();
        $this->load->model('Characters_Model', 'characters');

        $character = $this->characters->select_stats($this->session->selected_character);

        if ($data["quantity"] > $character->hp_potions) {
            $situation = "0";
            $message = "Quantidade inválida.";
        } else {
            if ($this->inventory->sell_hp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções vendidas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao vender poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

    public function sell_mp_potions() {
        $data = $this->input->post();
        $this->load->model('Characters_Model', 'characters');

        $character = $this->characters->select_stats($this->session->selected_character);

        if ($data["quantity"] > $character->mp_potions) {
            $situation = "0";
            $message = "Quantidade inválida.";
        } else {
            if ($this->inventory->sell_mp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções vendidas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao vender poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

    public function sell_large_hp_potions() {
        $data = $this->input->post();
        $this->load->model('Characters_Model', 'characters');

        $character = $this->characters->select_stats($this->session->selected_character);

        if ($data["quantity"] > $character->large_hp_potions) {
            $situation = "0";
            $message = "Quantidade inválida.";
        } else {
            if ($this->inventory->sell_large_hp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções vendidas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao vender poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

    public function sell_large_mp_potions() {
        $data = $this->input->post();
        $this->load->model('Characters_Model', 'characters');

        $character = $this->characters->select_stats($this->session->selected_character);

        if ($data["quantity"] > $character->large_mp_potions) {
            $situation = "0";
            $message = "Quantidade inválida.";
        } else {
            if ($this->inventory->sell_large_mp_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções vendidas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao vender poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

    public function sell_dexterity_potions() {
        $data = $this->input->post();
        $this->load->model('Characters_Model', 'characters');

        $character = $this->characters->select_stats($this->session->selected_character);

        if ($data["quantity"] > $character->dexterity_potions) {
            $situation = "0";
            $message = "Quantidade inválida.";
        } else {
            if ($this->inventory->sell_dexterity_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções vendidas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao vender poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

    public function sell_luck_potions() {
        $data = $this->input->post();
        $this->load->model('Characters_Model', 'characters');

        $character = $this->characters->select_stats($this->session->selected_character);

        if ($data["quantity"] > $character->luck_potions) {
            $situation = "0";
            $message = "Quantidade inválida.";
        } else {
            if ($this->inventory->sell_luck_potions($data["user_id"], $data["character_id"], $data["quantity"])) {
                $this->load->model('Users_Model', 'users');

                $user = $this->users->find($data["user_id"]);

                $session['gold'] = $user->gold;
                $session['gems'] = $user->gems;

                $this->session->set_userdata($session);

                $situation = "1";
                $message = "Poções vendidas com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao vender poções.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect('inventory');
    }

}
