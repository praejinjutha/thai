<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PlanningInformation_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
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

    public function get_sumManagement()
    {
        $query = $this->db->query("SELECT IDCard FROM SMPr_MenuStaData")->num_rows();
        return $query;
    }

    public function get_retire2565()
    {
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as Fullname
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '1961-10-01' AND '1962-09-30'")->num_rows();
        return $query;
    }

    public function get_retire2566()
    {
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as Fullname
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '1962-10-01' AND '1963-09-30'")->num_rows();
        return $query;
    }

    public function get_retire2567()
    {
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as Fullname
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '1963-10-01' AND '1964-09-30'")->num_rows();
        return $query;
    }

    public function get_retire2568()
    {
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as Fullname
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '1964-10-01' AND '1965-09-30'")->num_rows();
        return $query;
    }

    public function get_retire2569()
    {
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as Fullname
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '1965-10-01' AND '1966-09-30'")->num_rows();
        return $query;
    }

    public function get_Year()
    {
        $query = $this->db->get('SPL_AC_Settings')->row();
        return $query->CurrentAcYear;
    }

    public function get_Graph()
    {
        return $this->db->query("SELECT IDCard,PLevel from SMPr_MenuStaData")->num_rows();
    }

    function get_PLevel()
    {
        $query = $this->db->query("SELECT COUNT(CASE WHEN PLevel IN (13, 19, 25, 31, 37, 43) THEN 1 END) AS KS1,
        COUNT(CASE WHEN PLevel IN (14, 20, 26, 32, 37, 44) THEN 1 END) AS KS2,
        COUNT(CASE WHEN PLevel IN (15, 21, 27, 33, 38, 45) THEN 1 END) AS KS3,
        COUNT(CASE WHEN PLevel IN (16, 22, 28, 34, 39, 46) THEN 1 END) AS KS4,
        COUNT(CASE WHEN PLevel IN (17, 23, 29, 35, 40, 47) THEN 1 END) AS KS5
        FROM SMPr_MenuStaData");
        return $query;
    }

    function get_Subject()
    {
        $query = $this->db->query("SELECT COUNT(CASE WHEN Subject_group LIKE '%ภาษาไทย%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS Thailanguage,
        COUNT(CASE WHEN Subject_group LIKE '%คณิตศาสตร์%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS Mathematics,
        COUNT(CASE WHEN Subject_group LIKE '%วิทยาศาสตร์และเทคโนโลยี%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS Science,
        COUNT(CASE WHEN Subject_group LIKE '%ศิลปะ%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS Art,
        COUNT(CASE WHEN Subject_group LIKE '%สังคมศึกษา ศาสนาและวัฒนธรรม%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS Social ,
        COUNT(CASE WHEN Subject_group LIKE '%สุขศึกษาและพละศึกษา%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS health,
        COUNT(CASE WHEN Subject_group LIKE '%การงานอาชีพ%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS Career,
		COUNT(CASE WHEN Subject_group LIKE '%ภาษาต่างประเทศ%' AND PLevel LIKE '%[0-9]%' THEN 1 END) AS England
		FROM SMPr_MenuStaData");
        return $query;
    }

    function get_Train()
    {
        $query = $this->db->query("SELECT SUM(CASE WHEN MNData.Sex = 'M' THEN 1 ELSE 0 END) AS male,
        SUM(CASE WHEN MNData.Sex = 'F' THEN 1 ELSE 0 END) AS female, COUNT(*) AS percentage
        FROM SMPr_MenuStaData MData
        JOIN SMPr_MoneyData MNData on MNData.IDCard = MData.IDCard");
        return $query;
    }

    function get_Sex()
    {
        $query = $this->db->query("SELECT SUM(CASE WHEN MNData.Sex = 'M' THEN 1 ELSE 0 END) AS male,
        SUM(CASE WHEN MNData.Sex = 'F' THEN 1 ELSE 0 END) AS female, COUNT(*) AS percentage
        FROM SMPr_MenuStaData MData
        JOIN SMPr_MoneyData MNData on MNData.IDCard = MData.IDCard");
        return $query;
    }

    public function get_trainComplete()
    {
        $query = $this->db->query("SELECT HTrain.IDCard, MData.FTName, MData.LTName,sum(HTrain.TCHou) as sum_show
        from SMPr_HTrain HTrain 
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard 
        Group by HTrain.IDCard, MData.FTName, MData.LTName
        having sum(HTrain.TCHou) > 20")->num_rows();
        return $query;
    }

    public function get_trainNotComplete()
    {
        $query = $this->db->query("SELECT HTrain.IDCard, MData.FTName, MData.LTName,sum(HTrain.TCHou) as sum_show
        from SMPr_HTrain HTrain 
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard 
        Group by HTrain.IDCard, MData.FTName, MData.LTName
        having sum(HTrain.TCHou) < 20")->num_rows();
        return $query;
    }

    public function fech_PlanningInformationRetire()
    {
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as FullName, PosName
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        Left Join SMPr_TeacherPosition Pos ON Pos.ID = MData .PoLine
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '1962-10-01' AND '1967-09-30'");
        return $query;
    }

    public function fech_PlanningInformationRetireYear($Year)
    {
        $NextYear = $Year + 1;
        $query = $this->db->query("SELECT MData.PName + MData.FTName + '  ' + MData.LTName as FullName, PosName
        FROM SMPr_MenuStaData MData
        Left Join SMPr_MoneyData MNData ON MData.IDCard = MNData .IDCard
        Left Join SMPr_TeacherPosition Pos ON Pos.ID = MData .PoLine
        WHERE MNData.NStatus <> 'ลาออก' AND MNData.BirthDate BETWEEN '$Year-10-01' AND '$NextYear-09-30'");
        return $query;
    }

    public function fech_PlanningInformatTrainHou() 
    {
        return  $this->db->query("SELECT DISTINCT MData.PName, MData.FTName, MData.LTName, Pos.PosName, SumHou
        FROM SMPr_HTrain HTrain
        JOIN SMPr_MenuStaData MData ON HTrain.IDCard = MData.IDCard
        JOIN SMPr_TeacherPosition Pos ON Pos.ID = MData.PoLine
		JOIN (SELECT IDCard, SUM(TCHou) as SumHou 
            FROM SMPr_HTrain HTrain
            GROUP BY IDCard) HTSHou ON HTrain.IDCard = HTSHou.IDCard
        WHERE HTrain.TCHou >= 20" );
    }

    public function fech_PlanningInformatTrainHouYear($Year) 
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