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
		$this->output('teacher/v_question_manage');
	}

	function load_v_create_question()
	{
		// load model channel
		$this->load->model('M_category', 'mct');
		$data['rs_category'] = $this->mct->get_all()->result();
		$data['data'] = $data;
		$this->output('teacher/v_create_question', $data);
	}

	function load_v_edit($q_id)
	{
		// load model channel
		$this->load->model('M_question', 'mst');
		$this->load->model('M_category', 'mct');
		$data['rs_category'] = $this->mct->get_all()->result();

		$this->mst->q_id = $q_id;
		$data['rs_question'] = $this->mst->get_data_by_id()->result();
		$this->output('teacher/v_edit', $data);
	}
	
	function question_update()
	{
	
		$this->load->model('M_question', 'mq');
		$language_id = $this->input->post("language_id");
		$q_name = $this->input->post("q_name");
		$level_id = $this->input->post("level_id");
		$description = $this->input->post("description");
		$subq_name = $this->input->post("subq_name");
		$score = $this->input->post("score");
		$q_id = $this->input->post("q_id");

		$this->mq->q_id = $q_id;
		$this->mq->q_name = $q_name;
		$this->mq->q_description = $description;
		$this->mq->q_ca_id = $language_id;
		$this->mq->q_level = $level_id;
		$this->mq->q_create_user_id = $this->session->case_code;
		$this->mq->edit();

		$this->load->model('M_sup_question', 'msq');

		$this->msq->sq_id  = $q_id;
		$this->msq->sq_description = $subq_name;
		$this->msq->sq_score = $score;
		$this->msq->edit_sup_question();
		$data['status'] = true;
		echo json_encode($data);
	
	}

	function check_ans_score($id){
		$this->load->model('M_anser', 'ma');	
		$this->ma->ans_id = $id;
		$result = $this->ma->get_all_by_id()->result();
		$this->load->model('M_question', 'mq');
		$this->mq->q_id = $result[0]->ans_q_id;
		// $q_result = $this->mq->get_name_by_id()->result();
		// $data['rs_q'] = $q_result;
		$data['rs_a'] = $result;
		// $this->output_student('teacher/v_check_score',$data);
		// $this->load->model('M_question', 'mq');
		// $this->mq->q_id = $id;
		$name = ($this->mq->get_name_by_id()->result())[0]->q_name;
		$description = ($this->mq->get_name_by_id()->result())[0]->q_description;
		$array_q = array();
		array_push($array_q,array($result[0]->ans_q_id, $name, $description));
		$data['rs_q'] = $array_q;
		$this->output('teacher/v_check_score', $data);
	}

	function question_insert()
	{
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
		$sub_q = array();
		for($i=0;$i < count($subq_name) ; $i++){
			array_push($sub_q,array($subq_name[$i],$score[$i]));
		}
		$this->mq->insert($sub_q);
		$data['status'] = true;
		echo json_encode($data);
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
					'btn_edit' => '<button id="btn_edit" onclick="question_edit(' . $row->q_id . ')"  type="button" class="btn btn-warning btn-circle" title="แก้ไข"><i class="fa fa-pencil "></i></button>',
					'btn_delete' => '<button id="btn-delete" onclick="question_delete(' . $row->q_id . ')"  type="button" class="btn btn-danger btn-circle" title="ลบ"><i class="fa fa-minus-circle "></i></button>',
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

	function question_delete_data()
	{
		$id = $this->input->post('id');
		$this->load->model('M_question', 'mq');
		$this->mq->q_id = $id;
		$this->mq->q_status = 2;
		$data['check'] = $this->mq->update_status();

		echo json_encode($data);
	}
}
