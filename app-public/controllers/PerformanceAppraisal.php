<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PerformanceAppraisal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('PerformanceAppraisal_model');
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
        $FullName = $this->PerformanceAppraisal_model->get_Fullname();
        $this->data["FullName"] = $FullName->result();

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome/PerformanceAppraisal/PerformanceAppraisalHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_PerformanceAppraisal()
    {   
        $Year = $this->input->post('Year');
        $FullName = $this->input->post('FullName');

        if ($Year == NULL && $FullName == NULL) {
            $results = $this->PerformanceAppraisal_model->fech_PerformanceAppraisal()->result();
        }elseif($Year != NULL && $FullName == NULL){
            $results = $this->PerformanceAppraisal_model->fech_PerformanceAppraisalYear($Year)->result();
        }elseif($Year == NULL && $FullName != NULL){
            $results = $this->PerformanceAppraisal_model->fech_PerformanceAppraisalFullName($FullName)->result();
        }elseif($Year != NULL && $FullName != NULL){
            $results = $this->PerformanceAppraisal_model->fech_PerformanceAppraisalAll($Year, $FullName)->result();
        }

        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($results);
    }

    function fetch_Appraisee()
    {   
        $results = $this->PerformanceAppraisal_model->fetch_Appraisee($this->input->post('IDCard'))->row();
        echo json_encode($results);
    }

    function fetch_AppraiseeEdit()
    {   
        $results = $this->PerformanceAppraisal_model->fetch_AppraiseeEdit($this->input->post('IDCard'))->row();
        echo json_encode($results);
    }

    function Insert_PerformanceAppraisal(){

        $AcYear = $this->input->post('AcYear');
        $Appraisee = $this->input->post('Appraisee');
        $AppraiseePosition = $this->input->post('AppraiseePosition');
        $Appraiser = $this->input->post('Appraiser');
        $Heading = $this->input->post('Heading');
        $Component = $this->input->post('Component');
        $Question = $this->input->post('Question');
        $Result = $this->input->post('Result');
        $Opinion = $this->input->post('Opinion');
        $Remark = $this->input->post('Remark');
        $CreatedAt = date('Y-m-d H:i:s');
        $UpdatedAt = date('Y-m-d H:i:s');

        $FileName = $_FILES['FileName']['name'];
        $Attachment = file_get_contents($_FILES['FileName']['tmp_name']);

        $results = $this->PerformanceAppraisal_model->Insert_PerformanceAppraisal($AcYear, $Appraisee, $AppraiseePosition, $Appraiser, $Heading, $Component, $Question, $Result, $Opinion, $Remark, $CreatedAt, $UpdatedAt, $FileName, $Attachment);
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PerformanceAppraisal(){

        $ID = $this->input->post('ID');
        $AcYear = $this->input->post('AcYear');
        $Appraisee = $this->input->post('Appraisee');
        $AppraiseePosition = $this->input->post('AppraiseePosition');
        $Appraiser = $this->input->post('Appraiser');
        $Heading = $this->input->post('Heading');
        $Component = $this->input->post('Component');
        $Question = $this->input->post('Question');
        $Result = $this->input->post('Result');
        $Opinion = $this->input->post('Opinion');
        $Remark = $this->input->post('Remark');
        $UpdatedAt = date('Y-m-d H:i:s');

        $row = $this->PerformanceAppraisal_model->get_PerformanceAppraisal($ID)->row();
        $FileName = NULL;
        $Attachment = NULL; 

        if (!empty($_FILES['FileName']['name'])) {
            $FileName = $_FILES['FileName']['name'];
            $Attachment = file_get_contents($_FILES['FileName']['tmp_name']);
        }else {
            $FileName = $row->FileName;
            $Attachment = $row->Attachment;
        }

        $results = $this->PerformanceAppraisal_model->update_PerformanceAppraisal($ID, $AcYear, $Appraisee, $AppraiseePosition, $Appraiser, $Heading, $Component, $Question, $Result, $Opinion, $Remark, $UpdatedAt, $FileName, $Attachment);
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PerformanceAppraisal()
    {
        $ID = $this->input->post('ID');

        $results = $this->PerformanceAppraisal_model->delete_PerformanceAppraisal($ID);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($ID){
        $result = $this->PerformanceAppraisal_model->export_File($ID);
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

    public function exportExcel($ID)
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
        $sheet->setTitle('ข้อมูลการประเมินผลการปฏิบัติงาน');

        $results = $this->PerformanceAppraisal_model->fech_PerformanceAppraisalExport($ID)->result();

        foreach ($results as $row) {
            $data = [ 
                'value' => $row->AcYear,
                $FileName = $row->Appraisee,
                'value' => $row->AppraiseePosition,
                'value' => $row->Appraiser,
                'value' => $row->Result,
                'value' => $row->Opinion,
                'value' => $row->Heading,
                'value' => $row->Component,
                'value' => $row->Question
            ];
        }

        $HeaderStyle = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 16,
                'name'  => 'TH SarabunPSK',
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_TOP,
            ),
        );

        $DataStyle = array(
            'font'  => array(
                'bold'  => false,
                'size'  => 16,
                'name'  => 'TH SarabunPSK',
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
        );

        $sheet->mergeCells('A1:J1');
        $sheet->setCellValue('A1', 'การประเมินผลการปฏิบัติงาน');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');
        $sheet->getStyle('A1:J1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('ffed97');

        $sheet->mergeCells('A3:C3');
        $sheet->setCellValue('A3', 'ปีการศึกษา');
        $sheet->getStyle('A3')->applyFromArray($HeaderStyle); 
        $sheet->getStyle('D3')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D3', $row->AcYear);

        $sheet->mergeCells('A5:C5');
        $sheet->setCellValue('A5', 'ฃื่อ - นามสกุล ผู้ถูกประเมิน');
        $sheet->getStyle('A5')->applyFromArray($HeaderStyle); 
        $sheet->mergeCells('D5:F5');
        $sheet->getStyle('D5')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D5', $FileName);
        
        $sheet->setCellValue('G5', 'ตำแหน่ง');
        $sheet->getStyle('G5')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('H5:J5');
        $sheet->getStyle('H5')->applyFromArray($DataStyle); 
        $sheet->setCellValue('H5', $row->AppraiseePosition);

        $sheet->mergeCells('A7:C7');
        $sheet->setCellValue('A7', 'ฃื่อ- นามสกุล ผู้ประเมิน');
        $sheet->getStyle('A7')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D7:F7');
        $sheet->getStyle('D7')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D7', $row->Appraiser);

        $sheet->mergeCells('A9:C9');
        $sheet->setCellValue('A9', 'หัวข้อการประเมินผลการสอน');
        $sheet->getStyle('A9')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D9:F9');
        $sheet->getStyle('D9')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D9', $row->Heading);

        $sheet->mergeCells('A11:C11');
        $sheet->setCellValue('A11', 'องค์ประกอบ');
        $sheet->getStyle('A11')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D11:F11');
        $sheet->getStyle('D11')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D11', $row->Component);

        $sheet->mergeCells('A13:C13');
        $sheet->setCellValue('A13', 'ข้อคำถาม');
        $sheet->getStyle('A13')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D13:F13');
        $sheet->getStyle('D13')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D13', $row->Question);

        $sheet->mergeCells('A15:C15');
        $sheet->setCellValue('A15', 'ผลการประเมิน');
        $sheet->getStyle('A15')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D15:F15');
        $sheet->getStyle('D15')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D15', $row->Result);

        $sheet->mergeCells('A17:C17');
        $sheet->setCellValue('A17', 'ความคิดเห็นของผู้บังคับบัญชา');
        $sheet->getStyle('A17')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D17:F17');
        $sheet->getStyle('D17')->applyFromArray($DataStyle); 
        $sheet->setCellValue('D17', $row->Opinion);

        $writer = new Xlsx($spreadsheet);
        $FileName = "ข้อมูลการประเมินผลการปฏิบัติงานของ " . $FileName . ".xlsx"; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $FileName . '"'); 
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}
