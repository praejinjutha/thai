<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class RequestForInsignia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('RequestForInsignia_model');
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
        $FullName = $this->RequestForInsignia_model->get_Fullname();
        $this->data["FullName"] = $FullName->result();

        $PosName = $this->RequestForInsignia_model->get_Position();
        $this->data["PosName"] = $PosName->result();

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome/RequestForInsignia/RequestForInsigniaHome';
        $this->load->view(THEMES, $this->data);
    }
    
    function fech_RequestForInsignia()
    {   
        $Year = $this->input->post('Year');
        if ($Year != null) {
            $results = $this->RequestForInsignia_model->fech_YearRequestForInsignia($Year)->result();
        }else{
            $results = $this->RequestForInsignia_model->fech_RequestForInsignia()->result();
        }

        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($results);
    }

    function Insert_RequestForInsignia(){

        $Acyear = $this->input->post('Acyear');
        $Teacher = $this->input->post('Teacher');
        $Position = $this->input->post('Position');
        $StartDate = $this->input->post('StartDate');
        $Description = $this->input->post('Description');
        $Remark = $this->input->post('Remark');

        if(!isset($_FILES['FileName']) || $_FILES['FileName']['error'] == UPLOAD_ERR_NO_FILE){

            $Data = array(
                'Acyear' => $Acyear,
                'Teacher' => $Teacher,
                'Position' => $Position,
                'StartDate' => $StartDate,
                'Description' => $Description,
                'Remark' => $Remark,
                'CreatedAt' => date('Y-m-d H:i:s'),
                'UpdatedAt' => date('Y-m-d H:i:s')
            );

            $results = $this->RequestForInsignia_model->Insert_RequestForInsignia($Data);

        }else{

            $FileName = $_FILES['FileName']['name'];
            $Attachment = file_get_contents($_FILES['FileName']['tmp_name']);

            $results = $this->RequestForInsignia_model->insert_PDO_RequestForInsignia($Acyear, $Teacher, $Position, $StartDate, $Description, $Remark, $FileName, $Attachment);
        }
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_RequestForInsignia(){

        $ID = $this->input->post('ID');
        $Acyear = $this->input->post('Acyear');
        $Teacher = $this->input->post('Teacher');
        $Position = $this->input->post('Position');
        $StartDate = $this->input->post('StartDate');
        $Description = $this->input->post('Description');
        $Remark = $this->input->post('Remark');

        if(!isset($_FILES['FileName']) || $_FILES['FileName']['error'] == UPLOAD_ERR_NO_FILE){

            $Data = array(
                'Acyear' => $Acyear,
                'Teacher' => $Teacher,
                'Position' => $Position,
                'StartDate' => $StartDate,
                'Description' => $Description,
                'Remark' => $Remark,
                'UpdatedAt' => date('Y-m-d H:i:s')
            );

            $results = $this->RequestForInsignia_model->update_RequestForInsignia($ID, $Data);

        }else{

            $FileName = $_FILES['FileName']['name'];
            $Attachment = file_get_contents($_FILES['FileName']['tmp_name']);

            $results = $this->RequestForInsignia_model->update_PDO_RequestForInsignia($ID, $Acyear, $Teacher, $Position, $StartDate, $Description, $Remark, $FileName, $Attachment);
        }
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_RequestForInsignia()
    {
        $ID = $this->input->post('ID');

        $results = $this->RequestForInsignia_model->delete_RequestForInsignia($ID);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($ID){
        $result = $this->RequestForInsignia_model->export_File_Fame($ID);
        foreach ($result->result() as $row) {
            $sub = strchr($row->FileName, ".");
            $disSub = substr($sub, 1, 100);
            if (strchr($row->FileName, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($row->FileName, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($row->FileName, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->FileName . '"');
                print($row->Attachment);
            }
        }
    }

    function Export_Data($ID)
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
        $sheet->setTitle('การขอพระราชทานเครื่องราชฯ');

        $sheet->mergeCells('A2:D2');
        $sheet->setCellValue('A2', 'การขอพระราชทานเครื่องราชอิสริยาภรณ์');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $sheet->setCellValue('A4', 'ผู้ที่ขอพระราชทาน');
        $sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A4')->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');

        $sheet->setCellValue('A5', 'ตำแหน่ง');
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A5')->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'ปีการศึกษา', 'width' => 15.8],
            'B' => ['label' => 'วัน/เดือน/ปี', 'width' => 17.8],
            'C' => ['label' => 'รายละเอียด', 'width' => 35.8],
            'D' => ['label' => 'หมายเหตุ', 'width' => 25.8]
        ];

        foreach ($columnHeaders as $column => $headerInfo) {
            $cell = $column . '7';

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

        $results = $this->RequestForInsignia_model->fech_RequestForInsigniaExport($ID)->result();

        $startRow = 8;
        foreach ($results as $row) {
            $FullName = $row->Teacher;
            $Position = $row->Position;
            $data = [
                'A' => ['position' => 'center', 'value' => $row->Acyear],
                'B' => ['position' => 'center', 'value' => date('d-m-Y', strtotime($row->StartDate))],
                'C' => ['position' => 'center', 'value' => $row->Description],
                'D' => ['position' => 'center', 'value' => $row->Remark]
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

        $sheet->mergeCells('B4:C4');
        $sheet->setCellValue('B4', $FullName);
        $sheet->getStyle('B4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('B4')->getFont()->setBold(false)->setSize(14)->setName('TH SarabunPSK');

        $sheet->mergeCells('B5:C5');
        $sheet->setCellValue('B5', $Position);
        $sheet->getStyle('B5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('B5')->getFont()->setBold(false)->setSize(14)->setName('TH SarabunPSK');

        $writer = new Xlsx($spreadsheet);
        $FileName = "ข้อมูลการขอพระราชทานเครื่องราชของ " . $FullName . ".xlsx"; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $FileName . '"'); 
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}