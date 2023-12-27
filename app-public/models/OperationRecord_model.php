<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OperationRecord_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    function get_Checked($newBirthDate)
    {
        return $this->db->query("SELECT D8601 as Check_save, Time_save FROM SMPR_AbsentRecd WHERE D8601 = '$newBirthDate'");
    }

    public function get_PersonnelData($newBirthDate) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, MData.IDCard, POS.PosName,  
        AbRec.FYear, AbRec.OprtType0, AbRec.OprtType1, AbRec.OprtType2, AbRec.OprtType3, AbRec.OprtType4, AbRec.OprtType5, AbRec.Rem
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
        LEFT OUTER JOIN SMPR_AbsentRecd AbRec ON MData.IDCard = AbRec.PersID  and AbRec.D8601='$newBirthDate' ORDER BY POS.ID ASC");
    }

    public function Official_SumDay($newBirthDate)
    {
        return $this->db->query("SELECT
            SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
            SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
            SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
            SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
            SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
            SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
            FROM SMPR_AbsentRecd WHERE D8601 = '$newBirthDate'");
    }
    
    public function insert_PersonnelOperation($data)
    {
        $this->db->select('*');
        $this->db->from('SMPr_AbsentRecd');
        $this->db->where('FYear', $data['FYear']);
        $this->db->where('D8601', $data['D8601']);
        $this->db->where('PersID', $data['PersID']);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $this->db->where('FYear', $data['FYear']);
            $this->db->where('D8601', $data['D8601']);
            $this->db->where('PersID', $data['PersID']);
            $this->db->update('SMPr_AbsentRecd', $data);
        } else {
            $this->db->insert('SMPr_AbsentRecd', $data);
        }

        return $this->db->affected_rows() > 0;
    }

/********************************************************** SUM  **********************************************************/

    public function get_SumData() 
    {
        return  $this->db->query("SELECT ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, MData.IDCard, POS.PosName
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine ORDER BY POS.ID ASC");
    }

    public function get_MonthOperationData($FYear, $Month, $PersIDVal) 
    {
        return $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPR_AbsentRecd
        WHERE  Mnth = '$Month' AND PersID= '$PersIDVal' AND FYear = '$FYear'");
    }

    public function get_TermOperationData1($FYear, $Term, $PersIDVal) 
{
    return $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPR_AbsentRecd
        WHERE  Mnth IN (3, 4, 5, 6, 7, 8) AND PersID= '$PersIDVal' AND FYear = '$FYear'");
}

public function get_TermOperationData2($FYear, $Term, $PersIDVal) 
{
    return $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPR_AbsentRecd
        WHERE  Mnth IN (9, 10, 11, 12, 1, 2) AND PersID= '$PersIDVal' AND FYear = '$FYear'");
}
  

    public function Official_SumMonth($FYear, $Month) 
    {
        return $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPR_AbsentRecd
        WHERE  Mnth = '$Month' AND FYear = '$FYear'");
    }

    public function Official_SumTerm1($FYear, $Term) 
    {
        return $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPR_AbsentRecd
        WHERE  Mnth IN (3, 4, 5, 6, 7, 8) AND FYear = '$FYear'");
    }

    public function Official_SumTerm2($FYear, $Term) 
    {
        return $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absent',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPR_AbsentRecd
        WHERE  Mnth IN (9, 10, 11, 12, 1, 2) AND FYear = '$FYear'");
    }

    public function get_OperationRecordMonth($FYear, $Month)
    {
        return  $this->db->query("SELECT Pos.ID, ISNULL(MMS.PName,'')+ ' ' + ISNULL(MMS.FTName,'')+ ' ' + ISNULL(MMS.LTName,'') AS FullName, Pos.PosName,
            SUM(CASE WHEN SAR.OprtType0 = 'Y' THEN 1 END) AS 'Come',
            SUM(CASE WHEN SAR.OprtType1 = 'Y' THEN 1 END) AS 'Leave',
            SUM(CASE WHEN SAR.OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
            SUM(CASE WHEN SAR.OprtType3 = 'Y' THEN 1 END) AS 'Absent',
            SUM(CASE WHEN SAR.OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
            SUM(CASE WHEN SAR.OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPr_AbsentRecd SAR
        LEFT JOIN SMPr_MenuStaData MMS ON MMS.IDCard = SAR.PersID
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MMS.PoLine
        WHERE SAR.Mnth = '$Month' AND SAR.FYear = '$FYear'
        GROUP BY Pos.ID, MMS.PName, MMS.FTName, MMS.LTName, Pos.PosName
        ORDER BY Pos.ID ASC");
    }

    public function get_OperationRecordTerm1($FYear)
    {
        return  $this->db->query("SELECT Pos.ID, ISNULL(MMS.PName,'')+ ' ' + ISNULL(MMS.FTName,'')+ ' ' + ISNULL(MMS.LTName,'') AS FullName, Pos.PosName,
            SUM(CASE WHEN SAR.OprtType0 = 'Y' THEN 1 END) AS 'Come',
            SUM(CASE WHEN SAR.OprtType1 = 'Y' THEN 1 END) AS 'Leave',
            SUM(CASE WHEN SAR.OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
            SUM(CASE WHEN SAR.OprtType3 = 'Y' THEN 1 END) AS 'Absent',
            SUM(CASE WHEN SAR.OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
            SUM(CASE WHEN SAR.OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPr_AbsentRecd SAR
        LEFT JOIN SMPr_MenuStaData MMS ON MMS.IDCard = SAR.PersID
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MMS.PoLine
        WHERE SAR.Mnth IN (3, 4, 5, 6, 7, 8) AND SAR.FYear = '$FYear'
        GROUP BY Pos.ID, MMS.PName, MMS.FTName, MMS.LTName, Pos.PosName
        ORDER BY Pos.ID ASC");
    }

    public function get_OperationRecordTerm2($FYear)
    {
        return  $this->db->query("SELECT Pos.ID, ISNULL(MMS.PName,'')+ ' ' + ISNULL(MMS.FTName,'')+ ' ' + ISNULL(MMS.LTName,'') AS FullName, Pos.PosName,
            SUM(CASE WHEN SAR.OprtType0 = 'Y' THEN 1 END) AS 'Come',
            SUM(CASE WHEN SAR.OprtType1 = 'Y' THEN 1 END) AS 'Leave',
            SUM(CASE WHEN SAR.OprtType2 = 'Y' THEN 1 END) AS 'BLeave',
            SUM(CASE WHEN SAR.OprtType3 = 'Y' THEN 1 END) AS 'Absent',
            SUM(CASE WHEN SAR.OprtType4 = 'Y' THEN 1 END) AS 'OnAsCivil',
            SUM(CASE WHEN SAR.OprtType5 = 'Y' THEN 1 END) AS 'Late'
        FROM SMPr_AbsentRecd SAR
        LEFT JOIN SMPr_MenuStaData MMS ON MMS.IDCard = SAR.PersID
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MMS.PoLine
        WHERE SAR.Mnth IN (9, 10, 11, 12, 1, 2) AND SAR.FYear = '$FYear'
        GROUP BY Pos.ID, MMS.PName, MMS.FTName, MMS.LTName, Pos.PosName
        ORDER BY Pos.ID ASC");
    }

}
