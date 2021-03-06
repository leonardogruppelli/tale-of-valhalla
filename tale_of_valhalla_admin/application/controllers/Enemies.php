<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enemies extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Enemies_Model', 'enemies');
    }

    public function index() {
        $data['enemies'] = $this->enemies->select();
        
        $session['admin_navigation_tables'] = true;
        $session['admin_navigation'] = "enemies";
        $this->session->set_userdata($session);

        $this->load->view('includes/header');
        $this->load->view('Enemies/enemies_view', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $data = $this->input->post();

        $config['upload_path'] = './enemies_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $situation = "0";
            $message = "Arquivo Inválido " . $this->upload->display_errors();
        } else {
            $archive = $this->upload->data();
            $data['image'] = $archive['file_name'];

            $insert = $this->enemies->insert($data);

            if ($insert) {
                $situation = "1";
                $message = "Inimigo cadastrado com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao cadastrar Inimigo.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('enemies'));
    }

    public function alter() {
        $data = $this->input->post();

        $enemy = $this->enemies->find($data['id']);

        if ($_FILES["image"]["tmp_name"] != null) {
            unlink('./enemies_images/' . $enemy->image);
            $config['upload_path'] = './enemies_images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $situation = "0";
                $message = "Arquivo Inválido";
            } else {
                $archive = $this->upload->data();
                $data['image'] = $archive['file_name'];
            }
        }

        $alter = $this->enemies->update($data);

        if ($alter) {
            $situation = "1";
            $message = "Inimgo alterado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao alterar inimigo.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('enemies'));
    }

    public function delete($id) {
        $delete = $this->enemies->delete($id);

        if ($delete) {
            $situation = "1";
            $message = "Inimigo excluído com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao excluir inimigo.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('enemies'));
    }
    
    public function ativate($id) {
        $ativate = $this->enemies->ativate($id);

        if ($ativate) {
            $situation = "1";
            $message = "Inimigo ativado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao ativar inimigo.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('enemies'));
    }

}
