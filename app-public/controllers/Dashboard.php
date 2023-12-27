<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Dashboard_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        // เรียกดูข้อมูลการปฏิบัติงาน
        $PI_FYear =  date("Y")+ 543;
        $PI_Month = date('m');
        $PI_D8601_D = date("Ymd");
        $result = $this->Dashboard_model->search_SUM_Day($PI_Month, $PI_FYear, $PI_D8601_D)->result();
        foreach ($result as $row) {
            $this->data['Come'] = isset($row->Come) ? $row->Come : 0;
            $this->data['Leave'] = isset($row->Leave) ? $row->Leave : 0;
            $this->data['PersonalLeave'] = isset($row->PersonalLeave) ? $row->PersonalLeave : 0;
            $this->data['Absence'] = isset($row->Absence) ? $row->Absence : 0;
            $this->data['OnofficialDuty'] = isset($row->OnofficialDuty) ? $row->OnofficialDuty : 0;
            $this->data['Late'] = isset($row->Late) ? $row->Late : 0;
            
        }
        
        // เรียกดูจำนวนบุคลากรทั้งหมด
        $this->data['total_rows1'] = $total_rows1 = $this->Dashboard_model->Data_count1();
        $this->data['total_rows2'] = $total_rows2 = $this->Dashboard_model->Data_count2();
        $this->data['total_rows3'] = $total_rows3 = $this->Dashboard_model->Data_count3();
        $this->data['total_rows4'] = $total_rows4 = $this->Dashboard_model->Data_count4();
        $this->data['total_rows5'] = $total_rows5 = $this->Dashboard_model->Data_count5();
        $this->data['total_rows6'] = $total_rows6 = $this->Dashboard_model->Data_count6();
        $this->data['total_rows7'] = $total_rows7 = $this->Dashboard_model->Data_count7();
        $this->data['total_rows8'] = $total_rows8 = $this->Dashboard_model->Data_count8();
        $this->data['total_rows9'] = $total_rows9 = $this->Dashboard_model->Data_count9();
        $this->data['total_rows10'] = $total_rows10 = $this->Dashboard_model->Data_count10();
        $this->data['total_rows11'] = $total_rows11 = $this->Dashboard_model->Data_count11();
        $this->data['total_rows12'] = $total_rows12 = $this->Dashboard_model->Data_count12();
        $this->data['total_rows13'] = $total_rows13 = $this->Dashboard_model->Data_count13();
        $this->data['total_rows14'] = $total_rows14 = $this->Dashboard_model->Data_count14();
        $this->data['total_rows15'] = $total_rows15 = $this->Dashboard_model->Data_count15();
        $this->data['total_rows16'] = $total_rows16 = $this->Dashboard_model->Data_count16();
        $this->data['total_rows17'] = $total_rows17 = $this->Dashboard_model->Data_count17();
        $this->data['total_rows18'] = $total_rows18 = $this->Dashboard_model->Data_count18();
        $this->data['total_rows19'] = $total_rows19 = $this->Dashboard_model->Data_count19();
        $this->data['total_rows20'] = $total_rows20 = $this->Dashboard_model->Data_countSum1();
        $this->data['total_rows21'] = $total_rows21 = $this->Dashboard_model->Data_countSum2();
        $this->data['total_rows22'] = $total_rows22 = $this->Dashboard_model->Data_countSum3();

        // เรียกดูข้อมูลปีการศึกษา และ ภาคเรียน
        $this->data['Semester'] = $this->Dashboard_model->Semester();
        $this->data['Acayear'] = $this->Dashboard_model->Academic_year();
        $this->data['Fisyear'] = $this->Dashboard_model->Fiscal_year();
        
        $this->data['day'] = $this->ThDate(); 
        

        $this->data['view_file'] = 'dashboard';
        $this->load->view(THEMES, $this->data);
        
    }

    function ThDate()
    {
        $ThDay = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $ThMonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

        $week = date("w"); // ค่าวันในสัปดาห์ (0-6)
        $months = date("m") - 1; // ค่าเดือน (1-12)
        $day = date("j"); // ค่าวันที่(1-31)
        $years = date("Y") + 543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.

        return " วัน $ThDay[$week] ที่ $day  
            $ThMonth[$months] $years";
    }
}