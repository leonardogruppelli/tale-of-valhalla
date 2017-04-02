<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged) {
            redirect('home/sign_in');
        }
        
        if ($this->session->selected_character == null) {
            redirect('characters');
        }

        $this->load->model('Items_Model', 'items');
    }

    public function index() {
        $data['items'] = $this->items->select();

        $this->load->view('includes/header');
        $this->load->view('Items/items_view', $data);
        $this->load->view('includes/footer');
    }

}
