<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Types extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Types_Model', 'types');
    }

    public function index() {
        $data['types'] = $this->types->select();

        $session['admin_navigation_tables'] = true;
        $session['admin_navigation'] = "types";
        $this->session->set_userdata($session);
        
        $this->load->view('includes/header');
        $this->load->view('Types/types_view', $data);
        $this->load->view('includes/footer');
    }

}
