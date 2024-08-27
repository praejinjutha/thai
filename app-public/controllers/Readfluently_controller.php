<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Readfluently_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('LogActivity_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('dashboard'));
        }
    }

    public function index()
    {
        //----------------------- LOG ACTIVITY -----------------------------//
        $this->LogActivity_model->InsertLog('เข้าเมนูอ่านเร็วอ่านคล่อง');
        //----------------------- LOG ACTIVITY -----------------------------//

        $this->data['view_file'] = 'Readfluently/readfluently';
        $this->load->view(THEMES, $this->data);
    }

    public function Read_Choose($ID)
    {
        $this->data['ID'] = $ID;

        $this->data['view_file'] = 'Readfluently/read_choose';
        $this->load->view(THEMES, $this->data);
    }
}