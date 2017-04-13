<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Classes_Model', 'classes');
    }

    public function index() {
        $data['classes'] = $this->classes->select();

        $this->load->view('includes/header');
        $this->load->view('Classes/classes_view', $data);
        $this->load->view('includes/footer');
    }

}
