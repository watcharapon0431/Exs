<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_question.php");

class M_question extends Da_question
{
	function get_all_question()
	{
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;

		$data = $db->questions->find(array(
			'q_status' => 1
		));
		return $data;
	}

	function get_by_user_id()
	{
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;

		$data = $db->questions->find(array(
			'q_create_user_id' => $this->q_create_user_id,
			'q_status' => 1
		));
		return $data;

		// $sql = "SELECT q_id, q_name, q_description, q_seq, q_status, q_ca_id, ca.ca_name as q_ca_name, 
		// 		CASE
		// 			WHEN q_level = 1 THEN 'ง่ายมาก'
		// 			WHEN q_level = 2 THEN 'ง่าย'
		// 			WHEN q_level = 3 THEN 'ปานกลาง'
		// 			WHEN q_level = 4 THEN 'ยาก'
		// 			WHEN q_level = 5 THEN 'ยากมาก'
		// 		END as q_level_name
		// 		FROM `question` as q
		//         LEFT JOIN category as ca ON ca.ca_id = q.q_ca_id
		// 		WHERE q_create_user_id=? AND q_status!=2";
		// return $check;
	}

	function count_question()
	{
		$sql = "SELECT count(q_id) as count_question
				FROM `question`
				WHERE q_create_user_id=?";
		return $this->db->query($sql, array($this->q_create_user_id));
	}

	function get_by_name()
	{
		$sql = "SELECT *
				FROM `question`
				WHERE q_name=?";
		return $this->db->query($sql, array($this->q_name));
	}

	function get_by_id()
	{
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;

		$data = $db->questions->find(array(
			'_id' => $this->q_id
		));
		// print_r($data);
		return $data;
		// $sql = "SELECT q_name, q_description 
		// 		FROM `question`
		// 		WHERE q_id=?";
		// return $this->db->query($sql, array($this->q_id));
	}

	function update_status($id)
	{
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;
		$check = $db->questions->updateOne(
			['_id' => $id],
			['$set' => ['q_status' => 2]]
		);
		// $sql = "UPDATE question 
		// 		SET q_status = ?
		// 		WHERE q_id = ?";
		// return $this->db->query($sql, array($this->q_status, $id));
		return $check;
	}

	function get_data_by_id()
	{
		$sql = "SELECT *,category.ca_name,sup_question.sq_description,sup_question.sq_score
				FROM `question`
				LEFT JOIN category
				ON question.q_id = category.ca_id
				LEFT JOIN sup_question 
				ON question.q_id = sup_question.sq_id
				WHERE q_id = ?";
		return $this->db->query($sql, array($this->q_id));
	}
	function edit()
	{
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;
		$db->questions->updateOne(
			['_id' => $this->mq->q_id],
			['$set' => ['q_name' => $this->mq->q_name, 'q_description' => $this->mq->q_description, 'q_category' => $this->mq->q_ca_id, 'q_level' => $this->mq->q_level]]
		);
		// $sql = "UPDATE `question`
		// SET	q_name=?, q_description=?, q_ca_id=?,q_level = ?,q_create_user_id = ?
		// WHERE q_id=? ";
		// $this->db->query($sql, array($this->q_name, $this->q_description, $this->q_ca_id, $this->q_level, $this->q_create_user_id, $this->q_id));
	}

	function get_ca_id_by_id()
	{
		$sql = "SELECT q_ca_id 
				FROM `question`
				WHERE q_id=? ";
		return $this->db->query($sql, array($this->q_id));
	}
}
