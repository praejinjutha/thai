<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeonDuty_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function get_Fullname() 
    {
        return  $this->db->query("SELECT ISNULL(FTName,'')+ ' ' + ISNULL(LTName,'') AS FullName, IDCard FROM SMPr_MenuStaData");
    }

    public function get_Position() 
    {
        return  $this->db->query("SELECT * FROM SPL_PR_Schedule_Manage");
    }

    function get_at()
    {
        $query = $this->db->query("SELECT MAX(at) AS at_max FROM SPL_PR_Schedule_Manage");
        return $query;
    }

    // วันจันทร์
    public function Monday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'เช้า'");
    }
    public function Monday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'กลางวัน'");
    }
    public function Monday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'เย็น'");
    }

    // วันอังคาร
    public function Tuesday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'เช้า'");
    }
    public function Tuesday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'กลางวัน'");
    }
    public function Tuesday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'เย็น'");
    }

    // วันพุธ
    public function Wednesday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'เช้า'");
    }
    public function Wednesday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'กลางวัน'");
    }
    public function Wednesday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'เย็น'");
    }

    // วันพฤหัสบดี
    public function Thursday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'เช้า'");
    }
    public function Thursday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'กลางวัน'");
    }
    public function Thursday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'เย็น'");
    }

    // วันศุกร์
    public function Friday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'เช้า'");
    }
    public function Friday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'กลางวัน'");
    }
    public function Friday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'เย็น'");
    }

    // วันเสาร์
    public function Saturday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'เช้า'");
    }
    public function Saturday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'กลางวัน'");
    }
    public function Saturday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'เย็น'");
    }

    // วันอาทิตย์
    public function Sunday_Morning() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'เช้า'");
    }
    public function Sunday_Afternoon() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'กลางวัน'");
    }
    public function Sunday_Night() 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'เย็น'");
    }

    //----------------------------------------------------- ค้นหาตามปีการศึกษา -----------------------------------------------------

    // วันจันทร์
    public function Monday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Monday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Monday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    // วันอังคาร
    public function Tuesday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Tuesday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Tuesday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    // วันพุธ
    public function Wednesday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Wednesday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Wednesday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    // วันพฤหัสบดี
    public function Thursday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Thursday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Thursday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    // วันศุกร์
    public function Friday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Friday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Friday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    // วันเสาร์
    public function Saturday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Saturday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Saturday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    // วันอาทิตย์
    public function Sunday_MorningYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Sunday_AfternoonYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Sunday_NightYear($Year) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    //----------------------------------------------------- ค้นหาตามปีการศึกษา และเทอม -----------------------------------------------------

    // วันจันทร์
    public function Monday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'เช้า' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Monday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'กลางวัน' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Monday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'จันทร์' AND Time = 'เย็น' AND Acyear = '$Year' AND Term = '$Term'");
    }

    // วันอังคาร
    public function Tuesday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'เช้า' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Tuesday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'กลางวัน' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Tuesday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อังคาร' AND Time = 'เย็น' AND Acyear = '$Year' AND Term = '$Term'");
    }

    // วันพุธ
    public function Wednesday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'เช้า' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Wednesday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'กลางวัน' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Wednesday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พุธ' AND Time = 'เย็น' AND Acyear = '$Year' AND Term = '$Term'");
    }

    // วันพฤหัสบดี
    public function Thursday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'เช้า' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Thursday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'กลางวัน' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Thursday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'พฤหัสบดี' AND Time = 'เย็น' AND Acyear = '$Year' AND Term = '$Term'");
    }

    // วันศุกร์
    public function Friday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'เช้า' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Friday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'กลางวัน' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Friday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'ศุกร์' AND Time = 'เย็น' AND Acyear = '$Year' AND Term = '$Term'");
    }

    // วันเสาร์
    public function Saturday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'เช้า' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Saturday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'กลางวัน' AND Acyear = '$Year' AND Term = '$Term'");
    }
    public function Saturday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'เสาร์' AND Time = 'เย็น' AND Acyear = '$Year' AND Term = '$Term'");
    }

    // วันอาทิตย์
    public function Sunday_MorningAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'เช้า' AND Acyear = '$Year'");
    }
    public function Sunday_AfternoonAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'กลางวัน' AND Acyear = '$Year'");
    }
    public function Sunday_NightAll($Year, $Term) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Day = 'อาทิตย์' AND Time = 'เย็น' AND Acyear = '$Year'");
    }

    public function Insert_Position($id,$Data) 
    {
        $this->db->where('id', $id);
        $existingData = $this->db->get('SPL_PR_Schedule_Manage')->row();
        if ($existingData) {
            return $this->db->update('SPL_PR_Schedule_Manage', $Data);
        } else {
            return $this->db->insert('SPL_PR_Schedule_Manage', $Data);
        }
    }

    public function Insert_DutySchedule($Data) 
    {
        $existingData = $this->db->get_where('SPL_Pr_TeacherSchedule', array(
            'Acyear' => $Data['Acyear'],
            'Term' => $Data['Term'],
            'Day' => $Data['Day'],
            'Time' => $Data['Time']
        ))->row();
    
        if ($existingData) {
            $this->db->where(array(
                'Acyear' => $Data['Acyear'],
                'Term' => $Data['Term'],
                'Day' => $Data['Day'],
                'Time' => $Data['Time']
            ));
            $this->db->update('SPL_Pr_TeacherSchedule', $Data);
            return true;
        } else {
            $this->db->insert('SPL_Pr_TeacherSchedule', $Data);
            return true;
        }
        
        return false;
    }

    public function fetch_Data($Acyear, $Term, $Day, $Time) 
    {
        return  $this->db->query("SELECT * FROM SPL_Pr_TeacherSchedule WHERE Acyear = '$Acyear' AND Term = '$Term' AND Day = '$Day' AND Time = '$Time'");
    }
}