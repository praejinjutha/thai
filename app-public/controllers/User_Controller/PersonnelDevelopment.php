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
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PersonnelDevelopment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('PersonnelDevelopment_model');
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
        $this->data['total_rows'] = $total_rows = $this->PersonnelDevelopment_model->Data_count_show();
        $this->data['total_rows_SUM_Person'] = $total_rows_SUM_Person = $this->PersonnelDevelopment_model->Data_count_SUM_Person();

        $soldItems =  $this->data['total_rows'];
        $totalItems =  $this->data['total_rows_SUM_Person'];
        $SUM_Person = ($soldItems / $totalItems) * 100;
        $SUM_Person = round($SUM_Person, 2);
        $this->data['SUM_Person'] = $SUM_Person;

        $FullName = $this->PersonnelDevelopment_model->get_FullName();
        $this->data["FullName"] = $FullName->result();

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome_User/PersonnelDevelopment/PersonnelDevelopmentHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_PersonnelDevelopment()
    {   
        $IDCard = $this->input->post('IDCard');
        $Years = $this->input->post('Year');
        $Year = $Years - 543; 

        if($Years == 1 && $IDCard == 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopment()->result();
        }elseif($Years != 1 && $IDCard == 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentYear($Year)->result();
        }elseif($Years == 1 && $IDCard != 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentName($IDCard)->result();
        }elseif($Years != 1 && $IDCard != 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentAll($Year, $IDCard)->result();
        }

        echo json_encode($results);
    }

    function fech_PersonnelDevelopmentHou()
    {   
        $Years = $this->input->post('Year');
        $Year = $Years - 543; 
        if($Years == 1){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentHou()->result();
            $Complete = $this->PersonnelDevelopment_model->Data_count_show();
            $notComplete = $this->PersonnelDevelopment_model->Data_count_notComplete();
        }else{
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentHouYear($Year)->result();
            $Complete = $this->PersonnelDevelopment_model->Data_count_showYear($Year);
        }

        $total_rows_SUM_Person = $this->PersonnelDevelopment_model->Data_count_SUM_Person();

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

    public function export()
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
        $sheet->setTitle('การพัฒนาข้าราชการครูและบุคลากร');
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)->setPaperSize(PageSetup::PAPERSIZE_A4);

        $sheet->mergeCells('A2:K2');
        $sheet->setCellValue('A2', 'การพัฒนาข้าราชการครูและบุคลากร');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'ลำดับ', 'width' => 6.8],
            'B' => ['label' => 'ชื่อ - นามสกุล', 'width' => 17.8],
            'C' => ['label' => 'ชื่อหลักสูตร', 'width' => 13.8],
            'D' => ['label' => 'ชื่อหน่วยงาน', 'width' => 13.8],
            'E' => ['label' => 'กลุ่มหลักสูตร', 'width' => 13.8],
            'F' => ['label' => 'วันที่เริ่ม', 'width' => 11],
            'G' => ['label' => 'วันสิ้นสุด', 'width' => 11],
            'H' => ['label' => 'สถานที่', 'width' => 13.8],
            'I' => ['label' => 'จังหวัด', 'width' => 13.8],
            'J' => ['label' => 'จำนวนวัน', 'width' => 8.8],
            'K' => ['label' => 'จำนวนชั่วโมง', 'width' => 10.8]
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

        $sheet->getStyle('A4:K4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('f2daae');
        
        $IDCard = $this->input->post('Name');
        $Years = $this->input->post('Year');
        $Year = $Years - 543; 

        if($Years == 1 && $IDCard == 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopment()->result();
        }elseif($Years != 1 && $IDCard == 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentYear($Year)->result();
        }elseif($Years == 1 && $IDCard != 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentName($IDCard)->result();
        }elseif($Years != 1 && $IDCard != 2){
            $results = $this->PersonnelDevelopment_model->fech_PersonnelDevelopmentAll($Year, $IDCard)->result();
        }

        $startRow = 5;
        $count = 1;
        
        foreach ($results as $row) {
            $data = [
                'A' => ['position' => 'center', 'value' => $count],
                'B' => ['position' => 'left', 'value' => $row->FullName],
                'C' => ['position' => 'center', 'value' => $row->TNameCourse],
                'D' => ['position' => 'center', 'value' => $row->TDepart],
                'E' => ['position' => 'center', 'value' => $row->TGCourse],
                'F' => ['position' => 'center', 'value' => $row->TStartDate],
                'G' => ['position' => 'center', 'value' => $row->TFinishDate],
                'H' => ['position' => 'center', 'value' => $row->TPlace],
                'I' => ['position' => 'center', 'value' => $row->TProvince],
                'J' => ['position' => 'center', 'value' => $row->TCDay],
                'K' => ['position' => 'center', 'value' => $row->TCHou]
            ];
            foreach ($data as $column => $value) {
                $cell = $column . $startRow;
                $sheet->getStyle($cell)->applyFromArray([
                    'alignment' => [
                        'horizontal' =>  ($column === 'B') ? Alignment::HORIZONTAL_LEFT : Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                    'font' => [
                        'bold' => false,
                        'size' => 16,
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
                $sheet->getRowDimension(1)->setRowHeight(25); 
            }
            $count++;
            $startRow++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ข้อมูลการพัฒนาข้าราชการครูและบุคลากร.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}
