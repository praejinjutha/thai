<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Game_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('GameLearningThai_model');
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'game.php';
        $this->load->view(THEMES, $this->data);
    }
}