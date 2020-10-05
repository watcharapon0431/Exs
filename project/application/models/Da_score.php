<?php

class Da_score extends CI_Model {		
	
	public $sc_id;
	public $sc_score;
	public $sc_q_id;
	public $sc_sq_id;
	public $sc_user_id;

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$sql = "INSERT INTO `score` (sc_score, sc_q_id, sc_sq_id, sc_user_id)
				VALUES (?, ?, ?, ?)";
		$this->db->query($sql, array($this->sc_score, $this->sc_q_id, $this->sc_sq_id, $this->sc_user_id));
		$this->last_insert_id = $this->db->insert_id();
	}
	
	function update() {
		$sql = "UPDATE `score`
				SET	sc_score=?, sc_q_id=?, sc_sq_id=?, sc_user_id=?
				WHERE sc_id=?";	
		$this->db->query($sql, array($this->sc_score, $this->sc_q_id, $this->sc_sq_id, $this->sc_user_id));
	}
	
	function delete() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "DELETE FROM `score`
				WHERE sc_id=?";
		$this->db->query($sql, array($this->sc_id));
	}
	
	function get_by_key() {	
		$sql = "SELECT *
				FROM `score`
				WHERE sc_id=?";
		return $this->db->query($sql, array($this->sc_score, $this->sc_q_id, $this->sc_sq_id, $this->sc_user_id));
	}
}
