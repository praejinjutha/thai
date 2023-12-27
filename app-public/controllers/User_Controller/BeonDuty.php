<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class BeonDuty extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('BeonDuty_model');
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
        $FullName = $this->BeonDuty_model->get_Fullname();
        $this->data["FullName"] = $FullName->result();

        $Position = $this->BeonDuty_model->get_Position()->result();
        $this->data["Position"] = $Position;

        $get_at = $this->BeonDuty_model->get_at();
        $this->data["get_at"]  = $get_at->result();

        $AllPosition = array();
        foreach ($Position as $row) {
            $AllPositions['id'][] = $row->id;
            $AllPositions['position'][] = $row->position;
            $AllPositions['position2'][] = $row->position2;
            $AllPositions['position3'][] = $row->position3;
            $AllPositions['position4'][] = $row->position4;
            $AllPositions['position5'][] = $row->position5;
            $AllPositions['position6'][] = $row->position6;
            $AllPositions['position7'][] = $row->position7;
            $AllPositions['position8'][] = $row->position8;
        }
        $this->data['AllPositions'] = $AllPositions; 

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome_User/BeonDuty/BeonDutyHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_BeonDuty()
    {   
        $Year = $this->input->post('Year');
        $Term = $this->input->post('Term');

        if($Year == NULL && $Term == NULL){
            $Monday_Morning = $this->BeonDuty_model->Monday_Morning()->result();
            $Monday_Afternoon = $this->BeonDuty_model->Monday_Afternoon()->result();
            $Monday_Night = $this->BeonDuty_model->Monday_Night()->result();
            $Tuesday_Morning = $this->BeonDuty_model->Tuesday_Morning()->result();
            $Tuesday_Afternoon = $this->BeonDuty_model->Tuesday_Afternoon()->result();
            $Tuesday_Night = $this->BeonDuty_model->Tuesday_Night()->result();
            $Wednesday_Morning = $this->BeonDuty_model->Wednesday_Morning()->result();
            $Wednesday_Afternoon = $this->BeonDuty_model->Wednesday_Afternoon()->result();
            $Wednesday_Night = $this->BeonDuty_model->Wednesday_Night()->result();
            $Thursday_Morning = $this->BeonDuty_model->Thursday_Morning()->result();
            $Thursday_Afternoon = $this->BeonDuty_model->Thursday_Afternoon()->result();
            $Thursday_Night = $this->BeonDuty_model->Thursday_Night()->result();
            $Friday_Morning = $this->BeonDuty_model->Friday_Morning()->result();
            $Friday_Afternoon = $this->BeonDuty_model->Friday_Afternoon()->result();
            $Friday_Night = $this->BeonDuty_model->Friday_Night()->result();
            $Saturday_Morning = $this->BeonDuty_model->Saturday_Morning()->result();
            $Saturday_Afternoon = $this->BeonDuty_model->Saturday_Afternoon()->result();
            $Saturday_Night = $this->BeonDuty_model->Saturday_Night()->result();
            $Sunday_Morning = $this->BeonDuty_model->Sunday_Morning()->result();
            $Sunday_Afternoon = $this->BeonDuty_model->Sunday_Afternoon()->result();
            $Sunday_Night = $this->BeonDuty_model->Sunday_Night()->result();
        }elseif($Year != NULL && $Term == NULL){
            $Monday_Morning = $this->BeonDuty_model->Monday_MorningYear($Year)->result();
            $Monday_Afternoon = $this->BeonDuty_model->Monday_AfternoonYear($Year)->result();
            $Monday_Night = $this->BeonDuty_model->Monday_NightYear($Year)->result();
            $Tuesday_Morning = $this->BeonDuty_model->Tuesday_MorningYear($Year)->result();
            $Tuesday_Afternoon = $this->BeonDuty_model->Tuesday_AfternoonYear($Year)->result();
            $Tuesday_Night = $this->BeonDuty_model->Tuesday_NightYear($Year)->result();
            $Wednesday_Morning = $this->BeonDuty_model->Wednesday_MorningYear($Year)->result();
            $Wednesday_Afternoon = $this->BeonDuty_model->Wednesday_AfternoonYear($Year)->result();
            $Wednesday_Night = $this->BeonDuty_model->Wednesday_NightYear($Year)->result();
            $Thursday_Morning = $this->BeonDuty_model->Thursday_MorningYear($Year)->result();
            $Thursday_Afternoon = $this->BeonDuty_model->Thursday_AfternoonYear($Year)->result();
            $Thursday_Night = $this->BeonDuty_model->Thursday_NightYear($Year)->result();
            $Friday_Morning = $this->BeonDuty_model->Friday_MorningYear($Year)->result();
            $Friday_Afternoon = $this->BeonDuty_model->Friday_AfternoonYear($Year)->result();
            $Friday_Night = $this->BeonDuty_model->Friday_NightYear($Year)->result();
            $Saturday_Morning = $this->BeonDuty_model->Saturday_MorningYear($Year)->result();
            $Saturday_Afternoon = $this->BeonDuty_model->Saturday_AfternoonYear($Year)->result();
            $Saturday_Night = $this->BeonDuty_model->Saturday_NightYear($Year)->result();
            $Sunday_Morning = $this->BeonDuty_model->Sunday_MorningYear($Year)->result();
            $Sunday_Afternoon = $this->BeonDuty_model->Sunday_AfternoonYear($Year)->result();
            $Sunday_Night = $this->BeonDuty_model->Sunday_NightYear($Year)->result();
        }elseif($Year != NULL && $Term != NULL){
            $Monday_Morning = $this->BeonDuty_model->Monday_MorningAll($Year, $Term)->result();
            $Monday_Afternoon = $this->BeonDuty_model->Monday_AfternoonAll($Year, $Term)->result();
            $Monday_Night = $this->BeonDuty_model->Monday_NightAll($Year, $Term)->result();
            $Tuesday_Morning = $this->BeonDuty_model->Tuesday_MorningAll($Year, $Term)->result();
            $Tuesday_Afternoon = $this->BeonDuty_model->Tuesday_AfternoonAll($Year, $Term)->result();
            $Tuesday_Night = $this->BeonDuty_model->Tuesday_NightAll($Year, $Term)->result();
            $Wednesday_Morning = $this->BeonDuty_model->Wednesday_MorningAll($Year, $Term)->result();
            $Wednesday_Afternoon = $this->BeonDuty_model->Wednesday_AfternoonAll($Year, $Term)->result();
            $Wednesday_Night = $this->BeonDuty_model->Wednesday_NightAll($Year, $Term)->result();
            $Thursday_Morning = $this->BeonDuty_model->Thursday_MorningAll($Year, $Term)->result();
            $Thursday_Afternoon = $this->BeonDuty_model->Thursday_AfternoonAll($Year, $Term)->result();
            $Thursday_Night = $this->BeonDuty_model->Thursday_NightAll($Year, $Term)->result();
            $Friday_Morning = $this->BeonDuty_model->Friday_MorningAll($Year, $Term)->result();
            $Friday_Afternoon = $this->BeonDuty_model->Friday_AfternoonAll($Year, $Term)->result();
            $Friday_Night = $this->BeonDuty_model->Friday_NightAll($Year, $Term)->result();
            $Saturday_Morning = $this->BeonDuty_model->Saturday_MorningAll($Year, $Term)->result();
            $Saturday_Afternoon = $this->BeonDuty_model->Saturday_AfternoonAll($Year, $Term)->result();
            $Saturday_Night = $this->BeonDuty_model->Saturday_NightAll($Year, $Term)->result();
            $Sunday_Morning = $this->BeonDuty_model->Sunday_MorningAll($Year, $Term)->result();
            $Sunday_Afternoon = $this->BeonDuty_model->Sunday_AfternoonAll($Year, $Term)->result();
            $Sunday_Night = $this->BeonDuty_model->Sunday_NightAll($Year, $Term)->result();
        }
        

        echo json_encode(array(
            'Monday_Morning' => $Monday_Morning,
            'Monday_Afternoon' => $Monday_Afternoon,
            'Monday_Night' => $Monday_Night,

            'Tuesday_Morning' => $Tuesday_Morning,
            'Tuesday_Afternoon' => $Tuesday_Afternoon,
            'Tuesday_Night' => $Tuesday_Night,

            'Wednesday_Morning' => $Wednesday_Morning,
            'Wednesday_Afternoon' => $Wednesday_Afternoon,
            'Wednesday_Night' => $Wednesday_Night,

            'Thursday_Morning' => $Thursday_Morning,
            'Thursday_Afternoon' => $Thursday_Afternoon,
            'Thursday_Night' => $Thursday_Night,

            'Friday_Morning' => $Friday_Morning,
            'Friday_Afternoon' => $Friday_Afternoon,
            'Friday_Night' => $Friday_Night,

            'Saturday_Morning' => $Saturday_Morning,
            'Saturday_Afternoon' => $Saturday_Afternoon,
            'Saturday_Night' => $Saturday_Night,

            'Sunday_Morning' => $Sunday_Morning,
            'Sunday_Afternoon' => $Sunday_Afternoon,
            'Sunday_Night' => $Sunday_Night,
        ));
    }

    function Insert_Position(){

        $id = $this->input->post('id');

        $Data = array(
            'position' => $this->input->post('position'),
            'position2' => $this->input->post('position2'),
            'position3' => $this->input->post('position3'),
            'position4' => $this->input->post('position4'),
            'position5' => $this->input->post('position5'),
            'position6' => $this->input->post('position6'),
            'position7' => $this->input->post('position7'),
            'position8' => $this->input->post('position8')
        );

        $results = $this->BeonDuty_model->Insert_Position($id,$Data);
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    function Insert_DutySchedule(){

        $Data = array(
            'Acyear' => $this->input->post('Acyear'),
            'Term' => $this->input->post('Term'),
            'Day' => $this->input->post('Day'),
            'Time' => $this->input->post('Time'),
            'Position1' => $this->input->post('Pos1'),
            'Position2' => $this->input->post('Pos2'),
            'Position3' => $this->input->post('Pos3'),
            'Position4' => $this->input->post('Pos4'),
            'Position5' => $this->input->post('Pos5'),
            'Position6' => $this->input->post('Pos6'),
            'Position7' => $this->input->post('Pos7'),
            'Position8' => $this->input->post('Pos8'),
            'Position9' => $this->input->post('Pos9'),
            'Position10' => $this->input->post('Pos10'),
            'Inspector' => $this->input->post('Inspector')
        );

        $results = $this->BeonDuty_model->Insert_DutySchedule($Data);
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getPageMargins()
            ->setTop(0.5)
            ->setRight(0)
            ->setBottom(0.3)
            ->setLeft(0.3)
            ->setHeader(0.3)
            ->setFooter(0.5);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('ข้อมูลตารางเวรปฏิบัติหน้าที่');
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)->setPaperSize(PageSetup::PAPERSIZE_A4);

        $Year = $this->input->post('Year');
        $Term = $this->input->post('Terms');

        if($Year != NULL && $Term == NULL){
            $Monday_Morning = $this->BeonDuty_model->Monday_MorningYear($Year)->result();
            $Monday_Afternoon = $this->BeonDuty_model->Monday_AfternoonYear($Year)->result();
            $Monday_Night = $this->BeonDuty_model->Monday_NightYear($Year)->result();
            $Tuesday_Morning = $this->BeonDuty_model->Tuesday_MorningYear($Year)->result();
            $Tuesday_Afternoon = $this->BeonDuty_model->Tuesday_AfternoonYear($Year)->result();
            $Tuesday_Night = $this->BeonDuty_model->Tuesday_NightYear($Year)->result();
            $Wednesday_Morning = $this->BeonDuty_model->Wednesday_MorningYear($Year)->result();
            $Wednesday_Afternoon = $this->BeonDuty_model->Wednesday_AfternoonYear($Year)->result();
            $Wednesday_Night = $this->BeonDuty_model->Wednesday_NightYear($Year)->result();
            $Thursday_Morning = $this->BeonDuty_model->Thursday_MorningYear($Year)->result();
            $Thursday_Afternoon = $this->BeonDuty_model->Thursday_AfternoonYear($Year)->result();
            $Thursday_Night = $this->BeonDuty_model->Thursday_NightYear($Year)->result();
            $Friday_Morning = $this->BeonDuty_model->Friday_MorningYear($Year)->result();
            $Friday_Afternoon = $this->BeonDuty_model->Friday_AfternoonYear($Year)->result();
            $Friday_Night = $this->BeonDuty_model->Friday_NightYear($Year)->result();
            $Saturday_Morning = $this->BeonDuty_model->Saturday_MorningYear($Year)->result();
            $Saturday_Afternoon = $this->BeonDuty_model->Saturday_AfternoonYear($Year)->result();
            $Saturday_Night = $this->BeonDuty_model->Saturday_NightYear($Year)->result();
            $Sunday_Morning = $this->BeonDuty_model->Sunday_MorningYear($Year)->result();
            $Sunday_Afternoon = $this->BeonDuty_model->Sunday_AfternoonYear($Year)->result();
            $Sunday_Night = $this->BeonDuty_model->Sunday_NightYear($Year)->result();
        }elseif($Year != NULL && $Term != NULL){
            $Monday_Morning = $this->BeonDuty_model->Monday_MorningAll($Year, $Term)->result();
            $Monday_Afternoon = $this->BeonDuty_model->Monday_AfternoonAll($Year, $Term)->result();
            $Monday_Night = $this->BeonDuty_model->Monday_NightAll($Year, $Term)->result();
            $Tuesday_Morning = $this->BeonDuty_model->Tuesday_MorningAll($Year, $Term)->result();
            $Tuesday_Afternoon = $this->BeonDuty_model->Tuesday_AfternoonAll($Year, $Term)->result();
            $Tuesday_Night = $this->BeonDuty_model->Tuesday_NightAll($Year, $Term)->result();
            $Wednesday_Morning = $this->BeonDuty_model->Wednesday_MorningAll($Year, $Term)->result();
            $Wednesday_Afternoon = $this->BeonDuty_model->Wednesday_AfternoonAll($Year, $Term)->result();
            $Wednesday_Night = $this->BeonDuty_model->Wednesday_NightAll($Year, $Term)->result();
            $Thursday_Morning = $this->BeonDuty_model->Thursday_MorningAll($Year, $Term)->result();
            $Thursday_Afternoon = $this->BeonDuty_model->Thursday_AfternoonAll($Year, $Term)->result();
            $Thursday_Night = $this->BeonDuty_model->Thursday_NightAll($Year, $Term)->result();
            $Friday_Morning = $this->BeonDuty_model->Friday_MorningAll($Year, $Term)->result();
            $Friday_Afternoon = $this->BeonDuty_model->Friday_AfternoonAll($Year, $Term)->result();
            $Friday_Night = $this->BeonDuty_model->Friday_NightAll($Year, $Term)->result();
            $Saturday_Morning = $this->BeonDuty_model->Saturday_MorningAll($Year, $Term)->result();
            $Saturday_Afternoon = $this->BeonDuty_model->Saturday_AfternoonAll($Year, $Term)->result();
            $Saturday_Night = $this->BeonDuty_model->Saturday_NightAll($Year, $Term)->result();
            $Sunday_Morning = $this->BeonDuty_model->Sunday_MorningAll($Year, $Term)->result();
            $Sunday_Afternoon = $this->BeonDuty_model->Sunday_AfternoonAll($Year, $Term)->result();
            $Sunday_Night = $this->BeonDuty_model->Sunday_NightAll($Year, $Term)->result();
        }

    // ดึงรายชื่อคนเข้าเวร
        $positions = [
            'Position1', 'Position2', 'Position3', 'Position4',
            'Position5', 'Position6', 'Position7', 'Position8',
            'Position9', 'Position10'
        ];
        
        $data = [];
        
        foreach ($Monday_Morning as $row1) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row1->$position;
            }
            $rowData['Inspector'] = $row1->Inspector;
            $data[] = $rowData;
        }
        foreach ($Monday_Afternoon as $row2) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row2->$position;
            }
            $rowData['Inspector'] = $row2->Inspector;
            $data[] = $rowData;
        }
        foreach ($Monday_Night as $row3) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row3->$position;
            }
            $rowData['Inspector'] = $row3->Inspector;
            $data[] = $rowData;
        }

        foreach ($Tuesday_Morning as $row4) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row4->$position;
            }
            $rowData['Inspector'] = $row4->Inspector;
            $data[] = $rowData;
        }
        foreach ($Tuesday_Afternoon as $row5) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row5->$position;
            }
            $rowData['Inspector'] = $row5->Inspector;
            $data[] = $rowData;
        }
        foreach ($Tuesday_Night as $row6) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row6->$position;
            }
            $rowData['Inspector'] = $row6->Inspector;
            $data[] = $rowData;
        }

        foreach ($Wednesday_Morning as $row7) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row7->$position;
            }
            $rowData['Inspector'] = $row7->Inspector;
            $data[] = $rowData;
        }
        foreach ($Wednesday_Afternoon as $row8) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row8->$position;
            }
            $rowData['Inspector'] = $row8->Inspector;
            $data[] = $rowData;
        }
        foreach ($Wednesday_Night as $row9) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row9->$position;
            }
            $rowData['Inspector'] = $row9->Inspector;
            $data[] = $rowData;
        }

        foreach ($Thursday_Morning as $row10) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row10->$position;
            }
            $rowData['Inspector'] = $row10->Inspector;
            $data[] = $rowData;
        }
        foreach ($Thursday_Afternoon as $row11) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row11->$position;
            }
            $rowData['Inspector'] = $row11->Inspector;
            $data[] = $rowData;
        }
        foreach ($Thursday_Night as $row12) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row12->$position;
            }
            $rowData['Inspector'] = $row12->Inspector;
            $data[] = $rowData;
        }

        foreach ($Friday_Morning as $row13) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row13->$position;
            }
            $rowData['Inspector'] = $row13->Inspector;
            $data[] = $rowData;
        }
        foreach ($Friday_Afternoon as $row14) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row14->$position;
            }
            $rowData['Inspector'] = $row14->Inspector;
            $data[] = $rowData;
        }
        foreach ($Friday_Night as $row15) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row15->$position;
            }
            $rowData['Inspector'] = $row15->Inspector;
            $data[] = $rowData;
        }

        foreach ($Saturday_Morning as $row16) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row16->$position;
            }
            $rowData['Inspector'] = $row16->Inspector;
            $data[] = $rowData;
        }
        foreach ($Saturday_Afternoon as $row17) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row17->$position;
            }
            $rowData['Inspector'] = $row17->Inspector;
            $data[] = $rowData;
        }
        foreach ($Saturday_Night as $row18) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row18->$position;
            }
            $rowData['Inspector'] = $row18->Inspector;
            $data[] = $rowData;
        }

        foreach ($Sunday_Morning as $row19) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row19->$position;
            }
            $rowData['Inspector'] = $row19->Inspector;
            $data[] = $rowData;
        }
        foreach ($Sunday_Afternoon as $row20) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row20->$position;
            }
            $rowData['Inspector'] = $row20->Inspector;
            $data[] = $rowData;
        }
        foreach ($Sunday_Night as $row21) {
            $rowData = [];
            foreach ($positions as $position) {
                $rowData[$position] = $row21->$position;
            }
            $rowData['Inspector'] = $row21->Inspector;
            $data[] = $rowData;
        }

    // หัวข้อ
        $PositionAll = $this->BeonDuty_model->get_Position()->result();
        foreach ($PositionAll as $row) {
            $data = [ 
                'value' => $row->position,
                'value' => $row->position2,
                'value' => $row->position3,
                'value' => $row->position4,
                'value' => $row->position5,
                'value' => $row->position6,
                'value' => $row->position7,
                'value' => $row->position8
            ];
        }
        
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(20);

        $HeaderStyle = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 16,
                'name'  => 'TH SarabunPSK',
            ),
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
        );

        $BodyStyle = array(
            'font'  => array(
                'bold'  => false,
                'size'  => 14,
                'name'  => 'TH SarabunPSK',
            ),
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
        );

        $sheet->setCellValue('A1', 'พื้นที่รับผิดชอบ');
        $sheet->getStyle('A1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('A1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('A1')->getFill()->getStartColor()->setARGB('D3D8E6');

        $sheet->mergeCells('B1:B2');
        $sheet->setCellValue('B1', 'ช่วงเวลา');
        $sheet->getStyle('B1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('B1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('B1')->getFill()->getStartColor()->setARGB('D3D8E6');

        $sheet->setCellValue('C1', 'พื้นที่รับผิดชอบจุดที่ 1');
        $sheet->getStyle('C1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('C1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('C1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('D1', 'พื้นที่รับผิดชอบจุดที่ 2');
        $sheet->getStyle('D1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('D1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('D1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('E1', 'พื้นที่รับผิดชอบจุดที่ 3');
        $sheet->getStyle('E1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('E1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('E1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('F1', 'พื้นที่รับผิดชอบจุดที่ 4');
        $sheet->getStyle('F1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('F1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('F1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('G1', 'พื้นที่รับผิดชอบจุดที่ 5');
        $sheet->getStyle('G1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('G1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('G1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('H1', 'พื้นที่รับผิดชอบจุดที่ 6');
        $sheet->getStyle('H1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('H1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('H1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('I1', 'พื้นที่รับผิดชอบจุดที่ 7');
        $sheet->getStyle('I1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('I1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('I1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->setCellValue('J1', 'พื้นที่รับผิดชอบจุดที่ 8');
        $sheet->getStyle('J1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('J1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('J1')->getFill()->getStartColor()->setARGB('f2daae');

        $sheet->mergeCells('K1:L1');
        $sheet->setCellValue('K1', 'เวรกลางคืน');
        $sheet->getStyle('K1:L1')->applyFromArray($HeaderStyle);
        $sheet->getStyle('K1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('K1')->getFill()->getStartColor()->setARGB('D3D8E6');

        $sheet->mergeCells('M1:M2');
        $sheet->setCellValue('M1', 'ผู้ตรวจเวร');
        $sheet->getStyle('M1:M2')->applyFromArray($HeaderStyle);
        $sheet->getStyle('M1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('M1')->getFill()->getStartColor()->setARGB('D3D8E6');

        $sheet->setCellValue('A2', 'ประจำวัน');
        $sheet->getStyle('A2')->applyFromArray($HeaderStyle);

        $sheet->setCellValue('A2', 'ประจำวัน');
        $sheet->getStyle('A2')->applyFromArray($HeaderStyle);

        $sheet->getStyle('C2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('C2', $row->position);
        $sheet->getStyle('D2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('D2', $row->position2);
        $sheet->getStyle('E2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('E2', $row->position3);
        $sheet->getStyle('F2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('F2', $row->position4);
        $sheet->getStyle('G2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('G2', $row->position5);
        $sheet->getStyle('H2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('H2', $row->position6);
        $sheet->getStyle('I2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('I2', $row->position7);
        $sheet->getStyle('J2')->applyFromArray($HeaderStyle); 
        $sheet->setCellValue('J2', $row->position8);

        $sheet->setCellValue('K2', 'ครูเวร');
        $sheet->getStyle('K2')->applyFromArray($HeaderStyle);

        $sheet->setCellValue('L2', 'นักการ');
        $sheet->getStyle('L2')->applyFromArray($HeaderStyle);

        $sheet->mergeCells('A3:A5');
        $sheet->setCellValue('A3', 'วันจันทร์');
        $sheet->getStyle('A3:A5')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B3', 'เช้า');
        $sheet->getStyle('B3')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B4', 'กลางวัน');
        $sheet->getStyle('B4')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B5', 'เย็น');
        $sheet->getStyle('B5')->applyFromArray($BodyStyle);
        $sheet->mergeCells('A6:A8');
        $sheet->setCellValue('A6', 'วันอังคาร');
        $sheet->getStyle('A6:A8')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B6', 'เช้า');
        $sheet->getStyle('B6')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B7', 'กลางวัน');
        $sheet->getStyle('B7')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B8', 'เย็น');
        $sheet->getStyle('B8')->applyFromArray($BodyStyle);
        $sheet->mergeCells('A9:A11');
        $sheet->setCellValue('A9', 'วันพุธ');
        $sheet->getStyle('A9:A11')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B9', 'เช้า');
        $sheet->getStyle('B9')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B10', 'กลางวัน');
        $sheet->getStyle('B10')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B11', 'เย็น');
        $sheet->getStyle('B11')->applyFromArray($BodyStyle);
        $sheet->mergeCells('A12:A14');
        $sheet->setCellValue('A12', 'วันพฤหัสบดี');
        $sheet->getStyle('A12:A14')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B12', 'เช้า');
        $sheet->getStyle('B12')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B13', 'กลางวัน');
        $sheet->getStyle('B13')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B14', 'เย็น');
        $sheet->getStyle('B14')->applyFromArray($BodyStyle);
        $sheet->mergeCells('A15:A17');
        $sheet->setCellValue('A15', 'ศุกร์');
        $sheet->getStyle('A15:A17')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B15', 'เช้า');
        $sheet->getStyle('B15')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B16', 'กลางวัน');
        $sheet->getStyle('B16')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B17', 'เย็น');
        $sheet->getStyle('B17')->applyFromArray($BodyStyle);
        $sheet->mergeCells('A18:M18');
        $sheet->setCellValue('A18', 'เวรวันหยุด / นักขัตฤกษ์');
        $sheet->getStyle('A18:M18')->applyFromArray($HeaderStyle); 
        $sheet->mergeCells('A19:A21');
        $sheet->setCellValue('A19', 'เสาร์');
        $sheet->getStyle('A19:A21')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B19', 'เช้า');
        $sheet->getStyle('B19')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B20', 'กลางวัน');
        $sheet->getStyle('B20')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B21', 'เย็น');
        $sheet->getStyle('B21')->applyFromArray($BodyStyle);
        $sheet->mergeCells('A22:A24');
        $sheet->setCellValue('A22', 'อาทิตย์');
        $sheet->getStyle('A22:A24')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B22', 'เช้า');
        $sheet->getStyle('B22')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B23', 'กลางวัน');
        $sheet->getStyle('B23')->applyFromArray($BodyStyle);
        $sheet->setCellValue('B24', 'เย็น');
        $sheet->getStyle('B24')->applyFromArray($BodyStyle);

        $positions = [
            'Position1', 'Position2', 'Position3', 'Position4',
            'Position5', 'Position6', 'Position7', 'Position8',
            'Position9', 'Position10'
        ];

        // จันทร์เช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '3'; 
            $value = isset($row1->$position) ? $row1->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M3';
        $inspectorValue = isset($row1->Inspector) ? $row1->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // จันทร์กลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '4'; 
            $value = isset($row2->$position) ? $row2->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M4';
        $inspectorValue = isset($row2->Inspector) ? $row2->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // จันทร์เย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '5';
            $value = isset($row3->$position) ? $row3->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }

        $inspectorCell = 'M5';
        $inspectorValue = isset($row3->Inspector) ? $row3->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);
        
        // อังคารเช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '6';
            $value = isset($row4->$position) ? $row4->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M6';
        $inspectorValue = isset($row4->Inspector) ? $row4->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // อังคารกลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '7';
            $value = isset($row5->$position) ? $row5->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M7';
        $inspectorValue = isset($row5->Inspector) ? $row5->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // อังคารเย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '8';
            $value = isset($row6->$position) ? $row6->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M8';
        $inspectorValue = isset($row6->Inspector) ? $row6->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // พุธเช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '9';
            $value = isset($row7->$position) ? $row7->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M9';
        $inspectorValue = isset($row7->Inspector) ? $row7->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // พุธกลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '10';
            $value = isset($row8->$position) ? $row8->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M10';
        $inspectorValue = isset($row8->Inspector) ? $row8->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // พุธเย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '11';
            $value = isset($row9->$position) ? $row9->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M11';
        $inspectorValue = isset($row9->Inspector) ? $row9->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // พฤหัสบดีเช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '12';
            $value = isset($row10->$position) ? $row10->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M12';
        $inspectorValue = isset($row10->Inspector) ? $row10->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // พฤหัสบดีกลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '13';
            $value = isset($row11->$position) ? $row11->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M13';
        $inspectorValue = isset($row11->Inspector) ? $row11->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // พฤหัสบดีเย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '14';
            $value = isset($row12->$position) ? $row12->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M14';
        $inspectorValue = isset($row12->Inspector) ? $row12->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // ศุกร์เช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '15';
            $value = isset($row13->$position) ? $row13->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M15';
        $inspectorValue = isset($row13->Inspector) ? $row13->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // ศุกร์กลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '16';
            $value = isset($row14->$position) ? $row14->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M16';
        $inspectorValue = isset($row14->Inspector) ? $row14->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // ศุกร์เย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '17';
            $value = isset($row15->$position) ? $row15->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M17';
        $inspectorValue = isset($row15->Inspector) ? $row15->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // เสาร์เช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '19';
            $value = isset($row16->$position) ? $row16->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M19';
        $inspectorValue = isset($row16->Inspector) ? $row16->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // เสาร์กลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '20';
            $value = isset($row17->$position) ? $row17->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M20';
        $inspectorValue = isset($row17->Inspector) ? $row17->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // เสาร์เย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '21';
            $value = isset($row18->$position) ? $row18->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M21';
        $inspectorValue = isset($row18->Inspector) ? $row18->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // อาทิตย์เช้า
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '22';
            $value = isset($row19->$position) ? $row19->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M22';
        $inspectorValue = isset($row19->Inspector) ? $row19->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // อาทิตย์กลางวัน
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '23';
            $value = isset($row20->$position) ? $row20->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M23';
        $inspectorValue = isset($row20->Inspector) ? $row20->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        // อาทิตย์เย็น
        foreach ($positions as $index => $position) {
            $cell = chr(67 + $index) . '24';
            $value = isset($row21->$position) ? $row21->$position : '';
        
            $sheet->getStyle($cell)->applyFromArray($BodyStyle);
            $sheet->setCellValue($cell, $value);
        }
        
        $inspectorCell = 'M24';
        $inspectorValue = isset($row21->Inspector) ? $row21->Inspector : '';
        $sheet->getStyle($inspectorCell)->applyFromArray($BodyStyle);
        $sheet->setCellValue($inspectorCell, $inspectorValue);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ตารางเวรปฏิบัติหน้าที่.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }

    function fetch_Data()
    {   
        $Acyear = $this->input->post('Acyear');
        $Term = $this->input->post('Term');
        $Day = $this->input->post('Day');
        $Time = $this->input->post('Time');
        if($Acyear != NULL && $Term != NULL && $Day != NULL && $Time != NULL){
            $results = $this->BeonDuty_model->fetch_Data($Acyear, $Term, $Day, $Time)->row();
        }else{
            $results = new stdClass();
            $results->Position1 = ''; 
            $results->Position2 = '';
            $results->Position3 = '';
            $results->Position4 = '';
            $results->Position5 = '';
            $results->Position6 = '';
            $results->Position7 = '';
            $results->Position8 = '';
            $results->Position9 = '';
            $results->Position10 = '';
            $results->Inspector = '';
        }

        echo json_encode($results);
    }
}
