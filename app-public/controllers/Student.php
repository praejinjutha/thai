<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

class Student extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Student_model');
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));
        $this->load->library('session');
    }

    public function index()
    {
        $this->data['getClassYear'] = $this->Student_model->get_ClassYear()->result();
        $this->data['getRoom'] = $this->Student_model->get_Room()->result();
        
        $this->data['loopYear'] = loopYear();
        $this->data['view_file'] = 'student';
        $this->load->view(THEMES, $this->data);
    }

    public function StudentImport()
    {
        
        $this->data['view_file'] = 'studentImport';
        $this->load->view(THEMES, $this->data);
    }

    public function get_Student()
    {
        $ClassYear = $this->input->post('ClassYear');
        $Room = $this->input->post('Room');
        $Fullname = $this->input->post('Fullname');

        if ($ClassYear == NULL && $Room == NULL && $Fullname == NULL) {
            $Score = $this->Student_model->get_Student()->result();
        } elseif ($ClassYear != NULL && $Room == NULL && $Fullname == NULL) {
            $Score = $this->Student_model->get_StudentClassYear($ClassYear)->result();
        } else if ($ClassYear != NULL && $Room != NULL && $Fullname == NULL) {
            $Score = $this->Student_model->get_StudentAll($ClassYear, $Room)->result();
        } else {
            $Score = $this->Student_model->get_StudentFullname($Fullname)->result();
        }

        echo json_encode($Score);
    }

    public function Insert_Student()
    {
        $AcYear = $this->input->post('AcYear');
        $StudentNo = $this->input->post('StudentNo');
        $Titlename = $this->input->post('Titlename');
        $Firstname = $this->input->post('Firstname');
        $Lastname = $this->input->post('Lastname');
        $Gender = $this->input->post('Gender');
        $ClassYear = $this->input->post('ClassYear');
        $Room = $this->input->post('Room');
        $Birthdate = $this->input->post('Birthdate');

        $Student = $this->Student_model->get_data()->result();

        foreach ($Student as $row) {
            $HStudent = $row->StudentNo;

            if ($HStudent == $StudentNo) {
                echo 'HaveStudent';
                return;
            }
        }

        $data = array(
            'AcYear' => $AcYear,
            'StudentNo' => $StudentNo,
            'Titlename' => $Titlename,
            'Firstname' => $Firstname,
            'Lastname' => $Lastname,
            'Gender' => $Gender,
            'ClassYear' => $ClassYear,
            'Room' => $Room,
            'Birthdate' => $Birthdate
        );

        $result = $this->Student_model->Insert_Student($data);

        if ($result) {
            echo 'Success';
        } else {
            echo 'error';
        }
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
                $cell = $worksheet->getCell($col.$row);
                $cellValue = $cell->getValue();
                
                if (\PhpOffice\PhpSpreadsheet\Shared\Date::isDateTime($cell)) {
                    $cellValue = date('d/m/Y', \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($cellValue));
                }
                
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
        $studentNoArray = $this->input->post('StudentNo');

        if (count($studentNoArray) !== count(array_unique($studentNoArray))) {
            echo 'SameStudentNo';
            return;
        }

        foreach ($studentNoArray as $d) {
            $StudentNo = $this->input->post('StudentNo[]')[$i];
            $Titlename = $this->input->post('Titlename[]')[$i];
            $Firstname = $this->input->post('Firstname[]')[$i];
            $Lastname = $this->input->post('Lastname[]')[$i];
            $ClassYear = $this->input->post('ClassYear[]')[$i];
            $Room = $this->input->post('Room[]')[$i];
            $Birthdate = $this->input->post('Birthdate[]')[$i];

            if ($Titlename == 'เด็กชาย' || $Titlename == 'นาย') {
                $Gender = 'ช';
            } else {
                $Gender = 'ญ';
            }

            $dateParts = explode('/', $Birthdate);
            $day = $dateParts[0];
            $month = $dateParts[1];
            $year = $dateParts[2] - 543;
            $formattedDate = "$year-$month-$day";

            $data[] = array(
                'AcYear' => date('Y') + 543,
                "StudentNo" => $StudentNo,
                "Titlename" => $Titlename,
                "Gender" => $Gender,
                "Firstname" => $Firstname,
                "Lastname" => $Lastname,
                "ClassYear" => $ClassYear,
                "Room" => $Room,
                "Birthdate" => $formattedDate
            );
            $i++;
        }
       
        foreach ($data as $row) {
            $AcYear = $row['AcYear'];
            $StudentNo = $row['StudentNo'];
            $Titlename = $row['Titlename'];
            $Gender = $row['Gender'];
            $Firstname = $row['Firstname'];
            $Lastname = $row['Lastname'];
            $ClassYear = $row['ClassYear'];
            $Room = $row['Room'];
            $Birthdate = $row['Birthdate'];
           
            $Student = $this->Student_model->get_data()->result();

            foreach ($Student as $std) {
                $HStudent = $std->StudentNo;
                if ($HStudent == $StudentNo) {
                    echo 'HaveStudent';
                    return;
                }
            }
            $this->Student_model->Insert_StudentImport($AcYear, $StudentNo, $Titlename, $Gender, $Firstname, $Lastname, $ClassYear, $Room, $Birthdate);
        }

        if ($data) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
