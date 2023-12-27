<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PlanningInformation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('PlanningInformation_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
			redirect(site_url('auth'));
		}

        $userRole = $this->session->userdata('Role');
        if (!($userRole === 'user')) {
            redirect(site_url('dashboard')); 
        }
    }

    public function index()
    {
        //อัตรากำลัง
        $this->data['total_rows2'] = $total_rows2 = $this->PlanningInformation_model->Data_count2();
        $this->data['total_rows3'] = $total_rows3 = $this->PlanningInformation_model->Data_count3();
        $this->data['total_rows4'] = $total_rows4 = $this->PlanningInformation_model->Data_count4();
        $this->data['total_rows5'] = $total_rows5 = $this->PlanningInformation_model->Data_count5();
        $this->data['total_rows6'] = $total_rows6 = $this->PlanningInformation_model->Data_count6();
        $this->data['total_rows7'] = $total_rows7 = $this->PlanningInformation_model->Data_count7();
        $this->data['total_rows8'] = $total_rows8 = $this->PlanningInformation_model->Data_count8();
        $this->data['total_rows9'] = $total_rows9 = $this->PlanningInformation_model->Data_count9();
        $this->data['total_rows10'] = $total_rows10 = $this->PlanningInformation_model->Data_count10();
        $this->data['total_rows11'] = $total_rows11 = $this->PlanningInformation_model->Data_count11();
        $this->data['total_rows12'] = $total_rows12 = $this->PlanningInformation_model->Data_count12();
        $this->data['total_rows13'] = $total_rows13 = $this->PlanningInformation_model->Data_count13();
        $this->data['total_rows14'] = $total_rows14 = $this->PlanningInformation_model->Data_count14();
        $this->data['total_rows15'] = $total_rows15 = $this->PlanningInformation_model->Data_count15();
        $this->data['total_rows16'] = $total_rows16 = $this->PlanningInformation_model->Data_count16();
        $this->data['total_rows17'] = $total_rows17 = $this->PlanningInformation_model->Data_count17();
        $this->data['total_rows18'] = $total_rows18 = $this->PlanningInformation_model->Data_count18();
        $this->data['total_rows19'] = $total_rows19 = $this->PlanningInformation_model->Data_count19();
        $this->data['total_rows20'] = $total_rows20 = $this->PlanningInformation_model->Data_countSum1();
        $this->data['total_rows21'] = $total_rows21 = $this->PlanningInformation_model->Data_countSum2();
        $this->data['total_rows22'] = $total_rows22 = $this->PlanningInformation_model->Data_countSum3();

         //ปีที่เกษียณ
        $Year = $this->PlanningInformation_model->get_Year();
        $this->data['Year'] = $Year;
        $this->data['Year1'] = $Year + 1;
        $this->data['Year2'] = $Year + 2;
        $this->data['Year3'] = $Year + 3;
        $this->data['Year4'] = $Year + 4;
        $this->data['Retire2565'] = $this->PlanningInformation_model->get_retire2565();
        $this->data['Retire2566'] = $this->PlanningInformation_model->get_retire2566();
        $this->data['Retire2567'] = $this->PlanningInformation_model->get_retire2567();
        $this->data['Retire2568'] = $this->PlanningInformation_model->get_retire2568();
        $this->data['Retire2569'] = $this->PlanningInformation_model->get_retire2569();

        // กราฟแท่งระดับ วิทยฐานะ
        $this->data['Graph'] = $this->PlanningInformation_model->get_Graph();
        $result = $this->PlanningInformation_model->get_PLevel();
        foreach ($result->result() as $row) {
            $this->data['KS1'] = $row->KS1;
            $this->data['KS2'] = $row->KS2;
            $this->data['KS3'] = $row->KS3;
            $this->data['KS4'] = $row->KS4;
            $this->data['KS5'] = $row->KS5; 
        }

        //อัตรากำลังตามกลุ่มสาระการเรียนรู้
        $result = $this->PlanningInformation_model->get_Subject();
        foreach ($result->result() as $row) {
            $this->data['Thailanguage'] = $row->Thailanguage;
            $this->data['Mathematics'] = $row->Mathematics;
            $this->data['Science'] = $row->Science;
            $this->data['Art'] = $row->Art;
            $this->data['Social'] = $row->Social;
            $this->data['health'] = $row->health;
            $this->data['Career'] = $row->Career;
            $this->data['England'] = $row->England;
        }

        //จำนวนบุคลากรที่อบรมครบ 20 ชม.
        $Complete = $this->PlanningInformation_model->get_trainComplete();
        $notComplete = $this->PlanningInformation_model->get_trainNotComplete();
        $SumManagement = $this->PlanningInformation_model->get_sumManagement();

        $soldItems = $Complete;
        $totalItems = $SumManagement;
        $SUM_Person = ($soldItems / $totalItems) * 100;
        $SUM_Person = round($SUM_Person, 2);

        $SUM_notPerson = ($totalItems - $soldItems);
        $notSoldItems = $SUM_notPerson;
        $notTotalItems = $SumManagement;
        $notSUM_Person = ($notSoldItems / $notTotalItems) * 100;
        $SUM_notComplete = round($notSUM_Person, 2);

        $this->data['Complete'] = $Complete;
        $this->data['NotComplete'] = $SUM_notPerson;
        $this->data['PersonComplete'] = $SUM_Person;
        $this->data['PersonNotComplete'] = $SUM_notComplete;

        //อัตรากำลังตามเพศ
        $result = $this->PlanningInformation_model->get_Sex();
        foreach ($result->result() as $row) {
            $this->data['male'] = $row->male;
            $this->data['female'] = $row->female;
            $this->data['percentage'] = $row->percentage;

            if ($this->data['percentage'] > 0) {
                $this->data['male_percent'] = ($this->data['male'] / $this->data['percentage']) * 100;
                $this->data['female_percent'] = ($this->data['female'] / $this->data['percentage']) * 100;
            } else {
                $this->data['male_percent'] = 0;
                $this->data['female_percent'] = 0;
            }
        }

        $this->data['view_file'] = 'PersonnelHome_User/PlanningInformation/PlanningInformationHome';
        $this->load->view(THEMES, $this->data);
    }

    public function Retire()
    {
         //ปีที่เกษียณ
        $Year = $this->PlanningInformation_model->get_Year();
        $this->data['Year'] = $Year;
        $this->data['Year1'] = $Year + 1;
        $this->data['Year2'] = $Year + 2;
        $this->data['Year3'] = $Year + 3;
        $this->data['Year4'] = $Year + 4;
        $this->data['Retire2565'] = $this->PlanningInformation_model->get_retire2565();
        $this->data['Retire2566'] = $this->PlanningInformation_model->get_retire2566();
        $this->data['Retire2567'] = $this->PlanningInformation_model->get_retire2567();
        $this->data['Retire2568'] = $this->PlanningInformation_model->get_retire2568();
        $this->data['Retire2569'] = $this->PlanningInformation_model->get_retire2569();
         
        $this->data['loopRetire'] = loopRetire();
        $this->data['view_file'] = 'PersonnelHome_User/PlanningInformation/PlanningInformationRetire';
        $this->load->view(THEMES, $this->data);
    }
    public function Show()
    {
        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome_User/PlanningInformation/PlanningInformationShow';
        $this->load->view(THEMES, $this->data);
    }

    function fech_PlanningInformationRetire()
    {   
        $Years = $this->input->post('Year');
        $Year = $Years - 603;
        if($Years == 1){
            $results = $this->PlanningInformation_model->fech_PlanningInformationRetire()->result();
        }else{
            $results = $this->PlanningInformation_model->fech_PlanningInformationRetireYear($Year)->result();
        }
        
        echo json_encode(array(
            'results' => $results,
            'Years' => $Years,
        ));
    }

    function fech_PlanningInformatTrain()
    {   
        $Years = $this->input->post('Year');
        $Year = $Years - 543; 
        if($Years == 1){
            $results = $this->PlanningInformation_model->fech_PlanningInformatTrainHou()->result();
            $Complete = $this->PlanningInformation_model->Data_count_show();
            $notComplete = $this->PlanningInformation_model->Data_count_notComplete();
        }else{
            $results = $this->PlanningInformation_model->fech_PlanningInformatTrainHouYear($Year)->result();
            $Complete = $this->PlanningInformation_model->Data_count_showYear($Year);
        }

        $total_rows_SUM_Person = $this->PlanningInformation_model->Data_count_SUM_Person();

        $soldItems = $Complete;
        $totalItems = $total_rows_SUM_Person;
        $SUM_Person = ($soldItems / $totalItems) * 100;
        $SUM_Person = round($SUM_Person, 2);

        $SUM_notPerson = ($totalItems - $soldItems);
        $notSoldItems = $SUM_notPerson;
        $notTotalItems = $total_rows_SUM_Person;
        $notSUM_Person = ($notSoldItems / $notTotalItems) * 100;
        $SUM_notComplete = round($notSUM_Person, 2);
        
        echo json_encode(array(
            'results' => $results,
            'SUM_Person' => $SUM_Person,
            'SUM_notPerson' => $SUM_notPerson,
            'SUM_notComplete' => $SUM_notComplete
        ));
    }
}