<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

// Managers ********************************************************************

    // Login -------------------------------------------------------------------

    public function verify_manager_information() {
        $email = htmlspecialchars(trim($_GET['email']));
        $password = htmlspecialchars(trim($_GET['password']));

        $this->load->model('Managers_Model', 'managers');

        if (!$this->managers->verify($email, $password)) {
            echo 'E-mail ou senha incorretos.';
        }
    }

    // -------------------------------------------------------------------------
    
// *****************************************************************************
    
// Classes ***********************************************************************
    
    // Insert ------------------------------------------------------------------

    public function verify_class_name() {
        $name = htmlspecialchars(trim($_GET['name']));
        $this->load->model('Classes_Model', 'classes');

        if ($this->classes->find_name($name)) {
            echo 'Classe já cadastrada';
        }
    }

    // -------------------------------------------------------------------------
    
    // Alter -------------------------------------------------------------------

    public function find_class() {
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Classes_Model', 'classes');

        $data['class'] = $this->classes->find($id);

        $name = $data['class']->name;
        
        echo $name;
    }
    
    public function verify_class_name_alter() {
        $name = htmlspecialchars(trim($_GET['name']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Classes_Model', 'classes');

        if (strtolower($name) !== strtolower($this->classes->find_name_alter($id)) && $this->classes->find_name($name)) {
            echo 'Classe já cadastrada';
        }
    }

    // -------------------------------------------------------------------------
    
// *****************************************************************************
    
// Types ***********************************************************************
    
    // Insert ------------------------------------------------------------------

    public function verify_type_name() {
        $name = htmlspecialchars(trim($_GET['name']));
        $this->load->model('Types_Model', 'types');

        if ($this->types->find_name($name)) {
            echo 'Tipo já cadastrado';
        }
    }

    // -------------------------------------------------------------------------
    
    // Alter -------------------------------------------------------------------

    public function find_type() {
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Types_Model', 'types');

        $data['type'] = $this->types->find($id);

        $name = $data['type']->name;
        
        echo $name;
    }
    
    public function verify_type_name_alter() {
        $name = htmlspecialchars(trim($_GET['name']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Types_Model', 'types');

        if (strtolower($name) !== strtolower($this->types->find_name_alter($id)) && $this->types->find_name($name)) {
            echo 'Tipo já cadastrado';
        }
    }

    // -------------------------------------------------------------------------
    
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
        $class = $data['item']->class_id;
        $rarity = $data['item']->rarity;
        $buy_price = $data['item']->buy_price;
        $sell_price = $data['item']->sell_price;
        $level = $data['item']->level;
        $attack = $data['item']->attack;
        $defense = $data['item']->defense;
        $agility = $data['item']->agility;
        $intelligence = $data['item']->intelligence;
        $unique = $data['item']->unique;
        $image = $data['item']->image;

        echo $name . ',' . $type . ',' . $class . ',' . $rarity . ',' . $buy_price . ',' . $sell_price . ',' . $level . ',' . $attack . ',' . $defense . ',' . $agility . ',' . $intelligence . ',' . $unique . ',' . $image;
    }
    
    public function verify_item_name_alter() {
        $name = htmlspecialchars(trim($_GET['name']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Items_Model', 'items');

        if (strtolower($name) !== strtolower($this->items->find_name_alter($id)) && $this->items->find_name($name)) {
            echo 'Item já cadastrado';
        }
    }

    // -------------------------------------------------------------------------
    
// *****************************************************************************
    
// Enemies ***********************************************************************
    
    // Insert ------------------------------------------------------------------

    public function verify_enemy_name() {
        $name = htmlspecialchars(trim($_GET['name']));
        $this->load->model('Enemies_Model', 'enemies');

        if ($this->enemies->find_name($name)) {
            echo 'Inimigo já cadastrado';
        }
    }

    // -------------------------------------------------------------------------
    
    // Alter -------------------------------------------------------------------

    public function find_enemy() {
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Enemies_Model', 'enemies');

        $data['enemy'] = $this->enemies->find($id);

        $name = $data['enemy']->name;
        $attack = $data['enemy']->attack;
        $defense = $data['enemy']->defense;
        $agility = $data['enemy']->agility;
        $intelligence = $data['enemy']->intelligence;
        $health = $data['enemy']->health;
        $mana = $data['enemy']->mana;
        $hp_potions = $data['enemy']->hp_potions;
        $mp_potions = $data['enemy']->mp_potions;
        $image = $data['enemy']->image;
        
        echo $name . ',' . $attack . ',' . $defense . ',' . $agility . ',' . $intelligence . ',' . $health . ',' . $mana . ',' . $hp_potions . ',' . $mp_potions . ',' . $image;
    }
    
    public function verify_enemy_name_alter() {
        $name = htmlspecialchars(trim($_GET['name']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Types_Model', 'types');

        if (strtolower($name) !== strtolower($this->types->find_name_alter($id)) && $this->types->find_name($name)) {
            echo 'Tipo já cadastrado';
        }
    }

    // -------------------------------------------------------------------------
    
// *****************************************************************************

// USERS ***********************************************************************

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

        if (strtolower($username) !== strtolower($this->users->find_username_alter($id)) && $this->users->find_username($username)) {
            echo 'Nome de usuário já cadastrado';
        }
    }

    public function verify_user_email_alter() {
        $email = htmlspecialchars(trim($_GET['email']));
        $id = htmlspecialchars(trim($_GET['id']));
        $this->load->model('Users_Model', 'users');

        if (strtolower($email) !== strtolower($this->users->find_email_alter($id)) && $this->users->find_email($email)) {
            echo 'E-mail já cadastrado';
        }
    }

// *****************************************************************************
    
}
