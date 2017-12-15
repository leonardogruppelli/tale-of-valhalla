<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

        $this->load->model('Users_Model', 'users');
    }

    public function index() {
        $data['users'] = $this->users->select();

        $session['navigation_battle'] = false;
        $session['navigation_history'] = false;
        $session['navigation_ranking'] = false;
        $session['navigation'] = "users";
        $this->session->set_userdata($session);

        $riches['riches'] = $this->users->select_riches($this->session->id);

        $this->load->view('includes/header', $riches);
        $this->load->view('Users/users_view', $data);
        $this->load->view('includes/footer');
    }

    public function alter() {
        $data = $this->input->post();
        $id = $data['id'];
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $gold = $data['gold'];
        $runes = $data['runes'];

        $user = $this->users->find($data['id']);

        if ($_FILES["picture"]["tmp_name"] != null) {
            unlink('./pictures/' . $user->picture);
            $config['upload_path'] = './pictures/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 3000;
            $config['max_height'] = 2000;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture')) {
                $type = "0";
                $message = "Arquivo Inválido";
            } else {
                $archive = $this->upload->data();
                $data['picture'] = $archive['file_name'];
            }
        }

        $alter = $this->users->update($id, $name, $username, $email, $data['picture'], $gold, $runes);

        if ($alter) {
            $type = "1";
            $message = "Usuário alterado com sucesso.";
        } else {
            $type = "0";
            $message = "Erro ao alterar usuário.";
        }

        $this->session->set_flashdata('type', $type);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('users'));
    }

    public function delete($id) {
        $user = $this->users->find($id);

        $delete = $this->users->delete($id);

        if ($delete) {
            unlink('./pictures/' . $user->picture);
        }

        redirect(base_url('users'));
    }

}
