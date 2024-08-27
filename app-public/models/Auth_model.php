<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Auth_model extends CI_Model
{
    function findUser($user, $pass)
    {
        $query = $this->db->query("SELECT ID, NationalID, Name, Role, Username, WebPassword FROM SPL_LOG_UserData WHERE Username = '$user'");
        $result = $query->row_array();

        if ($result && password_verify($pass, $result['WebPassword'])) {
            return $query;
        } else {
            return false;
        }
    }

    function findUserStd($user, $pass)
    {
        return  $this->db->query("SELECT ID, CitizenID AS NationalID, ISNULL(Titlename,'')+ ' ' + ISNULL(Firstname,'')+ ' ' + ISNULL(Lastname,'') AS Name FROM SPL_AC_Student WHERE CitizenID = '$user' AND StudentNo = '$pass'");
    }

    function find_setting()
    {
        $query = $this->db->query("SELECT SchoolName, Province, District, SubDistrict FROM SPL_AC_Settings WHERE ID='Profile1'");
        return $query;
    }

    function getStudentNo($StudentNo, $ClassYear, $Room)
    {
        return $this->db->where('StudentNo', $StudentNo)->where('ClassYear', $ClassYear)->where('Room', $Room)->get('SPL_AC_Student');
    }
    
    function register($data)
    {
        if ($this->db->insert('SPL_LOG_UserData', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function registerStudent($data)
    {
        if ($this->db->insert('SPL_AC_Student', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function isValidKey($key, $mode_db) {
        $query = $mode_db->select('PrIn.id, PrIn.MaxDevice, COUNT(Act.ID) as ActiveCount')
                         ->from('ProductInfo PrIn')
                         ->join('Activation Act', 'PrIn.id = Act.ProductID', 'left')
                         ->where('PrIn.SerialNo', $key)
                         ->group_by('PrIn.id')
                         ->group_by('PrIn.MaxDevice')
                         ->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->row();
            if ($result->ActiveCount < $result->MaxDevice) {
                return ['valid' => true, 'message' => '✓'];
            } else {
                return ['valid' => false, 'message' => 'Product key ใช้งานครบแล้ว'];
            }
        }
        return ['valid' => false, 'message' => '✗'];
    } 

    public function checkKey($key, $mode_db) {
        return $mode_db->where('SerialNo', $key)->get('ProductInfo'); 
    }

    public function checkActivat($ID, $mode_db) {
        $query = $mode_db->select('COUNT(ID) AS SUM')
                     ->from('Activation')
                     ->where('ProductID', $ID)
                     ->get();

        return $query->row()->SUM; 
    }

    function insertActivate($AcData, $mode_db)
    {
        if ($mode_db->insert('Activation', $AcData)) {
            return true;
        } else {
            return false;
        }
    }

    function InsertLog($UserID)
    {
        $query = $this->db->select('ID, NationalID, Name, Role, Username, WebPassword, Verified')->from('SPL_LOG_UserData')->where('ID', $UserID)->get()->result();
        foreach ($query as $row) {
           $Name = $row->Name . ' Login เข้าสู่ระบบ';
        }

        $IPAddress = $this->getIPv4Address();
        $IssueDate = date('Y-m-d H:i:s');

        $data = array(
            'UserID' => $UserID,
            'ActivityCode' => 'Thai Platform',
            'Description' => $Name,
            'IssueDate' => $IssueDate,
            'IPAddress' => $IPAddress,
        );

        if ($this->db->insert('SPL_LOG_Activity', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function getIPv4Address() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}