<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Items_Model', 'items');
    }

    public function index() {
        $this->load->model('Types_Model', 'types');
        $this->load->model('Classes_Model', 'classes');

        $data['items'] = $this->items->select();
        $data['types'] = $this->types->select();
        $data['classes'] = $this->classes->select();
        
        $session['admin_navigation_tables'] = true;
        $session['admin_navigation'] = "items";
        $this->session->set_userdata($session);

        $this->load->view('includes/header');
        $this->load->view('Items/items_view', $data);
        $this->load->view('includes/footer');
    }

    public function insert() {
        $data = $this->input->post();

        $config['upload_path'] = './items_images/';
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

            $insert = $this->items->insert($data);

            if ($insert) {
                $situation = "1";
                $message = "Item cadastrado com sucesso.";
            } else {
                $situation = "0";
                $message = "Erro ao cadastrar item.";
            }
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('items'));
    }

    public function alter() {
        $data = $this->input->post();

        $item = $this->items->find($data['id']);

        if ($_FILES["image"]["tmp_name"] != null) {
            unlink('./items_images/' . $item->image);
            $config['upload_path'] = './items_images/';
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

        $alter = $this->items->update($data);

        if ($alter) {
            $situation = "1";
            $message = "Item alterado com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao alterar item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('items'));
    }

    public function delete($id) {
        $delete = $this->items->delete($id);

        if ($delete) {
            $situation = "1";
            $message = "Item excluído com sucesso.";
        } else {
            $situation = "0";
            $message = "Erro ao excluir item.";
        }

        $this->session->set_flashdata('situation', $situation);
        $this->session->set_flashdata('message', $message);

        redirect(base_url('items'));
    }

}
