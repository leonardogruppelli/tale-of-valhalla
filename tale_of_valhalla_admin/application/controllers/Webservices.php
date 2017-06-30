<?php

header('Content-Type: application/json; charset=utf-8');

defined('BASEPATH') OR exit('No direct script access allowed');

class Webservices extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Users_Model', 'users');
        $this->load->model('Items_Model', 'items');
        $this->load->model('Enemies_Model', 'enemies');
        $this->load->model('Classes_Model', 'classes');
        $this->load->model('Types_Model', 'types');
    }
    
    public function select_users() {
        $data['users'] = $this->users->select();

        $json = array();
        foreach ($data['users'] as $data) {
            $json[] = array(
                'id' => $data->id,
                'name' => $data->name,
                'username' => $data->username,
                'email' => $data->email,
                'gold' => $data->gold,
                'gems' => $data->gems
            );
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
    
    public function select_items() {
        $data['items'] = $this->items->select();

        $json = array();
        foreach ($data['items'] as $data) {
            $json[] = array(
                'id' => $data->id,
                'name' => $data->name,
                'type' => $data->type,
                'class' => $data->class,
                'buy_price' => $data->buy_price,
                'sell_price' => $data->sell_price
            );
        }

        echo json_encode(array('items' => $json), JSON_UNESCAPED_UNICODE);
    }
    
    public function select_enemies() {
        $data['enemies'] = $this->enemies->select();

        $json = array();
        foreach ($data['enemies'] as $data) {
            $json[] = array(
                'id' => $data->id,
                'name' => $data->name,
                'health' => $data->health,
                'mana' => $data->mana
            );
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
    
    public function select_classes() {
        $data['classes'] = $this->classes->select();

        $json = array();
        foreach ($data['classes'] as $data) {
            $json[] = array(
                'id' => $data->id,
                'name' => $data->name
            );
        }

        echo json_encode(array('classes' => $json), JSON_UNESCAPED_UNICODE);
    }
    
    public function select_types() {
        $data['types'] = $this->types->select();

        $json = array();
        foreach ($data['types'] as $data) {
            $json[] = array(
                'id' => $data->id,
                'name' => $data->name
            );
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
}