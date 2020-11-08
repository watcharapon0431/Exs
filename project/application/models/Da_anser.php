<?php

class Da_anser extends CI_Model {		
	
	public $ans_id;
	public $ans_description;
	public $ans_score;
	public $ans_status;
	public $ans_q_id;
	public $ans_user_id;
	public $ans_q_name;
	public $ans_q_category;
	public $ans_user_fname;
	public $ans_user_lname;

	function __construct() {
		parent::__construct();
	}

	function insert() {
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exsdb;
		$db->ansers->insertOne(array(
			'ans_description' => $this->ans_description,
			'ans_status' => $this->ans_status,
			'ans_score' => $this->ans_score,
			'ans_q_id' => $this->ans_q_id,
			'ans_q_name' => $this->ans_q_name,
			'ans_q_category' => $this->ans_q_category,
			'ans_user_id' => $this->ans_user_id,
			'ans_user_fname' => $this->ans_user_fname,
			'ans_user_lname' => $this->ans_user_lname,
		));

		// $sql = "INSERT INTO `anser` (ans_description, ans_score, ans_status, ans_q_id, ans_user_id )
		// 		VALUES (?, ?, ?, ?, ?)";
		// $this->db->query($sql, array($this->ans_description, $this->ans_score, $this->ans_status, $this->ans_q_id, $this->ans_user_id ));
		// $this->last_insert_id = $this->db->insert_id();
	}
	
	function update() {
		$sql = "UPDATE `anser`
				SET	ans_description=?, ans_score=?, ans_status, ans_q_id=?, ans_user_id =?
				WHERE ans_id=?";	
		$this->db->query($sql, array($this->ans_description, $this->ans_score, $this->ans_status, $this->ans_q_id, $this->ans_user_id ));
	}
	
	function delete() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "DELETE FROM `anser`
				WHERE ans_id=?";
		$this->db->query($sql, array($this->ans_id));
	}
	
	function get_by_key() {	
		$sql = "SELECT *
				FROM `anser`
				WHERE ans_id=?";
		return $this->db->query($sql, array($this->ans_id));
	}
}
