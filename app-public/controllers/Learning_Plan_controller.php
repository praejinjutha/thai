<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Learning_Plan_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'learningplan';
        $this->load->view(THEMES, $this->data);
    }
}