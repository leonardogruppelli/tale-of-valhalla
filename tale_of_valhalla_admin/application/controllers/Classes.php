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

    public function insert() {
        $data = $this->input->post();

        $insert = $this->classes->insert($data);

        if ($insert) {
            $situation = "1";
            $message = "Classe cadastrada com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao cadastrar classe.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('classes'));
    }

    public function alter() {
        $data = $this->input->post();

        $alter = $this->classes->update($data);

        if ($alter) {
            $situation = "1";
            $message = "Classe alterada com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao alterar classe.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('classes'));
    }

    public function delete($id) {
        $delete = $this->classes->delete($id);

        if ($delete) {
            $situation = "1";
            $message = "Classe excluída com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao excluir classe.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('classes'));
    }

}
