<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GameLearningThai_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('GameLearningThai_model');
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'Game_LearningThai/gamepage';
        $this->load->view(THEMES, $this->data);
    }

    public function Level()
    {
        $this->data['view_file'] = 'Game_LearningThai/level-thaigame';

        $this->data['view_file'] = 'Game_LearningThai/level-thaigame';
        $this->load->view(THEMES, $this->data);
    }

    public function get_Stat()
    {
        $No = $this->input->post('No');
        $Stat = $this->GameLearningThai_model->get_Stat($No)->result();

        echo json_encode($Stat);
    }

    public function study()
    {
        $No = $this->input->post('No');

        $Search = $this->GameLearningThai_model->get_Search($No)->result();
        foreach ($Search as $row) {
            $this->data['StudentNo'] = $row->StudentNo;
            $this->data['FullName'] = $row->FullName;
            $this->data['ClassYear'] = $row->ClassYear;
            $this->data['Room'] = $row->Room;
        }

        $this->data['Student'] = $this->GameLearningThai_model->get_student()->result();

        $this->data['view_file'] = 'Game_LearningThai/enter-studyname';
        $this->load->view(THEMES, $this->data);
    }

    public function normal()
    {
        $this->data['User'] = $this->GameLearningThai_model->get_user()->result();

        $this->data['view_file'] = 'Game_LearningThai/enter-normalname';
        $this->load->view(THEMES, $this->data);
    }

    public function rules($ID)
    {
        $this->data['ID'] = $ID;
        $this->data['view_file'] = 'Game_LearningThai/rules-thaigame';
        $this->load->view(THEMES, $this->data);
    }
    
    public function Thaigame($ID)
    {
        $this->data['Level'] = $ID;
        $this->data['view_file'] = 'Game_LearningThai/thaigame';
        $this->load->view(THEMES, $this->data);
    }

    public function Score_summary()
    {
        
        $this->data['view_file'] = 'Game_LearningThai/score-summary';
        $this->load->view(THEMES, $this->data);
    }

    public function Insert_StudentScore()
    {
        $Score = $this->input->post('Score');
        $StudentNo = $this->input->post('StudentNo');
        $unit = $this->input->post('unit');
        
        if (strlen($StudentNo) >= 13) {
            $data = array(
                'id_user' => $StudentNo,
                'role' => 'บุคคลทั่วไป',
                'id_game' => 1,
                'unit' => $unit,
                'score' => $Score,
            );
        } else {
            $data = array(
                'id_user' => $StudentNo,
                'role' => 'นักเรียน',
                'id_game' => 1,
                'unit' => $unit,
                'score' => $Score,
            );
        }

        $this->GameLearningThai_model->Insert($data)->result();
    }
}