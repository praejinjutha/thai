<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thai_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('dashboard'));
        }
    }

    public function index()
    {

        $this->data['view_file'] = 'firstpage';
        $this->load->view(THEMES, $this->data);
    }
}