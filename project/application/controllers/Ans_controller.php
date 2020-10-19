<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Exs_controller.php");

class Ans_controller extends Exs_controller
{
	function index()
	{
		$this->load_v_ans_student();
	}

	function ans_data_table()
	{
		// load M_question and define mq
		$this->load->model('M_question', 'mq');
		// load model M_user
		$this->load->model('M_user', 'mu');
		
		$this->mq->q_create_user_id = 7;

		$rs_a = $this->mq->get_by_user_id()->result();
		// set array_question is array 
		$array_ans = array();
		// start loop set array_question from query of M_case
		foreach ($rs_a as $row) {
			array_push(
				$array_ans, 
				array(
					'ans_q_name' => $row->q_name,
					'ans_q_ca_name' => $row->q_ca_name,
					'ans_score' => 0
				)
			);
			// end set array_question with html and css for view
		};
		// end loop set array_question from query of M_case

		// Json's data sent back to Ajax form
		$data['rs_ans'] = $array_ans;

		// echo json back to ajax form
		echo json_encode($data);
	}
}
