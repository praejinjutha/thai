<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GameLearningThai_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text'));
    }

    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function get_Stat($No)
    {
        return $this->db->select("ST.id_user, ISNULL(SS.Titlename,'')+ ' ' + ISNULL(SS.Firstname,'')+ ' ' + ISNULL(SS.Lastname,'') AS FullName, SU.Name, ST.score")
                        ->from('Score_Thai ST')
                        ->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT')
                        ->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT')
                        ->where('ST.id_user', $No)
                        ->get();
    }

    public function get_student()
    {
        return $this->db->select("StudentNo, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS FullName, ClassYear, Room")
                        ->get('SPL_AC_Student');
    }

    public function get_Search($No)
    {
        return $this->db->select("StudentNo, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS FullName, ClassYear, Room")
                        ->where('StudentNo', $No)
                        ->get('SPL_AC_Student');
    }

    public function Insert($data)
    {
        return $this->db->insert('Score_Thai', $data);
    }

    public function get_user()
    {
        return $this->db->select("NationalID, Name")->get('SPL_LOG_UserData');
    }


}