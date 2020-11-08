<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Exs_controller.php");

class Ans_controller extends Exs_controller
{

	function ans_data_table()
	{
		$this->load->model('M_question', 'mq');
		$this->load->model('M_user', 'mu');
		// $this->mq->q_create_user_id = 7;
		$rs_a = $this->mq->get_all_question();
		$array_ans = array();
		foreach ($rs_a as $row) {
			array_push(
				$array_ans,
				array(
					'q_id' => (string)$row->_id,
					'q_name' => $row->q_name,
					'q_ca_name' => $row->q_category,
					'q_level' => $row->q_level,
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
		// $this->mq->q_id = $this->input->post("q_id");
		$rs_temp = $this->mq->get_all_question();
		foreach ($rs_temp as $row) {
			if ((string)$row->_id == $id) {
				$id = $row->_id;
				break;
			}
		}
		$this->mq->q_id = $id;
		$rs_q = $this->mq->get_by_id();
		foreach ($rs_q as $row) {
			$name = $row->q_name;
			$description = $row->q_description;
			$q_category = $row->q_category;
		}
		$array_q = array();
		array_push($array_q, array((string)$id, $name, $description, $q_category));
		$this->load->model('M_sup_question', 'msq');
		$this->msq->sq_q_id = $id;
		$data['rs_sub'] = $this->msq->get_by_question_id();
		$data['rs_q'] = $array_q;
		$this->output_student('student/v_ans_student_descrip', $data);
	}

	function ans_check_score()
	{
		$id = $this->input->post("id");
		$score = $this->input->post("score");
		$this->load->model('M_anser', 'ma');
		$rs_temp = $this->ma->get_answer();
		foreach ($rs_temp as $row) {
			if ((string)$row->_id == $id) {
				$temp_id = $row->_id;
				break;
			}
		}
		$this->ma->ans_id = $temp_id;
		$this->ma->ans_score = $score;
		$this->ma->ans_status = 1;
		$this->ma->check_score();
		echo json_encode(true);
	}

	function table_data_ans()
	{
		$this->load->model('M_anser', 'ma');
		$rs_ans = $this->ma->get_answer();
		$array_ans = array();
		foreach ($rs_ans as $row) {
			array_push(
				$array_ans,
				array(
					'ans_id' => (string)$row->_id,
					'ans_q_name' => $row->ans_q_name,
					'ans_q_category' => $row->ans_q_category,
					'ans_user_fname' => $row->ans_user_fname,
					'ans_status' => $row->ans_status,
					'ans_score' => $row->ans_score,
				)
			);
		};
		$data['rs_all'] = $array_ans;
		echo json_encode($data);
	}

	function ans_sup_q_table()
	{
		$this->load->model('M_question', 'mq');
		$this->load->model('M_sup_question', 'msq');
		$id = $this->input->post('q_id');
		$rs_temp = $this->mq->get_all_question();
		foreach ($rs_temp as $row) {
			if ((string)$row->_id == $id) {
				$id = $row->_id;
				break;
			}
		}
		$this->msq->sq_q_id = $id;
		$rs_sub = $this->msq->get_by_question_id();
		$i = 0;
		$array_sq = array();
		foreach ($rs_sub as $row) {
			for ($i = 0; $i < sizeOf($row['q_sub_q']); $i++) {
				array_push(
					$array_sq,
					array(
						'sq_description' => $row['q_sub_q'][$i][0],
						'sq_score' => $row['q_sub_q'][$i][1]
					)
				);
			}
		};
		$data['rs_sq'] = $array_sq;
		// echo json back to ajax form
		echo json_encode($data);
	}

	function create_ans_student()
	{
		$this->load->model('M_question', 'mq');
		$this->load->model('M_anser', 'ma');
		$this->ma->ans_description = $this->input->post('ans_description');
		$this->ma->ans_q_name = $this->input->post('ans_q_name');
		$this->ma->ans_q_category = $this->input->post('ans_q_category');
		$this->ma->ans_status = 0;
		$id = $this->input->post('ans_q_id');
		$rs_temp = $this->mq->get_all_question();
		foreach ($rs_temp as $row) {
			if ((string)$row->_id == $id) {
				$id = $row->_id;
				break;
			}
		}
		$this->ma->ans_q_id = $id;
		$this->ma->ans_user_id = $this->session->case_code;
		$this->ma->ans_user_fname = $this->session->case_fname;
		$this->ma->ans_user_lname = $this->session->case_lname;
		$this->ma->ans_score = 0;
		$this->ma->insert();
		echo json_encode(true);
	}
}
