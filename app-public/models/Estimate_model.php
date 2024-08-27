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
        $this->db->distinct()->select('ST.id_user');
        $this->db->select("CASE WHEN SU.Name IS NULL OR SU.Name = '' THEN ISNULL(SS.Titlename,'') + ' ' + ISNULL(SS.Firstname,'') + ' ' + ISNULL(SS.Lastname,'') ELSE SU.Name END AS FullName", FALSE);
        $this->db->select('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user) AS PreScore', FALSE);
        $this->db->select('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user) AS PostScore', FALSE);
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user) IS NOT NULL');
        $this->db->or_where('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user) IS NOT NULL');
        return $this->db->get();
    }

    public function get_EvaluationFormType($Type)
    {
        $this->db->distinct()->select('ST.id_user');
        $this->db->select("CASE WHEN SU.Name IS NULL OR SU.Name = '' THEN ISNULL(SS.Titlename,'') + ' ' + ISNULL(SS.Firstname,'') + ' ' + ISNULL(SS.Lastname,'') ELSE SU.Name END AS FullName", FALSE);
        $this->db->select('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user) AS PreScore', FALSE);
        $this->db->select('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user) AS PostScore', FALSE);
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user AND ST.role = ' . $this->db->escape($Type) . ') IS NOT NULL', NULL, FALSE);
        $this->db->or_where('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user AND ST.role = ' . $this->db->escape($Type) . ') IS NOT NULL', NULL, FALSE);
        return $this->db->get();
    }

    public function get_EvaluationFormTypeClassYear($Type, $ClassYear)
    {
        $this->db->distinct()->select('ST.id_user');
        $this->db->select("CASE WHEN SU.Name IS NULL OR SU.Name = '' THEN ISNULL(SS.Titlename,'') + ' ' + ISNULL(SS.Firstname,'') + ' ' + ISNULL(SS.Lastname,'') ELSE SU.Name END AS FullName", FALSE);
        $this->db->select('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user) AS PreScore', FALSE);
        $this->db->select('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user) AS PostScore', FALSE);
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user AND ST.role = ' . $this->db->escape($Type) . ' AND SS.ClassYear = ' . $this->db->escape($ClassYear) . ') IS NOT NULL', NULL, FALSE);
        $this->db->or_where('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user AND ST.role = ' . $this->db->escape($Type) . ' AND SS.ClassYear = ' . $this->db->escape($ClassYear) . ') IS NOT NULL', NULL, FALSE);
        return $this->db->get();
    }

    public function get_EvaluationFormAll($Type, $ClassYear, $Room)
    {
        $this->db->distinct()->select('ST.id_user');
        $this->db->select("CASE WHEN SU.Name IS NULL OR SU.Name = '' THEN ISNULL(SS.Titlename,'') + ' ' + ISNULL(SS.Firstname,'') + ' ' + ISNULL(SS.Lastname,'') ELSE SU.Name END AS FullName", FALSE);
        $this->db->select('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user) AS PreScore', FALSE);
        $this->db->select('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user) AS PostScore', FALSE);
        $this->db->from('Score_Thai ST');
        $this->db->join('SPL_AC_Student SS', 'SS.StudentNo = ST.id_user', 'LEFT');
        $this->db->join('SPL_LOG_UserData SU', 'SU.NationalID = ST.id_user', 'LEFT');
        $this->db->where('(SELECT MAX(CAST(ST2.score AS INT)) FROM Score_Thai ST2 WHERE ST2.id_game = 3 AND ST2.id_user = ST.id_user AND ST.role = ' . $this->db->escape($Type) . ' AND SS.ClassYear = ' . $this->db->escape($ClassYear) . ' AND SS.Room = ' . $this->db->escape($Room) . ') IS NOT NULL', NULL, FALSE);
        $this->db->or_where('(SELECT MAX(CAST(ST3.score AS INT)) FROM Score_Thai ST3 WHERE ST3.id_game = 4 AND ST3.id_user = ST.id_user AND ST.role = ' . $this->db->escape($Type) . ' AND SS.ClassYear = ' . $this->db->escape($ClassYear) . ' AND SS.Room = ' . $this->db->escape($Room) . ') IS NOT NULL', NULL, FALSE);
        return $this->db->get();
    }
}