<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exs_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date_helper');
		$this->load->helper('guid_helper');
		$this->load->helper('file_mime_type_helper');
		$this->load->helper("file");
		$this->load->helper('download');
		$this->load->helper('url');
	}

	function output($body = '', $data = '')
	{
		if (isset($this->session->aurthentication)) {
			// Load Topbar
			$this->load->view('Template_Custom/v_topbar_home');
			// Load header
			$this->load->view('Template_Custom/v_header');
			// Load Footer
			$this->load->view('Template_Custom/v_footer');

			$this->load->view($body, $data);
		} else {
			redirect(site_url() . "/Exs_controller/index", "refresh");
		}
	}

	function index()
	{
		$this->login();
	}

	function login()
	{
		$this->load_v_login();
	}

	function load_v_login()
	{
		unset($this->session->aurthentication);
		$this->load->view('Template_Custom/v_header');
		$this->load->view('Template_Custom/v_footer');
		$this->load->view('v_login');
	}

	function load_v_check_ans()
	{
		$this->output('v_check_ans');
	}
}
