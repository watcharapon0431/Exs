<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Exs_controller.php");

class Ans_controller extends Exs_controller
{
	function ans_data_table()
	{
		$this->load->model('M_question', 'mq');
		$this->load->model('M_user', 'mu');
		$this->mq->q_create_user_id = 7;
		$rs_a = $this->mq->get_by_user_id()->result();

		$array_ans = array();
		foreach ($rs_a as $row) {
			array_push(
				$array_ans, 
				array(
					'q_id' => $row->q_id,
					'q_name' => $row->q_name,
					'q_ca_name' => $row->q_ca_name,
					'q_level' => $row->q_level_name,
					// 'score' => 0
				)
			);
		};

		// Json's data sent back to Ajax form
		$data['rs_ans'] = $array_ans;

		// echo json back to ajax form
		echo json_encode($data);
	}

	function load_v_ans_student_descrip($id)
	{
		$this->load->model('M_question', 'mq');
		$this->mq->q_id = $id;
		$name = ($this->mq->get_name_by_id()->result())[0]->q_name;
		$description = ($this->mq->get_name_by_id()->result())[0]->q_description;
		$array_q = array();
		array_push($array_q,array($id, $name, $description));
		$data['rs_q'] = $array_q;
		$this->output_student('student/v_ans_student_descrip', $data);
	}

	function ans_check_score(){
		$id = $this->input->post("id");
		$score = $this->input->post("score");
		$this->load->model('M_anser', 'ma');	
		$this->ma->ans_id = $id;
		$this->ma->ans_score = $score;
		$this->ma->ans_status = 1;
		$this->ma->check_score();
		echo json_encode(true);
	}

	function ans_sup_q_table()
	{
		$this->load->model('M_sup_question', 'msq');
		$this->msq->sq_q_id = $this->input->post('q_id');
		$rs_sub = $this->msq->get_by_question_id()->result();

		$array_sq = array();
		foreach ($rs_sub as $row) {
			array_push(
				$array_sq, 
				array(
					'sq_description' => $row->sq_description,
					'sq_score' => $row->sq_score
				)
			);
		};
		// Json's data sent back to Ajax form
		$data['rs_sq'] = $array_sq;
		// echo json back to ajax form
		echo json_encode($data);
	}

	function create_ans_student(){
		$this->load->model('M_anser', 'ma');
		$this->ma->ans_description = $this->input->post('ans_description');
		$this->ma->ans_status = $this->input->post('ans_status');
		$this->ma->ans_q_id = $this->input->post('ans_q_id');
		$this->ma->ans_user_id = $this->session->case_code;
		$this->ma->insert();
		echo json_encode(true);
	}
}
