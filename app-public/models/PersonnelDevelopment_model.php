<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonnelDevelopment_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    function get_FullName()
    {
        return  $this->db->query("SELECT ISNULL(PName,'')+ ' ' + ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') AS FullName, IDCard 
        FROM SMPr_MenuStaData");

    }

    public function fech_PersonnelDevelopment() 
    {
        return  $this->db->query("SELECT 
            ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, 
            HTrain.TNameCourse, HTrain.TDepart, HTrain.TGCourse, 
            HTrain.TStartDate, HTrain.TFinishDate, HTrain.TPlace, HTrain.TProvince, 
            HTrain.TCDay, HTrain.TCHou, 
            (SELECT SUM(TCHou) FROM SMPr_HTrain WHERE IDCard = HTrain.IDCard) AS SumHou
            FROM SMPr_HTrain HTrain
            JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard");
    }

    public function fech_PersonnelDevelopmentYear($Year) 
    {
        $NextYear = $Year + 1;
        return  $this->db->query("SELECT ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, HTrain.TNameCourse, HTrain.TDepart, HTrain.TGCourse, 
        HTrain.TStartDate, HTrain.TFinishDate, HTrain.TPlace, HTrain.TProvince, HTrain.TCDay, HTrain.TCHou, HTSHou.SumHou
        FROM SMPr_HTrain HTrain
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard
        JOIN (SELECT IDCard, SUM(TCHou) as SumHou 
            FROM SMPr_HTrain 
            GROUP BY IDCard) HTSHou ON HTrain.IDCard = HTSHou.IDCard
        WHERE HTrain.TStartDate between '$Year-05-16' and '$NextYear-05-15' ");
    }

    public function fech_PersonnelDevelopmentName($IDCard) 
    {
        return  $this->db->query("SELECT ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, HTrain.TNameCourse, HTrain.TDepart, HTrain.TGCourse, 
        HTrain.TStartDate, HTrain.TFinishDate, HTrain.TPlace, HTrain.TProvince, HTrain.TCDay, HTrain.TCHou, HTSHou.SumHou
        FROM SMPr_HTrain HTrain
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard
        JOIN (SELECT IDCard, SUM(TCHou) as SumHou 
            FROM SMPr_HTrain 
            GROUP BY IDCard) HTSHou ON HTrain.IDCard = HTSHou.IDCard
        WHERE HTrain.IDCard = '$IDCard'");
    }

    public function fech_PersonnelDevelopmentAll($Year, $IDCard) 
    {
        $NextYear = $Year + 1;
        return  $this->db->query("SELECT ISNULL(MData.FTName,'')+ ' ' + ISNULL(MData.LTName,'') AS FullName, HTrain.TNameCourse, HTrain.TDepart, HTrain.TGCourse, 
        HTrain.TStartDate, HTrain.TFinishDate, HTrain.TPlace, HTrain.TProvince, HTrain.TCDay, HTrain.TCHou, HTSHou.SumHou
        FROM SMPr_HTrain HTrain
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard
        JOIN (SELECT IDCard, SUM(TCHou) as SumHou 
            FROM SMPr_HTrain 
            GROUP BY IDCard) HTSHou ON HTrain.IDCard = HTSHou.IDCard
        WHERE HTrain.TStartDate between '$Year-05-16' AND '$NextYear-05-15' AND HTSHou.IDCard = '$IDCard'");
    }

    public function fech_PersonnelDevelopmentHou() 
    {
        return  $this->db->query("SELECT DISTINCT MData.PName, MData.FTName, MData.LTName, Pos.PosName, SumHou
        FROM SMPr_HTrain HTrain
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard
        JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
		JOIN (SELECT IDCard, SUM(TCHou) as SumHou 
            FROM SMPr_HTrain HTrain
            GROUP BY IDCard) HTSHou ON HTrain.IDCard = HTSHou.IDCard
        WHERE HTrain.TCHou >= 20");
    }

    public function fech_PersonnelDevelopmentHouYear($Year) 
    {
        $NextYear = $Year + 1;
        return  $this->db->query("SELECT DISTINCT MData.PName, MData.FTName, MData.LTName, Pos.PosName, SumHou
        FROM SMPr_HTrain HTrain
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard
        JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
		JOIN (SELECT IDCard, SUM(TCHou) as SumHou 
            FROM SMPr_HTrain HTrain
            GROUP BY IDCard) HTSHou ON HTrain.IDCard = HTSHou.IDCard
        WHERE HTrain.TCHou >= 20 AND HTrain.TStartDate between '$Year-05-16' and '$NextYear-05-15' ");
    }

    public function Data_count_show()
    {
        return $this->db->query("SELECT HTrain.IDCard, MData.FTName, MData.LTName,sum(HTrain.TCHou) as sum_show
        from SMPr_HTrain HTrain 
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard 
        Group by HTrain.IDCard, MData.FTName, MData.LTName
        having sum(HTrain.TCHou) > 20")->num_rows();
    }

    public function Data_count_showYear($Year)
    {
        $NextYear = $Year + 1;
        return $this->db->query("SELECT HTrain.IDCard, MData.FTName, MData.LTName, SUM(HTrain.TCHou) AS sum_show
        FROM SMPr_HTrain HTrain 
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard 
        WHERE HTrain.TStartDate BETWEEN '$Year-05-16' AND '$NextYear-05-15'
        GROUP BY HTrain.IDCard, MData.FTName, MData.LTName
        HAVING SUM(HTrain.TCHou) > 20")->num_rows();
    }

    public function Data_count_SUM_Person()
    {
        return $this->db->query("SELECT IDCard FROM SMPr_MenuStaData")->num_rows();
    }

    public function Data_count_notComplete()
    {
        return $this->db->query("SELECT HTrain.IDCard, MData.FTName, MData.LTName,sum(HTrain.TCHou) as sum_show
        from SMPr_HTrain HTrain 
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard 
        Group by HTrain.IDCard, MData.FTName, MData.LTName
        having sum(HTrain.TCHou) < 20")->num_rows();
    }

}