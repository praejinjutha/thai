<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimate extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Estimate_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
    }

    public function index()
    {
        $this->data['getClassYear'] = $this->Estimate_model->get_ClassYear()->result();
        $this->data['getRoom'] = $this->Estimate_model->get_Room()->result();

        $this->data['view_file'] = 'estimate';
        $this->load->view(THEMES, $this->data);
    }

    public function get_EvaluationForm()
    {
        $Type = $this->input->post('Type');
        $ClassYear = $this->input->post('ClassYear');
        $Room = $this->input->post('Room');

        if ($Type == NULL && $ClassYear == NULL && $Room == NULL) {
            $Score = $this->Estimate_model->get_EvaluationForm()->result();
        } elseif ($Type != NULL && $ClassYear == NULL && $Room == NULL) {
            $Score = $this->Estimate_model->get_EvaluationFormType($Type)->result();
        } elseif ($Type != NULL && $ClassYear != NULL && $Room == NULL) {
            $Score = $this->Estimate_model->get_EvaluationFormTypeClassYear($Type, $ClassYear)->result();
        } else {
            $Score = $this->Estimate_model->get_EvaluationFormAll($Type, $ClassYear, $Room)->result();
        }

        echo json_encode($Score);
    }
}
