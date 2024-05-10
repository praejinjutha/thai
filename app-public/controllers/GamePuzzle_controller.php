<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GamePuzzle_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {

        $this->data['view_file'] = 'Game_Puzzle/gamepage';
        $this->load->view(THEMES, $this->data);
    }

    public function Rules($Role)
    {
        $this->data['Role'] = $Role;

        $this->data['view_file'] = 'Game_Puzzle/rules';
        $this->load->view(THEMES, $this->data);
    }

    public function PlayGame($Role)
    {
        $this->data['Role'] = $Role;

        $this->data['view_file'] = 'Game_Puzzle/playgame';
        $this->load->view(THEMES, $this->data);
    }

    public function Score_summary($win, $Role)
    {
        $this->data['win'] = $win;
        $this->data['Role'] = $Role;

        $this->data['view_file'] = 'Game_Puzzle/score-summary';
        $this->load->view(THEMES, $this->data);
    }
}