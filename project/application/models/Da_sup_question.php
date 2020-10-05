<?php

class Da_sup_question extends CI_Model {		
	
	public $sq_id;
	public $sq_description;
	public $sq_seq;
	public $sq_score;
	public $sq_q_id;

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$sql = "INSERT INTO `sup_question` (sq_description, sq_seq, sq_score, sq_q_id )
				VALUES (?, ?, ?, ?)";
		$this->db->query($sql, array($this->sq_description, $this->sq_seq, $this->sq_score, $this->sq_q_id ));
		$this->last_insert_id = $this->db->insert_id();
	}
	
	function update() {
		$sql = "UPDATE `sup_question`
				SET	sq_description=?, sq_seq=?, sq_score=?, sq_q_id =?
				WHERE sq_id=?";	
		$this->db->query($sql, array($this->sq_description, $this->sq_seq, $this->sq_score, $this->sq_q_id ));
	}
	
	function delete() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "DELETE FROM `sup_question`
				WHERE sq_id=?";
		$this->db->query($sql, array($this->sq_id));
	}
	
	function get_by_key() {	
		$sql = "SELECT *
				FROM `sup_question`
				WHERE sq_id=?";
		return $this->db->query($sql, array($this->sq_description, $this->sq_seq, $this->sq_score, $this->sq_q_id ));
	}
}
