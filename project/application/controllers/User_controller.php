<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Exs_controller.php");

class User_controller extends Exs_controller
{
    function login_authentication()
    {
        $user_username = $this->input->post("user_username");
        $user_password = $this->input->post("user_password");

        $this->load->model('M_user', 'mu');

        $this->mu->user_username = $user_username;
        $this->mu->user_password = $user_password;

        $user_info = $this->mu->get_by_username();

        if ($user_info != null) {
            $this->session->aurthentication = $user_info->_id;
            // case_code is user_id
            $this->session->case_code = $user_info->_id;
            // case_fname is user_fname
            $this->session->case_fname = $user_info->user_fname;
            // case_lname is user_lname
            $this->session->case_lname = $user_info->user_lname;
            // case_job is user_position
            $this->session->case_job = $user_info->user_position_name;
            $data['user'] = $user_info;
            $data['check'] = true;
        } else {
            $data['check'] = false;
        }

        echo json_encode($data);
    }
}
