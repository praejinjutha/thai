<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonnelDirectory_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function fech_PersonnelDirectory() 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, MData.IDCard, POS.PosName , MData.PoNo, MData.TopBA, MData.PoBA, MData.PlaceBA, Money.NStatus
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine 
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard ORDER BY POS.ID ASC");
    }

    public function fech_PosPersonnelDirectory($PosName) 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, MData.IDCard, POS.PosName , MData.PoNo, MData.TopBA, MData.PoBA, MData.PlaceBA, Money.NStatus
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine 
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard 
        WHERE POS.PosName = '$PosName' ORDER BY POS.ID ASC");
    }

    public function fech_GroupPersonnelDirectory($GroupName) 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, MData.IDCard, POS.PosName , MData.PoNo, MData.TopBA, MData.PoBA, MData.PlaceBA, Money.NStatus
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine 
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard 
        WHERE MData.Subject_group = '$GroupName' ORDER BY POS.ID ASC");
    }

    public function fech_StatusPersonnelDirectory($NStatus) 
    {
        return  $this->db->query("SELECT MData.PName, ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, MData.IDCard, POS.PosName , MData.PoNo, MData.TopBA, MData.PoBA, MData.PlaceBA, Money.NStatus
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine 
        LEFT JOIN SMPr_MoneyData Money ON Money.IDCard = MData.IDCard 
        WHERE Money.NStatus = '$NStatus' ORDER BY POS.ID ASC");
    }

    public function get_PosName() 
    {
        return  $this->db->query("SELECT * FROM SMPr_TeacherPosition ORDER BY ID ASC");
    }

    function get_Subjectgroup()
    {
        return $this->db->query("SELECT * FROM SPL_INFRA_SubjectGroup ORDER BY ID ASC");
    }

    public function get_Status() 
    {  
        return $this->db->query("SELECT * FROM SMPr_IdStatusBud ORDER BY ID ASC");
    }


    public function getPersonnelData($page, $records_per_page) {

        $offset = ($page - 1) * $records_per_page;

        $this->db->select("MData.PName, CONCAT(ISNULL(MData.FTName, ''), ' ', ISNULL(MData.LTName, '')) AS FullName, MData.IDCard, POS.PosName, MData.PoNo, MData.TopBA, MData.PoBA, MData.PlaceBA, Money.NStatus");
        $this->db->from('SMPr_MenuStaData MData');
        $this->db->join('SMPr_Pos POS', 'POS.IdPos = MData.PoLine', 'LEFT');
        $this->db->join('SMPr_MoneyData Money', 'Money.IDCard = MData.IDCard', 'LEFT');
        $this->db->limit($records_per_page, $offset);
        $this->db->order_by('POS.IdPos', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getTotalPersonnelRecords() {
        return $this->db->count_all('SMPr_MenuStaData');
    }
}