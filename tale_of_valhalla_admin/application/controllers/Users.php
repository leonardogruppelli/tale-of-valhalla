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

        $this->load->view('includes/header');
        $this->load->view('Users/users_view', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $data = $this->input->post();
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $gold = $data['gold'];
        $gems = $data['gems'];

        $config['upload_path'] = './pictures/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 3000;
        $config['max_height'] = 2000;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('picture')) {
            $situation = "0";
            $message = "Arquivo Inválido " . $this->upload->display_errors();
        } else {
            $archive = $this->upload->data();
            $data['picture'] = $archive['file_name'];

            $insert = $this->users->insert($name, $username, $email, $password, $data['picture'], $gold, $gems);

            if ($insert) {
                $situation = "1";
                $message = "Usuário cadastrado com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao cadastrar usuário.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('users'));
    }

    public function alter() {
        $data = $this->input->post();
        $id = $data['id'];
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $gold = $data['gold'];
        $gems = $data['gems'];

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
                $situation = "0";
                $message = "Arquivo Inválido";
            } else {
                $archive = $this->upload->data();
                $data['picture'] = $archive['file_name'];
            }
        }

        $alter = $this->users->update($id, $name, $username, $email, $data['picture'], $gold, $gems);

        if ($alter) {
            $situation = "1";
            $message = "Usuário alterado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao alterar usuário.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('users'));
    }

    public function delete($id) {
        $user = $this->users->find($id);

        $delete = $this->users->delete($id);

        if ($delete) {
            $situation = "1";
            $message = "Usuário excluído com sucesso.";
            unlink('./pictures/' . $user->picture);
        } else {
            $situation = "0";
            $message = "Erro ao excluir usuário.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('users'));
    }

}
