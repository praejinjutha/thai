<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageUseraccounts_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    function fech_ManageUseraccounts()
    {
        return $this->db->query("SELECT ID, NationalID, Username, Mobile, Name, Email, Role, AdminPersonal, RegisDate
        FROM SPL_LOG_UserData ORDER BY ID");
    }

    public function get_TSPname() 
    {  
        return $this->db->get('SMPr_STTPname');
    }

    function checkUsername($Username)
    {
        $this->db->where('Username', $Username);
        $query = $this->db->get('SPL_LOG_UserData');
        return $query->num_rows();
    }

    function Insert_Useraccounts($data)
    {
        return $this->db->insert('SPL_LOG_UserData', $data);
    }

    function update_Useraccounts($ID, $data)
    {
        return $this->db->where('ID', $ID)->update('SPL_LOG_UserData', $data);
    }

    function delete_Useraccounts($ID)
    {
        if ($this->db->delete('SPL_LOG_UserData', array('ID' => $ID))) {
            return true;
        } else {
            return false;
        }
    }

    function Edit_Password($ID)
    {
        return $this->db->query("SELECT ID, Username FROM SPL_LOG_UserData WHERE ID ='$ID'");
    }

    function update_Password($ID,$data)
    {
        return $this->db->where('ID', $ID)->update('SPL_LOG_UserData', $data);    
    }
}