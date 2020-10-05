<?php

class Da_question extends CI_Model {		
	
	public $q_id;
	public $q_name;
	public $q_description;
	public $q_seq;
	public $q_status;
	public $q_ca_id;
	public $q_create_user_id;

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$sql = "INSERT INTO `question` (q_name, q_description, q_seq, q_status, q_ca_id, q_create_user_id)
				VALUES (?, ?, ?, ?, ?)";
		$this->db->query($sql, array($this->q_name, $this->q_description, $this->q_seq, $this->q_status, $this->q_ca_id, $this->q_create_user_id));
		$this->last_insert_id = $this->db->insert_id();
	}
	
	function update() {
		$sql = "UPDATE `question`
				SET	q_name=?, q_description=?, q_seq=?, q_status=?, q_ca_id=?
				WHERE q_id=?";	
		$this->db->query($sql, array($this->q_name, $this->q_description, $this->q_seq, $this->q_status, $this->q_ca_id));
	}
	
	function delete() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "DELETE FROM `question`
				WHERE q_id=?";
		$this->db->query($sql, array($this->q_id));
	}
	
	function get_by_key() {	
		$sql = "SELECT *
				FROM `question`
				WHERE q_id=?";
		return $this->db->query($sql, array($this->q_id));
	}
}
