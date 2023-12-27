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

class LeaveNotice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model/LeaveNotice_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
			redirect(site_url('auth'));
		}
    }

    public function user($IDCard)
    {
        $NationalID = $this->session->userdata('NationalID');
        if ($NationalID !== $IDCard) {
            redirect(site_url('User_Controller/PersonnelHome_User')); 
        }

        $this->data["IDCard"] = $IDCard;

        $result = $this->LeaveNotice_model->get_FullName($IDCard)->result();
        foreach ($result as $row) {
            $this->data["FullName"] = $row->FullName;
            break;
        }

        $PosName = $this->LeaveNotice_model->get_PosName($NationalID)->result();
        $this->data["PosName"] = $PosName;

        $type_leave = $this->LeaveNotice_model->get_AbsentType($NationalID)->result();
        $this->data["type_leave"] = $type_leave;

        $type_leave_array = array();
        foreach ($type_leave as $row) {
            $type_leave_array[] = $row->type_leave;
        }
        $this->data['type_leaves'] = $type_leave_array;

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome_User/LeaveNotice/LeaveNoticeUser';
        $this->load->view(THEMES, $this->data);
    }

    function fetch_LeaveNotices()
    {   
        $NationalID = $this->input->post('NationalID');
        $Year = $this->input->post('Year');
        $Absent = $this->input->post('Absent');

        if($NationalID != NULL && $Year == NULL && $Absent == NULL){
            $results = $this->LeaveNotice_model->fetch_LeaveNotices($NationalID)->result();
        }elseif($NationalID != NULL && $Year != NULL && $Absent == NULL){
            $results = $this->LeaveNotice_model->fetch_LeaveNoticeYear($NationalID, $Year)->result();
        }elseif($NationalID != NULL && $Year == NULL && $Absent != NULL){
            $results = $this->LeaveNotice_model->fetch_LeaveNoticeAbsents($NationalID, $Absent)->result();
        }elseif($NationalID != NULL && $Year != NULL && $Absent != NULL){
            $results = $this->LeaveNotice_model->fetch_LeaveNoticeAll($NationalID, $Year, $Absent)->result();
        }

        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }
       
        echo json_encode($results);
    }

    function fetch_IDCard()
    {   
        $results = $this->LeaveNotice_model->fetch_IDCard($this->input->post('IDCard'))->row();
        echo json_encode($results);
    }

    function fech_AbsentType()
    {   
        $results = $this->LeaveNotice_model->fech_AbsentType()->result();
        echo json_encode($results);
    }

    function fech_AbsentRecd()
    {   
        $EStartDate = $this->input->post('EStartDate');
        $EEndDate = $this->input->post('EEndDate');
        $MonthSelect = $this->input->post('MonthSelect');
        $PosNameSelect = $this->input->post('PosNameSelect');

        if($EStartDate != NULL && $EEndDate != NULL && $MonthSelect == NULL && $PosNameSelect == NULL){
            $results = $this->LeaveNotice_model->fech_AbsentRecdDate($EStartDate, $EEndDate)->result();
        }elseif($EStartDate == NULL && $EEndDate == NULL && $MonthSelect != NULL && $PosNameSelect == NULL){
            $results = $this->LeaveNotice_model->fech_AbsentRecdMonth($MonthSelect)->result();
        }elseif($EStartDate != NULL && $EEndDate != NULL && $MonthSelect == NULL && $PosNameSelect != NULL){
            $results = $this->LeaveNotice_model->fech_AbsentRecdPos($EStartDate, $EEndDate, $PosNameSelect)->result();
        }
        
        echo json_encode($results);
    }

    public function Insert_LeaveNotice()
    {
        $CID = $this->input->post('IDCard');
        $idtypeleave = $this->input->post('TypeLeave');
        $dtp1 = $this->input->post('StartDate');
        $dtp2 = $this->input->post('EndDate');
        $remark = $this->input->post('Remark');
        $Status = $this->input->post('Status');

        $years = date("Y", strtotime($dtp1));
        $year = $years +543;
        
        $startTimestamp = strtotime($dtp1);
        $endTimestamp = strtotime($dtp2);
        $diffInSeconds = $endTimestamp - $startTimestamp;
        $amount = floor($diffInSeconds / (60 * 60 * 24)) + 1;

        $data = array(
            "year" => $year,
            "CID" => $CID,
            "idtypeleave" => $idtypeleave,
            "dtp1" => $dtp1,
            "dtp2" => $dtp2,
            "amount" => $amount,
            "remark" => $remark,
            "Status" => $Status,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $FileName = isset($_FILES['FileName']['name']) ? $_FILES['FileName']['name'] : null;
        $Attachment = isset($_FILES['FileName']['tmp_name']) ? file_get_contents($_FILES['FileName']['tmp_name']) : null;

        $results = $this->LeaveNotice_model->Insert_LeaveNotice($data, $FileName, $Attachment);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function update_LeaveNotice(){

        $id = $this->input->post('id');
        $CID = $this->input->post('IDCard');
        $idtypeleave = $this->input->post('TypeLeave');
        $dtp1 = $this->input->post('StartDate');
        $dtp2 = $this->input->post('EndDate');
        $remark = $this->input->post('Remark');

        $years = date("Y", strtotime($dtp1));
        $year = $years +543;
        
        $startTimestamp = strtotime($dtp1);
        $endTimestamp = strtotime($dtp2);
        $diffInSeconds = $endTimestamp - $startTimestamp;
        $amount = floor($diffInSeconds / (60 * 60 * 24)) + 1;

        $row = $this->LeaveNotice_model->get_Absent($id)->row();

        $data = array(
            "year" => $year,
            "CID" => $CID,
            "idtypeleave" => $idtypeleave,
            "dtp1" => $dtp1,
            "dtp2" => $dtp2,
            "amount" => $amount,
            "remark" => $remark,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $FileName = null;
        $Attachment = null;

        if (!empty($_FILES['FileName']['name'])) {
            $FileName = $_FILES['FileName']['name'];
            $Attachment = file_get_contents($_FILES['FileName']['tmp_name']);
        }else {
            $FileName = $row->FileName;
            $Attachment = $row->Attachment;
        }

        $results = $this->LeaveNotice_model->update_LeaveNotice($id, $data, $FileName, $Attachment);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_Status(){

        $id = $this->input->post('id');
        $Status = $this->input->post('Status');

        $results = $this->LeaveNotice_model->update_Status($id, $Status);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_LeaveNotice()
    {
        $id = $this->input->post('id');

        $results = $this->LeaveNotice_model->delete_LeaveNotice($id);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function Insert_AbsentType()
    {
        $Type = $this->input->post('Type');
        $Status = '1';

        $results = $this->LeaveNotice_model->Insert_AbsentType($Type, $Status);

        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function delete_AbsentType()
    {
        $id = $this->input->post('id');
        $status = '0';

        $results = $this->LeaveNotice_model->delete_AbsentType($id, $status);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($id){
        $result = $this->LeaveNotice_model->export_File($id);
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

    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth(47);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(44);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(10);

        $columnHeaders = [
            'A' => 'ลำดับ',
            'B' => 'ชื่อ - นามสกุล',
            'C' => 'ตำแหน่ง',
            'D' => 'ลาป่วย',
            'E' => 'ลากิจ',
            'F' => 'ลาพักผ่อน',
            'G' => 'ลาคลอดบุตร',
            'H' => 'ลาติดตามคู่สมรส',
            'I' => 'ลาอุปสมบท/ พิธีฮัจย์',
            'J' => 'ลาเข้ารับการตรวจเลือกหรือเข้ารับการเตรียมพล',
            'K' => 'ลาไปศึกษา ฝึกอบรม ดูงาน หรือปฏิบัติการวิจัย',
            'L' => 'ลาไปปฏิบัติงานในองค์การระหว่างประเทศ',
            'M' => 'ขาด',
            'N' => 'อื่น ๆ'
        ];

        $HeaderStyle = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 18,
                'name'  => 'TH SarabunPSK',
            ),
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
                ),
            ),
        );

        $BodyStyle = array(
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
        );

        $rowIndex = 1;
        foreach ($columnHeaders as $column => $header) {
            $cell = $column . '1'; 
            $sheet->getStyle($cell)->getAlignment()->applyFromArray([
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ]);
            $sheet->setCellValue($cell, $header);
            $sheet->getRowDimension($rowIndex)->setRowHeight(30);
            $sheet->getStyle($cell)->applyFromArray($HeaderStyle); 
        }

        $sheet->getStyle('A1:N1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('ffed97');

        $EStartDate = $this->input->post('EStartDate');
        $EEndDate = $this->input->post('EEndDate');
        $MonthSelect = $this->input->post('MonthSelect');
        $PosNameSelect = $this->input->post('PosNameSelect');

        if($EStartDate != NULL && $EEndDate != NULL && $MonthSelect == NULL && $PosNameSelect == NULL){
            $results = $this->LeaveNotice_model->fech_AbsentRecdDate($EStartDate, $EEndDate)->result();
        }elseif($EStartDate == NULL && $EEndDate == NULL && $MonthSelect != NULL && $PosNameSelect == NULL){
            $results = $this->LeaveNotice_model->fech_AbsentRecdMonth($MonthSelect)->result();
        }elseif($EStartDate != NULL && $EEndDate != NULL && $MonthSelect == NULL && $PosNameSelect != NULL){
            $results = $this->LeaveNotice_model->fech_AbsentRecdPos($EStartDate, $EEndDate, $PosNameSelect)->result();
        }

        $startRow = 2;
        $count = 1;
        
        foreach ($results as $row) {
            $data = [
                'A' => ['position' => 'center', 'value' => $count],
                'B' => ['position' => 'left', 'value' => $row->FullName],
                'C' => ['position' => 'center', 'value' => $row->PosName],
                'D' => ['position' => 'center', 'value' => $row->Sick],
                'E' => ['position' => 'center', 'value' => $row->Business],
                'F' => ['position' => 'center', 'value' => $row->TVacation],
                'G' => ['position' => 'center', 'value' => $row->Maternity],
                'H' => ['position' => 'center', 'value' => $row->Spouse],
                'I' => ['position' => 'center', 'value' => $row->Ordination],
                'J' => ['position' => 'center', 'value' => $row->Military],
                'K' => ['position' => 'center', 'value' => $row->Study],
                'L' => ['position' => 'center', 'value' => $row->International],
                'M' => ['position' => 'center', 'value' => $row->Absent],
                'N' => ['position' => 'center', 'value' => $row->Other],
            ];
            foreach ($data as $column => $value) {
                $cell = $column . $startRow;
                $sheet->getStyle($cell)->getAlignment()->setHorizontal($value['position']);
                $sheet->getStyle($cell)->getAlignment()->setVertical('center');
                $sheet->setCellValue($cell, $value['value']);
                $sheet->getStyle($cell)->applyFromArray($BodyStyle); 
            }
            $count++;
            $startRow++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ออกรายงานการปฏิบัติราชการ.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}
