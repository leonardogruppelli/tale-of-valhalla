<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function verify() {
        if (!$this->session->logged) {
            redirect('home/sign_in');
        }

        if ($this->session->selected_character == 0) {
            redirect('characters');
        }
    }

    public function index() {
        $this->verify();
        $this->load->view('includes/header');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }

    public function sign_in() {
        $this->load->view('login');
    }

    public function login() {
        $this->load->model('Users_Model', 'users');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $verify = $this->users->verify($email, $password);

        if (isset($verify)) {
            $session['name'] = $verify->name;
            $session['id'] = $verify->id;
            $session['logged'] = true;
            $session['gold'] = $verify->gold;
            $session['gems'] = $verify->gems;
            $session['selected_character'] = 0;
            $this->session->set_userdata($session);
        }

        redirect();
    }

    public function leave() {
        $this->session->sess_destroy();
        redirect();
    }

}
