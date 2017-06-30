<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->logged_admin) {
            redirect('home/sign_in');
        }
        $this->load->model('Charts_Model', 'charts');
    }

    public function users_per_month() {
        $year = htmlspecialchars(trim($_GET['year']));
        ${'current_year_' . 1} = $this->charts->users_per_month_january($year);
        ${'current_year_' . 2} = $this->charts->users_per_month_february($year);
        ${'current_year_' . 3} = $this->charts->users_per_month_march($year);
        ${'current_year_' . 4} = $this->charts->users_per_month_april($year);
        ${'current_year_' . 5} = $this->charts->users_per_month_may($year);
        ${'current_year_' . 6} = $this->charts->users_per_month_june($year);
        ${'current_year_' . 7} = $this->charts->users_per_month_july($year);
        ${'current_year_' . 8} = $this->charts->users_per_month_august($year);
        ${'current_year_' . 9} = $this->charts->users_per_month_september($year);
        ${'current_year_' . 10} = $this->charts->users_per_month_october($year);
        ${'current_year_' . 11} = $this->charts->users_per_month_november($year);
        ${'current_year_' . 12} = $this->charts->users_per_month_december($year);

        for ($i = 1; $i < 13; $i++) {
            if (${'current_year_' . $i} == null) {
                ${'current_year_' . $i} = 0;
            }
        }

        ${'last_year_' . 1} = $this->charts->users_per_month_january($year - 1);
        ${'last_year_' . 2} = $this->charts->users_per_month_february($year - 1);
        ${'last_year_' . 3} = $this->charts->users_per_month_march($year - 1);
        ${'last_year_' . 4} = $this->charts->users_per_month_april($year - 1);
        ${'last_year_' . 5} = $this->charts->users_per_month_may($year - 1);
        ${'last_year_' . 6} = $this->charts->users_per_month_june($year - 1);
        ${'last_year_' . 7} = $this->charts->users_per_month_july($year - 1);
        ${'last_year_' . 8} = $this->charts->users_per_month_august($year - 1);
        ${'last_year_' . 9} = $this->charts->users_per_month_september($year - 1);
        ${'last_year_' . 10} = $this->charts->users_per_month_october($year - 1);
        ${'last_year_' . 11} = $this->charts->users_per_month_november($year - 1);
        ${'last_year_' . 12} = $this->charts->users_per_month_december($year - 1);

        for ($i = 1; $i < 13; $i++) {
            if (${'last_year_' . $i} == null) {
                ${'last_year_' . $i} = 0;
            }
        }

        $json = array();
        for ($i = 1; $i < 13; $i++) {
            $json[] = array(
                'month' => $year . '-0' . $i,
                $year => ${'current_year_' . $i},
                $year - 1 => ${'last_year_' . $i}
            );
        }

        echo json_encode($json);
    }

    public function characters_per_class() {
        $data['characters_per_class'] = $this->charts->characters_per_class();

        $json = array();
        foreach ($data['characters_per_class'] as $data) {
            $json[] = array(
                'label' => $data->class,
                'value' => $data->characters
            );
        }

        echo json_encode($json);
    }

    public function items_per_buy() {
        $data['items_per_buy'] = $this->charts->items_per_buy();

        $json = array();
        foreach ($data['items_per_buy'] as $data) {
            $json[] = array(
                'label' => $data->item,
                'value' => $data->buys
            );
        }

        echo json_encode($json);
    }

}
