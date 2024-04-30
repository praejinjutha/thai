<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Readcorrectly_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'Readcorrect/readcorrect';
        $this->load->view(THEMES, $this->data);
    }

    public function Exam($ID)
    {
        $this->data['ID'] = $ID;

        $this->data['view_file'] = 'Readcorrect/exam';
        $this->load->view(THEMES, $this->data);
    }

    public function ExamTreasury()
    {

        $this->data['view_file'] = 'Readcorrect/exam-treasury';
        $this->load->view(THEMES, $this->data);
    }

    public function TreasuryID()
    {

        $this->data['view_file'] = 'Readcorrect/treasuryID';
        $this->load->view(THEMES, $this->data);
    }

    public function Explanation_Exam($ID)
    {
        $this->data['ID'] = $ID;

        $this->data['view_file'] = 'Readcorrect/explanation-exam';
        $this->load->view(THEMES, $this->data);
    }

    public function Rule_Exam($ID)
    {
        
        $this->data['view_file'] = 'Readcorrect/rule_exam';
        $this->load->view(THEMES, $this->data);
    }
}