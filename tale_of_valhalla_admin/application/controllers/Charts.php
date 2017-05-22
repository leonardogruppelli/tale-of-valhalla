<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Charts_Model', 'charts');
    }

    public function users_per_month() {
        $data['users_per_month'] = $this->charts->users_per_month();

        $json = array();
        foreach ($data['users_per_month'] as $data) {
            $json[] = array(
                'date' => $data->year . "-" . $data->month,
                'users' => $data->users
            );
        }

        echo json_encode($json);
    }
    
    public function characters_per_class() {
        $data['characters_per_class'] = $this->charts->characters_per_class();

        $json = array();
        foreach ($data['characters_per_class'] as $data) {
            $json[] = array(
                'label' => $data->class,
                'value' => $data->characters
            );
        }

        echo json_encode($json);
    }
    
    public function items_per_buy() {
        $data['items_per_buy'] = $this->charts->items_per_buy();

        $json = array();
        foreach ($data['items_per_buy'] as $data) {
            $json[] = array(
                'label' => $data->item,
                'value' => $data->buys
            );
        }

        echo json_encode($json);
    }

}
