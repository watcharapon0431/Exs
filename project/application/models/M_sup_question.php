<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_sup_question.php");

class M_sup_question extends Da_sup_question
{
    function get_by_question_id()
	{
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;

		$data = $db->questions->find(array(
			'_id' => $this->sq_q_id
		)
		// , ['projection' => ['q_sup' => 1, '_id' => 0]]
	);
		return $data;
		// $sql = "SELECT sq_description, sq_score
		// 		FROM `sup_question`
        //         WHERE sq_q_id=?
        //         ORDER BY sq_id";
		// return $this->db->query($sql, array($this->sq_q_id));
	}

	function edit_sup_question()
	{ 
		$sql = "UPDATE `sup_question`
		SET	sq_description=?, sq_score=?
		WHERE sq_id=? ";
		$this->db->query($sql, array($this->sq_description, $this->sq_score, $this->sq_id));
	}
}
