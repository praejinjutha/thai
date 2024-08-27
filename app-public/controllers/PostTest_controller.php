<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostTest_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Test_model');
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
        $this->LogActivity_model->InsertLog('เข้าเมนูคลังข้อสอบ');
        //----------------------- LOG ACTIVITY -----------------------------//

        $this->data['view_file'] = 'PostTest/testpage';
        $this->load->view(THEMES, $this->data);
    }

    public function study()
    {
        $No = $this->input->post('No');

        $Search = $this->Test_model->get_Search($No)->result();
        foreach ($Search as $row) {
            $this->data['StudentNo'] = $row->StudentNo;
            $this->data['FullName'] = $row->FullName;
            $this->data['ClassYear'] = $row->ClassYear;
            $this->data['Room'] = $row->Room;
        }

        $this->data['Student'] = $this->Test_model->get_student()->result();

        $this->data['view_file'] = 'PostTest/enter-studyname';
        $this->load->view(THEMES, $this->data);
    }

    public function normal()
    {
        $this->data['User'] = $this->Test_model->get_user()->result();

        $this->data['view_file'] = 'PostTest/enter-normalname';
        $this->load->view(THEMES, $this->data);
    }

    public function get_Stat()
    {
        $Stat = $this->Test_model->get_PostTestStat()->result();

        echo json_encode($Stat);
    }

    public function get_StatNormal()
    {
        $Stat = $this->Test_model->get_PostTestStatNormal()->result();

        echo json_encode($Stat);
    }

    public function PostTest()
    {
        $this->data['Question'] = $this->Test_model->get_Question()->result();

        $this->data['view_file'] = 'PostTest/posttest';
        $this->load->view(THEMES, $this->data);
    }

    public function Question()
    {

        $this->data['view_file'] = 'questionAdd';
        $this->load->view(THEMES, $this->data);
    }

    public function get_Question()
    {
        $Question = $this->Test_model->get_Question()->result();

        echo json_encode($Question);
    }

    function Insert_Question(){

        $title = $this->input->post('title');
        $choice1 = $this->input->post('choice1');
        $choice2 = $this->input->post('choice2');
        $choice3 = $this->input->post('choice3');
        $choice4 = $this->input->post('choice4');
        $correct = $this->input->post('correct');
        $classyear = $this->input->post('classyear');

        $Data = array(
            'title' => $title,
            'choice1' => $choice1,
            'choice2' => $choice2,
            'choice3' => $choice3,
            'choice4' => $choice4,
            'correct' => $correct,
            'classyear' => $classyear
        );

        $results = $this->Test_model->Insert_Question($Data);
        
        if ($results) { 

            //----------------------- LOG ACTIVITY -----------------------------//
            $this->LogActivity_model->InsertLog('เพิ่มข้อสอบในเมนูคลังข้อสอบ');
            //----------------------- LOG ACTIVITY -----------------------------//

            echo 'Success';
        } else {
            echo 'error';
        }
    }

    function Update_Question(){

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $choice1 = $this->input->post('choice1');
        $choice2 = $this->input->post('choice2');
        $choice3 = $this->input->post('choice3');
        $choice4 = $this->input->post('choice4');
        $correct = $this->input->post('correct');
        $classyear = $this->input->post('classyear');

        $Data = array(
            'title' => $title,
            'choice1' => $choice1,
            'choice2' => $choice2,
            'choice3' => $choice3,
            'choice4' => $choice4,
            'correct' => $correct,
            'classyear' => $classyear
        );

        $results = $this->Test_model->Update_Question($id, $Data);
        
        if ($results) { 

            //----------------------- LOG ACTIVITY -----------------------------//
            $this->LogActivity_model->InsertLog('แก้ไขข้อสอบในเมนูคลังข้อสอบ');
            //----------------------- LOG ACTIVITY -----------------------------//

            echo 'Success';
        } else {
            echo 'error';
        }
    }

    public function Delete_Question()
    {
        $id = $this->input->post('id');

        $results = $this->Test_model->Delete_Question($id);
        if ($results) {

            //----------------------- LOG ACTIVITY -----------------------------//
            $this->LogActivity_model->InsertLog('ลบข้อสอบในเมนูคลังข้อสอบ');
            //----------------------- LOG ACTIVITY -----------------------------//

            echo 'Success';
        } else {
            echo 'error';
        }
    }

    public function Insert_Score()
    {
        $StudentNo = $this->input->post('No');
        $Score = $this->input->post('Score');

        $getScore = $this->Test_model->get_score($StudentNo)->num_rows();

        if (strlen($StudentNo) >= 13) {
            $data = array(
                'id_user' => $StudentNo,
                'role' => 'บุคคลทั่วไป',
                'id_game' => 4,
                'score' => $Score,
                'dtp' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'id_user' => $StudentNo,
                'role' => 'นักเรียน',
                'id_game' => 4,
                'score' => $Score,
                'dtp' => date('Y-m-d H:i:s')
            );
        }

        $results = $this->Test_model->Insert_PostTestScore($data);

        if ($results) {
            echo 'Success';
        } else {
            echo 'error';
        }
    }
}