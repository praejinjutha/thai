<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media_archive_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'mediaarchive';
        $this->load->view(THEMES, $this->data);
    }
}