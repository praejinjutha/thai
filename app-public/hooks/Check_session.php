<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_session {

    public function validate_session() {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->helper('url');

        if ($CI->session->userdata('is_logged_in')) {
            $current_time = time();
            $login_time = $CI->session->userdata('login_time');
            $session_timeout = 7200; 

            if (($current_time - $login_time) > $session_timeout) {
                $this->logout();
            }
        }
    }

    public function logout() {
        $CI =& get_instance();
        
        // บันทึกกิจกรรมการล็อกเอาต์
        $CI->load->model('LogActivity_model');
        $CI->LogActivity_model->InsertLog('Logout ออกจากระบบ');

        // เคลียร์เซสชั่น
        if ($CI->session->userdata('is_logged_in')) {
            $CI->session->unset_userdata('email');
            $CI->session->unset_userdata('is_logged_in');
            $CI->session->unset_userdata('Role');
            $CI->session->unset_userdata('login_time');
        }

        redirect('dashboard');
    }
}
