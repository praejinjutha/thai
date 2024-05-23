<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Student_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
    }

    public function index()
    {
        $this->data['result'] = $this->Student_model->get_data()->result();
        
        $this->data['view_file'] = 'student';
        $this->load->view(THEMES, $this->data);
    }

    public function get_Student()
    {
        $ClassYear = $this->input->post('ClassYear');
        $Room = $this->input->post('Room');
        $Fullname = $this->input->post('Fullname');

        if ($ClassYear == NULL && $Room == NULL && $Fullname == NULL) {
            $Score = $this->Student_model->get_Student()->result();
        } elseif ($ClassYear != NULL && $Room == NULL && $Fullname == NULL) {
            $Score = $this->Student_model->get_StudentClassYear($ClassYear)->result();
        } else if ($ClassYear != NULL && $Room != NULL && $Fullname == NULL) {
            $Score = $this->Student_model->get_StudentAll($ClassYear, $Room)->result();
        } else {
            $Score = $this->Student_model->get_StudentFullname($Fullname)->result();
        }

        echo json_encode($Score);
    }
}
