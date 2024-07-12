<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Learning_media_controller extends CI_Controller
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

        $this->data['view_file'] = 'Learning/learning-media';
        $this->load->view(THEMES, $this->data);
    }

    public function media()
    {

        $this->data['view_file'] = 'Learning/media';
        $this->load->view(THEMES, $this->data);
    }

    public function suggestions()
    {

        $this->data['view_file'] = 'Learning/suggestions';
        $this->load->view(THEMES, $this->data);
    }

    public function explanation()
    {

        $this->data['view_file'] = 'Learning/explanation';
        $this->load->view(THEMES, $this->data);
    }

    public function Choose()
    {

        $this->data['view_file'] = 'Learning/choose';
        $this->load->view(THEMES, $this->data);
    }

    public function Reading()
    {

        $this->data['view_file'] = 'Learning/reading';
        $this->load->view(THEMES, $this->data);
    }

    public function Reading_Choose($ID)
    {
        $this->data['ID'] = $ID;
        
        $this->data['view_file'] = 'Learning/reading-choose';
        $this->load->view(THEMES, $this->data);
    }

    public function Writing()
    {

        $this->data['view_file'] = 'Learning/writing';
        $this->load->view(THEMES, $this->data);
    }

    public function Practice_reading($ID)
    {
        $this->data['ID'] = $ID;

        $this->data['view_file'] = 'Learning/practice-reading';
        $this->load->view(THEMES, $this->data);
    }

    public function Practice_writing()
    {

        $this->data['view_file'] = 'Learning/practice-writing';
        $this->load->view(THEMES, $this->data);
    }

    public function Writing_Choose($ID)
    {
        $this->data['ID'] = $ID;

        $this->data['view_file'] = 'Learning/writing_choose';
        $this->load->view(THEMES, $this->data);
    }
}
