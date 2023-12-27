<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonnelHome_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model/PersonnelInformation_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library("pagination");

        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('auth'));
        }

        $userRole = $this->session->userdata('Role');
        if (!($userRole === 'user')) {
            redirect(site_url('dashboard')); 
        }
    }


    public function index()
    {
        $user_id = $this->session->userdata('LogUserID');

        $IDCard = $this->PersonnelInformation_model->get_NationalID($user_id);

        $this->data['IDCard'] = $IDCard;

        $this->data['view_file'] = 'PersonnelHome_User/Personnel-work-User';
        $this->load->view(THEMES, $this->data);
    }

    public function PlanningInformation()
    {
        $this->data['view_file'] = 'PersonnelHome/PlanningInformation/PlanningInformationHome';
        $this->load->view(THEMES, $this->data);
    }
}
