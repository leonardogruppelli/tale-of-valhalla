<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function verify_session() {
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
    }

    public function index() {
        $this->verify_session();
        $this->load->view('includes/header');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }

    public function sign_in() {
        $this->load->view('login');
    }

    public function login() {
        $this->load->model('Managers_Model', 'managers');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $verify = $this->managers->verify($email, $password);

        if (isset($verify)) {
            $session['admin_name'] = $verify->name;
            $session['admin_id'] = $verify->id;
            $session['logged_admin'] = true;
            $this->session->set_userdata($session);
        }
        redirect();
    }

    public function leave() {
        $this->session->sess_destroy();
        redirect();
    }

}
