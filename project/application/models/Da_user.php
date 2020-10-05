<?php

class Da_user extends CI_Model {		
	
	public $user_id;
	public $user_username;
	public $user_password;
	public $user_fname;
	public $user_lname;
	public $user_position_id ;

	function __construct() {
		parent::__construct();
	}

	function insert() {
		$sql = "INSERT INTO `user` (user_username, user_password, user_fname, user_lname, user_position_id )
				VALUES (?, ?, ?, ?, ?)";
		$this->db->query($sql, array($this->user_username, $this->user_password, $this->user_fname, $this->user_lname, $this->user_position_id ));
		$this->last_insert_id = $this->db->insert_id();
	}
	
	function update() {
		$sql = "UPDATE `user`
				SET	user_username=?, user_password=?, user_fname=?, user_lname =?, user_position_id =?
				WHERE `user_id`=?";	
		$this->db->query($sql, array($this->user_username, $this->user_password, $this->user_fname, $this->user_lname, $this->user_position_id ));
	}
	
	function delete() {
		// if there is no primary key, please remove WHERE clause.
		$sql = "DELETE FROM `user`
				WHERE `user_id`=?";
		$this->db->query($sql, array($this->user_id));
	}
	
	function get_by_key() {	
		$sql = "SELECT *
				FROM `user`
				WHERE `user_id`=?";
		return $this->db->query($sql, array($this->user_id));
	}
	
}
