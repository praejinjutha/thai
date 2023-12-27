<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ConsiderFiveyears extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model/ConsiderFiveyears_model');
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

    public function index($IDCard)
    {
        $NationalID = $this->session->userdata('NationalID');
        if ($NationalID !== $IDCard) {
            redirect(site_url('User_Controller/PersonnelHome_User')); 
        }

        $this->data["IDCard"] = $IDCard;

        $PosName = $this->ConsiderFiveyears_model->get_Position();
        $this->data["PosName"] = $PosName->result();

        $Level = $this->ConsiderFiveyears_model->get_Level();
        $this->data["Level"] = $Level->result();

        $result = $this->ConsiderFiveyears_model->get_FullName($IDCard)->result();
        foreach($result as $row){
            $this->data["FullName"] = $row->FullName;
            $this->data["IDCard"] = $row->IDCard;
        }
        
        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome_User/ConsiderFiveyears/ConsiderFiveyearsHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_ConsiderFiveyears()
    {   
        $NationalID = $this->input->post('NationalID');
        $Position = $this->input->post('Position');
        $IDCard = $this->input->post('IDCard');

        $results = $this->ConsiderFiveyears_model->fech_ConsiderFiveyears($NationalID)->result();
        
        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }
        
        echo json_encode($results);
    }

    function fetch_IDCard()
    {   
        $results = $this->ConsiderFiveyears_model->fetch_IDCard($this->input->post('IDCard'))->row();
        echo json_encode($results);
    }

    function fetch_IDCardEdit()
    {   
        $results = $this->ConsiderFiveyears_model->fetch_IDCardEdit($this->input->post('IDCard'))->row();
        echo json_encode($results);
    }

    public function InsertConsiderFiveyears()
    {
        $data = array(
            "IDCard" => $this->input->post('IDCard'),
            "BudYear" => $this->input->post('Year'),
            "Detail" => $this->input->post('PosName'),
            "PoNo" => $this->input->post('PosNumber'),
            "dtp" => $this->input->post('Date'),
            "PLevel" => $this->input->post('PLevel'),
            "Salary" => $this->input->post('CSalaryRate'),
            "Degree" => $this->input->post('ScrollRate'),
            "NSalary" => $this->input->post('NSalaryRate'),
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $Ref = isset($_FILES['Ref']['name']) ? $_FILES['Ref']['name'] : null;
        $Attachment = isset($_FILES['Ref']['tmp_name']) ? file_get_contents($_FILES['Ref']['tmp_name']) : null;

        $results = $this->ConsiderFiveyears_model->InsertConsiderFiveyears($data, $Ref, $Attachment);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function update_ConsiderFiveyears(){

        $id = $this->input->post('id');

        $row = $this->ConsiderFiveyears_model->get_SalaryRate($id)->row();

        $data = array(
            "IDCard" => $this->input->post('IDCard'),
            "BudYear" => $this->input->post('BudYear'),
            "Detail" => $this->input->post('Detail'),
            "PoNo" => $this->input->post('PoNo'),
            "dtp" => $this->input->post('dtp'),
            "PLevel" => $this->input->post('PLevel'),
            "Salary" => $this->input->post('Salary'),
            "Degree" => $this->input->post('Degree'),
            "NSalary" => $this->input->post('NSalary'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $Ref = null;
        $Attachment = null;

        if (!empty($_FILES['Ref']['name'])) {
            $Ref = $_FILES['Ref']['name'];
            $Attachment = file_get_contents($_FILES['Ref']['tmp_name']);
        }else {
            $Ref = $row->Ref;
            $Attachment = $row->Attachment;
        }

        $results = $this->ConsiderFiveyears_model->update_ConsiderFiveyears($id, $data, $Ref, $Attachment);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }
    
    public function delete_ConsiderFiveyears()
    {
        $id = $this->input->post('id');

        $results = $this->ConsiderFiveyears_model->delete_ConsiderFiveyears($id);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($id){
        $result = $this->ConsiderFiveyears_model->export_File($id);
        foreach ($result->result() as $row) {
            $sub = strchr($row->Ref, ".");
            $disSub = substr($sub, 1, 100);
            if (strchr($row->Ref, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->Ref . '"');
                print($row->Attachment);
            } else if (strchr($row->Ref, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->Ref . '"');
                print($row->Attachment);
            } else if (strchr($row->Ref, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->Ref . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".pdf") {
                header('Content-type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $row->Ref . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".xlsx") {
                header('Content-type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="' . $row->Ref . '"');
                print($row->Attachment);
            } else if (strchr($disSub, ".") === ".docx") {
                header('Content-type: application/msword');
                header('Content-Disposition: attachment; filename="' . $row->Ref . '"');
                print($row->Attachment);
            }
        }
    }

    function Export_Data($id)
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
        $sheet->setTitle('ข้อมูลการพิจารณาความดีความชอบ');

        $sheet->mergeCells('A2:G2');
        $sheet->setCellValue('A2', 'บันทึกข้อมูลการพิจารณาความดีความชอบย้อนหลัง 5 ปี');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $sheet->mergeCells('A4:B4');
        $sheet->setCellValue('A4', 'ผู้ที่ขอพิจารณาความดีความชอบ');
        $sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A4')->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'ปีการศึกษา', 'width' => 8.8],
            'B' => ['label' => 'ตำแหน่ง', 'width' => 15.8],
            'C' => ['label' => 'วัน/เดือน/ปี', 'width' => 10.8],
            'D' => ['label' => 'ระดับ', 'width' => 15.8],
            'E' => ['label' => 'อัตราเงินเดือนปัจจุบัน', 'width' => 16.8],
            'F' => ['label' => 'อัตราการเลื่อน', 'width' => 10.8],
            'G' => ['label' => 'อัตราเงินเดือนใหม่', 'width' => 14.8]
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

        $results = $this->ConsiderFiveyears_model->fech_ConsiderFiveyearsExport($id)->result();

        $startRow = 7;
        foreach ($results as $row) {
            $FullName = $row->FullName;
            $data = [
                'A' => ['position' => 'center', 'value' => $row->BudYear],
                'B' => ['position' => 'center', 'value' => $row->Detail],
                'C' => ['position' => 'center', 'value' => date('d-m-Y', strtotime($row->dtp))],
                'D' => ['position' => 'center', 'value' => $row->PLevel],
                'E' => ['position' => 'center', 'value' => number_format($row->Salary, 2)],
                'F' => ['position' => 'center', 'value' => $row->Degree],
                'G' => ['position' => 'center', 'value' => number_format($row->NSalary, 2)]
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
        $FileName = "ข้อมูลการพิจารณาความดีความชอบของ " . $FullName . ".xlsx"; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $FileName . '"'); 
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}
