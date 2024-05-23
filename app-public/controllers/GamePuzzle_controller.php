<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GamePuzzle_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('GamePuzzle_model');
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'Game_Puzzle/gamepage';
        $this->load->view(THEMES, $this->data);
    }

    public function study()
    {
        $No = $this->input->post('No');

        $Search = $this->GamePuzzle_model->get_Search($No)->result();
        foreach ($Search as $row) {
            $this->data['StudentNo'] = $row->StudentNo;
            $this->data['FullName'] = $row->FullName;
            $this->data['ClassYear'] = $row->ClassYear;
            $this->data['Room'] = $row->Room;
        }

        $this->data['Student'] = $this->GamePuzzle_model->get_student()->result();

        $this->data['view_file'] = 'Game_Puzzle/enter-studyname';
        $this->load->view(THEMES, $this->data);
    }

    public function normal()
    {
        $this->data['User'] = $this->GamePuzzle_model->get_user()->result();

        $this->data['view_file'] = 'Game_Puzzle/enter-normalname';
        $this->load->view(THEMES, $this->data);
    }

    public function Role()
    {

        $this->data['view_file'] = 'Game_Puzzle/rolepick';
        $this->load->view(THEMES, $this->data);
    }

    public function Rules($Role)
    {
        $this->data['Role'] = $Role;

        $this->data['view_file'] = 'Game_Puzzle/rules';
        $this->load->view(THEMES, $this->data);
    }

    public function PlayGame($Role)
    {
        $this->data['Role'] = $Role;

        $this->data['view_file'] = 'Game_Puzzle/playgame';
        $this->load->view(THEMES, $this->data);
    }

    public function Score_summary($win, $Role)
    {
        $this->data['win'] = $win;
        $this->data['Role'] = $Role;

        $this->data['view_file'] = 'Game_Puzzle/score-summary';
        $this->load->view(THEMES, $this->data);
    }

    public function get_Stat()
    {
        $Stat = $this->GamePuzzle_model->get_Stat()->result();

        echo json_encode($Stat);
    }

    public function get_StatNormal()
    {
        $Stat = $this->GamePuzzle_model->get_StatNormal()->result();

        echo json_encode($Stat);
    }

    public function Insert_StudentScore()
    {
        $Score = $this->input->post('Score');
        $StudentNo = $this->input->post('StudentNo');
        
        if (strlen($StudentNo) >= 13) {
            $data = array(
                'id_user' => $StudentNo,
                'role' => 'บุคคลทั่วไป',
                'id_game' => 2,
                'score' => $Score,
                'dtp' => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'id_user' => $StudentNo,
                'role' => 'นักเรียน',
                'id_game' => 2,
                'score' => $Score,
                'dtp' => date('Y-m-d H:i:s')
            );
        }

        $this->GamePuzzle_model->Insert($data)->result();
    }
}