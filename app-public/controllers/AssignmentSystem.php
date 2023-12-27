<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class AssignmentSystem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('AssignmentSystem_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library('session');
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
        $FullName = $this->AssignmentSystem_model->get_FullName();
        $this->data["FullName"] = $FullName->result();

        $get_PrID = $this->AssignmentSystem_model->get_Pr_id();
        $this->data["get_PrID"]  = $get_PrID->result();

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome/AssignmentSystem/AssignmentSystemHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_AssignmentSystem()
    {   
        $Year = $this->input->post('Year');

        if($Year == NULL){
            $results = $this->AssignmentSystem_model->fech_AssignmentSystem()->result();
        }elseif($Year != NULL){
            $results = $this->AssignmentSystem_model->fech_AssignmentSystemYear($Year)->result();
        }

        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }
        
        echo json_encode($results);
    }

    function Insert_AssignmentSystem()
    {
        $EdYear = $this->input->post('EdYear');
        $PrType = $this->input->post('PrType');
        $PrDepart = $this->input->post('PrDepart');
        $Prsubj = $this->input->post('Prsubj');
        $Prdate = $this->input->post('Prdate');
        $PrNamete = $this->input->post('PrNamete');
        $TeaAll = $this->input->post('TeaAll');
        $Prother = $this->input->post('Prother');
        $Pr_id = $this->input->post('Pr_id');
        $CreatedAt = date('Y-m-d H:i:s');
        $UpdatedAt = date('Y-m-d H:i:s');

        $FileNm = isset($_FILES['FileNm']['name']) ? $_FILES['FileNm']['name'] : null;
        $Attachment = isset($_FILES['FileNm']['tmp_name']) ? file_get_contents($_FILES['FileNm']['tmp_name']) : null;

        $results = $this->AssignmentSystem_model->insert_PDO_AssignmentSystem($EdYear, $PrType, $PrDepart, $Prsubj, $Prdate, $PrNamete, $TeaAll, $Prother, $Pr_id, $CreatedAt, $UpdatedAt, $FileNm, $Attachment);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_AssignmentSystem() {

        $IdAt = $this->input->post('IdAt');
        $EdYear = $this->input->post('EdYear');
        $PrType = $this->input->post('PrType');
        $PrDepart = $this->input->post('PrDepart');
        $Prsubj = $this->input->post('Prsubj');
        $Prdate = $this->input->post('Prdate');
        $PrNamete = $this->input->post('PrNamete');
        $TeaAll = $this->input->post('TeaAll');
        $Prother = $this->input->post('Prother');
        $Pr_id = $this->input->post('Pr_id');
        $UpdatedAt = date('Y-m-d H:i:s');
    
        $row = $this->AssignmentSystem_model->get_AssignmentSystem($IdAt)->row();
    
        $FileNm = null;
        $Attachment = null;
    
        if (!empty($_FILES['FileNm']['name'])) {
            $FileNm = $_FILES['FileNm']['name'];
            $Attachment = file_get_contents($_FILES['FileNm']['tmp_name']);
        } else {
            $FileNm = $row->FileNm;
            $Attachment = $row->Attachment;
        }
    
        $results = $this->AssignmentSystem_model->update_PDO_AssignmentSystem($IdAt, $EdYear, $PrType, $PrDepart, $Prsubj, $Prdate, $PrNamete, $TeaAll, $Prother, $Pr_id, $UpdatedAt, $FileNm, $Attachment);
    
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }    

    public function delete_AssignmentSystem()
    {
        $IdAt = $this->input->post('IdAt');

        $results = $this->AssignmentSystem_model->delete_AssignmentSystem($IdAt);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($IdAt){
        $result = $this->AssignmentSystem_model->export_File_Fame($IdAt);
        foreach ($result->result() as $row) {
            $sub = strchr($row->FileNm, ".");
            $disSub = substr($sub, 1, 100);
            if (strchr($row->FileNm, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->FileNm . '"');
                print($row->Attachment);
            } else if (strchr($row->FileNm, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->FileNm . '"');
                print($row->Attachment);
            } else if (strchr($row->FileNm, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->FileNm . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->FileNm . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->FileNm . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->FileNm . '"');
                print($row->Attachment);
            }
        }
    }

    function Export_Data($IdAt)
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
        $sheet->setTitle('ข้อมูลการมอบหมายติดตามงาน');

        $sheet->mergeCells('A2:G2');
        $sheet->setCellValue('A2', 'ข้อมูลมอบหมายงาน / ติดตามงาน');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $sheet->mergeCells('A4:B4');
        $sheet->setCellValue('A4', 'ผู้ที่ได้รับหมอบหมายงาน');
        $sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A4')->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'คำสั่งเลขที่', 'width' => 8.8],
            'B' => ['label' => 'ปีการศึกษา', 'width' => 9.2],
            'C' => ['label' => 'วันที่ออกคำสั่ง', 'width' => 10.8],
            'D' => ['label' => 'เรื่อง', 'width' => 17.8],
            'E' => ['label' => 'ประเภทคำสั่ง', 'width' => 12.8],
            'F' => ['label' => 'เพิ่มเติมชื่อผู้ที่ได้รับหมอบหมาย', 'width' => 22.8],
            'G' => ['label' => 'หมายเหตุ', 'width' => 12.8]
        ];

        foreach ($columnHeaders as $column => $headerInfo) {
            $cell = $column . '6';

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

        $results = $this->AssignmentSystem_model->fech_AssignmentSystemExport($IdAt)->result();

        $startRow = 7;
        foreach ($results as $row) {
            $FullName = $row->PrNamete;
            $data = [
                'A' => ['position' => 'center', 'value' => $row->Prsubj],
                'B' => ['position' => 'center', 'value' => $row->EdYear],
                'C' => ['position' => 'center', 'value' => date('d-m-Y', strtotime($row->Prdate))],
                'D' => ['position' => 'center', 'value' => $row->PrDepart],
                'E' => ['position' => 'center', 'value' => $row->PrType],
                'F' => ['position' => 'center', 'value' => $row->TeaAll],
                'G' => ['position' => 'center', 'value' => $row->Prother]
            ];
            foreach ($data as $column => $value) {
                $cell = $column . $startRow;
                $sheet->getStyle($cell)->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
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
            $startRow++;
        } 

        $sheet->mergeCells('C4:D4');
        $sheet->setCellValue('C4', $FullName);
        $sheet->getStyle('C4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('C4')->getFont()->setBold(false)->setSize(14)->setName('TH SarabunPSK');

        $writer = new Xlsx($spreadsheet);
        $FileName = "ข้อมูลการมอบหมายติดตามงานของ " . $FullName . ".xlsx"; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $FileName . '"'); 
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}
