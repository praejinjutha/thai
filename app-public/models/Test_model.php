<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
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

    public function get_PreTestStat()
    {
        return $this->db->select("ST.id_user, ISNULL(SS.Titlename,'')+ ' ' + ISNULL(SS.Firstname,'')+ ' ' + ISNULL(SS.Lastname,'') AS FullName, SS.ClassYear, SS.Room, ST.unit, ST.Score")
                        ->from('Score_Thai ST')
                        ->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT')
                        ->where('ST.role', 'นักเรียน')
                        ->where('ST.id_game', 3)
                        ->get();
    }

    public function get_PreTestStatNormal()
    {
        return $this->db->select("ST.id_user, SU.Name, ST.unit, ST.Score")
                        ->from('Score_Thai ST')
                        ->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT')
                        ->where('ST.role', 'บุคคลทั่วไป')
                        ->where('ST.id_game', 3)
                        ->get();
    }

    public function get_PostTestStat()
    {
        return $this->db->select("ST.id_user, ISNULL(SS.Titlename,'')+ ' ' + ISNULL(SS.Firstname,'')+ ' ' + ISNULL(SS.Lastname,'') AS FullName, SS.ClassYear, SS.Room, ST.unit, ST.Score")
                        ->from('Score_Thai ST')
                        ->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT')
                        ->where('ST.role', 'นักเรียน')
                        ->where('ST.id_game', 4)
                        ->get();
    }

    public function get_PostTestStatNormal()
    {
        return $this->db->select("ST.id_user, SU.Name, ST.unit, ST.Score")
                        ->from('Score_Thai ST')
                        ->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT')
                        ->where('ST.role', 'บุคคลทั่วไป')
                        ->where('ST.id_game', 4)
                        ->get();
    }

    public function get_user()
    {
        return $this->db->select("NationalID, Name")->get('SPL_LOG_UserData');
    }

    public function get_Question()
    {
        return $this->db->get('Question');
    }

    public function Insert_Question($Data) 
    {
        return $this->db->insert('Question', $Data);
    }

    public function Update_Question($id, $Data)
    {
        $this->db->where('id', $id);
        $this->db->update('Question', $Data);
        return true;
    }

    function Delete_Question($id)
    {
        if ($this->db->delete('Question', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function get_score($StudentNo)
    {
        return $this->db->where('id_user', $StudentNo)->get('Score_Thai');
    }

    public function Insert_PreTestScore($data) 
    {
        return $this->db->insert('Score_Thai', $data);
    }

    public function Insert_PostTestScore($data) 
    {
        return $this->db->insert('Score_Thai', $data);
    }
}