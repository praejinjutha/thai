<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $mode_db;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->mode_db = $this->load->database('mode_database', TRUE);
        $this->load->model('Auth_model');
        $this->load->model('LogActivity_model');
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

            
            //----------------------- LOG ACTIVITY -----------------------------//
            $this->Auth_model->InsertLog($this->data['ID']);
            //----------------------- LOG ACTIVITY -----------------------------//

            $this->session->set_userdata('LogUserID', $this->data['ID']);
            $this->session->set_userdata('NationalID', $this->data['NationalID']);
            $this->session->set_userdata('Name', $this->data['Name']);
            $this->session->set_userdata('Role', $this->data['Role']);
            $this->session->set_userdata('is_logged_in', true);
            $this->session->set_userdata('login_time', time());
            $this->session->set_flashdata('msg_success', 'Login Successful!');

            redirect('Lesson');
        }
    }

    public function signinStd()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $result = $this->Auth_model->findUserStd($user, $pass)->result();

        if ($result == false) {
            $this->session->set_flashdata('msg_error', 'เลขบัตรประชาชนหรือเลขที่นักเรียน');
            redirect('auth');
        } else {
            foreach ($result as $row) {
                $this->data['ID'] = $row->ID;
                $this->data['NationalID'] = $row->NationalID;
                $this->data['Name'] = $row->Name;
            }

            $this->session->set_userdata('LogUserID', $this->data['ID']);
            $this->session->set_userdata('NationalID', $this->data['NationalID']);
            $this->session->set_userdata('Name', $this->data['Name']);
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
        $role = $this->input->post('role');
        $AcYear = date('Y') + 543;
        $StudentNo = $this->input->post('StudentNo');
        $Titlename = $this->input->post('Titlename');
        $Firstname = $this->input->post('Firstname');
        $Lastname = $this->input->post('Lastname');
        $CitizenID = $this->input->post('CitizenID');
        $ClassYear = $this->input->post('ClassYear');
        $Room = $this->input->post('Room');
        $SchoolName = $this->input->post('SchoolName');

        $data = $this->Auth_model->getStudentNo($StudentNo, $ClassYear, $Room)->result();
        
        foreach ($data as $row) {
            $StdNo = $row->StudentNo;
        }

        if ($Titlename = 'เด็กชาย') {
            $Gender = 'ช';
        } else {
            $Gender = 'ญ';
        }

        if ($role == 'teacher') {

            if ($password != $confirmPassword) {
                $msg = [
                    'type' => 'error',
                    'title' => 'รหัสผ่านไม่ตรงกัน',
                ];
    
                echo json_encode($msg);
                return;
            }

            ob_start();
            system('ipconfig /all');
            $mycom = ob_get_contents();
            ob_clean();
        
            $findme = "Physical Address";
            $pmac = strpos($mycom, $findme);
        
            if ($pmac !== false) {
                $mac = substr($mycom, ($pmac + 36), 17); 
            } else {
                $mac = '';
            }

            $isValid = $this->Auth_model->checkKey($key, $this->mode_db)->result();
            foreach ($isValid as $row) {
                $ID = $row->id;
                $MaxDevice = $row->MaxDevice;
            }

            $Count = $this->Auth_model->checkActivat($ID, $this->mode_db);
            if ($Count >= $MaxDevice) {
                echo json_encode(['type' => 'error', 'title' => 'Product key ใช้งานครบตามจำนวนเเล้ว']);
                return;
            } else {
                $AcData = array(
                    'ProductID' => $ID,
                    'MAC' => $mac,
                    'IsActivated' => 1,
                    'ActivatedDate' => date('Y-m-d H:i:s')
                );
    
                $regiskey = $this->Auth_model->insertActivate($AcData, $this->mode_db);
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
        } else {

            if ($StudentNo == $StdNo) {
                $msg = [
                    'type' => 'error',
                    'title' => 'มีเลขที่นักเรียนนี้อยู่ในห้องแล้ว กรุณาตรวจสอบเลขที่นักเรียนอีกครั้ง',
                ];
    
                echo json_encode($msg);
                return;
            }

            $data = array(
                'AcYear' => $AcYear,
                'StudentNo' => $StudentNo,
                'Titlename' => $Titlename,
                'Gender' => $Gender,
                'Firstname' => $Firstname,
                'Lastname' => $Lastname,
                'RegisterDate' => $newDate,
                'ClassYear' => $ClassYear,
                'Room' => $Room,
                'SchoolName' => $SchoolName,
            );
            
            $result = $this->Auth_model->registerStudent($data);
        }

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
        //----------------------- LOG ACTIVITY -----------------------------//
        $this->LogActivity_model->InsertLog('Logout ออกจากระบบ');
        //----------------------- LOG ACTIVITY -----------------------------//
        
        if ($this->session->userdata('is_logged_in')) {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('Role');
            $this->session->unset_userdata('login_time');
        }

        redirect('dashboard');
    }

    public function checkKey() {
        $key = $this->input->post('key');
        $response = $this->Auth_model->isValidKey($key, $this->mode_db);
        
        echo json_encode($response);
    }
}