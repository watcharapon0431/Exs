<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Exs_controller.php");

class Question_manage_controller extends Exs_controller
{
	function index()
	{
		$this->load_v_question_manage();
	}


	

	function question_data_table()
	{
		// load M_question and define mq
		$this->load->model('M_question', 'mq');
		// load model M_user
		$this->load->model('M_user', 'mu');
		
		$this->mq->q_create_user_id = $this->session->case_code;

		$rs_q = $this->mq->get_by_user_id()->result();
		// set array_question is array 
		$array_question = array();
		// start loop set array_question from query of M_case
		foreach ($rs_q as $row) {
			array_push(
				$array_question, 
				array(
					'q_name' => $row->q_name,
					'q_seq' => $row->q_seq,
					'q_status' => $row->q_status,
					'q_ca_name' => $row->q_ca_name,
					'btn_edit' => '<a id="btn_edit" onclick="question_edit(' . $row->q_id . ')"  type="button" class="btn btn-warning btn-circle" title="แก้ไข"><i class="fa fa-pencil "></i></a >',
					'btn_delete' => '<a id="btn-delete" onclick="question_delete(' . $row->q_id . ')"  type="button" class="btn btn-danger btn-circle" title="ลบ"><i class="fa fa-minus-circle "></i></a >',
				)
			);
			// end set array_question with html and css for view
		};
		// end loop set array_question from query of M_case

		// Json's data sent back to Ajax form
		$data['rs_question'] = $array_question;

		// echo json back to ajax form
		echo json_encode($data);
	}
}
