<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Exs_controller.php");

class Question_manage_controller extends Exs_controller
{
	function index()
	{
		$this->load_v_question_manage();
	}


	function load_v_question_manage()
	{
		$this->output('v_question_manage');
	}

	function load_v_create_question()
	{
		// load model channel
		$this->load->model('M_category', 'mct');
		$data['rs_category'] = $this->mct->get_all()->result();
		$data['data'] = $data;
		$this->output('v_create_question',$data);
	}

	function question_insert(){
		$language_id = $this->input->post("language_id");
		$q_name = $this->input->post("q_name");
		$level_id = $this->input->post("level_id");
		$description = $this->input->post("description");
		$subq_name = $this->input->post("subq_name");
		$score = $this->input->post("score");
		$status = 1;
		$this->load->model('M_question', 'mq');
		$this->mq->q_name = $q_name;
		$this->mq->q_description = $description;
		$this->mq->q_status = $status;
		$this->mq->q_ca_id = $language_id;
		$this->mq->q_level = $level_id;
		$this->mq->q_create_user_id = $this->session->case_code;
		$this->mq->q_seq = 0;
		$this->mq->insert();
		$q_id = ($this->mq->get_by_name()->result())[0]->q_id;
		$this->load->model('M_sup_question', 'msq');
		for($i=0;$i < count($subq_name) ; $i++){
			$this->msq->sq_q_id = $q_id;
			$this->msq->sq_seq = 0;
			$this->msq->sq_description = $subq_name[$i];
			$this->msq->sq_score = $score[$i];
			$this->msq->insert();
		}
		$data['status'] = true;
		echo json_encode($data);
	}

	function question_data_table()
	{
		// load M_question and define mq
		$this->load->model('M_question', 'mq');
		// load model M_user
		$this->load->model('Master_data/M_user', 'mu');
		// set start_limit is with page_number
		// $this->mcs->start_limit = ($this->input->post('page_number') - 1) * 10;
		
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
					'q_create_user_id ' => $row->q_create_user_id ,
					'ca_name ' => $row->ca_name,
					'btn_edit' => '<a href="' . site_url() . '/Question_manage_controller/question_edit/' . $row->q_id . '" type="button" class="btn btn-warning btn-circle" title="แก้ไข"><i class="fa fa-pencil "></i></a >',
					'btn_delete' => '<a id="btn-delete" onclick="question_delete(' . $row->q_id . ')"  type="button" class="btn btn-danger btn-circle" title="ลบ"><i class="fa fa-minus-circle "></i></a >',
				)
			);
			// end set array_question with html and css for view
		};
		// end loop set array_question from query of M_case

		// Json's data sent back to Ajax form
		$data['rs_question'] = $array_question;
		// set case_count is count of all case's search data
		$data['count_question'] = ($this->mq->count_question->result())[0]->count_question;
		// echo json back to ajax form

		print_r($data['rs_question']);
		die;
		echo json_encode($data);
	}
}
