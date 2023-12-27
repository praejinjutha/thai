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

class ImportData extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ImportData_model');
        $this->load->helper(array('form', 'url', 'text'));
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
        $this->data['view_file'] = 'PersonnelHome/ImportData/ImportDataHome';
        $this->load->view(THEMES, $this->data);
    }

    public function Read_Excel() {
        $file_name = $_FILES['Excel_file']['name'];
        $file_tmp = $_FILES['Excel_file']['tmp_name'];

        $inputFileType = IOFactory::identify($file_tmp);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($file_tmp);

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        $data = array();

        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = array();

            for ($col = 'A'; $col <= $highestColumn; $col++) {
                $cellValue = $worksheet->getCell($col.$row)->getValue();
                $rowData[] = $cellValue;
            }

            $data[] = $rowData;
        }

        echo json_encode($data);
    }

    function importFiles()
    {
        $i = 0;
        $data = array();
        foreach ($this->input->post('IDCard') as $d) {
            $PName = $this->input->post('PName[]')[$i];
            $FTName = $this->input->post('FTName[]')[$i];
            $LTName = $this->input->post('LTName[]')[$i];
            $IDCard = $this->input->post('IDCard[]')[$i];
            $PlaceBA = $this->input->post('PlaceBA[]')[$i];
            $Race = $this->input->post('Race[]')[$i];
            $Nationnality = $this->input->post('Nationnality[]')[$i];
            $Religion = $this->input->post('Religion[]')[$i];
            $BloodG = $this->input->post('BloodG[]')[$i];
            $Sex = $this->input->post('Sex[]')[$i];

            $data[] = array(
                "PName" => $PName,
                "FTName" => $FTName,
                "LTName" => $LTName,
                "IDCard" => $IDCard,
                "PlaceBA" => $PlaceBA,
                "Race" => $Race,
                "Nationnality" => $Nationnality,
                "Religion" => $Religion,
                "BloodG" => $BloodG,
                "Sex" => $Sex,
                'CreatedAt' => date('Y-m-d H:i:s'),
                'UpdatedAt' => date('Y-m-d H:i:s')
            );
            $i++;
           
        }
       
        foreach ($data as $row) {
            $IDCard = $row['IDCard'];
            $PName = $row['PName'];
            $FTName = $row['FTName'];
            $LTName = $row['LTName'];
            $PlaceBA = $row['PlaceBA'];
            $Race = $row['Race'];
            $Nationnality = $row['Nationnality'];
            $Religion = $row['Religion'];
            $BloodG = $row['BloodG'];
            $Sex = $row['Sex'];
            $CreatedAt = $row['CreatedAt'];
            $UpdatedAt = $row['UpdatedAt'];

            $School = '-';
            $PoLine = 99;
            $PoSalary = 0;
            $Salary = 0;
            $Salsum = 0;
            $MSalary = 0;
            $Subject_group = 'อื่นๆ';

            $NStatus = 'ปฏิบัติราชการ';

            $STMT_MenuStaData = $this->ImportData_model->MERGE_MenuStaData(
                $IDCard, $PName, $FTName, $LTName, $PlaceBA, $School, $PoLine, $PoSalary, $Salary,
                $Salsum, $MSalary, $Subject_group, $CreatedAt, $UpdatedAt
            );

            $STMT_MoneyData = $this->ImportData_model->MERGE_MoneyData(
                $IDCard, $Sex, $NStatus, $BloodG, $Nationnality, $Race, $Religion, $CreatedAt, $UpdatedAt
            );
           
            $SMPr_RegisAddress = $this->ImportData_model->SMPr_RegisAddress(
                $IDCard
            );
            
            $SMPr_ContactAddress = $this->ImportData_model->SMPr_ContactAddress(
                $IDCard
            );

            $SMPr_EnhanceData = $this->ImportData_model->SMPr_EnhanceData(
                $IDCard
            );

            $SMPr_PicAll = $this->ImportData_model->SMPr_PicAll(
                $IDCard
            );
        }

        if ($data == true) {
            $msg = '1';
        } else {
            $msg = '2';
        }
    echo $msg;
    }

    public function DownloadFile()
    {
        $this->data['view_file'] = 'PersonnelHome/ImportData/SampleFile.php';
        $this->load->view(THEMES, $this->data);
    }
}