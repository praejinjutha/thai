<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estimate_model extends CI_Model
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

    public function get_EvaluationForm()
    {
        $this->db->select('ST.id_user');
        $this->db->select("CASE WHEN SU.Name IS NULL OR SU.Name = '' THEN ISNULL(SS.Titlename,'') + ' ' + ISNULL(SS.Firstname,'') + ' ' + ISNULL(SS.Lastname,'') ELSE SU.Name END AS FullName", FALSE);
        $this->db->select('MAX(CAST(ST.score AS INTEGER)) AS TScore', FALSE);
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where_in('ST.id_game', array(3, 4, 5, 6, 7));
        $this->db->group_by('ST.id_user, SS.Titlename, SS.Firstname, SS.Lastname, SS.ClassYear, SS.Room, ST.unit, SU.Name');
        return $this->db->get();
    }

    public function get_EvaluationFormType($Type)
    {
        $this->db->select('ST.id_user');
        $this->db->select('CASE WHEN SU.Name IS NULL OR SU.Name = \'\' THEN ISNULL(SS.Titlename, \'\')+ \' \' + ISNULL(SS.Firstname, \'\')+ \' \' + ISNULL(SS.Lastname, \'\') ELSE SU.Name END AS FullName', FALSE);
        $this->db->select('MAX(ST.score) AS TScore');
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('ST.role', $Type);
        $this->db->where_in('ST.id_game', array(3, 4, 5, 6, 7));
        $this->db->group_by('ST.id_user, SS.Titlename, SS.Firstname, SS.Lastname, SS.ClassYear, SS.Room, ST.unit, SU.Name');
        return $this->db->get();
    }

    public function get_EvaluationFormTypeClassYear($Type, $ClassYear)
    {
        $this->db->select('ST.id_user');
        $this->db->select('CASE WHEN SU.Name IS NULL OR SU.Name = \'\' THEN ISNULL(SS.Titlename, \'\')+ \' \' + ISNULL(SS.Firstname, \'\')+ \' \' + ISNULL(SS.Lastname, \'\') ELSE SU.Name END AS FullName', FALSE);
        $this->db->select('MAX(ST.score) AS TScore');
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('ST.role', $Type);
        $this->db->where('SS.ClassYear', $ClassYear);
        $this->db->where_in('ST.id_game', array(3, 4, 5, 6, 7));
        $this->db->group_by('ST.id_user, SS.Titlename, SS.Firstname, SS.Lastname, SS.ClassYear, SS.Room, ST.unit, SU.Name');
        return $this->db->get();
    }

    public function get_EvaluationFormAll($Type, $ClassYear, $Room)
    {
        $this->db->select('ST.id_user');
        $this->db->select('CASE WHEN SU.Name IS NULL OR SU.Name = \'\' THEN ISNULL(SS.Titlename, \'\')+ \' \' + ISNULL(SS.Firstname, \'\')+ \' \' + ISNULL(SS.Lastname, \'\') ELSE SU.Name END AS FullName', FALSE);
        $this->db->select('MAX(ST.score) AS TScore');
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('ST.role', $Type);
        $this->db->where('SS.ClassYear', $ClassYear);
        $this->db->where('SS.Room', $Room);
        $this->db->where_in('ST.id_game', array(3, 4, 5, 6, 7));
        $this->db->group_by('ST.id_user, SS.Titlename, SS.Firstname, SS.Lastname, SS.ClassYear, SS.Room, ST.unit, SU.Name');
        return $this->db->get();
    }
}