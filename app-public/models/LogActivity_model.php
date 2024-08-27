<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class LogActivity_model extends CI_Model
{
    function InsertLog($action)
    {
        $IssueDate = date('Y-m-d H:i:s');
        $IPAddress = $this->getIPv4Address();
        $data = array(
            'UserID' => $this->session->userdata('LogUserID'),
            'ActivityCode' => 'Thai Platform',
            'Description' => $this->session->userdata('Name') . ' ' . $action,
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