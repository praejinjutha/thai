<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helpdesk_model extends CI_Model
{
    function conn()
    {
        return $this->load->database('pdo_db', TRUE);
    }

    public function fetch_Helpdesk() 
    {
        return  $this->db->query("SELECT * FROM SPL_LOG_Helpdesk WHERE System = 'Personal' ORDER BY  ID ASC");
    }

    function get_No_Helpdesk()
    {
        $query = $this->db->query("SELECT MAX(No) AS No_max FROM SPL_LOG_Helpdesk ");
        return $query;
    }

    public function Insert_Helpdesk($Data) 
    {
        return $this->db->insert('SPL_LOG_Helpdesk', $Data);
    }

    function delete_Helpdesk($ID)
    {
        if ($this->db->delete('SPL_LOG_Helpdesk', array('ID' => $ID))) {
            return true;
        } else {
            return false;
        }
    }

    public function Search_Helpdesk($Search)
    {
        $escapedSearch = $this->db->escape_like_str($Search);
        $query = $this->db->query("SELECT * FROM SPL_LOG_Helpdesk WHERE System = 'Personal' AND (Subject LIKE '%$escapedSearch%') ORDER BY ID ASC");
        return $query;
    }
}