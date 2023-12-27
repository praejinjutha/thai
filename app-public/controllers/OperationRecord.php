<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class OperationRecord extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('OperationRecord_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library("pagination");

        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('auth'));
        }

        $userRole = $this->session->userdata('Role');
        if (!($userRole === 'admin')) {
            redirect(site_url('dashboard')); 
        }
    }

    public function index()
    {

        $this->data['day'] = $this->ThDate(); 
        $this->data['view_file'] = 'PersonnelHome/OperationRecord/OperationRecordHome';
        $this->load->view(THEMES, $this->data);
    }

    public function Sum()
    {
        $results = $this->OperationRecord_model->get_SumData()->result();
        
        $this->data['day'] = $this->ThDate(); 
        $this->data['view_file'] = 'PersonnelHome/OperationRecord/OperationRecordSum';
        $this->load->view(THEMES, $this->data);
    }

    function ThDate()
    {
        $ThDay = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $ThMonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

        $week = date("w"); 
        $months = date("m") - 1; 
        $day = date("j");
        $years = date("Y") + 543;

        return " วัน $ThDay[$week] ที่ $day  
            $ThMonth[$months] $years";
    }

    function Check_data()
    {   
        $BirthDate = $this->input->post('BirthDate');
        $newBirthDate = str_replace('-', '', $BirthDate);
        $data = $this->OperationRecord_model->get_Checked($newBirthDate)->row();

        echo json_encode($data);
    }

    function getData()
    {   
        $BirthDate = $this->input->post('BirthDate');
        $newBirthDate = str_replace('-', '', $BirthDate);
        $results = $this->OperationRecord_model->get_PersonnelData($newBirthDate)->result();
        echo json_encode($results);
    }

    function Official_SumDay()
    {   
        $BirthDate = $this->input->post('BirthDate');
        $newBirthDate = str_replace('-', '', $BirthDate);
        $data = $this->OperationRecord_model->Official_SumDay($newBirthDate)->result();
        echo json_encode($data);
    }

    public function insert_PersonnelOperation()
    {
        $personnelArray = json_decode($this->input->post('personnelArray'), true);
        
        if (!is_array($personnelArray)) {
            $msg = 'error';
            echo $msg;
            return;
        }

        foreach ($personnelArray as $personnel) {
            $BirthDate = $personnel['BirthDate'];
            $FYear = substr($BirthDate, 0, 4);
            $D8601 = str_replace('-', '', $BirthDate);
            $Mnth = substr($BirthDate, 5, 2);
            $PersID = $personnel['PersID'];
            $OprtType0 = $personnel['OprtType0'];
            $OprtType1 = $personnel['OprtType1'];
            $OprtType2 = $personnel['OprtType2'];
            $OprtType3 = $personnel['OprtType3'];
            $OprtType4 = $personnel['OprtType4'];
            $OprtType5 = $personnel['OprtType5'];
            $Rem = $personnel['Rem'];

            $data = [
                'FYear' => $FYear,
                'D8601' => $D8601,
                'PersID' => $PersID,
                'OprtType0' => $OprtType0,
                'OprtType1' => $OprtType1,
                'OprtType2' => $OprtType2,
                'OprtType3' => $OprtType3,
                'OprtType4' => $OprtType4,
                'OprtType5' => $OprtType5,
                'Rem' => $Rem,
                'Mnth' => $Mnth,
                'Time_save' => date('Y-m-d H:i:s')
            ];

            $results = $this->OperationRecord_model->insert_PersonnelOperation($data);
        }

        $msg = 'Success';
        echo $msg;
    }

/********************************************************** SUM Operation Personnel **********************************************************/

    function get_SumPersonnelData()
    {   
        $results = $this->OperationRecord_model->get_SumData()->result();
        echo json_encode($results);
    }

    function get_MonthOperationData()
    {   
        $Year = date('Y-m-d H:i:s');
        $FYear = substr($Year, 0, 4);
        $Month = $this->input->post('Month');
        $PersID = json_decode($this->input->post('personnelArray'), true);

        $results = array(); 
        foreach ($PersID as $personnel) {
            $PersIDVal = $personnel['PersID'];
            $result = $this->OperationRecord_model->get_MonthOperationData($FYear, $Month, $PersIDVal)->result();
            $results[] = $result; 
        }
        echo json_encode($results); 
    }

    function get_TermOperationData() {
        $Year = date('Y-m-d H:i:s');
        $FYear = substr($Year, 0, 4);
        $Term = $this->input->post('Term');
        $PersID = json_decode($this->input->post('personnelArray'), true);
        $Term1 = array(3, 4, 5, 6, 7, 8);
        $Term2 = array(9, 10, 11, 12, 1, 2);
    
        $results = array(); 
    
        foreach ($PersID as $personnel) {
            $PersIDVal = $personnel['PersID'];
    
            if (in_array($Term, $Term1)) {
                $result = $this->OperationRecord_model->get_TermOperationData1($FYear, $Term, $PersIDVal)->result();
            } else {
                $result = $this->OperationRecord_model->get_TermOperationData2($FYear, $Term, $PersIDVal)->result();
            }
    
            $results[] = $result; 
        }
    
        echo json_encode($results); 
    }    
    

    function Official_SumMonth()
    {   
        $Year = date('Y-m-d H:i:s');
        $FYear = substr($Year, 0, 4);
        $Month = $this->input->post('Month');
        $data = $this->OperationRecord_model->Official_SumMonth($FYear, $Month)->result();
        echo json_encode($data);
    }

    function Official_SumTerm()
    {   
        $Year = date('Y-m-d H:i:s');
        $FYear = substr($Year, 0, 4);
        $Term = $this->input->post('Term');
        $Term1 = array(3, 4, 5, 6, 7, 8);
        $Term2 = array(9, 10, 11, 12, 1, 2);

        if (in_array($Term, $Term1)) {
            $data = $this->OperationRecord_model->Official_SumTerm1($FYear, $Term)->result();
        } else {
            $data = $this->OperationRecord_model->Official_SumTerm2($FYear, $Term)->result();
        }
        
        echo json_encode($data);
    }

    function Export_Day()
    {  
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getPageMargins()
            ->setTop(0.5)
            ->setRight(0.5)
            ->setBottom(0.5)
            ->setLeft(0.5)
            ->setHeader(0.8)
            ->setFooter(0.8);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)->setPaperSize(PageSetup::PAPERSIZE_A4);
        $sheet->setTitle('รายวัน');

        $sheet->mergeCells('A2:J2');
        $sheet->setCellValue('A2', 'รายงานบันทึกไปมาปฏิบัติงาน ลา ไปราชการ');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'ลำดับ', 'width' => 8.8],
            'B' => ['label' => 'ชื่อ - นามสกุล', 'width' => 20.8],
            'C' => ['label' => 'ตำแหน่ง', 'width' => 24.8],
            'D' => ['label' => 'มา', 'width' => 9.8],
            'E' => ['label' => 'มาสาย', 'width' => 9.8],
            'F' => ['label' => 'ไปราชการ', 'width' => 9.8],
            'G' => ['label' => 'ลาป่วย', 'width' => 9.8],
            'H' => ['label' => 'ลากิจ', 'width' => 9.8],
            'I' => ['label' => 'ขาด', 'width' => 9.8],
            'J' => ['label' => 'หมายเหตุ', 'width' => 21.8]
        ];

        foreach ($columnHeaders as $column => $headerInfo) {
            $cell = $column . '4';

            $sheet->getStyle($cell)->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                    'size' => 14,
                    'name' => 'TH SarabunPSK',
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);

            $sheet->setCellValue($cell, $headerInfo['label']);
            $sheet->getColumnDimension($column)->setWidth($headerInfo['width']);
            $sheet->getRowDimension(4)->setRowHeight(25);
        }

        $Date = $this->input->post('Date');
        $newBirthDate = str_replace('-', '', $Date);

        $results = $this->OperationRecord_model->get_PersonnelData($newBirthDate)->result();

        $startRow = 5;
        $count = 1;
        foreach ($results as $row) {
            $data = [
                'A' => ['position' => 'center', 'value' => $count],
                'B' => ['position' => 'left', 'value' => $row->FullName],
                'C' => ['position' => 'center', 'value' => $row->PosName],
                'D' => ['position' => 'center', 'value' => $row->OprtType0 === 'Y' ? '/' : ' '],
                'E' => ['position' => 'center', 'value' => $row->OprtType1 === 'Y' ? '/' : ' '],
                'F' => ['position' => 'center', 'value' => $row->OprtType2 === 'Y' ? '/' : ' '],
                'G' => ['position' => 'center', 'value' => $row->OprtType3 === 'Y' ? '/' : ' '],
                'H' => ['position' => 'center', 'value' => $row->OprtType4 === 'Y' ? '/' : ' '],
                'I' => ['position' => 'center', 'value' => $row->OprtType5 === 'Y' ? '/' : ' '],
                'J' => ['position' => 'center', 'value' => $row->Rem],
            ];
            foreach ($data as $column => $value) {
                $cell = $column . $startRow;
                $sheet->getStyle($cell)->applyFromArray([
                    'alignment' => [
                        'horizontal' => ($column === 'B') ? Alignment::HORIZONTAL_LEFT : Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'font' => [
                        'bold' => false,
                        'size' => 14,
                        'name' => 'TH SarabunPSK',
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
        
                $sheet->setCellValue($cell, $value['value']);
            }
            $count++;
            $startRow++;
        } 

        $BodyStyle = [
            'font'  => [
                'bold'  => false,
                'size'  => 14,
                'name'  => 'TH SarabunPSK',
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        
        $BirthDate = $this->input->post('Date');
        $newBirthDate = str_replace('-', '', $BirthDate);
        $data = $this->OperationRecord_model->Official_SumDay($newBirthDate)->result();

        foreach($data as $row){
            $Come = $row->Come;
            $Leave = $row->Leave;
            $BLeave = $row->BLeave;
            $Absent = $row->Absent;
            $OnAsCivil = $row->OnAsCivil;
            $Late = $row->Late;
        }
        $lastRow = $startRow;

        $sheet->getStyle('A' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->getStyle('B' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->getStyle('C' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('C' . $lastRow, 'ยอดสรุป');
        $sheet->getStyle('C' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C' . $lastRow)->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');
        $sheet->setCellValue('D' . $lastRow, $Come);
        $sheet->getStyle('D' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('E' . $lastRow, $Leave);
        $sheet->getStyle('E' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('F' . $lastRow, $BLeave);
        $sheet->getStyle('F' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('G' . $lastRow, $Absent);
        $sheet->getStyle('G' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('H' . $lastRow, $OnAsCivil);
        $sheet->getStyle('H' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('I' . $lastRow, $Late);
        $sheet->getStyle('I' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->getStyle('J' . $lastRow)->applyFromArray($BodyStyle);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="รายงานการบันทึกมาปฏิบัติงาน.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }

    function Export_Month()
    {  
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getPageMargins()
            ->setTop(0.5)
            ->setRight(0.5)
            ->setBottom(0.5)
            ->setLeft(0.5)
            ->setHeader(0.8)
            ->setFooter(0.8);
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)->setPaperSize(PageSetup::PAPERSIZE_A4);
        $sheet->setTitle('รายเดือน');

        $sheet->mergeCells('A2:J2');
        $sheet->setCellValue('A2', 'รายงานบันทึกไปมาปฏิบัติงาน ลา ไปราชการ');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        
        $columnHeaders = [
            'A' => ['label' => 'ลำดับ', 'width' => 8.8],
            'B' => ['label' => 'ชื่อ-นามสกุล', 'width' => 22.8],
            'C' => ['label' => 'ตำแหน่ง', 'width' => 26.8],
            'D' => ['label' => 'มา', 'width' => 12.8],
            'E' => ['label' => 'มาสาย', 'width' => 12.8],
            'F' => ['label' => 'ไปราชการ', 'width' => 12.8],
            'G' => ['label' => 'ลาป่วย', 'width' => 12.8],
            'H' => ['label' => 'ลากิจ', 'width' => 12.8],
            'I' => ['label' => 'ขาด', 'width' => 12.8]
        ];

        foreach ($columnHeaders as $column => $headerInfo) {
            $cell = $column . '4';

            $sheet->getStyle($cell)->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
                'font' => [
                    'bold' => true,
                    'size' => 14,
                    'name' => 'TH SarabunPSK',
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);

            $sheet->setCellValue($cell, $headerInfo['label']);
            $sheet->getColumnDimension($column)->setWidth($headerInfo['width']);
            $sheet->getRowDimension(4)->setRowHeight(25);
        }

        $Year = date('Y-m-d H:i:s');
        $FYear = substr($Year, 0, 4);
        $Month = $this->input->post('Month');
        $Term = $this->input->post('myRadio');
        $Term1 = array(3, 4, 5, 6, 7, 8);
        $Term2 = array(9, 10, 11, 12, 1, 2);

        if($Month != NULL && $Term == NULL){
            $results = $this->OperationRecord_model->get_OperationRecordMonth($FYear, $Month)->result();
        }else{
            if (in_array($Term, $Term1)) {
                $results = $this->OperationRecord_model->get_OperationRecordTerm1($FYear)->result();
            } else {
                $results = $this->OperationRecord_model->get_OperationRecordTerm2($FYear)->result();
            }
        }
        
        $startRow = 5;
        $count = 1;
        foreach ($results as $row) {
            $data = [
                'A' => ['position' => 'center', 'value' => $count],
                'B' => ['position' => 'left', 'value' => $row->FullName],
                'C' => ['position' => 'center', 'value' => $row->PosName],
                'D' => ['position' => 'center', 'value' => $row->Come],
                'E' => ['position' => 'center', 'value' => $row->Leave],
                'F' => ['position' => 'center', 'value' => $row->BLeave],
                'G' => ['position' => 'center', 'value' => $row->Absent],
                'H' => ['position' => 'center', 'value' => $row->OnAsCivil],
                'I' => ['position' => 'center', 'value' => $row->Late]
            ];
            foreach ($data as $column => $value) {
                $cell = $column . $startRow;
                $sheet->getStyle($cell)->applyFromArray([
                    'alignment' => [
                        'horizontal' => ($column === 'B') ? Alignment::HORIZONTAL_LEFT : Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'font' => [
                        'bold' => false,
                        'size' => 14,
                        'name' => 'TH SarabunPSK',
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
        
                $sheet->setCellValue($cell, $value['value']);
            }
            $count++;
            $startRow++;
        }

        $BodyStyle = [
            'font'  => [
                'bold'  => false,
                'size'  => 14,
                'name'  => 'TH SarabunPSK',
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];

        $Year = date('Y-m-d H:i:s');
        $FYear = substr($Year, 0, 4);
        $Month = $this->input->post('Month');
        $Term = $this->input->post('myRadio');
        $Term1 = array(3, 4, 5, 6, 7, 8);
        $Term2 = array(9, 10, 11, 12, 1, 2);
        
        if($Month != NULL && $Term == NULL){
            $data = $this->OperationRecord_model->Official_SumMonth($FYear, $Month)->result();
        }else{
            if (in_array($Term, $Term1)) {
                $data = $this->OperationRecord_model->Official_SumTerm1($FYear, $Term)->result();
            } else {
                $data = $this->OperationRecord_model->Official_SumTerm2($FYear, $Term)->result();
            }
        }

        foreach($data as $row){
            $Come = $row->Come;
            $Leave = $row->Leave;
            $BLeave = $row->BLeave;
            $Absent = $row->Absent;
            $OnAsCivil = $row->OnAsCivil;
            $Late = $row->Late;
        }
        $lastRow = $startRow;

        $sheet->getStyle('A' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->getStyle('B' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->getStyle('C' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('C' . $lastRow, 'ยอดสรุป');
        $sheet->getStyle('C' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C' . $lastRow)->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');
        $sheet->setCellValue('D' . $lastRow, $Come);
        $sheet->getStyle('D' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('E' . $lastRow, $Leave);
        $sheet->getStyle('E' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('F' . $lastRow, $BLeave);
        $sheet->getStyle('F' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('G' . $lastRow, $Absent);
        $sheet->getStyle('G' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('H' . $lastRow, $OnAsCivil);
        $sheet->getStyle('H' . $lastRow)->applyFromArray($BodyStyle);
        $sheet->setCellValue('I' . $lastRow, $Late);
        $sheet->getStyle('I' . $lastRow)->applyFromArray($BodyStyle);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="รายงานการบันทึกมาปฏิบัติงาน.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }

}
