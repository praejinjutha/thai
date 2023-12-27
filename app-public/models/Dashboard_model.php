<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    // เรียกดูข้อมูลการเข้าปฏฺิบัติงาน
    function search_SUM_Day($PI_Month, $PI_FYear, $PI_D8601_D)
    {
        $query = $this->db->query("SELECT 
        SUM(CASE WHEN OprtType0 = 'Y' THEN 1 END) AS 'Come',
        SUM(CASE WHEN OprtType1 = 'Y' THEN 1 END) AS 'Leave',
        SUM(CASE WHEN OprtType2 = 'Y' THEN 1 END) AS 'PersonalLeave',
        SUM(CASE WHEN OprtType3 = 'Y' THEN 1 END) AS 'Absence',
        SUM(CASE WHEN OprtType4 = 'Y' THEN 1 END) AS 'OnofficialDuty',
        SUM(CASE WHEN OprtType5 = 'Y' THEN 1 END) AS 'Late' 
        FROM SMPR_AbsentRecd
        WHERE  Mnth= '$PI_Month'  and D8601='$PI_D8601_D' ");

        return $query;
    }

    // เรียกดูข้อมูลจำนวนบุคลากร
    public function Data_count1()
    {
        $query = $this->db->query("SELECT IDCard FROM SMPr_MenuStaData")->num_rows();
        return $query;
    }

    public function Data_count2()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ผู้อำนวยการสถานศึกษา'")->num_rows();
        return $query;
    }

    public function Data_count3()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'รองผู้อำนวยการสถานศึกษา'")->num_rows();
        return $query;
    }

    public function Data_count4()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูผู้ช่วย' AND ID = '5'")->num_rows();
        return $query;
    }
    public function Data_count5()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครู' AND ID = '6'")->num_rows();
        return $query;
    }

    public function Data_count6()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'อาจารย์'")->num_rows();
        return $query;
    }

    public function Data_count7()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ผู้ช่วยศาสตราจารย์'")->num_rows();
        return $query;
    }

    public function Data_count8()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'รองศาสตราจารย์'")->num_rows();
        return $query;
    }
    

    public function Data_count9()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ศาสตราจารย์'")->num_rows();
        return $query;
    }

    public function Data_count10()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูผู้ช่วย' AND ID = '12' OR ID = '21' OR ID = '30'")->num_rows();
        return $query;
    }

    public function Data_count11()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครู' AND ID = '13' OR ID = '22' OR ID = '31'")->num_rows();
        return $query;
    }

    public function Data_count12()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ศึกษานิเทศก์'")->num_rows();
        return $query;
    }

    public function Data_count13()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูธุรการ'")->num_rows();
        return $query;
    }

    public function Data_count14()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูอัตราจ้าง'")->num_rows();
        return $query;
    }

    public function Data_count15()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูพี่เลี้ยง'")->num_rows();
        return $query;
    }

    public function Data_count16()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ลูกจ้างชั่วคราว'")->num_rows();
        return $query;
    }

    public function Data_count17()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ลูกจ้างประจำ'")->num_rows();
        return $query;
    }

    public function Data_count18()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'เจ้าหน้าที่ธุรการ'")->num_rows();
        return $query;
    }

    public function Data_count19()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'อื่น ๆ'")->num_rows();
        return $query;
    }

    public function Data_countSum1()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos  on Pos.ID = MData.PoLine Where PosName = 'ผู้อำนวยการสถานศึกษา' or PosName = 'รองผู้อำนวยการสถานศึกษา'")->num_rows();
        return $query;
    }
    
    public function Data_countSum2()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData 
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูผู้ช่วย' AND ID = '5' or PosName = 'ครู' AND ID = '6' or PosName = 'อาจารย์' or PosName = 'ผู้ช่วยศาสตราจารย์' or PosName = 'รองศาสตราจารย์' or PosName = 'ศาสตราจารย์' ")->num_rows();
        return $query;
    }

    public function Data_countSum3()
    {
        $query = $this->db->query("SELECT IDCard From SMPr_MenuStaData MData
        left join SMPr_TeacherPosition Pos on Pos.ID = MData.PoLine Where PosName = 'ครูผู้ช่วย' AND ID = '12' OR ID = '21' OR ID = '30' or PosName = 'ครู' AND ID = '13' OR ID = '22' OR ID = '31' or PosName = 'ศึกษานิเทศก์' or PosName = 'ครูธุรการ' or PosName = 'ครูอัตราจ้าง' or PosName = 'ครูพี่เลี้ยง' or PosName = 'ลูกจ้างชั่วคราว' or PosName = 'ลูกจ้างประจำ' or PosName = 'เจ้าหน้าที่ธุรการ' or PosName = 'อื่น ๆ'")->num_rows();
        return $query;
    }

    // เรียกดูข้อมูลภาคเรียน ปีการศึกษา และปีงบประมาณ
    public function Semester()
    {
        $query = $this->db->query("SELECT CurrentTerm From SPL_AC_Settings")->row();
        return $query->CurrentTerm;
    }
    public function Academic_year()
    {
        $query = $this->db->query("SELECT CurrentAcYear From SPL_AC_Settings")->row();
        return $query->CurrentAcYear;
    }
    public function Fiscal_year()
    {
        $query = $this->db->query("SELECT CurrentBdYear From SPL_AC_Settings")->row();
        return $query->CurrentBdYear;
    }
    

}
