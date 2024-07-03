<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {
        $this->load->view('auth/signin');
    }

    public function singupForm()
    {
        $this->load->view('auth/signup');
    }

    public function signin()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $result = $this->Auth_model->findUser($user, $pass);

        if ($result == false) {
            $this->session->set_flashdata('msg_error', 'Username or Password ผิดพลาด');
            redirect('auth');
        } else {
            foreach ($result->result() as $row) {
                $this->data['ID'] = $row->ID;
                $this->data['NationalID'] = $row->NationalID;
                $this->data['Name'] = $row->Name;
                $this->data['Role'] = $row->Role;
            }

            $this->session->set_userdata('LogUserID', $this->data['ID']);
            $this->session->set_userdata('NationalID', $this->data['NationalID']);
            $this->session->set_userdata('Name', $this->data['Name']);
            $this->session->set_userdata('Role', $this->data['Role']);
            $this->session->set_userdata('is_logged_in', true);
            $this->session->set_flashdata('msg_success', 'Login Successful!');

            redirect('Lesson');
        }
    }

    public function register()
    {
        $name = $this->input->post('name');
        $idcard = $this->input->post('idcard');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirmPassword');
        $newDate = date('Y-m-d H:i:s');

        if ($password != $confirmPassword) {
            $msg = [
                'type' => 'error',
                'title' => 'รหัสผ่านไม่ตรงกัน',
            ];

            echo json_encode($msg);
            return;
        }

        $newPassword = password_hash($password, PASSWORD_BCRYPT);
        $data = array(
            'NationalID' => $idcard,
            'Username' => $username,
            'Name' => $name,
            'RegisDate' => $newDate,
            'Email' => $email,
            'Mobile' => $phone,
            'WebPassword' => $newPassword
        );
        
        $result = $this->Auth_model->register($data);

        if ($result) {
            $msg = [
                'type' => 'success',
                'title' => 'ลงทะเบียนเรียบร้อย'
            ];
        } else {
            $msg = [
                'type' => 'error',
                'title' => 'เกิดข้อผิดพลาดในการลงทะเบียนเข้าใช้งาน!'
            ];
        }
        echo json_encode($msg);
    }

    public function logout()
    {
        if ($this->session->userdata('is_logged_in')) {

            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('Role');
        }

        redirect('auth');
    }
}