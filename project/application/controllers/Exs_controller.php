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
		// Load header
		$this->load->view('Template_Custom/v_header');
		// Load Footer
		$this->load->view('Template_Custom/v_footer');
		// Load Topbar
		$this->load->view('Template_Custom/v_topbar_home');
		// Load view and data is sent to view 
		$this->load->view($body, $data);
	}


	/*
	* Index site
	* first site and load view v_home.php
	* @author 
	* @Create Date 
	*/
	function index()
	{
		// call function view v_home 
		$this->load_v_home();
	}


	function load_v_home()
	{
		// to view v_home 
		$this->output('v_home');
	}
}
