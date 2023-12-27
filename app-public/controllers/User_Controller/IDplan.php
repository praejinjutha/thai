<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class IDplan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model/IDplan_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library('session');
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
        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome/IDplan/IDplanHome';
        $this->load->view(THEMES, $this->data);
    }

    public function show($IDCard)
    {
        $NationalID = $this->session->userdata('NationalID');
        if ($NationalID !== $IDCard) {
            redirect(site_url('User_Controller/PersonnelHome_User')); 
        }

        $results = $this->IDplan_model->get_PersonnelData($IDCard);
        foreach ($results->result() as $row) {
            $this->data['IDCard'] = $row->IDCard;
        }

        $results = $this->IDplan_model->get_NationalID_UserData($IDCard);
        foreach ($results->result() as $row) {
            $this->data['NationalID'] = $row->NationalID;
        }

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome_User/IDplan/IDplanShow';
        $this->load->view(THEMES, $this->data);
    }

    function fech_IDPlan()
    {   
        $Year = $this->input->post('Year');
        $results = $this->IDplan_model->fech_IDPlanYear($Year);
       
        echo json_encode($results);
    }

    function fech_PerformanceAgreement()
    {   
        $IDCard = $this->input->post('IDCard');
        $Year = $this->input->post('Year');
        $results = $this->IDplan_model->fech_PerformanceAgreement($IDCard, $Year)->result();

        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($results);
    }

    function Insert_PerformanceAgreement()
    {
        $EdYear = $this->input->post('EdYear');
        $IDCard = $this->input->post('IDCard');
        $dateup = $this->input->post('dateup');
        $Topic = $this->input->post('Topic');
        $note = $this->input->post('note');
        $Status = $this->input->post('Status');
        $CreatedAt = date('Y-m-d H:i:s');
        $UpdatedAt = date('Y-m-d H:i:s');

        $FileName = isset($_FILES['FileName']['name']) ? $_FILES['FileName']['name'] : null;
        $Attachment = isset($_FILES['FileName']['tmp_name']) ? file_get_contents($_FILES['FileName']['tmp_name']) : null;

        $results = $this->IDplan_model->insert_PDO_PerformanceAgreement($EdYear, $IDCard, $dateup, $Topic, $note, $Status, $CreatedAt, $UpdatedAt, $FileName, $Attachment);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function update_IDplan() 
    {
        $id = $this->input->post('id');
        $EdYear = $this->input->post('EdYear');
        $IDCard = $this->input->post('IDCard');
        $dateup = $this->input->post('dateup');
        $note = $this->input->post('note');
        $UpdatedAt = date('Y-m-d H:i:s');
    
        $row = $this->IDplan_model->get_IDPlanID($id)->row();
    
        $FileName = null;
        $Attachment = null;
    
        if (!empty($_FILES['FileName']['name'])) {
            $FileName = $_FILES['FileName']['name'];
            $Attachment = file_get_contents($_FILES['FileName']['tmp_name']);
        } else {
            $FileName = $row->FileName;
            $Attachment = $row->Attachment;
        }
    
        $results = $this->IDplan_model->update_IDplan($id, $EdYear, $IDCard, $dateup, $note, $UpdatedAt, $FileName, $Attachment);
    
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    } 

    public function delete_IDplan()
    {
        $id = $this->input->post('id');

        $results = $this->IDplan_model->delete_IDplan($id);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($id){
        $result = $this->IDplan_model->export_File($id);
        foreach ($result->result() as $row) {
            $sub = strchr($row->FileName, ".");
            $disSub = substr($sub, 1, 100);
            if (strchr($row->FileName, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($row->FileName, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($row->FileName, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            }
        }
    }

}
