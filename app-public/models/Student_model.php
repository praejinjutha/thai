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
}