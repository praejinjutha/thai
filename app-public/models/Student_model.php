<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
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

    public function get_ClassYear()
    {
        return $this->db->distinct()->select('ClassYear')->get('SPL_AC_Student');
    }

    public function get_Room()
    {
        return $this->db->distinct()->select('Room')->get('SPL_AC_Student');
    }

    public function get_data()
    {
        return $this->db->get('SPL_AC_Student');
    }

    public function get_student()
    {
        return $this->db->select("StudentNo, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS FullName, ClassYear, Room, Birthdate")
                        ->get('SPL_AC_Student');
    }

    public function get_StudentClassYear($ClassYear)
    {
        return $this->db->select("StudentNo, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS FullName, ClassYear, Room, Birthdate")
                        ->where('ClassYear', $ClassYear)
                        ->get('SPL_AC_Student');
    }

    public function get_StudentAll($ClassYear, $Room)
    {
        return $this->db->select("StudentNo, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS FullName, ClassYear, Room, Birthdate")
                        ->where('ClassYear', $ClassYear)
                        ->where('Room', $Room)
                        ->get('SPL_AC_Student');
    }

    public function get_StudentFullname($Fullname)
    {
        return $this->db->select("StudentNo, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS FullName, ClassYear, Room, Birthdate")
                        ->where("ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') LIKE '%$Fullname%'")
                        ->get('SPL_AC_Student');
    }

    public function Insert_Student($data) 
    {
        return $this->db->insert('SPL_AC_Student', $data);
    }

    public function Insert_StudentImport($AcYear, $StudentNo, $Titlename, $Gender, $Firstname, $Lastname, $ClassYear, $Room, $Birthdate)
    {
        $data = array(
            'AcYear' => $AcYear,
            'StudentNo' => $StudentNo,
            'Titlename' => $Titlename,
            'Gender' => $Gender,
            'Firstname' => $Firstname,
            'Lastname' => $Lastname,
            'ClassYear' => $ClassYear,
            'Room' => $Room,
            'Birthdate' => $Birthdate
        );

        return $this->db->insert('SPL_AC_Student', $data);
    }
}