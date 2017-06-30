<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Users_Model', 'users');
    }

    public function index() {
        $data['users'] = $this->users->select();
        
        $session['admin_navigation_tables'] = true;
        $session['admin_navigation'] = "users";
        $this->session->set_userdata($session);

        $this->load->view('includes/header');
        $this->load->view('Users/users_view', $data);
        $this->load->view('includes/footer');
    }

    public function delete($id) {
        $delete = $this->users->delete($id);

        if ($delete) {
            $situation = "1";
            $message = "Usuário excluído com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao excluir usuário.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('users'));
    }

}
