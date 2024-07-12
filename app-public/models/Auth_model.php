<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
    
}