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

		$this->session->case_code = $user_username;
		$this->session->case_fname = ($this->mu->get_fname_by_username()->result() != null) ? ($this->mu->get_fname_by_username()->result())[0]->user_fname : '';
		$this->session->case_lname = ($this->mu->get_lname_by_username()->result() != null) ? ($this->mu->get_lname_by_username()->result())[0]->user_lname : '';
		$this->session->case_job = ($this->mu->get_position_by_username()->result() != null) ? ($this->mu->get_position_by_username()->result())[0]->position_name : '';
        $this->session->aurthentication = $user_username;

        $data['check'] = ($this->mu->check_user_login()->result() != null) ? true : false;
        $data['user'] = $this->mu->get_by_username()->result();

        // print_r($data);

        echo json_encode($data);
    }
}
