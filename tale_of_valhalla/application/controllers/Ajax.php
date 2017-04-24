<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

// USERS ***********************************************************************
    
    // Login -------------------------------------------------------------------

    public function verify_user_information() {
        $email = htmlspecialchars(trim($_GET['email']));
        $password = htmlspecialchars(trim($_GET['password']));

        $this->load->model('Users_Model', 'users');

        if (!$this->users->verify($email, $password)) {
            echo 'E-mail ou senha incorretos.';
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
        
        echo $name . ',' . $username . ',' . $email . ','  . $gold . ',' . $gems . ',' . $picture;
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

// *****************************************************************************

// Items ***********************************************************************
    
    // Insert ------------------------------------------------------------------
    
    public function verify_item_name() {
        $name = htmlspecialchars(trim($_GET['name']));
        $this->load->model('Items_Model', 'items');

        if ($this->items->find_name($name)) {
            echo 'Item já cadastrado';
        }
    }

    public function update_sell_price() {
        $buy_price = htmlspecialchars(trim($_GET['buy_price']));

        $sell_price = $buy_price * 0.50;

        echo $sell_price;
    }

    // -------------------------------------------------------------------------
    
    // Alter -------------------------------------------------------------------
    
    public function find_item() {
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Items_Model', 'items');

        $data['item'] = $this->items->find($id);

        $name = $data['item']->name;
        $type = $data['item']->type_id;
        $buy_price = $data['item']->buy_price;
        $sell_price = $data['item']->sell_price;
        $rarity = $data['item']->rarity;
        $level = $data['item']->level;
        $attack = $data['item']->attack;
        $defense = $data['item']->defense;
        $agility = $data['item']->agility;
        $intelligence = $data['item']->intelligence;
        $unique = $data['item']->unique;
        $image = $data['item']->image;
        
        echo $name . ',' . $type . ','  . $buy_price . ',' . $sell_price . ',' . $rarity . ',' . $level . ','  . $attack . ',' . $defense . ',' . $agility . ','  . $intelligence . ',' . $unique . ',' . $image;
    }
    
    // -------------------------------------------------------------------------
    
// *****************************************************************************
}
