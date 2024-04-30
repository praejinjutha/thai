<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'Test/testing';
        $this->load->view(THEMES, $this->data);
    }
}