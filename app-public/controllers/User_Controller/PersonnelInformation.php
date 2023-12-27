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
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class PersonnelInformation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model/PersonnelInformation_model');
        $this->load->library("pagination");
        $this->load->helper(array('form', 'url', 'text', 'my_helper'));

        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('auth'));
        }
    }

    public function show($IDCard)
    {  
        $NationalID = $this->session->userdata('NationalID');
        if ($NationalID !== $IDCard) {
            redirect(site_url('User_Controller/PersonnelHome_User')); 
        }
        $this->session->userdata('idcard_id');
        $this->data['IDCard'] = $IDCard;
        
        $ResultData = $this->PersonnelInformation_model->get_PersonnelData($IDCard)->result();
        if (!empty($ResultData)) {
            $row = $ResultData[0]; 
            //--------------------------------------- แสดงข้อมูลทั่วไป ---------------------------------------------//
            //ส่วนที่ 1
            $this->data['Pic'] = $row->Pic;
            $this->data['IDCard'] = $row->IDCard;
            $this->data['Passport'] = $row->Passport;
            $this->data['PoNo'] = $row->PoNo;
            $this->data['NStatus'] = $row->NStatus;
            //ส่วนที่ 2
            $this->data['PName'] = $row->PName;
            $this->data['FTName'] = $row->FTName;
            $this->data['LTName'] = $row->LTName;
            $this->data['PEName'] = $row->PEName;
            $this->data['FEName'] = $row->FEName;
            $this->data['LEName'] = $row->LEName;
            $this->data['PoLine'] = $row->PoLine;
            $this->data['TypeName'] = $row->TypeName;
            $this->data['PosName'] = $row->PosName;
            $this->data['PLevel'] = $row->PLevel;
            $this->data['Level'] = $row->Level;
            $this->data['PoType'] = $row->PoType; 
            $this->data['Sex'] = $row->Sex;
            $this->data['Subject_group'] = $row->Subject_group;
            $this->data['PoAssign'] = $row->PoAssign;
            $this->data['BirthDate'] = $this->dateTHAI($row->BirthDate); 
            $this->data['MretireDate'] = $row->MretireDate;
            //ส่วนที่ 3
            $this->data['Nationality'] = $row->Nationality;
            $this->data['Race'] = $row->Race;
            $this->data['Religion'] = $row->Religion;
            $this->data['BloodG'] = $row->BloodG;
            $this->data['MStatus'] = $row->MStatus;
            //ส่วนที่ 4
            $this->data['FaName'] = $row->FaName;
            $this->data['MaName'] = $row->MaName;
            $this->data['PlaceDate'] = $this->dateTHAI($row->PlaceDate);
            $this->data['StartDate'] = $this->dateTHAI($row->StartDate);
            $this->data['LProfessionFirstDate'] = $this->dateTHAI($row->LProfessionFirstDate);
            $this->data['NowDate'] = $this->dateTHAI($row->NowDate);
            $this->data['MemberKBK'] = $row->MemberKBK;
            $this->data['CAccessKBK'] = $row->CAccessKBK;
            //ส่วนที่ 5
            $this->data['School'] = $row->School;
            $this->data['Member'] = $row->Member;
            $this->data['PZone'] = $row->PZone;
            $this->data['Ministry'] = $row->Ministry;
            $this->data['Area'] = $row->Area;
            $this->data['MemId'] = $row->MemId;
            $this->data['PoDate'] = $this->dateTHAI($row->PoDate);
            $this->data['PlaceBA'] = $row->PlaceBA;
            $this->data['TopBA'] = $row->TopBA;
            $this->data['PoBA'] = $row->PoBA;
            $this->data['MSalary'] = $row->MSalary;
            $this->data['EMoney'] = $row->EMoney;
            $this->data['PoSalary'] = $row->PoSalary;
            $this->data['Salsum'] = $row->Salsum;
            //ส่วนที่ 6
            $this->data['RecieveDate'] = $this->dateTHAI($row->RecieveDate);
            $this->data['ResultDate'] = $this->dateTHAI($row->ResultDate);
            $this->data['OrderNo'] = $row->OrderNo;
            $this->data['Enhance'] = $row->Enhance;

            $this->data['DtUpdatedAt'] = (new DateTime($row->UpdatedAt))->format('d-m-Y H:i:s');
            
            $birthDate = $this->dateTHAI($row->BirthDate);
            $dateParts = explode('-', $birthDate);

            $day = intval($dateParts[0]);
            $month = intval($dateParts[1]);
            $year = intval($dateParts[2]);
        
            $currentDate = new DateTime();
            $birthDate = new DateTime($year . '-' . $month . '-' . $day);
            $ageInterval = $currentDate->diff($birthDate);
        
            $this->data['years']= $ageInterval->y;
            $this->data['months'] = $ageInterval->m;
            $this->data['days']= $ageInterval->d;
        
            $retirementDate = clone $birthDate;
            $retirementDate->modify('+60 years');
            $retirementDateString = $retirementDate->format('d-m-Y');

            $remainingInterval = $currentDate->diff($retirementDate);
            $this->data['years_remaining'] = $remainingInterval->y;
            $this->data['months_remaining'] = $remainingInterval->m;
            $this->data['days_remaining'] = $remainingInterval->d;

            $dateOfBirth = $this->data['BirthDate'];
            $this->data['dateToFifty'] = date('Y-m-d', strtotime($dateOfBirth . '+60 Years'));
        }else {
            $this->data['Pic'] = '';
            $this->data['Passport'] = '';
            $this->data['PoNo'] = '';
            $this->data['NStatus'] = '';
            
            $this->data['PName'] = '';
            $this->data['FTName'] = '';
            $this->data['LTName'] = '';
            $this->data['PEName'] = '';
            $this->data['FEName'] = '';
            $this->data['LEName'] = '';
            $this->data['PoLine'] = '';
            $this->data['TypeName'] = '';
            $this->data['PosName'] = '';
            $this->data['PLevel'] = '';
            $this->data['Level'] = '';
            $this->data['PoType'] = ''; 
            $this->data['Sex'] = '';
            $this->data['Subject_group'] = '';
            $this->data['PoAssign'] = '';
            $this->data['BirthDate'] = ''; 
            $this->data['MretireDate'] = '';
            //ส่วนที่ 3
            $this->data['Nationality'] = '';
            $this->data['Race'] = '';
            $this->data['Religion'] = '';
            $this->data['BloodG'] = '';
            $this->data['MStatus'] = '';
            //ส่วนที่ 4
            $this->data['FaName'] = '';
            $this->data['MaName'] = '';
            $this->data['PlaceDate'] = '';
            $this->data['StartDate'] = '';
            $this->data['LProfessionFirstDate'] = '';
            $this->data['NowDate'] = '';
            $this->data['MemberKBK'] = '';
            $this->data['CAccessKBK'] = '';
            //ส่วนที่ 5
            $this->data['School'] = '';
            $this->data['Member'] = '';
            $this->data['PZone'] = '';
            $this->data['Ministry'] = '';
            $this->data['Area'] = '';
            $this->data['MemId'] = '';
            $this->data['PoDate'] = '';
            $this->data['PlaceBA'] = '';
            $this->data['TopBA'] = '';
            $this->data['PoBA'] = '';
            $this->data['MSalary'] = '';
            $this->data['EMoney'] = '';
            $this->data['PoSalary'] = '';
            $this->data['Salsum'] = '';
            //ส่วนที่ 6
            $this->data['RecieveDate'] = '';
            $this->data['ResultDate'] = '';
            $this->data['OrderNo'] = '';
            $this->data['Enhance'] = '';
            $this->data['DtUpdatedAt'] = '';
            $this->data['years'] = '';
            $this->data['months'] = '';
            $this->data['days'] = '';
            $this->data['years_remaining'] = '';
            $this->data['months_remaining'] = '';
            $this->data['days_remaining'] = '';
            $this->data['dateToFifty'] = '';
        }

        $ResultAddress = $this->PersonnelInformation_model->get_PersonnelAddress($IDCard)->result();
        if (!empty($ResultAddress)) {
            $row = $ResultAddress[0]; 

            $this->data['RNo'] = $row->RNo;
            $this->data['RMoo'] = $row->RMoo;
            $this->data['Rvillage'] = $row->Rvillage;
            $this->data['Rsoi'] = $row->Rsoi;
            $this->data['RBuid'] = $row->RBuid;
            $this->data['RRoad'] = $row->RRoad;
            $this->data['RDistrict'] = $row->RDistrict;
            $this->data['RSubDistric'] = $row->RSubDistric;
            $this->data['RProvince'] = $row->RProvince;
            $this->data['RZipcode'] = $row->RZipcode;
            $this->data['RTel'] = $row->RTel;
            $this->data['CNo'] = $row->CNo;
            $this->data['CMoo'] = $row->CMoo;
            $this->data['Cvillage'] = $row->Cvillage;
            $this->data['Csoi'] = $row->Csoi;
            $this->data['CBuid'] = $row->CBuid;
            $this->data['CRoad'] = $row->CRoad;
            $this->data['CDistrict'] = $row->CDistrict;
            $this->data['CSubDistric'] = $row->CSubDistric;
            $this->data['CProvince'] = $row->CProvince;
            $this->data['CZipcode'] = $row->CZipcode;
            $this->data['CTel'] = $row->CTel;

            $this->data['RgUpdatedAt'] = (new DateTime($row->RgUpdatedAt))->format('d-m-Y H:i:s');
        }else{
            $this->data['RNo'] = '';
            $this->data['RMoo'] = '';
            $this->data['Rvillage'] = '';
            $this->data['Rsoi'] = '';
            $this->data['RBuid'] = '';
            $this->data['RRoad'] = '';
            $this->data['RDistrict'] = '';;
            $this->data['RSubDistric'] = '';
            $this->data['RProvince'] = '';
            $this->data['RZipcode'] = '';
            $this->data['RTel'] = '';
            $this->data['CNo'] = '';
            $this->data['CMoo'] = '';
            $this->data['Cvillage'] = '';
            $this->data['Csoi'] = '';
            $this->data['CBuid'] = '';
            $this->data['CRoad'] = '';
            $this->data['CDistrict'] = '';
            $this->data['CSubDistric'] = '';
            $this->data['CProvince'] = '';
            $this->data['CZipcode'] = '';
            $this->data['CTel'] = '';
            $this->data['RgUpdatedAt'] = '';
        }

        if (is_numeric($this->data['MSalary']) && is_numeric($this->data['EMoney']) && is_numeric($this->data['PoSalary'])) {
            $this->data['Salsum'] = $this->data['MSalary'] + $this->data['EMoney'] + $this->data['PoSalary'];
        } else {
            $this->data['Salsum'] = 0;
        }

        $Status = $this->PersonnelInformation_model->getStatus();
        $this->data["Status"] = $Status->result();

        $STTPname = $this->PersonnelInformation_model->getSTTPname();
        $this->data["STTPname"] = $STTPname->result();

        $STPname = $this->PersonnelInformation_model->getSTPname();
        $this->data["STPname"] = $STPname->result();

        $Pos = $this->PersonnelInformation_model->getPos();
        $this->data["Pos"] = $Pos->result();

        $OdrLev = $this->PersonnelInformation_model->getOdrLev();
        $this->data["OdrLev"] = $OdrLev->result();

        $this->data['getTeacherType'] = $this->PersonnelInformation_model->getTeacherType()->result();

        $SubGroup = $this->PersonnelInformation_model->getSubject_group();
        $this->data["SubGroup"] = $SubGroup->result();

        $FullName = $this->PersonnelInformation_model->get_FullName();
        $this->data["FullName"] = $FullName->result();

        $ShortName = $this->PersonnelInformation_model->get_ShortName();
        $this->data["ShortName"] = $ShortName->result();

        $get_SubjectCode = $this->PersonnelInformation_model->get_SubjectCode();
        $this->data["get_SubjectCode"]  = $get_SubjectCode->result();

        $get_GroupName = $this->PersonnelInformation_model->get_GroupName();
        $this->data["get_GroupName"]  = $get_GroupName->result();

        $getP_at_fame = $this->PersonnelInformation_model->getP_at_fame($IDCard);
        $this->data["getP_at_fame"]  = $getP_at_fame->result();

        $getP_at_train = $this->PersonnelInformation_model->getP_at_train($IDCard);
        $this->data["getP_at_train"]  = $getP_at_train->result();

        $getP_at_study = $this->PersonnelInformation_model->getP_at_study($IDCard);
        $this->data["getP_at_study"]  = $getP_at_study->result();

        $getP_at_position = $this->PersonnelInformation_model->getP_at_position($IDCard);
        $this->data["getP_at_position"]  = $getP_at_position->result();

        $get_Id = $this->PersonnelInformation_model->get_Id($IDCard);
        $this->data["get_Id"]  = $get_Id->result();

        $getP_at_Leave = $this->PersonnelInformation_model->getP_at_Leave($IDCard);
        $this->data["getP_at_Leave"]  = $getP_at_Leave->result();

        $getP_at_Rename = $this->PersonnelInformation_model->getP_at_Rename($IDCard);
        $this->data["getP_at_Rename"]  = $getP_at_Rename->result();

        $getP_at_Rename = $this->PersonnelInformation_model->getP_at_Rename($IDCard);
        $this->data["getP_at_Rename"]  = $getP_at_Rename->result();

        $getP_at_Insignia = $this->PersonnelInformation_model->getP_at_Insignia($IDCard);
        $this->data["getP_at_Insignia"]  = $getP_at_Insignia->result();
        
        $this->data['loopRoom'] = loopRoom();
        $this->data['loopDate'] = loopDate();
        $this->data['view_file'] = 'PersonnelHome_User/PersonnelInformation/PersonnelInformationShow';
        $this->load->view(THEMES, $this->data);
    }

    public function delete_Personnel($id)
    {
        $results = $this->PersonnelInformation_model->delete_PersonnelId($id);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'Error';
        }
    }

    // *****************************************  Show Data Controller  *****************************************  
    function getData()
    {   
        $Status = $this->input->post('Status');
        $Position = $this->input->post('Position');

         if ($Status == null && $Position == null) {
            $results = $this->PersonnelInformation_model->get_SMPr_MenuStaData()->result();
        } elseif ($Status != null && $Position == null) {
            $results = $this->PersonnelInformation_model->get_SMPr_MenuStaDataType($Status)->result();
        } elseif ($Status != null && $Position != null) {
            $results = $this->PersonnelInformation_model->get_SMPr_MenuStaDataTypeAll($Status, $Position)->result();
        }
        echo json_encode($results);
    }

    function fetch_Position()   
    {
       echo $this->PersonnelInformation_model->fetch_Position($this->input->post('Status'));
    }
    
// *****************************************  Title Name Controller  *****************************************      
    //เพิ่มคำนำหน้าภาษาไทย
    public function insert_STTPname()
    {
        $TSPname = $this->input->post('TSPname');

            $data = array(
                'TSPname' => $TSPname
            );

            $results = $this->PersonnelInformation_model->insert_STTPname($data);

           if ($results) {
               $msg = 'Success';
           } else {
               $msg = 'error';
           }

        echo $msg;
    }
    //เพิ่มคำนำหน้าภาษาอังกฤษ
    public function insert_STPname()
    {

        $SPname = $this->input->post('SPname');

            $data = array(
                'SPname' => $SPname
            );

            $results = $this->PersonnelInformation_model->insert_STPname($data);

           if ($results) {
               $msg = 'Success';
           } else {
               $msg = 'error';
           }
            echo $msg;
    }
    //ลบคำนำหน้าภาษาไทย
    public function delete_STTPname()
    {
        $results = $this->PersonnelInformation_model->delete_STTPname($this->input->post('IDTPname'));

        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }
    //ลบคำนำหน้าภาษาอังกฤษ
    public function delete_STPname()
    {
        $results = $this->PersonnelInformation_model->delete_STPname($this->input->post('IDPname'));

        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }
    public function fetch_STTPname()
    {
      $this->data["TSPname"]  = $this->PersonnelInformation_model->get_ThaiTitle()->result();
      echo json_encode($this->data["TSPname"]);
    }
    public function fetch_STPname()
    {
      $this->data["SPname"]  = $this->PersonnelInformation_model->get_EngTitle()->result();
      echo json_encode($this->data["SPname"]);
    } 

// *****************************************  Show Date Controller  *****************************************  
    public function dateTHAI($date)
    {
        $dateToShow = empty($date) ? date('Y-m-d') : date("Y-m-d", strtotime("+0 year", strtotime($date)));
        return $dateToShow;
    }
    
// *****************************************  Data Controller  *****************************************  
    //อัปเดตข้อมูลบุคลากร
    public function update_PersonnelData(){
        //ส่วนที่ 1
        $IDCard = $this->input->post('IDCard');
        $Passport = $this->input->post('Passport');
        $PoNo = $this->input->post('PoNo');
        $NStatus = $this->input->post('NStatus');
        //ส่วนที่ 2
        $PName = $this->input->post('PName');
        $FTName = $this->input->post('FTName');
        $LTName = $this->input->post('LTName');
        $PEName = $this->input->post('PEName');
        $FEName = $this->input->post('FEName');
        $LEName = $this->input->post('LEName');
        $PoLine = $this->input->post('PoLine');
        $PLevel = $this->input->post('PLevel');
        $PoType = $this->input->post('PoType');
        $Sex = $this->input->post('Sex');
        $Subject_group = $this->input->post('Subject_group');
        $PoAssign = $this->input->post('PoAssign');
        $BirthDate = $this->input->post('BirthDate');
        $MretireDate = $this->input->post('MretireDate');
        //ส่วนที่ 3
        $Nationality = $this->input->post('Nationality');
        $Race = $this->input->post('Race');
        $Religion = $this->input->post('Religion');
        $BloodG = $this->input->post('BloodG');
        $MStatus = $this->input->post('MStatus');
        //ส่วนที่ 4
        $FaName = $this->input->post('FaName');
        $MaName = $this->input->post('MaName');
        $PlaceDate = $this->input->post('PlaceDate');
        $StartDate = $this->input->post('StartDate');
        $LProfessionFirstDate = $this->input->post('LProfessionFirstDate');
        $NowDate = $this->input->post('NowDate');
        $MemberKBK = $this->input->post('MemberKBK');
        //ส่วนที่ 5
        $School = $this->input->post('School');
        $Member = $this->input->post('Member');
        $PZone = $this->input->post('PZone');
        $Ministry = $this->input->post('Ministry');
        $Area = $this->input->post('Area');
        $MemId = $this->input->post('MemId');
        $PoDate = $this->input->post('PoDate');
        $PlaceBA = $this->input->post('PlaceBA');
        $TopBA = $this->input->post('TopBA');
        $PoBA = $this->input->post('PoBA');
        $MSalary = $this->input->post('MSalary');
        $EMoney = $this->input->post('EMoney');
        $PoSalary = $this->input->post('PoSalary');
        $Salsum = $this->input->post('Salsum');
        //ส่วนที่ 6
        $RecieveDate = $this->input->post('RecieveDate');
        $ResultDate = $this->input->post('ResultDate');
        $OrderNo = $this->input->post('OrderNo');
        $Enhance = $this->input->post('Enhance');

        if(empty($_FILES['Pic']['name'])){
            $MenuStaData = array(
                'IDCard' => $IDCard,
                'Passport' => $Passport,
                'PoNo' => $PoNo,
                'PName' => $PName,
                'FTName' => $FTName,
                'LTName' => $LTName,
                'PEName' => $PEName,
                'FEName' => $FEName,
                'LEName' => $LEName,
                'PoLine' => $PoLine,
                'PLevel' => $PLevel,
                'PoType' => $PoType,
                'Subject_group' => $Subject_group,
                'PoAssign' => $PoAssign,
                'FaName' => $FaName,
                'MaName' => $MaName,
                'School' => $School,
                'Member' => $Member,
                'PZone' => $PZone,
                'Ministry' => $Ministry,
                'Area' => $Area,
                'MemId' => $MemId,
                'PlaceBA' => $PlaceBA,
                'TopBA' => $TopBA,
                'PoBA' => $PoBA,
                'MSalary' => $MSalary,
                'PoSalary' => $PoSalary,
                'Salsum' => $Salsum,
                'UpdatedAt' => date('Y-m-d H:i:s')
            );
            $MoneyData = array(
                'IDCard' => $IDCard,
                'NStatus' => $NStatus,
                'Sex' => $Sex,
                'BirthDate' => $BirthDate,
                'MretireDate' => $MretireDate,
                'Nationality' => $Nationality,
                'Race' => $Race,
                'Religion' => $Religion,
                'BloodG' => $BloodG,
                'MStatus' => $MStatus,
                'PlaceDate' => $PlaceDate,
                'StartDate' => $StartDate,
                'LProfessionFirstDate' => $LProfessionFirstDate,
                'NowDate' => $NowDate,
                'MemberKBK' => $MemberKBK,
                'PoDate' => $PoDate
            );
            $EnhanceData = array(
                'IDCard' => $IDCard,
                'EMoney' => (float)$EMoney,
                'RecieveDate' => $RecieveDate,
                'ResultDate' => $ResultDate,
                'OrderNo' => $OrderNo,
                'Enhance' => $Enhance
            );
            $PicAll = array(
                'IDCard' => $IDCard
            );
            
            $results = $this->PersonnelInformation_model->update_PersonnelData($IDCard, $MenuStaData, $MoneyData, $EnhanceData, $PicAll);
            
        }else{
            $MenuStaData = array(
                'IDCard' => $IDCard,
                'Passport' => $Passport,
                'PoNo' => $PoNo,
                'PName' => $PName,
                'FTName' => $FTName,
                'LTName' => $LTName,
                'PEName' => $PEName,
                'FEName' => $FEName,
                'LEName' => $LEName,
                'PoLine' => $PoLine,
                'PLevel' => $PLevel,
                'PoType' => $PoType,
                'Subject_group' => $Subject_group,
                'PoAssign' => $PoAssign,
                'FaName' => $FaName,
                'MaName' => $MaName,
                'School' => $School,
                'Member' => $Member,
                'PZone' => $PZone,
                'Ministry' => $Ministry,
                'Area' => $Area,
                'MemId' => $MemId,
                'PlaceBA' => $PlaceBA,
                'TopBA' => $TopBA,
                'PoBA' => $PoBA,
                'MSalary' => $MSalary,
                'PoSalary' => $PoSalary,
                'Salsum' => $Salsum,
                'UpdatedAt' => date('Y-m-d H:i:s')
            );
            $MoneyData = array(
                'IDCard' => $IDCard,
                'NStatus' => $NStatus,
                'Sex' => $Sex,
                'BirthDate' => $BirthDate,
                'MretireDate' => $MretireDate,
                'Nationality' => $Nationality,
                'Race' => $Race,
                'Religion' => $Religion,
                'BloodG' => $BloodG,
                'MStatus' => $MStatus,
                'PlaceDate' => $PlaceDate,
                'StartDate' => $StartDate,
                'LProfessionFirstDate' => $LProfessionFirstDate,
                'NowDate' => $NowDate,
                'MemberKBK' => $MemberKBK,
                'PoDate' => $PoDate
            );
            $EnhanceData = array(
                'IDCard' => $IDCard,
                'EMoney' => $EMoney,
                'RecieveDate' => $RecieveDate,
                'ResultDate' => $ResultDate,
                'OrderNo' => $OrderNo,
                'Enhance' => $Enhance
            );
            $PicAll = array(
                'IDCard' => $IDCard
            );

            $results = $this->PersonnelInformation_model->update_PersonnelData($IDCard, $MenuStaData, $MoneyData, $EnhanceData, $PicAll);
            
            $Pic = file_get_contents($_FILES['Pic']['tmp_name']);
            $results = $this->PersonnelInformation_model->insert_PDO_Data($IDCard, $Pic);
        }

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

// *****************************************  Address Controller  *****************************************  
    public function update_PersonnelAddress(){

        $IDCard = $this->input->post('IDCard');
        $RNo = $this->input->post('RNo');
        $RMoo = $this->input->post('RMoo');
        $Rvillage = $this->input->post('Rvillage');
        $Rsoi = $this->input->post('Rsoi');
        $RBuid = $this->input->post('RBuid');
        $RRoad = $this->input->post('RRoad');
        $RDistrict = $this->input->post('RDistrict');
        $RSubDistric = $this->input->post('RSubDistric');
        $RProvince = $this->input->post('RProvince');
        $RZipcode = $this->input->post('RZipcode');
        $RTel = $this->input->post('RTel');
        $CNo = $this->input->post('CNo');
        $CMoo = $this->input->post('CMoo');
        $Cvillage = $this->input->post('Cvillage');
        $Csoi = $this->input->post('Csoi');
        $CBuid = $this->input->post('CBuid');
        $CRoad = $this->input->post('CRoad');
        $CDistrict = $this->input->post('CDistrict');
        $CSubDistric = $this->input->post('CSubDistric');
        $CProvince = $this->input->post('CProvince');
        $CZipcode = $this->input->post('CZipcode');
        $CTel = $this->input->post('CTel');

        $RgCreatedAt = date('Y-m-d H:i:s');
        $RgUpdatedAt = date('Y-m-d H:i:s');
        $CaCreatedAt = date('Y-m-d H:i:s');
        $CaUpdatedAt = date('Y-m-d H:i:s');
        
        $results = $this->PersonnelInformation_model->update_PersonnelAddress($IDCard, $RNo, $RMoo, $Rvillage, $Rsoi, $RBuid, $RRoad, $RDistrict, $RSubDistric, 
            $RProvince, $RZipcode, $RTel, $RgCreatedAt, $RgUpdatedAt, $CNo, $CMoo, $Cvillage, $Csoi, $CBuid, $CRoad, $CDistrict, $CSubDistric, $CProvince, $CZipcode, $CTel, 
            $CaCreatedAt, $CaUpdatedAt);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

// *****************************************  Family Controller  *****************************************     
    // เพิ่มข้อมูลครอบครัว 
    public function insert_PersonnelFamily(){

        $IDCard = $this->input->post('IDCard');
        $FamIDCard = $this->input->post('FamIDCard');
        $PName = $this->input->post('PName');
        $FName = $this->input->post('FName');
        $LName = $this->input->post('LName');
        $BirthDate = $this->input->post('BirthDate');
        $ReStatus = $this->input->post('ReStatus');
        $Status = $this->input->post('Status');
        $LifeStatus = $this->input->post('LifeStatus');
        $Job = $this->input->post('Job');
        $RTel = $this->input->post('RTel');
        $Modulate = $this->input->post('Modulate');
        $Edu = $this->input->post('Edu');
        $LevelEdu = $this->input->post('LevelEdu');
        $StuFee = $this->input->post('StuFee');
        $HealthCare = $this->input->post('HealthCare');
        $TypeModulate = $this->input->post('TypeModulate');

        $existingFamIDCard = $this->PersonnelInformation_model->getExistingFamIDCard($FamIDCard);
        if ($existingFamIDCard) {
            $msg = 'exists';
            echo $msg;
            return;
        }

        $RelaFamily = array(
            'IDCard' => $IDCard,
            'FamIDCard' => $FamIDCard,
            'PName' => $PName,
            'FName' => $FName,
            'LName' => $LName,
            'BirthDate' => $BirthDate,
            'ReStatus' => $ReStatus,
            'Status' => $Status,
            'LifeStatus' => $LifeStatus,
            'Job' => $Job,
            'RTel' => $RTel,
            'Modulate' => $Modulate,
            'Edu' => $Edu,
            'LevelEdu' => $LevelEdu,
            'StuFee' => $StuFee,
            'HealthCare' => $HealthCare,
            'TypeModulate' => $TypeModulate,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
    
        $results = $this->PersonnelInformation_model->insert_PersonnelFamily($FamIDCard, $RelaFamily);
        
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelFamily(){

        $FamIDCard = $this->input->post('FamIDCard');
        $PName = $this->input->post('PName');
        $FName = $this->input->post('FName');
        $LName = $this->input->post('LName');
        $BirthDate = $this->input->post('BirthDate');
        $ReStatus = $this->input->post('ReStatus');
        $Status = $this->input->post('Status');
        $LifeStatus = $this->input->post('LifeStatus');
        $Job = $this->input->post('Job');
        $RTel = $this->input->post('RTel');
        $Modulate = $this->input->post('Modulate');
        $Edu = $this->input->post('Edu');
        $LevelEdu = $this->input->post('LevelEdu');
        $StuFee = $this->input->post('StuFee');
        $HealthCare = $this->input->post('HealthCare');
        $TypeModulate = $this->input->post('TypeModulate');

        $row = $this->PersonnelInformation_model->get_FamIDCard($FamIDCard)->row();

        $data = array(
            'PName' => $PName,
            'FName' => $FName,
            'LName' => $LName,
            'BirthDate' => $BirthDate,
            'ReStatus' => $ReStatus,
            'Status' => $Status,
            'LifeStatus' => $LifeStatus,
            'Job' => $Job,
            'RTel' => $RTel,
            'Modulate' => $Modulate,
            'Edu' => $Edu,
            'LevelEdu' => $LevelEdu,
            'StuFee' => $StuFee,
            'HealthCare' => $HealthCare,
            'TypeModulate' => $TypeModulate,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $results = $this->PersonnelInformation_model->update_PersonnelFamily($FamIDCard, $data);

            if ($results) {
                $msg = 'Success';
            } else {
                $msg = 'error';
            }
        echo $msg;
    }

    public function get_PersonnelFamily()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelFamily($IDCard)->result();

        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($data);
    }

    public function delete_PersonnelFamily()
    {
        $results = $this->PersonnelInformation_model->delete_PersonnelFamily($this->input->post('FamIDCard'));
        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }
    
// *****************************************  Contact Controller  ***************************************** 

    function insert_PersonnelContact(){
        $IDCard = $this->input->post('IDCard');
        $FamIDCard = $this->input->post('FamIDCard');
        $PName = $this->input->post('PName');
        $FName = $this->input->post('FName');
        $LName = $this->input->post('LName');
        $BirthDate = $this->input->post('BirthDate');
        $ReStatus = $this->input->post('ReStatus');
        $Job = $this->input->post('Job');
        $RTel = $this->input->post('RTel');

        $existingFamIDCard = $this->PersonnelInformation_model->getExistingFamIDCard($FamIDCard);
        if ($existingFamIDCard) {
            $msg = 'exists';
            echo $msg;
            return;
        }

        $RelaFamily = array(
            'IDCard' => $IDCard,
            'FamIDCard' => $FamIDCard,
            'PName' => $PName,
            'FName' => $FName,
            'LName' => $LName,
            'BirthDate' => $BirthDate,
            'ReStatus' => $ReStatus,
            'Job' => $Job,
            'RTel' => $RTel,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
    
        $results = $this->PersonnelInformation_model->insert_PersonnelContact($FamIDCard, $RelaFamily);
        
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelContact(){

        $FamIDCard = $this->input->post('FamIDCard');
        $PName = $this->input->post('PName');
        $FName = $this->input->post('FName');
        $LName = $this->input->post('LName');
        $BirthDate = $this->input->post('BirthDate');
        $ReStatus = $this->input->post('ReStatus');
        $Job = $this->input->post('Job');
        $RTel = $this->input->post('RTel');

        $row = $this->PersonnelInformation_model->get_FamIDCard($FamIDCard)->row();

        $data = array(
            'PName' => $PName,
            'FName' => $FName,
            'LName' => $LName,
            'BirthDate' => $BirthDate,
            'ReStatus' => $ReStatus,
            'Job' => $Job,
            'RTel' => $RTel,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $results = $this->PersonnelInformation_model->update_PersonnelFamily($FamIDCard, $data);

            if ($results) {
                $msg = 'Success';
            } else {
                $msg = 'error';
            }
        echo $msg;
    }
// *****************************************  Study Controller  *******************************************
    function insert_PersonnelStudy(){
        $IDCard = $this->input->post('IDCard');
        $EStartYear = $this->input->post('EStartYear');
        $EFinishYear = $this->input->post('EFinishYear');
        $EFinishDate = $this->input->post('EFinishDate');
        $BA = $this->input->post('BA');
        $Degree = $this->input->post('Degree');
        $Major = $this->input->post('Major');
        $Minor = $this->input->post('Minor');
        $Institute = $this->input->post('Institute');
        $Scholarship = $this->input->post('Scholarship');
        $TypeSch = $this->input->post('TypeSch');
        $CountrySch = $this->input->post('CountrySch');
        $AgenSch = $this->input->post('AgenSch');
        $P_at = $this->input->post('P_at');

        $EduData = array(
            'IDCard' => $IDCard,
            'EStartYear' => $EStartYear,
            'EFinishYear' => $EFinishYear,
            'EFinishDate' => $EFinishDate,
            'BA' => $BA,
            'Degree' => $Degree,
            'Major' => $Major,
            'Minor' => $Minor,
            'Institute' => $Institute,
            'Scholarship' => $Scholarship,
            'TypeSch' => $TypeSch,
            'CountrySch' => $CountrySch,
            'AgenSch' => $AgenSch,
            'P_at' => $P_at,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $results = $this->PersonnelInformation_model->insert_PersonnelStudy($EduData);
        
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function get_PersonnelStudy()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelStudy($IDCard)->result();

        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }
        
        echo json_encode($data);
    }

    public function update_PersonnelStudy(){

        $IDCard = $this->input->post('IDCard');
        $EStartYear = $this->input->post('EStartYear');
        $EFinishYear = $this->input->post('EFinishYear');
        $EFinishDate = $this->input->post('EFinishDate');
        $BA = $this->input->post('BA');
        $Degree = $this->input->post('Degree');
        $Major = $this->input->post('Major');
        $Minor = $this->input->post('Minor');
        $Institute = $this->input->post('Institute');
        $Scholarship = $this->input->post('Scholarship');
        $TypeSch = $this->input->post('TypeSch');
        $CountrySch = $this->input->post('CountrySch');
        $AgenSch = $this->input->post('AgenSch');
        $P_at = $this->input->post('P_at');

        $data = array(
            'EStartYear' => $EStartYear,
            'EFinishYear' => $EFinishYear,
            'EFinishDate' => $EFinishDate,
            'BA' => $BA,
            'Degree' => $Degree,
            'Major' => $Major,
            'Minor' => $Minor,
            'Institute' => $Institute,
            'Scholarship' => $Scholarship,
            'TypeSch' => $TypeSch,
            'CountrySch' => $CountrySch,
            'AgenSch' => $AgenSch,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $results = $this->PersonnelInformation_model->update_PersonnelStudy($IDCard, $P_at, $data);

            if ($results) {
                $msg = 'Success';
            } else {
                $msg = 'error';
            }
        echo $msg;
    }

    public function delete_PersonnelStudy()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelStudy($IDCard, $P_at);
        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    function insert_PersonnelFame(){

        $IDCard = $this->input->post('IDCard');
        $FType = $this->input->post('FType');
        $Agencies = $this->input->post('Agencies');
        $RecieveYear = $this->input->post('RecieveYear');
        $P_at = $this->input->post('P_at');
        $CreatedAt = date('Y-m-d H:i:s');
        $UpdatedAt = date('Y-m-d H:i:s');

        if(!isset($_FILES['FileNm']) || $_FILES['FileNm']['error'] == UPLOAD_ERR_NO_FILE){

            $FameData = array(
                'IDCard' => $IDCard,
                'FType' => $FType,
                'Agencies' => $Agencies,
                'RecieveYear' => $RecieveYear,
                'P_at' => $P_at,
                'CreatedAt' => date('Y-m-d H:i:s'),
                'UpdatedAt' => date('Y-m-d H:i:s')
            );
            
            $results = $this->PersonnelInformation_model->insert_PersonnelFame($FameData);

        }else{

            $FileNm = $_FILES['FileNm']['name'];
            $Attachment = file_get_contents($_FILES['FileNm']['tmp_name']);

            $results = $this->PersonnelInformation_model->insert_PDO_PersonnelFame($IDCard, $FType, $Agencies, $RecieveYear, $P_at, $FileNm, $Attachment, $CreatedAt, $UpdatedAt);
        }
        
        if ($results) { 
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function get_PersonnelFame()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelFame($IDCard)->result();

        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($data);
    }

    public function delete_PersonnelFame()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelFame($IDCard, $P_at);
        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function update_PersonnelFame(){

        $IDCard = $this->input->post('IDCard');
        $FType = $this->input->post('FType');
        $Agencies = $this->input->post('Agencies');
        $RecieveYear = $this->input->post('RecieveYear');
        $P_at = $this->input->post('P_at');
        $UpdatedAt = date('Y-m-d H:i:s');

        if(!isset($_FILES['FileNm']) || $_FILES['FileNm']['error'] == UPLOAD_ERR_NO_FILE){

            $FameData = array(
                'IDCard' => $IDCard,
                'FType' => $FType,
                'Agencies' => $Agencies,
                'RecieveYear' => $RecieveYear,
                'P_at' => $P_at,
                'UpdatedAt' => date('Y-m-d H:i:s')
            );

            $results = $this->PersonnelInformation_model->update_PersonnelFame($IDCard, $P_at, $FameData);
        }else{

            $FileNm = $_FILES['FileNm']['name'];
            $Attachment = file_get_contents($_FILES['FileNm']['tmp_name']);
            
            $results = $this->PersonnelInformation_model->update_PDO_PersonnelFame($IDCard, $P_at, $FType, $Agencies, $RecieveYear, $FileNm, $Attachment, $UpdatedAt);
        } 
       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }
    
    public function export($IDCard, $P_at){
        $result = $this->PersonnelInformation_model->export_File_Fame($IDCard, $P_at);
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

// *****************************************  Training Controller  *******************************************
    public function get_PersonnelTraining()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelTraining($IDCard)->result();
        
        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($data);
    }

    function insert_PersonnelTraining(){

        $IDCard = $this->input->post('IDCard');
        $TNameCourse = $this->input->post('TNameCourse');
        $TDepart = $this->input->post('TDepart');
        $TGCourse = $this->input->post('TGCourse');
        $TPlace = $this->input->post('TPlace');
        $TProvince = $this->input->post('TProvince');
        $TStartDate = $this->input->post('TStartDate');
        $TFinishDate = $this->input->post('TFinishDate');
        $TCountry = $this->input->post('TCountry');
        $TCDay = $this->input->post('TCDay');
        $TCHou = $this->input->post('TCHou');
        $TPay = $this->input->post('TPay');
        $P_at = $this->input->post('P_at');

        $TrainData = array(
            'IDCard' => $IDCard,
            'TNameCourse' => $TNameCourse,
            'TDepart' => $TDepart,
            'TGCourse' => $TGCourse,
            'TPlace' => $TPlace,
            'TProvince' => $TProvince,
            'TStartDate' => $TStartDate,
            'TFinishDate' => $TFinishDate,
            'TCountry' => $TCountry,
            'TCDay' => $TCDay,
            'TCHou' => $TCHou,
            'TPay' => $TPay,
            'P_at' => $P_at,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
            
        $results = $this->PersonnelInformation_model->insert_PersonnelTraining($TrainData);
        
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelTraining(){

        $IDCard = $this->input->post('IDCard');
        $TNameCourse = $this->input->post('TNameCourse');
        $TDepart = $this->input->post('TDepart');
        $TGCourse = $this->input->post('TGCourse');
        $TPlace = $this->input->post('TPlace');
        $TProvince = $this->input->post('TProvince');
        $TStartDate = $this->input->post('TStartDate');
        $TFinishDate = $this->input->post('TFinishDate');
        $TCountry = $this->input->post('TCountry');
        $TCDay = $this->input->post('TCDay');
        $TCHou = $this->input->post('TCHou');
        $TPay = $this->input->post('TPay');
        $P_at = $this->input->post('P_at');

        $TrainData = array(
            'IDCard' => $IDCard,
            'TNameCourse' => $TNameCourse,
            'TDepart' => $TDepart,
            'TGCourse' => $TGCourse,
            'TPlace' => $TPlace,
            'TProvince' => $TProvince,
            'TStartDate' => $TStartDate,
            'TFinishDate' => $TFinishDate,
            'TCountry' => $TCountry,
            'TCDay' => $TCDay,
            'TCHou' => $TCHou,
            'TPay' => $TPay,
            'P_at' => $P_at,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->update_PersonnelTraining($IDCard, $P_at, $TrainData);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelTrain()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelTrain($IDCard, $P_at);
        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

// *****************************************  Position Controller  *******************************************
    public function get_PersonnelPosition()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelPosition($IDCard)->result();
        
        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($data);
    }

    function insert_PersonnelPosition(){

        $IDCard = $this->input->post('IDCard');
        $PLevel = $this->input->post('PLevel');
        $PPo = $this->input->post('PPo');
        $PChangeDate = $this->input->post('PChangeDate');
        $PAgencies = $this->input->post('PAgencies');
        $PProvince = $this->input->post('PProvince');

        $PositionData = array(
            'IDCard' => $IDCard,
            'PLevel' => $PLevel,
            'PPo' => $PPo,
            'PChangeDate' => $PChangeDate,
            'PAgencies' => $PAgencies,
            'PProvince' => $PProvince,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );

        $results = $this->PersonnelInformation_model->insert_PersonnelPosition($PositionData);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelPosition(){

        $IDCard = $this->input->post('IDCard');
        $PLevel = $this->input->post('PLevel');
        $PPo = $this->input->post('PPo');
        $PChangeDate = $this->input->post('PChangeDate');
        $PAgencies = $this->input->post('PAgencies');
        $PProvince = $this->input->post('PProvince');
        $P_at = $this->input->post('P_at');

        $PositionData = array(
            'IDCard' => $IDCard,
            'PLevel' => $PLevel,
            'PPo' => $PPo,
            'PChangeDate' => $PChangeDate,
            'PAgencies' => $PAgencies,
            'PProvince' => $PProvince,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->update_PersonnelPosition($IDCard, $P_at, $PositionData);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelPosition()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelPosition($IDCard, $P_at);
        if ($results == true) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

// *****************************************  Teaching Controller  *******************************************
    public function get_PersonnelTeaching()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelTeaching($IDCard)->result();

        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($data);
    }

    function insert_PersonnelTeaching(){

        $IDCard = $this->input->post('IDCard');
        $EYea = $this->input->post('EYea');
        $ETerm = $this->input->post('ETerm');
        $LevClss = $this->input->post('LevClss');
        $Room = $this->input->post('Room');
        $GLearn_more = $this->input->post('GLearn_more');
        $GLearn = $this->input->post('GLearn');
        $SubjCode = $this->input->post('SubjCode');
        $Titles = $this->input->post('Titles');
        $HourPerWeek = $this->input->post('HourPerWeek');
        $TeaMajor = $this->input->post('TeaMajor');
        $TeaBold = $this->input->post('TeaBold');
        $DevelopSub = $this->input->post('DevelopSub');
        $Id = $this->input->post('Id');

        $levClssArray = explode('.', $LevClss);
        $Lev = $levClssArray[0];
        $Clss = $levClssArray[1];

        $TeachData = array(
            'IDCard' => $IDCard,
            'EYea' => $EYea,
            'ETerm' => $ETerm,
            'Lev' => $Lev,
            'Clss' => $Clss,
            'Room' => $Room,
            'GLearn_more' => $GLearn_more,
            'GLearn' => $GLearn,
            'SubjCode' => $SubjCode,
            'Titles' => $Titles,
            'HourPerWeek' => $HourPerWeek,
            'TeaMajor' => $TeaMajor,
            'TeaBold' => $TeaBold,
            'DevelopSub' => $DevelopSub,
            'Id' => $Id,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->insert_PersonnelTeaching($TeachData);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelTeaching(){

        $IDCard = $this->input->post('IDCard');
        $EYea = $this->input->post('EYea');
        $ETerm = $this->input->post('ETerm');
        $LevClss = $this->input->post('LevClss');
        $Room = $this->input->post('Room');
        $GLearn_more = $this->input->post('GLearn_more');
        $GLearn = $this->input->post('GLearn');
        $SubjCode = $this->input->post('SubjCode');
        $Titles = $this->input->post('Titles');
        $HourPerWeek = $this->input->post('HourPerWeek');
        $TeaMajor = $this->input->post('TeaMajor');
        $TeaBold = $this->input->post('TeaBold');
        $DevelopSub = $this->input->post('DevelopSub');
        $Id = $this->input->post('Id');

        $levClssArray = explode('.', $LevClss);
        $Lev = $levClssArray[0];
        $Clss = $levClssArray[1];

        $TeachingData = array(
            'EYea' => $EYea,
            'ETerm' => $ETerm,
            'Lev' => $Lev,
            'Clss' => $Clss,
            'Room' => $Room,
            'GLearn_more' => $GLearn_more,
            'GLearn' => $GLearn,
            'SubjCode' => $SubjCode,
            'Titles' => $Titles,
            'HourPerWeek' => $HourPerWeek,
            'TeaMajor' => $TeaMajor,
            'TeaBold' => $TeaBold,
            'DevelopSub' => $DevelopSub,
            'UpdatedAt' => date('Y-m-d H:i:s')
            
        );
        
        $results = $this->PersonnelInformation_model->update_PersonnelTeaching($IDCard, $Id, $TeachingData);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelTeaching()
    {
        $IDCard = $this->input->post('IDCard');
        $EYea = $this->input->post('EYea');
        $ETerm = $this->input->post('ETerm');
        $Lev = $this->input->post('Lev');
        $Clss = $this->input->post('Clss');
        $Room = $this->input->post('Room');

        $results = $this->PersonnelInformation_model->delete_PersonnelTeaching($IDCard, $EYea, $ETerm, $Lev, $Clss, $Room);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    } 

    public function fetch_SubjectCode()
    {   
        
        echo $this->PersonnelInformation_model->fetch_SubjectCode($this->input->post('GLearn'));
    }

    public function fetch_SubjectCodeHidden()
    {   
        $Titles = $this->input->post('Titles');
        $TitlesCode = mb_substr($Titles, 0, 6);
        echo $this->PersonnelInformation_model->fetch_SubjectCodeHidden($TitlesCode);
    }

    public function fetch_SubjectCode_Edit()
    {   
        echo $this->PersonnelInformation_model->fetch_SubjectCode_Edit($this->input->post('GLearn_Edit'));
    }

    public function fetch_SubjectCodeHidden_Edit()
    {   
        $Titles = $this->input->post('Titles_Edit');
        $TitlesCode = mb_substr($Titles, 0, 6);
        echo $this->PersonnelInformation_model->fetch_SubjectCodeHidden_Edit($TitlesCode);
    }

// *****************************************  License Controller  *******************************************
    public function get_PersonnelLicense()
        {
            $IDCard = $this->session->userdata('NationalID');
            $data = $this->PersonnelInformation_model->get_PersonnelLicense($IDCard)->result();
            
            foreach ($data as $row) {
                $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
            }

            echo json_encode($data);
        }

    function insert_PersonnelLicense(){

        $IDCard = $this->input->post('IDCard');
        $LPName = $this->input->post('LPName');
        $LPNo = $this->input->post('LPNo');
        $LPLeave = $this->input->post('LPLeave');
        $LPLeaveDate = $this->input->post('LPLeaveDate');
        $LPExpireDate = $this->input->post('LPExpireDate');
        $LPToPermit = $this->input->post('LPToPermit');
        $LPRevocation = $this->input->post('LPRevocation');
        $LPWorkPermit = $this->input->post('LPWorkPermit');

        $LProfession = array(
            'IDCard' => $IDCard,
            'LPName' => $LPName,
            'LPNo' => $LPNo,
            'LPLeave' => $LPLeave,
            'LPLeaveDate' => $LPLeaveDate,
            'LPExpireDate' => $LPExpireDate,
            'LPToPermit' => $LPToPermit,
            'LPRevocation' => $LPRevocation,
            'LPWorkPermit' => $LPWorkPermit,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->insert_PersonnelLicense($LProfession);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelLicense(){

        $IDCard = $this->input->post('IDCard');
        $LPWorkPermit = $this->input->post('LPWorkPermit');
        $LPNo = $this->input->post('LPNo');
        $LPName = $this->input->post('LPName');
        $LPLeave = $this->input->post('LPLeave');
        $LPLeaveDate = $this->input->post('LPLeaveDate');
        $LPExpireDate = $this->input->post('LPExpireDate');
        $LPToPermit = $this->input->post('LPToPermit');
        $LPRevocation = $this->input->post('LPRevocation');

        $LProfession = array(
            'LPNo' => $LPNo,
            'LPName' => $LPName,
            'LPLeave' => $LPLeave,
            'LPLeaveDate' => $LPLeaveDate,
            'LPExpireDate' => $LPExpireDate,
            'LPToPermit' => $LPToPermit,
            'LPRevocation' => $LPRevocation,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->update_PersonnelLicense($IDCard, $LPWorkPermit, $LProfession);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelLicense()
    {
        $IDCard = $this->input->post('IDCard');
        $LPWorkPermit = $this->input->post('LPWorkPermit');

        $results = $this->PersonnelInformation_model->delete_PersonnelLicense($IDCard, $LPWorkPermit);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

// *****************************************  Leave Controller  *******************************************
    public function get_PersonnelLeave()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelLeave($IDCard)->result();
        
        echo json_encode($data);
    }

    function insert_PersonnelLeave(){

        $IDCard = $this->input->post('IDCard');
        $EYa = $this->input->post('EYa');
        $VLate = $this->input->post('VLate');
        $Vsick = $this->input->post('Vsick');
        $Vkit = $this->input->post('Vkit');
        $VAbsence = $this->input->post('VAbsence');
        $VServ = $this->input->post('VServ');
        $VRelax = $this->input->post('VRelax');
        $VSpawn = $this->input->post('VSpawn');
        $VOrdinate = $this->input->post('VOrdinate');
        $VStudy = $this->input->post('VStudy');
        $P_at = $this->input->post('P_at');

        $HVacaYear = array(
            'IDCard' => $IDCard,
            'EYa' => $EYa,
            'VLate' => $VLate,
            'Vsick' => $Vsick,
            'Vkit' => $Vkit,
            'VAbsence' => $VAbsence,
            'VServ' => $VServ,
            'VRelax' => $VRelax,
            'VSpawn' => $VSpawn,
            'VOrdinate' => $VOrdinate,
            'VStudy' => $VStudy,
            'P_at' => $P_at
        );
        
        $results = $this->PersonnelInformation_model->insert_PersonnelLeave($HVacaYear);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelLeave()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelLeave($IDCard, $P_at);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }
    
    public function get_PersonnelRename()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelRename($IDCard)->result();
        
        echo json_encode($data);
    }

    function insert_PersonnelRename(){

        $IDCard = $this->input->post('IDCard');
        $CPName = $this->input->post('CPName');
        $CFName = $this->input->post('CFName');
        $CLName = $this->input->post('CLName');
        $CDate = $this->input->post('CDate');
        $P_at = $this->input->post('P_at');

        $HChangeFL = array(
            'IDCard' => $IDCard,
            'CPName' => $CPName,
            'CFName' => $CFName,
            'CLName' => $CLName,
            'CDate' => $CDate,
            'P_at' => $P_at
        );
        
        $results = $this->PersonnelInformation_model->insert_PersonnelRename($HChangeFL);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelRename()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelRename($IDCard, $P_at);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

// *****************************************  Insignia Controller  *******************************************

    public function get_PersonnelInsignia()
    {
        $IDCard = $this->session->userdata('NationalID');
        $data = $this->PersonnelInformation_model->get_PersonnelInsignia($IDCard)->result();

        foreach ($data as $row) {
            $row->UpdatedAt = date('d-m-Y H:i:s', strtotime($row->UpdatedAt) - 7 * 3600);
        }

        echo json_encode($data);
    }

    function insert_PersonnelInsignia(){

        $IDCard = $this->input->post('IDCard');
        $RRDare = $this->input->post('RRDare');
        $RLevel = $this->input->post('RLevel');
        $RPo = $this->input->post('RPo');
        $RGVol = $this->input->post('RGVol');
        $RGPart = $this->input->post('RGPart');
        $RGPage = $this->input->post('RGPage');
        $RGNo = $this->input->post('RGNo');
        $RDate = $this->input->post('RDate');
        $RDate2 = $this->input->post('RDate2');
        $RDepart = $this->input->post('RDepart');
        $P_at = $this->input->post('P_at');

        $HRRoyal = array(
            'IDCard' => $IDCard,
            'RRDare' => $RRDare,
            'RLevel' => $RLevel,
            'RPo' => $RPo,
            'RGVol' => $RGVol,
            'RGPart' => $RGPart,
            'RGPage' => $RGPage,
            'RGNo' => $RGNo,
            'RDate' => $RDate,
            'RDate2' => $RDate2,
            'RDepart' => $RDepart,
            'P_at' => $P_at,
            'CreatedAt' => date('Y-m-d H:i:s'),
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->insert_PersonnelInsignia($HRRoyal);

        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function update_PersonnelInsignia(){

        $IDCard = $this->input->post('IDCard');
        $RRDare = $this->input->post('RRDare');
        $RLevel = $this->input->post('RLevel');
        $RPo = $this->input->post('RPo');
        $RGVol = $this->input->post('RGVol');
        $RGPart = $this->input->post('RGPart');
        $RGPage = $this->input->post('RGPage');
        $RGNo = $this->input->post('RGNo');
        $RDate = $this->input->post('RDate');
        $RDate2 = $this->input->post('RDate2');
        $RDepart = $this->input->post('RDepart');
        $P_at = $this->input->post('P_at');

        $HRRoyal = array(
            'RRDare' => $RRDare,
            'RLevel' => $RLevel,
            'RPo' => $RPo,
            'RGVol' => $RGVol,
            'RGPart' => $RGPart,
            'RGPage' => $RGPage,
            'RGNo' => $RGNo,
            'RDate' => $RDate,
            'RDate2' => $RDate2,
            'RDepart' => $RDepart,
            'UpdatedAt' => date('Y-m-d H:i:s')
        );
        
        $results = $this->PersonnelInformation_model->update_PersonnelInsignia($IDCard, $P_at, $HRRoyal);

       if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
    echo $msg;
    }

    public function delete_PersonnelInsignia()
    {
        $IDCard = $this->input->post('IDCard');
        $P_at = $this->input->post('P_at');

        $results = $this->PersonnelInformation_model->delete_PersonnelInsignia($IDCard, $P_at);
        if ($results) {
            $msg = 'Success';
        } else {
            $msg = 'error';
        }
        echo $msg;
    }

    public function Export_Personnel()
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
        $sheet->setTitle('ข้อมูลประวัติพื้นฐาน');

        $familySheet = $spreadsheet->createSheet();
        $familySheet->getPageMargins()
            ->setTop(0.5)
            ->setRight(0.5)
            ->setBottom(0.5)
            ->setLeft(0.5)
            ->setHeader(0.8)
            ->setFooter(0.8);
        $familySheet->setTitle('ข้อมูลครอบครัว');

        $studySheet = $spreadsheet->createSheet();
        $studySheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
        $studySheet->getPageMargins()
            ->setTop(0.5)
            ->setRight(0.5)
            ->setBottom(0.5)
            ->setLeft(0.5)
            ->setHeader(0.8)
            ->setFooter(0.8);
        $studySheet->setTitle('ข้อมูลการศึกษา การเลื่อนตำแหน่ง');

        $IDCard = $this->input->get('IDCard'); 
        $result = $this->PersonnelInformation_model->get_PersonnelExport($IDCard)->result();
        
        foreach ($result as $row) {
            $Pic = $row->Pic;
            $PName = $row->PName;
            $FTName = $row->FTName;
            $LTName = $row->LTName;
            $FullName = "$PName $FTName $LTName";
            $PEName = $row->PEName;
            $FEName = $row->FEName;
            $LEName = $row->LEName;
            $EFullName = "$PEName $FEName $LEName";
            $NStatus = $row->NStatus;
            $IDCard = $row->IDCard;
            $PoNo = $row->PoNo;
            $Sex = $row->Sex;
            $BloodG = $row->BloodG;
            $Level = $row->Level;
            $PosName = $row->PosName;
            $PoAssign = $row->PoAssign;
            $BirthDate = $row->BirthDate;

            $birthDate = new DateTime($BirthDate);
            $currentDate = new DateTime();
            $age = $currentDate->diff($birthDate);
            $ageYears = $age->y; 
            $ageMonths = $age->m; 
            $ageDays = $age->d;

            $RetireYear = (int) $birthDate->format('Y');
            $RetireMonth = 9;
            $RetireDay = 30;

            if ($ageMonths >= 10) {
                $RetireYear += 61;
            } else {
                $RetireYear += 60;
            }

            $Retire = "$RetireDay-$RetireMonth-$RetireYear";
            $PlaceDate = $row->PlaceDate;
            $PlaceDates = date('d-m-Y', strtotime($PlaceDate));

            $RemainingYear = 59 - $ageYears;
            $RemainingMonth = 11 - $ageMonths;
            $RemainingDay = $RetireDay - $ageDays + 2;

            $Nationality = $row->Nationality;
            $Race = $row->Race;
            $Religion = $row->Religion;
            $MStatus = $row->MStatus;
            $StartDate = $row->StartDate;
            $StartDates = date('d-m-Y', strtotime($StartDate));
            $NowDate = $row->NowDate;
            $NowDates = date('d-m-Y', strtotime($NowDate));
            $MemId = $row->MemId;
            $School = $row->School;
            $Member = $row->Member;
            $Area = $row->Area;
            $PoBA = $row->PoBA;
            $PlaceBA = $row->PlaceBA;
            $TopBA = $row->TopBA;
            $EMoney = $row->EMoney;
            $EMoneys = number_format($EMoney, 2, '.', ',');
            $PoSalary = $row->PoSalary;
            $PoSalarys = number_format($PoSalary, 2, '.', ',');
            $MSalary = $row->MSalary;
            $MSalarys = number_format($MSalary, 2, '.', ',');
            $Salsum = $row->Salsum;
            $Salsums = number_format($Salsum, 2, '.', ',');
            $RecieveDate = $row->RecieveDate;
            $RecieveDates = date('d-m-Y', strtotime($RecieveDate));
            $ResultDate = $row->ResultDate;
            $ResultDates = date('d-m-Y', strtotime($ResultDate));
            $OrderNo = $row->OrderNo;
            $Enhance = $row->Enhance;
            $MemberKBK = $row->MemberKBK;
            $CAccessKBK = $row->CAccessKBK;
            $CAccessKBKs = number_format($CAccessKBK, 2, '.', ',');
            $FaName = $row->FaName;
            $MaName = $row->MaName;
        }

        $resultFamily = $this->PersonnelInformation_model->get_RelaFamilyExport($IDCard)->result();
        if (empty($resultFamily)) {
            $FFullName = '';
        } else {
            $row = $resultFamily[0];
            $FFullName = $row->FFullName;
        }
        $resultAddress = $this->PersonnelInformation_model->get_RegisAddressExport($IDCard)->result();
        if (empty($resultAddress)) {
            $RNo = $RMoo = $Rvillage = $Rsoi = $RBuid = $RRoad = $RSubDistric = $RDistrict = $RProvince = $RZipcode = $RTel = '';
        } else {
            $row = $resultAddress[0];
            $RNo = $row->RNo;
            $RMoo = $row->RMoo;
            $Rvillage = $row->Rvillage;
            $Rsoi = $row->Rsoi;
            $RBuid = $row->RBuid;
            $RRoad = $row->RRoad;
            $RSubDistric = $row->RSubDistric;
            $RDistrict = $row->RDistrict;
            $RProvince = $row->RProvince;
            $RZipcode = $row->RZipcode;
            $RTel = $row->RTel;
        }

        $resultCAddress = $this->PersonnelInformation_model->get_ContactAddressExport($IDCard)->result();
        if (empty($resultAddress)) {
            $CNo = $CMoo = $Cvillage = $Csoi = $CBuid = $CRoad = $CSubDistric = $CDistrict = $CProvince = $CZipcode = $CTel = '';
        } else {
            $row = $resultCAddress[0];
            $CNo = $row->CNo;
            $CMoo = $row->CMoo;
            $Cvillage = $row->Cvillage;
            $Csoi = $row->Csoi;
            $CBuid = $row->CBuid;
            $CRoad = $row->CRoad;
            $CSubDistric = $row->CSubDistric;
            $CDistrict = $row->CDistrict;
            $CProvince = $row->CProvince;
            $CZipcode = $row->CZipcode;
            $CTel = $row->CTel;
        }

        $HeaderStyle = array(
            'font'  => array(
                'bold'  => true,
                'size'  => 14,
                'name'  => 'TH SarabunPSK',
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
        );

        $BodyStyle = array(
            'font'  => array(
                'bold'  => false,
                'size'  => 14,
                'name'  => 'TH SarabunPSK',
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
        );

        $columnRange = range('A', 'Z');
        foreach ($columnRange as $column) {
            $spreadsheet->getActiveSheet()->getColumnDimension($column)->setWidth(5);
        }
        $spreadsheet->getActiveSheet()->getRowDimension(3)->setRowHeight(40);

        $sheet->mergeCells('A2:R2');
        $sheet->setCellValue('A2', 'ข้อมูลประวัติพื้นฐาน');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
        if (!empty($Pic)) {
            $drawing->setImageResource(imagecreatefromstring($Pic));
        } else {
            $noImageFilePath = 'assets/images/no_img/170x170.jfif';
            $drawing->setName('NoImage');
            $drawing->setDescription('NoImage');
            $drawing->setImageResource(imagecreatefromjpeg($noImageFilePath));
        }
        $drawing->setCoordinates('P1');
        $drawing->setWidthAndHeight(120, 120);
        $drawing->setWorksheet($sheet);

        $sheet->mergeCells('A5:C5');
        $sheet->setCellValue('A5', 'ฃื่อ - นามสกุล');
        $sheet->getStyle('A5')->applyFromArray($HeaderStyle); 
        $sheet->mergeCells('D5:H5');
        $sheet->getStyle('D5')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D5', $FullName);

        $sheet->mergeCells('I5:M5');
        $sheet->setCellValue('I5', 'ฃื่อ - นามสกุล (ภาษาอังกฤษ)');
        $sheet->getStyle('I5')->applyFromArray($HeaderStyle); 
        $sheet->mergeCells('N5:R5');
        $sheet->getStyle('N5')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('N5', $EFullName);

        $sheet->mergeCells('A6:C6');
        $sheet->setCellValue('A6', 'สถานภาพการทำงาน');
        $sheet->getStyle('A6')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D6:H6');
        $sheet->getStyle('D6')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D6', $NStatus);

        $sheet->mergeCells('I6:K6');
        $sheet->setCellValue('I6', 'เลขบัตรประชาชน');
        $sheet->getStyle('I6')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('L6:N6');
        $sheet->getStyle('L6')->applyFromArray($BodyStyle);
        $sheet->setCellValue('L6', $IDCard);
        $sheet->getStyle('L6')->getNumberFormat()->setFormatCode('#');  

        $sheet->mergeCells('A7:C7');
        $sheet->setCellValue('A7', 'เลขที่ตำแหน่ง');
        $sheet->getStyle('A7')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D7:H7');
        $sheet->getStyle('D7')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D7', $PoNo);
        $sheet->getStyle('D7')->getNumberFormat()->setFormatCode('#');  

        $sheet->setCellValue('I7', 'เพศ');
        $sheet->getStyle('I7')->applyFromArray($HeaderStyle);
        $sheet->getStyle('J7')->applyFromArray($BodyStyle); 
        $SexType = ($Sex === 'M') ? 'ชาย' : 'หญิง';
        $sheet->setCellValue('J7', $SexType);

        $sheet->mergeCells('K7:L7');
        $sheet->setCellValue('K7', 'กรุ๊ปเลือด');
        $sheet->getStyle('K7')->applyFromArray($HeaderStyle);
        $sheet->getStyle('M7')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('M7', $BloodG);

        $sheet->mergeCells('A8:C8');
        $sheet->setCellValue('A8', 'ระดับปัจจุบัน');
        $sheet->getStyle('A8')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D8:H8');
        $sheet->getStyle('D8')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D8', $Level);
        
        $sheet->mergeCells('I8:K8');
        $sheet->setCellValue('I8', 'ตำแหน่งปัจจุบัน');
        $sheet->getStyle('I8')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('L8:P8');
        $sheet->getStyle('L8')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('L8', $PosName);

        $sheet->mergeCells('A9:C9');
        $sheet->setCellValue('A9', 'ตำแหน่งอื่นที่ได้รับ');
        $sheet->getStyle('A9')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D9:H9');
        $sheet->getStyle('D9')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D9', $PoAssign);

        $sheet->setCellValue('I9', 'อายุ');
        $sheet->getStyle('I9')->applyFromArray($HeaderStyle);
        $sheet->getStyle('J9')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('J9', $ageYears);
        $sheet->setCellValue('K9', 'ปี');
        $sheet->getStyle('K9')->applyFromArray($HeaderStyle);
        $sheet->getStyle('L9')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('L9', $ageMonths);
        $sheet->setCellValue('M9', 'เดือน');
        $sheet->getStyle('M9')->applyFromArray($HeaderStyle);
        $sheet->getStyle('N9')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('N9', $ageDays);
        $sheet->setCellValue('O9', 'วัน');
        $sheet->getStyle('O9')->applyFromArray($HeaderStyle);

        $sheet->mergeCells('A10:C10');
        $sheet->setCellValue('A10', 'วันครบเกษียณอายุ');
        $sheet->getStyle('A10')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D10:F10');
        $sheet->getStyle('D10')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D10', $Retire);

        $sheet->mergeCells('G10:I10');
        $sheet->setCellValue('G10', 'วันสั่งบรรจุ');
        $sheet->getStyle('G10')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('J10:L10');
        $sheet->getStyle('J10')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('J10', $PlaceDates);
        
        $sheet->mergeCells('A11:C11');
        $sheet->setCellValue('A11', 'อายุข้าราชการเหลือ');
        $sheet->getStyle('A11')->applyFromArray($HeaderStyle);
        $sheet->getStyle('D11')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D11', $RemainingYear);
        $sheet->setCellValue('E11', 'ปี');
        $sheet->getStyle('E11')->applyFromArray($HeaderStyle);
        $sheet->getStyle('F11')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('F11', $RemainingMonth);
        $sheet->setCellValue('G11', 'เดือน');
        $sheet->getStyle('G11')->applyFromArray($HeaderStyle);
        $sheet->getStyle('H11')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('H11', $RemainingDay);
        $sheet->setCellValue('I11', 'วัน');
        $sheet->getStyle('I11')->applyFromArray($HeaderStyle);

        $sheet->mergeCells('J11:K11');
        $sheet->setCellValue('J11', 'สัญชาติ');
        $sheet->getStyle('J11')->applyFromArray($HeaderStyle);
        $sheet->getStyle('L11')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('L11', $Nationality);

        $sheet->mergeCells('M11:N11');
        $sheet->setCellValue('M11', 'เชื้อชาติ');
        $sheet->getStyle('M11')->applyFromArray($HeaderStyle);
        $sheet->getStyle('O11')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('O11', $Race);

        $sheet->mergeCells('P11:Q11');
        $sheet->setCellValue('P11', 'ศาสนา');
        $sheet->getStyle('P11')->applyFromArray($HeaderStyle);
        $sheet->getStyle('R11')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('R11', $Religion);

        $sheet->mergeCells('A12:B12');
        $sheet->setCellValue('A12', 'สถานภาพ');
        $sheet->getStyle('A12')->applyFromArray($HeaderStyle);
        $sheet->getStyle('C12')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('C12', $MStatus);

        $sheet->mergeCells('D12:F12');
        $sheet->setCellValue('D12', 'วันเริ่มปฏิบัติราชการ');
        $sheet->getStyle('D12')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('G12:H12');
        $sheet->getStyle('G12')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('G12', $StartDates);

        $sheet->mergeCells('I12:O12');
        $sheet->setCellValue('I12', 'ว/ด/ป ปฏิบัติราชการในสถานศึกษาปัจจุบัน');
        $sheet->getStyle('I12')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('P12:Q12');
        $sheet->getStyle('P12')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('P12', $NowDates);

        $sheet->mergeCells('A13:B13');
        $sheet->setCellValue('A13', 'เลขที่คำสั่ง');
        $sheet->getStyle('A13')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('C13:D13');
        $sheet->getStyle('C13')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('C13', $MemId);

        $sheet->mergeCells('E13:G13');
        $sheet->setCellValue('E13', 'สถานที่ปฏิบัติงาน');
        $sheet->getStyle('E13')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('H13:L13');
        $sheet->getStyle('H13')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('H13', $School);

        $sheet->setCellValue('M13', 'สังกัด');
        $sheet->getStyle('M13')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('N13:R13');
        $sheet->getStyle('N13')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('N13', $Member);

        $sheet->mergeCells('A14:B14');
        $sheet->setCellValue('A14', 'สพท./เขต');
        $sheet->getStyle('A14')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('C14:G14');
        $sheet->getStyle('C14')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('C14', $Area);

        $sheet->mergeCells('A15:D15');
        $sheet->setCellValue('A15', 'วุฒิในตำแหน่งปัจจุบัน');
        $sheet->getStyle('A15')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('E15:F15');
        $sheet->getStyle('E15')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('E15', $PoBA);

        $sheet->mergeCells('G15:H15');
        $sheet->setCellValue('G15', 'วุฒิที่ใช้บรรจุ');
        $sheet->getStyle('G15')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('I15:J15');
        $sheet->getStyle('I15')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('I15', $PlaceBA);

        $sheet->mergeCells('K15:L15');
        $sheet->setCellValue('K15', 'วุฒิสูงสุด');
        $sheet->getStyle('K15')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('M15:N15');
        $sheet->getStyle('M15')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('M15', $TopBA);

        $sheet->mergeCells('A16:C16');
        $sheet->setCellValue('A16', 'เงินวิทยฐานะ');
        $sheet->getStyle('A16')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('D16:E16');
        $sheet->getStyle('D16')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('D16', $EMoneys);

        $sheet->mergeCells('F16:H16');
        $sheet->setCellValue('F16', 'เงินประจำตำแหน่ง');
        $sheet->getStyle('F16')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('I16:J16');
        $sheet->getStyle('I16')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('I16', $PoSalarys);

        $sheet->mergeCells('K16:L16');
        $sheet->setCellValue('K16', 'เงินเดือน');
        $sheet->getStyle('K16')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('M16:N16');
        $sheet->getStyle('M16')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('M16', $MSalarys);

        $sheet->mergeCells('O16:Q16');
        $sheet->setCellValue('O16', 'รายได้สุทธิรวม');
        $sheet->getStyle('O16')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('R16:S16');
        $sheet->getStyle('R16')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('R16', $Salsums);

        $sheet->mergeCells('A17:C17');
        $sheet->setCellValue('A17', 'ข้อมูลวิทยฐานะ :');
        $sheet->getStyle('A17')->applyFromArray($HeaderStyle);

        $sheet->mergeCells('D17:E17');
        $sheet->setCellValue('D17', 'วันที่ได้รับ');
        $sheet->getStyle('D17')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('F17:G17');
        $sheet->getStyle('F17')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('F17', $RecieveDates);

        $sheet->mergeCells('H17:I17');
        $sheet->setCellValue('H17', 'วันที่มีผล');
        $sheet->getStyle('H17')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('J17:K17');
        $sheet->getStyle('J17')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('J17', $ResultDates);
        
        $sheet->mergeCells('L17:N17');
        $sheet->setCellValue('L17', 'เลขที่คำสั่งวิทยฐานะ');
        $sheet->getStyle('L17')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('O17:P17');
        $sheet->getStyle('O17')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('O17', $OrderNo);

        $sheet->mergeCells('Q17:R17');
        $sheet->setCellValue('Q17', 'วิทยฐานะ');
        $sheet->getStyle('Q17')->applyFromArray($HeaderStyle);
        $sheet->getStyle('S17')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('S17', $Enhance);

        $sheet->mergeCells('A19:B19');
        $sheet->setCellValue('A19', 'สถานภาพ');
        $sheet->getStyle('A19')->applyFromArray($HeaderStyle);
        $sheet->getStyle('C19')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('C19', $MStatus);

        $sheet->mergeCells('A20:D20');
        $sheet->setCellValue('A20', 'ชื่อ-นามสกุล (คู่สมรส)');
        $sheet->getStyle('A20')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('E20:H20');
        $sheet->getStyle('E20')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('E20', $FFullName);

        $sheet->mergeCells('I20:K20');
        $sheet->setCellValue('I20', 'การเป็นสมาชิก กบข.');
        $sheet->getStyle('I20')->applyFromArray($HeaderStyle);
        $sheet->getStyle('L20')->applyFromArray($BodyStyle); 
        $MemberKBKs = ($MemberKBK === 'Y') ? 'เป็น' : 'ไม่เป็น';
        $sheet->setCellValue('L20', $MemberKBKs);

        $sheet->mergeCells('N20:P20');
        $sheet->setCellValue('N20', 'การสะสมเข้า กบข.');
        $sheet->getStyle('N20')->applyFromArray($HeaderStyle);
        $sheet->getStyle('Q20')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('Q20', $CAccessKBKs);

        $sheet->mergeCells('A21:B21');
        $sheet->setCellValue('A21', 'ชื่อบิดา');
        $sheet->getStyle('A21')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('C21:F21');
        $sheet->getStyle('C21')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('C21', $FaName);

        $sheet->mergeCells('G21:H21');
        $sheet->setCellValue('G21', 'ชื่อมารดา');
        $sheet->getStyle('G21')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('I21:L21');
        $sheet->getStyle('I21')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('I21', $MaName);

        $sheet->mergeCells('A23:D23');
        $sheet->setCellValue('A23', ' ที่อยู่ตามทะเบียนบ้าน');
        $sheet->getStyle('A23')->applyFromArray($HeaderStyle);

        $sheet->mergeCells('A24:B24');
        $sheet->setCellValue('A24', 'บ้านเลขที่')->getStyle('A24')->applyFromArray($HeaderStyle);
        $sheet->mergeCells('C24:D24');
        $sheet->getStyle('C24')->applyFromArray($BodyStyle); 
        $sheet->setCellValue('C24', $RNo);

        $sheet->setCellValue('E24', 'หมู่ที่')->getStyle('E24')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('F24', $RMoo)->getStyle('F24')->applyFromArray($BodyStyle);
        
        $sheet->mergeCells('G24:H24')->mergeCells('I24:J24');
        $sheet->setCellValue('G24', 'หมู่บ้าน')->getStyle('G24')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('I24', $Rvillage)->getStyle('I24')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('L24:M24');
        $sheet->setCellValue('K24', 'ซอย')->getStyle('K24')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('L24', $Rsoi)->getStyle('L24')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('N24:O24')->mergeCells('P24:Q24');
        $sheet->setCellValue('N24', 'อาคาร/ชั้น')->getStyle('N24')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('P24', $RBuid)->getStyle('P24')->applyFromArray($BodyStyle);
        
        $sheet->mergeCells('C25:D25');
        $sheet->setCellValue('A25', 'ถนน')->getStyle('A25')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('C25', $RRoad)->getStyle('C25')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('E25:F25')->mergeCells('G25:H25');
        $sheet->setCellValue('E25', 'แขวง/ตำบล')->getStyle('E25')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('G25', $RSubDistric)->getStyle('G25')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('J25:K25');
        $sheet->setCellValue('I25', 'อำเภอ')->getStyle('I25')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('J25', $RDistrict)->getStyle('J25')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('M25:N25');
        $sheet->setCellValue('L25', 'จังหวัด')->getStyle('L25')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('M25', $RProvince)->getStyle('M25')->applyFromArray($BodyStyle);
        
        $sheet->mergeCells('A26:B26')->mergeCells('C26:D26');
        $sheet->setCellValue('A26', 'รหัสไปรษณี')->getStyle('A26')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('C26', $RZipcode)->getStyle('C26')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('E26:G26')->mergeCells('H26:I26');
        $sheet->setCellValue('E26', 'หมายเลขโทรศัพท์')->getStyle('E26')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('H26', $RTel)->getStyle('H26')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('A28:D28');
        $sheet->setCellValue('A28', 'ข้อมูลที่อยู่ที่สามารถติดต่อได้');
        $sheet->getStyle('A28')->applyFromArray($HeaderStyle);

        $sheet->mergeCells('A29:B29')->mergeCells('C29:D29');
        $sheet->setCellValue('A29', 'บ้านเลขที่')->getStyle('A29')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('C29', $CNo)->getStyle('C29')->applyFromArray($BodyStyle);

        $sheet->setCellValue('E29', 'หมู่ที่')->getStyle('E29')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('F29', $CMoo)->getStyle('F29')->applyFromArray($BodyStyle);
        
        $sheet->mergeCells('G29:H29')->mergeCells('I29:J29');
        $sheet->setCellValue('G29', 'หมู่บ้าน')->getStyle('G29')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('I29', $Cvillage)->getStyle('I29')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('L29:M29');
        $sheet->setCellValue('K29', 'ซอย')->getStyle('K29')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('L29', $Csoi)->getStyle('L29')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('N29:O29')->mergeCells('P29:Q29');
        $sheet->setCellValue('N29', 'อาคาร/ชั้น')->getStyle('N29')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('P29', $CBuid)->getStyle('P29')->applyFromArray($BodyStyle);
        
        $sheet->mergeCells('C30:D30');
        $sheet->setCellValue('A30', 'ถนน')->getStyle('A30')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('C30', $CRoad)->getStyle('C30')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('E30:F30')->mergeCells('G30:H30');
        $sheet->setCellValue('E30', 'แขวง/ตำบล')->getStyle('E30')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('G30', $CSubDistric)->getStyle('G30')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('J30:K30');
        $sheet->setCellValue('I30', 'อำเภอ')->getStyle('I30')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('J30', $CDistrict)->getStyle('J30')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('M30:N30');
        $sheet->setCellValue('L30', 'จังหวัด')->getStyle('L30')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('M30', $CProvince)->getStyle('M30')->applyFromArray($BodyStyle);
        
        $sheet->mergeCells('A31:B31')->mergeCells('C31:D31');
        $sheet->setCellValue('A31', 'รหัสไปรษณี')->getStyle('A31')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('C31', $CZipcode)->getStyle('C31')->applyFromArray($BodyStyle); 

        $sheet->mergeCells('E31:G31')->mergeCells('H31:I31');
        $sheet->setCellValue('E31', 'หมายเลขโทรศัพท์')->getStyle('E31')->applyFromArray($HeaderStyle);
        $sheet->setCellValue('H31', $CTel)->getStyle('H31')->applyFromArray($BodyStyle);
        
//-------------------------------------------- END ข้อมูลประวัติพื้นฐาน ------------------------------------------------------

        $columnHeaders = [
            'A' => ['label' => 'ความสัมพันธ์', 'width' => 12],
            'B' => ['label' => 'ชื่อ - นามสกุล', 'width' => 20],
            'C' => ['label' => 'เลขประจำตัวประชาชน', 'width' => 20],
            'D' => ['label' => 'วัน/เดือน/ปี เกิด', 'width' => 13],
            'E' => ['label' => 'สถานภาพสมรส', 'width' => 13],
            'F' => ['label' => 'สถานะภาพการมีชีวิต', 'width' => 16]
        ];
        
        foreach ($columnHeaders as $column => $headerInfo) {
            $cell = $column . '4';
        
            $familySheet->getStyle($cell)->applyFromArray([
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
        
            $familySheet->setCellValue($cell, $headerInfo['label']);
            $familySheet->getColumnDimension($column)->setWidth($headerInfo['width']);
            $familySheet->getRowDimension(4)->setRowHeight(25);
        }
        
        $familySheet->mergeCells('A2:F2');
        $familySheet->setCellValue('A2', 'ข้อมูลประวัติพื้นฐาน');
        $familySheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $familySheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $resultFamilyData = $this->PersonnelInformation_model->get_RelaFamily($IDCard)->result();
        $startRow = 5;

        foreach ($resultFamilyData as $row) {
            $data = [
                'A' => ['position' => 'center', 'value' => $row->ReStatus],
                'B' => ['position' => 'left', 'value' => $row->FullName],
                'C' => ['position' => 'center', 'value' => " " . $row->IDCard],
                'D' => ['position' => 'center', 'value' => date('d-m-Y', strtotime($row->BirthDate))],
                'E' => ['position' => 'center', 'value' => $row->Status],
                'F' => ['position' => 'center', 'value' => $row->LifeStatus]
            ];
            foreach ($data as $column => $value) {
                $cell = $column . $startRow;
                $familySheet->getStyle($cell)->applyFromArray([
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

                $familySheet->setCellValue($cell, $value['value']);
            }
            $startRow++;
        }
//-------------------------------------------- END ข้อมูลครอบครัว ------------------------------------------------------   
        // $colStudyRange = range('A', 'Z');
        // foreach ($colStudyRange as $column) {
        //     $studySheet->getColumnDimension($column)->setWidth(5);
        // }
        $studySheet->mergeCells('A2:Y2');
        $studySheet->setCellValue('A2', 'ข้อมูลประวัติพื้นฐาน');
        $studySheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $studySheet->getStyle('A2')->getFont()->setBold(true)->setSize(18)->setName('TH SarabunPSK');

        $writer = new Xlsx($spreadsheet);
        $FileName = "ประวัติของ" . $FullName . ".xlsx"; 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $FileName . '"'); 
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
    }

    

}