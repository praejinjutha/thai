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

    function find_setting()
    {
        $query = $this->db->query("SELECT SchoolName, Province, District, SubDistrict FROM SPL_AC_Settings WHERE ID='Profile1'");
        return $query;
    }
    
    function register($data)
    {
        if ($this->db->insert('SPL_LOG_UserData', $data)) {
            return true;
        } else {
            return false;
        }
    }
    
}