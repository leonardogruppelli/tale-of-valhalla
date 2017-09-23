<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function verify() {
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
    }

    public function index() {
        $this->verify();
        
        $session['navigation'] = "play";
        $this->session->set_userdata($session);
        
        $this->load->view('includes/header');
        $this->load->view('home');
        $this->load->view('includes/footer');
    }

    public function login() {
        $this->load->view('login');
    }
    
    public function sign_in() {
        $this->load->model('Users_Model', 'users');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $verify = $this->users->verify($username, $password);

        if (isset($verify)) {
            $session['name'] = $verify->name;
            $session['username'] = $verify->username;
            $session['picture'] = $verify->picture;
            $session['id'] = $verify->id;
            $session['gold'] = $verify->gold;
            $session['runes'] = $verify->runes;
            $session['date'] = date_format(date_create($verify->date), 'd/m/y');
            $session['selected_character'] = 0;
            $session['selected_class'] = 0;
            $session['logged'] = true;
            $this->session->set_userdata($session);
        }

        redirect();
    }
    
    public function sign_up() {
        $this->load->model('Users_Model', 'users');
        
        $data = $this->input->post();
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        
        $config['upload_path'] = './pictures/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 3000;
        $config['max_height'] = 2000;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('picture')) {
            $situation = "0";
            $message = "Arquivo Inválido.";
        } else {
            $archive = $this->upload->data();
            $data['picture'] = $archive['file_name'];
            
            $datetime = new DateTime();
            $date = $datetime->format("Y-m-d");

            $insert = $this->users->insert($name, $username, $email, $password, $data['picture'], $date);

            if ($insert) {
                $situation = "1";
                $message = "Cadastro realizado com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao cadastrar usuário.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('home/login'));
    }

    public function leave() {
        $this->session->sess_destroy();
        redirect();
    }

}
