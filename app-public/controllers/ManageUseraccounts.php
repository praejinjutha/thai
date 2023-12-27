<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class ManageUseraccounts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ManageUseraccounts_model');
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
        $this->data['PName'] = $this->ManageUseraccounts_model->get_TSPname();

        $this->data['view_file'] = 'HelperHome/ManageUseraccounts/ManageUseraccountsHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_ManageUseraccounts()
    {   
        $results = $this->ManageUseraccounts_model->fech_ManageUseraccounts()->result();

        foreach ($results as $row) {
            $row->RegisDate = date('d-m-Y H:i:s', strtotime($row->RegisDate) - 7 * 3600);
        }

        echo json_encode($results);
    }

    public function Insert_Useraccounts()
    {
        $Name= $this->input->post('Name');
        $NationalID= $this->input->post('NationalID');
        $Email= $this->input->post('Email');
        $Mobile = $this->input->post('Mobile');
        $Username = $this->input->post('Username');
        $Password = $this->input->post('Password');
        $Confirm = $this->input->post('Confirm');
        $Level = $this->input->post('Level');
        $Personnel = $this->input->post('Personnel');

        if ($Password != $Confirm) {
            echo 'PasswordMismatch';
            return;
        }

        $newPassword = password_hash($Password, PASSWORD_BCRYPT);

        $checkUser = $this->ManageUseraccounts_model->checkUsername($Username);
        if ($checkUser >= '1') {
            echo 'ThisUsernameAlreadyExists';
            return;
        }else{
            $data = array(
                'Name' => $Name,
                'NationalID' => $NationalID,
                'Email' => $Email,
                'Mobile' => $Mobile,
                'Username' => $Username,
                'WebPassword' => $newPassword,
                'AdminPersonal' => $Personnel,
                'Role' => $Level,
                'RegisDate' => date('Y-m-d H:i:s')
            );
        }

        $results = $this->ManageUseraccounts_model->Insert_Useraccounts($data);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_Useraccounts()
    {
        $ID = $this->input->post('ID');
        $Name = $this->input->post('Name');
        $NationalID = $this->input->post('NationalID');
        $Email = $this->input->post('Email');
        $Mobile = $this->input->post('Mobile');
        $Username = $this->input->post('Username');
        $Level = $this->input->post('Level');
        $Personnel = $this->input->post('Personnel');

        $data = array(
            'Name' => $Name,
            'NationalID' => $NationalID,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'Username' => $Username,
            'Role' => $Level,
            'AdminPersonal' => $Personnel,
            'RegisDate' => date('Y-m-d H:i:s')
        );

        $results = $this->ManageUseraccounts_model->update_Useraccounts($ID, $data);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_Useraccounts()
    {
        $ID = $this->input->post('ID');

        $results = $this->ManageUseraccounts_model->delete_Useraccounts($ID);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function Edit_Password()
    {
        $ID = $this->input->post('ID');

        $results = $this->ManageUseraccounts_model->Edit_Password($ID)->row(); 
        echo json_encode($results);
    }

    public function update_Password()
    {
        $ID = $this->input->post('ID');
        $Password = $this->input->post('Password');
        $ConfirmPassword = $this->input->post('ConfirmPassword');

        if ($Password != $ConfirmPassword) {
            echo 'PasswordMismatch';
            return;
        }

        $newPassword = password_hash($Password, PASSWORD_BCRYPT);

        $data = array(
            'WebPassword' => $newPassword
        );

        $results = $this->ManageUseraccounts_model->update_Password($ID, $data);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }
}
