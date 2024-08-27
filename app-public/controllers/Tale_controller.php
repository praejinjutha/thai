<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tale_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
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
        $this->LogActivity_model->InsertLog('เข้าเมนูนิทาน');
        //----------------------- LOG ACTIVITY -----------------------------//

        $this->data['view_file'] = 'tale';
        $this->load->view(THEMES, $this->data);
    }
}