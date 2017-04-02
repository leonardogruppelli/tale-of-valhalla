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

        $this->load->view('includes/header');
        $this->load->view('Types/types_view', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $data = $this->input->post();

        $insert = $this->types->insert($data);

        if ($insert) {
            $situation = "1";
            $message = "Tipo cadastrado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao cadastrar tipo.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('types'));
    }

    public function alter() {
        $data = $this->input->post();

        $alter = $this->types->update($data);

        if ($alter) {
            $situation = "1";
            $message = "Tipo alterado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao alterar tipo.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('types'));
    }

    public function delete($id) {
        $delete = $this->types->delete($id);

        if ($delete) {
            $situation = "1";
            $message = "Tipo excluído com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao excluir tipo.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('types'));
    }

}
