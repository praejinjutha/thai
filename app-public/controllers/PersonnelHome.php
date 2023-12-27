<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonnelHome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library("pagination");

        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('auth'));
        }

        $userRole = $this->session->userdata('Role');
        if (!($userRole === 'admin')) {
            redirect(site_url('dashboard')); 
        }
    }

    public function index()
    {
        // retuen data and redirect to page
        $this->data['view_file'] = 'PersonnelHome/Personnel-work';
        $this->load->view(THEMES, $this->data);
    }

    public function PlanningInformation()
    {
        // retuen data and redirect to page
        $this->data['view_file'] = 'PersonnelHome/PlanningInformation/PlanningInformationHome';
        $this->load->view(THEMES, $this->data);
    }
}
