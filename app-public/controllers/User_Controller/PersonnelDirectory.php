<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PersonnelDirectory extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('PersonnelDirectory_model');
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library("pagination");
        
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
        $PosName = $this->PersonnelDirectory_model->get_PosName();
        $this->data["PosName"] = $PosName->result();

        $GroupName = $this->PersonnelDirectory_model->get_Subjectgroup();
        $this->data["GroupName"] = $GroupName->result();

        $NStatus = $this->PersonnelDirectory_model->get_Status();
        $this->data["NStatus"] = $NStatus->result();

        $this->data['view_file'] = 'PersonnelHome_User/PersonnelDirectory/PersonnelDirectoryHome';
        $this->load->view(THEMES, $this->data);
    }

    public function fetch_PersonnelDirectory() {
        
        $page = $this->input->post('page');
        $records_per_page = 10;

        $data['records'] = $this->PersonnelDirectory_model->getPersonnelData($page, $records_per_page);
        $total_records = $this->PersonnelDirectory_model->getTotalPersonnelRecords();
        $data['total_pages'] = ceil($total_records / $records_per_page);

        echo json_encode($data);
    }

    function fech_PersonnelDirectory()
    {   
        $PosName = $this->input->post('PosName');
        $GroupName = $this->input->post('GroupName');
        $NStatus = $this->input->post('NStatus');
        
        if($PosName == null && $GroupName == null && $NStatus == null)
        {
            $results = $this->PersonnelDirectory_model->fech_PersonnelDirectory()->result();
        }elseif($PosName != null && $GroupName == null && $NStatus == null){
            $results = $this->PersonnelDirectory_model->fech_PosPersonnelDirectory($PosName)->result();
        }elseif($PosName == null && $GroupName != null && $NStatus == null){
            $results = $this->PersonnelDirectory_model->fech_GroupPersonnelDirectory($GroupName)->result();
        }elseif($PosName == null && $GroupName == null && $NStatus != null){
            $results = $this->PersonnelDirectory_model->fech_StatusPersonnelDirectory($NStatus)->result();
        }
        
        echo json_encode($results);
    }

    function Export()
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
        $sheet->setTitle('รายชื่อบุคลากรทางการศึกษา');

        $sheet->mergeCells('A2:G2');
        $sheet->setCellValue('A2', 'ทำเนียบครูและบุคลากรทางการศึกษา');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $columnHeaders = [
            'A' => ['label' => 'ลำดับ', 'width' => 8.8],
            'B' => ['label' => 'ชื่อ - นามสกุล', 'width' => 22.8],
            'C' => ['label' => 'ตำแหน่ง', 'width' => 25.8],
            'D' => ['label' => 'วุฒิสูงสุด', 'width' => 19.8],
            'E' => ['label' => 'วุฒิในตำแหน่งปัจจุบัน', 'width' => 19.8],
            'F' => ['label' => 'วุฒิที่ใช้บรรจุ', 'width' => 19.8],
            'G' => ['label' => 'สถานพการทำงาน', 'width' => 18.8]
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

        $PosName = $this->input->post('PosName');
        $GroupName = $this->input->post('GroupName');
        $NStatus = $this->input->post('NStatus');
        
        if($PosName == null && $GroupName == null && $NStatus == null)
        {
            $results = $this->PersonnelDirectory_model->fech_PersonnelDirectory()->result();
        }elseif($PosName != null && $GroupName == null && $NStatus == null){
            $results = $this->PersonnelDirectory_model->fech_PosPersonnelDirectory($PosName)->result();
        }elseif($PosName == null && $GroupName != null && $NStatus == null){
            $results = $this->PersonnelDirectory_model->fech_GroupPersonnelDirectory($GroupName)->result();
        }elseif($PosName == null && $GroupName == null && $NStatus != null){
            $results = $this->PersonnelDirectory_model->fech_StatusPersonnelDirectory($NStatus)->result();
        }

        $startRow = 5;
        $count = 1;
        foreach ($results as $row) {
            $data = [
                'A' => ['position' => 'center', 'value' => $count],
                'B' => ['position' => 'left', 'value' => $row->FullName],
                'C' => ['position' => 'center', 'value' => $row->PosName],
                'D' => ['position' => 'center', 'value' => $row->TopBA],
                'E' => ['position' => 'center', 'value' => $row->PoBA],
                'F' => ['position' => 'center', 'value' => $row->PlaceBA],
                'G' => ['position' => 'center', 'value' => $row->NStatus]
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

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="รายชื่อบุคลากรทางการศึกษา.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }
}
