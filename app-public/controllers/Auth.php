<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text'));
    }

    public function index()
    {
        $this->load->view('auth/signin');
    }

    public function singupForm()
    {
        $this->load->view('auth/signup');
    }

    public function signin()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $this->load->model('Auth_model');

        $this->load->dbforge();

// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง MenuStaData **********************
        if (!$this->db->field_exists('PEName', 'SMPr_MenuStaData')) {
            $MenuStaData = array(
                'PEName' => array(
                    'type' => 'nvarchar',
                    'constraint' => '15',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_MenuStaData', $MenuStaData);
        }
        if (!$this->db->field_exists('CreatedAt', 'SMPr_MenuStaData')) {
            $MenuStaData = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_MenuStaData', $MenuStaData);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_MenuStaData')) {
            $MenuStaData = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_MenuStaData', $MenuStaData);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง RegisAddress **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_RegisAddress')) {
            $RegisAddress = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_RegisAddress', $RegisAddress);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_RegisAddress')) {
            $RegisAddress = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_RegisAddress', $RegisAddress);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง ContactAddress **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_ContactAddress')) {
            $ContactAddress = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_ContactAddress', $ContactAddress);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_ContactAddress')) {
            $ContactAddress = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_ContactAddress', $ContactAddress);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง RelaFamily **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_RelaFamily')) {
            $RelaFamily = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_RelaFamily', $RelaFamily);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_RelaFamily')) {
            $RelaFamily = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_RelaFamily', $RelaFamily);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง EduData **********************  
        if (!$this->db->field_exists('CreatedAt', 'SMPr_EduData')) {
            $EduData = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_EduData', $EduData);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_EduData')) {
            $EduData = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_EduData', $EduData);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง FameData **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_FameData')) {
            $FameData = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_FameData', $FameData);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_FameData')) {
            $FameData = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_FameData', $FameData);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง HTrain **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_HTrain')) {
            $HTrain = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_HTrain', $HTrain);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_HTrain')) {
            $HTrain = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_HTrain', $HTrain);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง HPreferment **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_HPreferment')) {
            $HPreferment = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_HPreferment', $HPreferment);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_HPreferment')) {
            $HPreferment = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_HPreferment', $HPreferment);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง TeachDataSubj **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_TeachDataSubj')) {
            $TeachDataSubj = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_TeachDataSubj', $TeachDataSubj);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_TeachDataSubj')) {
            $TeachDataSubj = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_TeachDataSubj', $TeachDataSubj);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง LProfession **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_LProfession')) {
            $LProfession = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_LProfession', $LProfession);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_LProfession')) {
            $LProfession = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_LProfession', $LProfession);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง HRRoyal **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_HRRoyal')) {
            $HRRoyal = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_HRRoyal', $HRRoyal);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_HRRoyal')) {
            $HRRoyal = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_HRRoyal', $HRRoyal);
        }
 // ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง ThaiRoyalDecoration **********************
        if (!$this->db->field_exists('CreatedAt', 'SPL_PR_ThaiRoyalDecoration')) {
            $ThaiRoyalDecoration = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SPL_PR_ThaiRoyalDecoration', $ThaiRoyalDecoration);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SPL_PR_ThaiRoyalDecoration')) {
            $ThaiRoyalDecoration = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SPL_PR_ThaiRoyalDecoration', $ThaiRoyalDecoration);
        }       
 // ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง TeacherPrize **********************
        if (!$this->db->field_exists('CreatedAt', 'SMPr_TeacherPrize')) {
            $TeacherPrize = array(
                'CreatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_TeacherPrize', $TeacherPrize);
        }

        if (!$this->db->field_exists('UpdatedAt', 'SMPr_TeacherPrize')) {
            $TeacherPrize = array(
                'UpdatedAt' => array(
                    'type' => 'datetimeoffset',
                    'constraint' => '7',
                    'null' => TRUE
                )
            );
            $this->dbforge->add_column('SMPr_TeacherPrize', $TeacherPrize);
        }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง SalaryRate **********************
    if (!$this->db->field_exists('NSalary', 'SPL_Pr_SalaryRate')) {
        $SalaryRate = array(
            'NSalary' => array(
                'type' => 'float',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_Pr_SalaryRate', $SalaryRate);
    }

    if (!$this->db->field_exists('Attachment', 'SPL_Pr_SalaryRate')) {
        $SalaryRate = array(
            'Attachment' => array(
                'type' => 'varbinary',
                'constraint' => 'MAX',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_Pr_SalaryRate', $SalaryRate);
    } 

    if (!$this->db->field_exists('CreatedAt', 'SPL_Pr_SalaryRate')) {
        $SalaryRate = array(
            'CreatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_Pr_SalaryRate', $SalaryRate);
    }

    if (!$this->db->field_exists('UpdatedAt', 'SPL_Pr_SalaryRate')) {
        $SalaryRate = array(
            'UpdatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_Pr_SalaryRate', $SalaryRate);
    }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง Prfrom **********************
    if (!$this->db->field_exists('CreatedAt', 'SMPr_Prfrom')) {
        $Prfrom = array(
            'CreatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SMPr_Prfrom', $Prfrom);
    }

    if (!$this->db->field_exists('UpdatedAt', 'SMPr_Prfrom')) {
        $Prfrom = array(
            'UpdatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SMPr_Prfrom', $Prfrom);
    }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง Idplan **********************
    if (!$this->db->field_exists('CreatedAt', 'SPL_PR_Idplan')) {
        $Idplan = array(
            'CreatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Idplan', $Idplan);
    }

    if (!$this->db->field_exists('UpdatedAt', 'SPL_PR_Idplan')) {
        $Idplan = array(
            'UpdatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Idplan', $Idplan);
    }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง Absent **********************
    if (!$this->db->field_exists('FileName', 'SMPr_Absent')) {
        $Absent = array(
            'FileName' => array(
                'type' => 'nvarchar',
                'constraint' => '255',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SMPr_Absent', $Absent);
    }

    if (!$this->db->field_exists('Attachment', 'SMPr_Absent')) {
        $Absent = array(
            'Attachment' => array(
                'type' => 'varbinary',
                'constraint' => 'MAX',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SMPr_Absent', $Absent);
    }

    if (!$this->db->field_exists('CreatedAt', 'SMPr_Absent')) {
        $Absent = array(
            'CreatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SMPr_Absent', $Absent);
    }

    if (!$this->db->field_exists('UpdatedAt', 'SMPr_Absent')) {
        $Absent = array(
            'UpdatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SMPr_Absent', $Absent);
    }
// ********************** เพิ่มข้อมูลฟิว CreatedAt และ UpdatedAt ของตาราง PerformanceAppraisal **********************
    if (!$this->db->field_exists('CreatedAt', 'SPL_PR_PerformanceAppraisal')) {
        $PerformanceAppraisal = array(
            'CreatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_PerformanceAppraisal', $PerformanceAppraisal);
    }

    if (!$this->db->field_exists('UpdatedAt', 'SPL_PR_PerformanceAppraisal')) {
        $PerformanceAppraisal = array(
            'UpdatedAt' => array(
                'type' => 'datetimeoffset',
                'constraint' => '7',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_PerformanceAppraisal', $PerformanceAppraisal);
    }
// ********************** เพิ่มข้อมูลฟิว Position2 - Position8 ของตาราง SPL_PR_Schedule_Manage **********************
    if (!$this->db->field_exists('position2', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position2' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('position3', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position3' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('position4', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position4' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('position5', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position5' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('position6', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position6' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('position7', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position7' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('position8', 'SPL_PR_Schedule_Manage')) {
        $Schedule_Manage = array(
            'position8' => array(
                'type' => 'nvarchar',
                'constraint' => '100',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_PR_Schedule_Manage', $Schedule_Manage);
    }

    if (!$this->db->field_exists('Time', 'SPL_Pr_TeacherSchedule')) {
        $TeacherSchedule = array(
            'Time' => array(
                'type' => 'nvarchar',
                'constraint' => '30',
                'null' => TRUE
            )
        );
        $this->dbforge->add_column('SPL_Pr_TeacherSchedule', $TeacherSchedule);
    }
// ********************** END เพิ่มข้อมูลฟิว **********************

        $result = $this->Auth_model->findUser($user, $pass);

        if ($result == false) {
            $this->session->set_flashdata('msg_error', 'Username or Password ผิดพลาด');
            redirect('auth');
        } else {
            foreach ($result->result() as $row) {
                $this->data['ID'] = $row->ID;
                $this->data['NationalID'] = $row->NationalID;
                $this->data['Name'] = $row->Name;
                $this->data['Role'] = $row->Role;
            }
            
            $result_setting = $this->Auth_model->find_setting();
            foreach ($result_setting->result() as $row) {
                $this->data['SchoolName'] = $row->SchoolName;
                $this->data['Province'] = $row->Province;
                $this->data['District'] = $row->District;
                $this->data['SubDistrict'] = $row->SubDistrict;
            } 

            $this->session->set_userdata('LogUserID', $this->data['ID']);
            $this->session->set_userdata('NationalID', $this->data['NationalID']);
            $this->session->set_userdata('Name', $this->data['Name']);
            $this->session->set_userdata('Role', $this->data['Role']);
            $this->session->set_userdata('SchoolName', $this->data['SchoolName']);
            $this->session->set_userdata('Province', $this->data['Province']);
            $this->session->set_userdata('District', $this->data['District']);
            $this->session->set_userdata('SubDistrict', $this->data['SubDistrict']);
            $this->session->set_userdata('is_logged_in', true);
            $this->session->set_flashdata('msg_success', 'Login Successful!');

            redirect('dashboard');
        }
    }

    public function register()
    {
        $name = $this->input->post('name');
        $StatusPersonal = $this->input->post('StatusPersonal');
        $idcard = $this->input->post('idcard');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirmPassword');
        $datetime = new DateTime();
        $newDate = $datetime->format('m/d/Y g:i A');

        if ($password != $confirmPassword) {
            $this->session->set_flashdata('msg_password', 'Passwords do not match!');
            redirect('auth/singupForm');
        }

        $newPassword = password_hash($password, PASSWORD_BCRYPT);
        $data = array(
            'NationalID' => $idcard,
            'AdminPersonal' => $StatusPersonal,
            'Username' => $username,
            'Name' => $name,
            'Role' => 'user',
            'RegisDate' => $newDate,
            'Email' => $email,
            'Mobile' => $phone,
            'WebPassword' => $newPassword
        );

        $this->load->model('Auth_model');
        $result = $this->Auth_model->register($data);

        if ($result == TRUE) {
            $this->session->set_flashdata('msg_success', 'Register Successful!');
            $this->load->view('auth/signup');
        } else {
            $this->session->set_flashdata('msg_error', 'เกิดข้อผิดพลาดจากระบบ!');
            redirect('auth/singupForm');
        }
    }

    public function logout()
    {
        if ($this->session->userdata('is_logged_in')) {

            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('Role');
        }

        redirect('auth');
    }
}
