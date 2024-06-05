<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Botlenkongdek extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dashboard_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
    }

    public function index()
    {
        
        $this->data['view_file'] = 'botlenkongdek';
        $this->load->view(THEMES, $this->data);
    }
}
