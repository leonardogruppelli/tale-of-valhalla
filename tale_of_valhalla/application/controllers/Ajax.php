<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

// USERS ***********************************************************************
    // Login -------------------------------------------------------------------

    public function verify_user_information() {
        $username = htmlspecialchars(trim($_GET['username']));
        $password = htmlspecialchars(trim($_GET['password']));

        $this->load->model('Users_Model', 'users');

        if (!$this->users->verify($username, $password)) {
            if ($this->users->is_blocked($username, $password) == 0) {
                echo 'Nome de usuário ou senha incorretos.';
            } else {
                echo 'Conta bloqueada.';
            }
        }
    }

    // -------------------------------------------------------------------------
    // Insert ------------------------------------------------------------------

    public function verify_user_name() {
        $name = htmlspecialchars(trim($_GET['name']));
        if (strpos($name, ' ') === false) {
            echo 'Digite seu nome e sobrenome';
        }
    }

    public function verify_user_username() {
        $username = htmlspecialchars(trim($_GET['username']));
        $this->load->model('Users_Model', 'users');

        if ($this->users->find_username($username)) {
            echo 'Nome de usuário já cadastrado';
        }
    }

    public function verify_user_email() {
        $email = htmlspecialchars(trim($_GET['email']));
        $this->load->model('Users_Model', 'users');

        if ($this->users->find_email($email)) {
            echo 'E-mail já cadastrado';
        }
    }

    public function verify_user_password() {
        $confirm_password = htmlspecialchars(trim($_GET['confirm_password']));
        $password = htmlspecialchars(trim($_GET['password']));

        if ($confirm_password !== $password) {
            echo 'Senha incorreta';
        }
    }

    // -------------------------------------------------------------------------
    // Alter -------------------------------------------------------------------

    public function find_user() {
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Users_Model', 'users');

        $data['user'] = $this->users->find($id);

        $name = $data['user']->name;
        $username = $data['user']->username;
        $email = $data['user']->email;
        $gold = $data['user']->gold;
        $gems = $data['user']->gems;
        $picture = $data['user']->picture;

        echo $name . ',' . $username . ',' . $email . ',' . $gold . ',' . $gems . ',' . $picture;
    }

    public function verify_user_username_alter() {
        $username = htmlspecialchars(trim($_GET['username']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Users_Model', 'users');

        if ($username !== $this->users->find_username_alter($id) && $this->users->find_username($username)) {
            echo 'Nome de usuário já cadastrado';
        }
    }

    public function verify_user_email_alter() {
        $email = htmlspecialchars(trim($_GET['email']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Users_Model', 'users');

        if ($email !== $this->users->find_email_alter($id) && $this->users->find_email($email)) {
            echo 'E-mail já cadastrado';
        }
    }

    // -------------------------------------------------------------------------
// *****************************************************************************
}
