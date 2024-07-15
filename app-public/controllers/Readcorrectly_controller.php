<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Readcorrectly_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('dashboard'));
        }
    }

    public function index()
    {
        //----------------------- LOG ACTIVITY -----------------------------//
        $this->LogActivity_model->InsertLog('เข้าเมนูอ่านออกอ่านถูก');
        //----------------------- LOG ACTIVITY -----------------------------//

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
        $this->data['ID'] = $ID;
        
        $this->data['view_file'] = 'Readcorrect/rule_exam';
        $this->load->view(THEMES, $this->data);
    }

    public function SpellTheWord($ID)
    {
        $this->data['ID'] = $ID;

        $this->data['view_file'] = 'Readcorrect/spell-theword';
        $this->load->view(THEMES, $this->data);
    }

    public function Spell_Level($ID)
    {
        $this->data['ID'] = $ID;
        
        $this->data['view_file'] = 'Readcorrect/spell-level';
        $this->load->view(THEMES, $this->data);
    }

    public function Rule_Spell($ID)
    {
        $this->data['ID'] = $ID;
        
        $this->data['view_file'] = 'Readcorrect/role_spell';
        $this->load->view(THEMES, $this->data);
    }
}