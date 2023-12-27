<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class HonorAward extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('HonorAward_model');
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
        $FullName = $this->HonorAward_model->get_Fullname();
        $this->data["FullName"] = $FullName->result();

        $PosName = $this->HonorAward_model->get_Position();
        $this->data["PosName"] = $PosName->result();

        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'PersonnelHome/HonorAward/HonorAwardHome';
        $this->load->view(THEMES, $this->data);
    }

    function fech_HonorAward()
    {   
        $EdYear = $this->input->post('EdYear');
        $Position = $this->input->post('Position');

        if ($EdYear == null) {
             $results = $this->HonorAward_model->fech_HonorAward()->result();
        }elseif ($EdYear != null && $Position == null) {
            $results = $this->HonorAward_model->fech_HonorAwardEdYear($EdYear)->result();   
        }elseif ($EdYear != null && $Position != null) {
            $results = $this->HonorAward_model->fech_HonorAwardTypeAll($EdYear, $Position)->result();   
        }

        foreach ($results as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        $data = [];
        foreach ($results as $row) {
            $rowData = $row;
            if ($row->Pic1 !== null) {
                $fileData = $row->Pic1;
                $fileType = 'assets/images/no_img/jpeg';
                $base64Data = base64_encode($fileData);
                $rowData->Pic1 = 'data:' . $fileType . ';base64,' . $base64Data;
            }
            if ($row->Pic2 !== null) {
                $fileData = $row->Pic2;
                $fileType = 'assets/images/no_img/jpeg';
                $base64Data = base64_encode($fileData);
                $rowData->Pic2 = 'data:' . $fileType . ';base64,' . $base64Data;
            }
            if ($row->Pic3 !== null) {
                $fileData = $row->Pic3;
                $fileType = 'assets/images/no_img/jpeg';
                $base64Data = base64_encode($fileData);
                $rowData->Pic3 = 'data:' . $fileType . ';base64,' . $base64Data;
            }
            if ($row->Pic4 !== null) {
                $fileData = $row->Pic4;
                $fileType = 'assets/images/no_img/jpeg';
                $base64Data = base64_encode($fileData);
                $rowData->Pic4 = 'data:' . $fileType . ';base64,' . $base64Data;
            }
            if ($row->Pic5 !== null) {
                $fileData = $row->Pic5;
                $fileType = 'assets/images/no_img/jpeg';
                $base64Data = base64_encode($fileData);
                $rowData->Pic5 = 'data:' . $fileType . ';base64,' . $base64Data;
            }
            if ($row->Pic6 !== null) {
                $fileData = $row->Pic6;
                $fileType = 'assets/images/no_img/jpeg';
                $base64Data = base64_encode($fileData);
                $rowData->Pic6 = 'data:' . $fileType . ';base64,' . $base64Data;
            }
            $data[] = $rowData;
        }

        echo json_encode($data);
    }

    function fetch_Position()   
    {
       echo $this->HonorAward_model->fetch_Position($this->input->post('EdYear'));
    }

    function Insert_HonorAward() {
        $EdYear = $this->input->post('EdYear');
        $Date = $this->input->post('Date');
        $Recipient = $this->input->post('Recipient');
        $PoLine = $this->input->post('PoLine');
        $PrizeName = $this->input->post('PrizeName');
        $PrizeLevel = $this->input->post('PrizeLevel');
        $Organizer = $this->input->post('Organizer');
    
        $Data = array(
            'EdYear' => $EdYear,
            'Date' => $Date,
            'Recipient' => $Recipient,
            'PoLine' => $PoLine,
            'PrizeName' => $PrizeName,
            'PrizeLevel' => $PrizeLevel,
            'Organizer' => $Organizer,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
    
        $FileNm = !empty($_FILES['FileNm']['name']) ? $_FILES['FileNm']['name'] : null;
        $Attachment = !empty($_FILES['FileNm']['tmp_name']) ? file_get_contents($_FILES['FileNm']['tmp_name']) : null;
        $Pic1 = !empty($_FILES['Pic1']['tmp_name']) ? file_get_contents($_FILES['Pic1']['tmp_name']) : null;
        $Pic2 = !empty($_FILES['Pic2']['tmp_name']) ? file_get_contents($_FILES['Pic2']['tmp_name']) : null;
        $Pic3 = !empty($_FILES['Pic3']['tmp_name']) ? file_get_contents($_FILES['Pic3']['tmp_name']) : null;
        $Pic4 = !empty($_FILES['Pic4']['tmp_name']) ? file_get_contents($_FILES['Pic4']['tmp_name']) : null;
        $Pic5 = !empty($_FILES['Pic5']['tmp_name']) ? file_get_contents($_FILES['Pic5']['tmp_name']) : null;
        $Pic6 = !empty($_FILES['Pic6']['tmp_name']) ? file_get_contents($_FILES['Pic6']['tmp_name']) : null;

    
        $results = $this->HonorAward_model->insert_PDO_HonorAward($ID, $Data, $FileNm, $Attachment, $Pic1, $Pic2, $Pic3, $Pic4, $Pic5, $Pic6);
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }    

    public function update_HonorAward()
    {
        $ID = $this->input->post('ID');
        $EdYear = $this->input->post('EdYear');
        $Date = $this->input->post('Date');
        $Recipient = $this->input->post('Recipient');
        $PoLine = $this->input->post('PoLine');
        $PrizeName = $this->input->post('PrizeName');
        $PrizeLevel = $this->input->post('PrizeLevel');
        $Organizer = $this->input->post('Organizer');

        $row = $this->HonorAward_model->get_HonorAward($ID)->row();

        $Data = array(
            'EdYear' => $EdYear,
            'Date' => $Date,
            'Recipient' => $Recipient,
            'PoLine' => $PoLine,
            'PrizeName' => $PrizeName,
            'PrizeLevel' => $PrizeLevel,
            'Organizer' => $Organizer,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $FileNm = null;
        $Attachment = null;
        $Pic1 = null;
        $Pic2 = null;
        $Pic3 = null;
        $Pic4 = null;
        $Pic5 = null;
        $Pic6 = null;

        if (!empty($_FILES['FileNm']['name'])) {
            $FileNm = $_FILES['FileNm']['name'];
            $Attachment = file_get_contents($_FILES['FileNm']['tmp_name']);
        }else {
            $FileNm = $row->FileNm;
            $Attachment = $row->Attachment;
        }

        for ($i = 1; $i <= 6; $i++) {
            $fileKey = 'Pic' . $i;
            if (!empty($_FILES[$fileKey]['name'])) {
                ${"Pic" . $i} = file_get_contents($_FILES[$fileKey]['tmp_name']);
            }else{
                ${"Pic" . $i} = $row->{'Pic' . $i};
            }
        }

        $results = $this->HonorAward_model->update_PDO_HonorAward($ID, $Data, $FileNm, $Attachment, $Pic1, $Pic2, $Pic3, $Pic4, $Pic5, $Pic6);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }

        echo $msg;
    }

    public function delete_HonorAward()
    {
        $ID = $this->input->post('ID');

        $results = $this->HonorAward_model->delete_HonorAward($ID);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function export($ID){
        $result = $this->HonorAward_model->export_File_Fame($ID);
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
        $sheet->setTitle('การยกย่องเชิดชูเกียรติฯ');

        $sheet->mergeCells('A2:E2');
        $sheet->setCellValue('A2', 'การยกย่องเชิดชูเกียรติ / รางวัลเกียรติยศ');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $sheet->setCellValue('A4', 'ผู้ได้รับรางวัล');
        $sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A4')->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');

        $sheet->setCellValue('A5', 'ตำแหน่ง');
        $sheet->getStyle('A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A5')->getFont()->setBold(true)->setSize(14)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'ปีการศึกษา', 'width' => 10.8],
            'B' => ['label' => 'ว/ด/ป ที่ได้รับ', 'width' => 11.8],
            'C' => ['label' => 'ชื่อรางวัล', 'width' => 27.8],
            'D' => ['label' => 'ระดับรางวัล', 'width' => 20.8],
            'E' => ['label' => 'หน่วยงานที่จัด/มอบรางวัล', 'width' => 23.8]
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
            $sheet->getRowDimension(6)->setRowHeight(25);
        }

        $results = $this->HonorAward_model->fech_HonorAwardExport($ID)->result();
 
        $startRow = 8;
        foreach ($results as $row) {
            $FullName = $row->Recipient;
            $PosName = $row->PoLine;
            $data = [
                'A' => ['position' => 'center', 'value' => $row->EdYear],
                'B' => ['position' => 'center', 'value' => date('d-m-Y', strtotime($row->Date))],
                'C' => ['position' => 'center', 'value' => $row->PrizeName],
                'D' => ['position' => 'center', 'value' => $row->PrizeLevel],
                'E' => ['position' => 'center', 'value' => $row->Organizer]
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
        $sheet->setCellValue('B5', $PosName);
        $sheet->getStyle('B5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('B5')->getFont()->setBold(false)->setSize(14)->setName('TH SarabunPSK');

        $writer = new Xlsx($spreadsheet);
        $FileName = "ข้อมูลการยกย่องเชิดชูเกียรติของ " . $FullName . ".xlsx"; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $FileName . '"'); 
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
    
}