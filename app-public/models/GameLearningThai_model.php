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

    public function get_Stat()
    {
        return $this->db->select("ST.id_user, ISNULL(SS.Titlename,'')+ ' ' + ISNULL(SS.Firstname,'')+ ' ' + ISNULL(SS.Lastname,'') AS FullName, SS.ClassYear, SS.Room, ST.unit, MAX(ST.score) AS Score")
                        ->from('Score_Thai ST')
                        ->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT')
                        ->where('ST.role', 'นักเรียน')
                        ->where('ST.id_game', 1)
                        ->group_by('ST.id_user, SS.Titlename, SS.Firstname, SS.Lastname, SS.ClassYear, SS.Room, ST.unit')
                        ->get();
    }

    public function get_StatNormal()
    {
        return $this->db->select("ST.id_user, SU.Name, ST.unit, MAX(ST.score) AS Score")
                        ->from('Score_Thai ST')
                        ->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT')
                        ->where('ST.role', 'บุคคลทั่วไป')
                        ->where('ST.id_game', 1)
                        ->group_by('ST.id_user, SU.Name, ST.unit, ST.score')
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