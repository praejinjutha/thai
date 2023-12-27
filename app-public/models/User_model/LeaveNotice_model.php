<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LeaveNotice_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function fetch_LeaveNotices($NationalID) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, POS.PosName, AType.type_leave, 
        Absen.dtp1, Absen.dtp2, Absen.amount, Absen.remark, Absen.FileName, Absen.Status, Absen.UpdatedAt, Absen.id, Absen.CID, Absen.idtypeleave, Absen.status
        FROM SMPr_Absent Absen
        LEFT JOIN SMPr_MenuStaData MData ON MData.IDCard = Absen.CID
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
		LEFT JOIN SMPr_Absent_type AType ON AType.id = Absen.idtypeleave
		WHERE Absen.CID = '$NationalID' ORDER BY POS.ID ASC");
    }

    public function fetch_LeaveNoticeYear($NationalID, $Year) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, POS.PosName, AType.type_leave, 
        Absen.dtp1, Absen.dtp2, Absen.amount, Absen.remark, Absen.FileName, Absen.Status, Absen.UpdatedAt, Absen.id, Absen.CID, Absen.idtypeleave, Absen.status
        FROM SMPr_Absent Absen
        LEFT JOIN SMPr_MenuStaData MData ON MData.IDCard = Absen.CID
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
		LEFT JOIN SMPr_Absent_type AType ON AType.id = Absen.idtypeleave
		WHERE Absen.year = '$Year' AND Absen.CID = '$NationalID' ORDER BY POS.ID ASC");
    }

    public function fetch_LeaveNoticeAbsents($NationalID, $Absent) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, POS.PosName, AType.type_leave, 
        Absen.dtp1, Absen.dtp2, Absen.amount, Absen.remark, Absen.FileName, Absen.Status, Absen.UpdatedAt, Absen.id, Absen.CID, Absen.idtypeleave, Absen.status
        FROM SMPr_Absent Absen
        LEFT JOIN SMPr_MenuStaData MData ON MData.IDCard = Absen.CID
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
		LEFT JOIN SMPr_Absent_type AType ON AType.id = Absen.idtypeleave
		WHERE AType.type_leave = '$Absent' AND Absen.CID = '$NationalID' ORDER BY POS.ID ASC");
    }

    public function fetch_LeaveNoticeAll($NationalID, $Year, $Absent) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName,'')+ ' ' + ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, POS.PosName, AType.type_leave, 
        Absen.dtp1, Absen.dtp2, Absen.amount, Absen.remark, Absen.FileName, Absen.Status, Absen.UpdatedAt, Absen.id, Absen.CID, Absen.idtypeleave, Absen.status
        FROM SMPr_Absent Absen
        LEFT JOIN SMPr_MenuStaData MData ON MData.IDCard = Absen.CID
        LEFT JOIN SMPr_TeacherPosition POS ON POS.ID = MData.PoLine
		LEFT JOIN SMPr_Absent_type AType ON AType.id = Absen.idtypeleave
		WHERE AType.type_leave = '$Absent' AND Absen.year = '$Year' AND Absen.CID = '$NationalID' ORDER BY POS.ID ASC");
    }

    public function get_FullName($IDCard) 
    {
        return  $this->db->query("SELECT IDCard, ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') as FullName FROM SMPr_MenuStaData WHERE IDCard = '$IDCard'");
    }

    public function fetch_IDCard($IDCard) 
    {
        return  $this->db->query("SELECT MData.IDCard, Pos.PosName
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
        WHERE MData.IDCard = '$IDCard'");
    }

    public function fech_AbsentType() 
    {
        return  $this->db->query("SELECT * FROM SMPr_Absent_type WHERE status = '1'");
    }

    public function fech_AbsentRecdDate($EStartDate, $EEndDate) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName, '') + ' ' + ISNULL(MData.FTName, '') + ' ' + ISNULL(MData.LTName, '') AS FullName,
                Pos.PosName,
                CONCAT(
                    SUM(CASE WHEN AType.id = '1' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.sick_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '1' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.sick_amount ELSE 0 END)
                ) AS Sick,
                CONCAT(
                    SUM(CASE WHEN AType.id = '2' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.business_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '2' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.business_amount ELSE 0 END)
                ) AS Business,
                CONCAT(
                    SUM(CASE WHEN AType.id = '9' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.t_vacation_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '9' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.t_vacation_amount ELSE 0 END)
                ) AS TVacation,
                CONCAT(
                    SUM(CASE WHEN AType.id = '3' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.maternity_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '3' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.maternity_amount ELSE 0 END)
                ) AS Maternity,
                CONCAT(
                    SUM(CASE WHEN AType.id = '5' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.spouse_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '5' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.spouse_amount ELSE 0 END)
                ) AS Spouse,
                CONCAT(
                    SUM(CASE WHEN AType.id = '4' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.ordination_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '4' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.ordination_amount ELSE 0 END)
                ) AS Ordination,
                CONCAT(
                    SUM(CASE WHEN AType.id = '10' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.military_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '10' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.military_amount ELSE 0 END)
                ) AS Military,
                CONCAT(
                    SUM(CASE WHEN AType.id = '11' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.study_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '11' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.study_amount ELSE 0 END)
                ) AS Study,
                CONCAT(
                    SUM(CASE WHEN AType.id = '12' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.international_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '12' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.international_amount ELSE 0 END)
                ) AS International,
                CONCAT(
                    SUM(CASE WHEN AType.id = '6' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.absent_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '6' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.absent_amount ELSE 0 END)
                ) AS Absent,
                CONCAT(
                    SUM(CASE WHEN AType.id = '13' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.other_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '13' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' THEN ASent.other_amount ELSE 0 END)
                ) AS Other
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
        LEFT JOIN (
            SELECT CID,
                idtypeleave, dtp1, dtp2,
                SUM(CASE WHEN idtypeleave = '1' THEN amount ELSE 0 END) AS sick_amount,
                SUM(CASE WHEN idtypeleave = '2' THEN amount ELSE 0 END) AS business_amount,
                SUM(CASE WHEN idtypeleave = '9' THEN amount ELSE 0 END) AS t_vacation_amount,
                SUM(CASE WHEN idtypeleave = '3' THEN amount ELSE 0 END) AS maternity_amount,
                SUM(CASE WHEN idtypeleave = '5' THEN amount ELSE 0 END) AS spouse_amount,
                SUM(CASE WHEN idtypeleave = '4' THEN amount ELSE 0 END) AS ordination_amount,
                SUM(CASE WHEN idtypeleave = '10' THEN amount ELSE 0 END) AS military_amount,
                SUM(CASE WHEN idtypeleave = '11' THEN amount ELSE 0 END) AS study_amount,
                SUM(CASE WHEN idtypeleave = '12' THEN amount ELSE 0 END) AS international_amount,
                SUM(CASE WHEN idtypeleave = '6' THEN amount ELSE 0 END) AS absent_amount,
                SUM(CASE WHEN idtypeleave = '13' THEN amount ELSE 0 END) AS other_amount,
                SUM(CASE WHEN idtypeleave = '1' THEN 1 ELSE 0 END) AS sick_count,
                SUM(CASE WHEN idtypeleave = '2' THEN 1 ELSE 0 END) AS business_count,
                SUM(CASE WHEN idtypeleave = '9' THEN 1 ELSE 0 END) AS t_vacation_count,
                SUM(CASE WHEN idtypeleave = '3' THEN 1 ELSE 0 END) AS maternity_count,
                SUM(CASE WHEN idtypeleave = '5' THEN 1 ELSE 0 END) AS spouse_count,
                SUM(CASE WHEN idtypeleave = '4' THEN 1 ELSE 0 END) AS ordination_count,
                SUM(CASE WHEN idtypeleave = '10' THEN 1 ELSE 0 END) AS military_count,
                SUM(CASE WHEN idtypeleave = '11' THEN 1 ELSE 0 END) AS study_count,
                SUM(CASE WHEN idtypeleave = '12' THEN 1 ELSE 0 END) AS international_count,
                SUM(CASE WHEN idtypeleave = '6' THEN 1 ELSE 0 END) AS absent_count,
                SUM(CASE WHEN idtypeleave = '13' THEN 1 ELSE 0 END) AS other_count
            FROM SMPr_Absent
            GROUP BY CID, idtypeleave, dtp1, dtp2
        ) ASent ON ASent.CID = MData.IDCard
        LEFT JOIN SMPr_Absent_type AType ON AType.id = ASent.idtypeleave
        GROUP BY MData.PName, MData.FTName, MData.LTName, Pos.PosName, Pos.ID ORDER BY Pos.ID ASC");
    }

    public function fech_AbsentRecdMonth($MonthSelect) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName, '') + ' ' + ISNULL(MData.FTName, '') + ' ' + ISNULL(MData.LTName, '') AS FullName,
                Pos.PosName,
                CONCAT(
                    SUM(CASE WHEN AType.id = '1' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.sick_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '1' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.sick_amount ELSE 0 END)
                ) AS Sick,
                CONCAT(
                    SUM(CASE WHEN AType.id = '2' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.business_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '2' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.business_amount ELSE 0 END)
                ) AS Business,
                CONCAT(
                    SUM(CASE WHEN AType.id = '9' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.t_vacation_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '9' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.t_vacation_amount ELSE 0 END)
                ) AS TVacation,
                CONCAT(
                    SUM(CASE WHEN AType.id = '3' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.maternity_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '3' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.maternity_amount ELSE 0 END)
                ) AS Maternity,
                CONCAT(
                    SUM(CASE WHEN AType.id = '5' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.spouse_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '5' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.spouse_amount ELSE 0 END)
                ) AS Spouse,
                CONCAT(
                    SUM(CASE WHEN AType.id = '4' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.ordination_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '4' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.ordination_amount ELSE 0 END)
                ) AS Ordination,
                CONCAT(
                    SUM(CASE WHEN AType.id = '10' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.military_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '10' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.military_amount ELSE 0 END)
                ) AS Military,
                CONCAT(
                    SUM(CASE WHEN AType.id = '11' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.study_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '11' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.study_amount ELSE 0 END)
                ) AS Study,
                CONCAT(
                    SUM(CASE WHEN AType.id = '12' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.international_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '12' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.international_amount ELSE 0 END)
                ) AS International,
                CONCAT(
                    SUM(CASE WHEN AType.id = '6' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.absent_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '6' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.absent_amount ELSE 0 END)
                ) AS Absent,
                CONCAT(
                    SUM(CASE WHEN AType.id = '13' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.other_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '13' AND MONTH(ASent.dtp1) = '$MonthSelect' THEN ASent.other_amount ELSE 0 END)
                ) AS Other
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
        LEFT JOIN (
            SELECT CID,
                idtypeleave, dtp1, dtp2,
                SUM(CASE WHEN idtypeleave = '1' THEN amount ELSE 0 END) AS sick_amount,
                SUM(CASE WHEN idtypeleave = '2' THEN amount ELSE 0 END) AS business_amount,
                SUM(CASE WHEN idtypeleave = '9' THEN amount ELSE 0 END) AS t_vacation_amount,
                SUM(CASE WHEN idtypeleave = '3' THEN amount ELSE 0 END) AS maternity_amount,
                SUM(CASE WHEN idtypeleave = '5' THEN amount ELSE 0 END) AS spouse_amount,
                SUM(CASE WHEN idtypeleave = '4' THEN amount ELSE 0 END) AS ordination_amount,
                SUM(CASE WHEN idtypeleave = '10' THEN amount ELSE 0 END) AS military_amount,
                SUM(CASE WHEN idtypeleave = '11' THEN amount ELSE 0 END) AS study_amount,
                SUM(CASE WHEN idtypeleave = '12' THEN amount ELSE 0 END) AS international_amount,
                SUM(CASE WHEN idtypeleave = '6' THEN amount ELSE 0 END) AS absent_amount,
                SUM(CASE WHEN idtypeleave = '13' THEN amount ELSE 0 END) AS other_amount,
                SUM(CASE WHEN idtypeleave = '1' THEN 1 ELSE 0 END) AS sick_count,
                SUM(CASE WHEN idtypeleave = '2' THEN 1 ELSE 0 END) AS business_count,
                SUM(CASE WHEN idtypeleave = '9' THEN 1 ELSE 0 END) AS t_vacation_count,
                SUM(CASE WHEN idtypeleave = '3' THEN 1 ELSE 0 END) AS maternity_count,
                SUM(CASE WHEN idtypeleave = '5' THEN 1 ELSE 0 END) AS spouse_count,
                SUM(CASE WHEN idtypeleave = '4' THEN 1 ELSE 0 END) AS ordination_count,
                SUM(CASE WHEN idtypeleave = '10' THEN 1 ELSE 0 END) AS military_count,
                SUM(CASE WHEN idtypeleave = '11' THEN 1 ELSE 0 END) AS study_count,
                SUM(CASE WHEN idtypeleave = '12' THEN 1 ELSE 0 END) AS international_count,
                SUM(CASE WHEN idtypeleave = '6' THEN 1 ELSE 0 END) AS absent_count,
                SUM(CASE WHEN idtypeleave = '13' THEN 1 ELSE 0 END) AS other_count
            FROM SMPr_Absent
            GROUP BY CID, idtypeleave, dtp1, dtp2
        ) ASent ON ASent.CID = MData.IDCard
        LEFT JOIN SMPr_Absent_type AType ON AType.id = ASent.idtypeleave
        GROUP BY MData.PName, MData.FTName, MData.LTName, Pos.PosName, Pos.ID ORDER BY Pos.ID ASC");
    }

    public function fech_AbsentRecdPos($EStartDate, $EEndDate, $PosNameSelect) 
    {
        return  $this->db->query("SELECT ISNULL(MData.PName, '') + ' ' + ISNULL(MData.FTName, '') + ' ' + ISNULL(MData.LTName, '') AS FullName,
                Pos.PosName,
                CONCAT(
                    SUM(CASE WHEN AType.id = '1' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.sick_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '1' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.sick_amount ELSE 0 END)
                ) AS Sick,
                CONCAT(
                    SUM(CASE WHEN AType.id = '2' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.business_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '2' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.business_amount ELSE 0 END)
                ) AS Business,
                CONCAT(
                    SUM(CASE WHEN AType.id = '9' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.t_vacation_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '9' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.t_vacation_amount ELSE 0 END)
                ) AS TVacation,
                CONCAT(
                    SUM(CASE WHEN AType.id = '3' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.maternity_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '3' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.maternity_amount ELSE 0 END)
                ) AS Maternity,
                CONCAT(
                    SUM(CASE WHEN AType.id = '5' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.spouse_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '5' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.spouse_amount ELSE 0 END)
                ) AS Spouse,
                CONCAT(
                    SUM(CASE WHEN AType.id = '4' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.ordination_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '4' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.ordination_amount ELSE 0 END)
                ) AS Ordination,
                CONCAT(
                    SUM(CASE WHEN AType.id = '10' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.military_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '10' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.military_amount ELSE 0 END)
                ) AS Military,
                CONCAT(
                    SUM(CASE WHEN AType.id = '11' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.study_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '11' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.study_amount ELSE 0 END)
                ) AS Study,
                CONCAT(
                    SUM(CASE WHEN AType.id = '12' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.international_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '12' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.international_amount ELSE 0 END)
                ) AS International,
                CONCAT(
                    SUM(CASE WHEN AType.id = '6' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.absent_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '6' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.absent_amount ELSE 0 END)
                ) AS Absent,
                CONCAT(
                    SUM(CASE WHEN AType.id = '13' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.other_count ELSE 0 END), '/',
                    SUM(CASE WHEN AType.id = '13' AND ASent.dtp1 >= '$EStartDate' AND ASent.dtp2 <= '$EEndDate' AND Pos.PosName = '$PosNameSelect' THEN ASent.other_amount ELSE 0 END)
                ) AS Other
        FROM SMPr_MenuStaData MData
        LEFT JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
        LEFT JOIN (
            SELECT CID,
                idtypeleave, dtp1, dtp2,
                SUM(CASE WHEN idtypeleave = '1' THEN amount ELSE 0 END) AS sick_amount,
                SUM(CASE WHEN idtypeleave = '2' THEN amount ELSE 0 END) AS business_amount,
                SUM(CASE WHEN idtypeleave = '9' THEN amount ELSE 0 END) AS t_vacation_amount,
                SUM(CASE WHEN idtypeleave = '3' THEN amount ELSE 0 END) AS maternity_amount,
                SUM(CASE WHEN idtypeleave = '5' THEN amount ELSE 0 END) AS spouse_amount,
                SUM(CASE WHEN idtypeleave = '4' THEN amount ELSE 0 END) AS ordination_amount,
                SUM(CASE WHEN idtypeleave = '10' THEN amount ELSE 0 END) AS military_amount,
                SUM(CASE WHEN idtypeleave = '11' THEN amount ELSE 0 END) AS study_amount,
                SUM(CASE WHEN idtypeleave = '12' THEN amount ELSE 0 END) AS international_amount,
                SUM(CASE WHEN idtypeleave = '6' THEN amount ELSE 0 END) AS absent_amount,
                SUM(CASE WHEN idtypeleave = '13' THEN amount ELSE 0 END) AS other_amount,
                SUM(CASE WHEN idtypeleave = '1' THEN 1 ELSE 0 END) AS sick_count,
                SUM(CASE WHEN idtypeleave = '2' THEN 1 ELSE 0 END) AS business_count,
                SUM(CASE WHEN idtypeleave = '9' THEN 1 ELSE 0 END) AS t_vacation_count,
                SUM(CASE WHEN idtypeleave = '3' THEN 1 ELSE 0 END) AS maternity_count,
                SUM(CASE WHEN idtypeleave = '5' THEN 1 ELSE 0 END) AS spouse_count,
                SUM(CASE WHEN idtypeleave = '4' THEN 1 ELSE 0 END) AS ordination_count,
                SUM(CASE WHEN idtypeleave = '10' THEN 1 ELSE 0 END) AS military_count,
                SUM(CASE WHEN idtypeleave = '11' THEN 1 ELSE 0 END) AS study_count,
                SUM(CASE WHEN idtypeleave = '12' THEN 1 ELSE 0 END) AS international_count,
                SUM(CASE WHEN idtypeleave = '6' THEN 1 ELSE 0 END) AS absent_count,
                SUM(CASE WHEN idtypeleave = '13' THEN 1 ELSE 0 END) AS other_count
            FROM SMPr_Absent
            GROUP BY CID, idtypeleave, dtp1, dtp2
        ) ASent ON ASent.CID = MData.IDCard
        LEFT JOIN SMPr_Absent_type AType ON AType.id = ASent.idtypeleave
        GROUP BY MData.PName, MData.FTName, MData.LTName, Pos.PosName, Pos.ID ORDER BY Pos.ID ASC");
    }

    public function get_AbsentType() 
    {
        return  $this->db->query("SELECT * FROM SMPr_Absent_type ");
    }

    function get_Absent($id)
    {
        return $this->db->get_where('SMPr_Absent', array('id' => $id));
    }

    public function get_PosName() 
    {
        return  $this->db->query("SELECT * FROM SMPr_TeacherPosition ");
    }

    public function Insert_LeaveNotice($data, $FileName, $Attachment) 
    {
        $sql = "INSERT INTO SMPr_Absent (year, CID, idtypeleave, dtp1, dtp2, amount, remark, Status, CreatedAt, UpdatedAt, FileName, Attachment)
                VALUES (:year, :CID, :idtypeleave, :dtp1, :dtp2, :amount, :remark, :Status, :CreatedAt, :UpdatedAt, :FileName, :Attachment)";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':year', $data['year'], PDO::PARAM_STR);
        $stmt->bindParam(':CID', $data['CID'], PDO::PARAM_STR);
        $stmt->bindParam(':idtypeleave', $data['idtypeleave'], PDO::PARAM_INT);
        $stmt->bindParam(':dtp1', $data['dtp1'], PDO::PARAM_STR);
        $stmt->bindParam(':dtp2', $data['dtp2'], PDO::PARAM_STR);
        $stmt->bindParam(':amount', $data['amount'], PDO::PARAM_STR);
        $stmt->bindParam(':remark', $data['remark'], PDO::PARAM_STR);
        $stmt->bindParam(':Status', $data['Status'], PDO::PARAM_STR);
        $stmt->bindParam(':CreatedAt', $data['CreatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $data['UpdatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    function update_LeaveNotice($id, $data, $FileName, $Attachment) 
    {
        $sql = "UPDATE SMPr_Absent SET year = :year, CID = :CID, idtypeleave = :idtypeleave, dtp1 = :dtp1,
         dtp2 = :dtp2, amount = :amount, remark = :remark, UpdatedAt = :UpdatedAt, FileName = :FileName, Attachment = :Attachment
                WHERE id = :id";
        $stmt = $this->conn()->conn_id->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':year', $data['year'], PDO::PARAM_STR);
        $stmt->bindParam(':CID', $data['CID'], PDO::PARAM_STR);
        $stmt->bindParam(':idtypeleave', $data['idtypeleave'], PDO::PARAM_INT);
        $stmt->bindParam(':dtp1', $data['dtp1'], PDO::PARAM_STR);
        $stmt->bindParam(':dtp2', $data['dtp2'], PDO::PARAM_STR);
        $stmt->bindParam(':amount', $data['amount'], PDO::PARAM_STR);
        $stmt->bindParam(':remark', $data['remark'], PDO::PARAM_STR);
        $stmt->bindParam(':UpdatedAt', $data['UpdatedAt'], PDO::PARAM_STR);
        $stmt->bindParam(':FileName', $FileName, PDO::PARAM_STR);
        $stmt->bindParam(':Attachment', $Attachment, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_Status($id, $Status) {
        $data = array('Status' => $Status);
        $this->db->where('id', $id);
        return $this->db->update('SMPr_Absent', $data);
    }

    function delete_LeaveNotice($id)
    {
        if ($this->db->delete('SMPr_Absent', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    function Insert_AbsentType($Type, $Status)
    {
        $data = array('type_leave' => $Type, 'status' => $Status);
        return $this->db->insert('SMPr_Absent_type', $data);
    }

    function delete_AbsentType($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        return $this->db->update('SMPr_Absent_type');
    }

    public function export_File($id)
    {
        $query = $this->db->get_where('SMPr_Absent', array('id' => $id));
        return $query;
    }


}