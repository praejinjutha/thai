<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helpdesk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Helpdesk_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
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
        $get_No = $this->Helpdesk_model->get_No_Helpdesk();
        $this->data["get_No"]  = $get_No->result();

        $this->data['view_file'] = 'HelperHome/Helpdesk/HelpdeskHome';
        $this->load->view(THEMES, $this->data);
    }

    function fetch_Helpdesk()
    {   
        $results = $this->Helpdesk_model->fetch_Helpdesk()->result();
        echo json_encode($results);
    }

    function Insert_Helpdesk(){

        $System = 'Personal';
        
        $Data = array(
            'System' => $System,
            'No' => $this->input->post('No'),
            'Subject' => $this->input->post('Subject'),
            'Detail' => $this->input->post('Detail'),
            'CreateAt' => date('Y-m-d H:i:s'),
            'UpdateAt' => date('Y-m-d H:i:s')
        );

        $results = $this->Helpdesk_model->Insert_Helpdesk($Data);
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_Helpdesk()
    {
        $ID = $this->input->post('ID');

        $results = $this->Helpdesk_model->delete_Helpdesk($ID);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function Search_Helpdesk()
    {
        $Search = $this->input->post('Search');
        $data = $this->Helpdesk_model->Search_Helpdesk($Search)->result();

        echo json_encode($data);
    }
}