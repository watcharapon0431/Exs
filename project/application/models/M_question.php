<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_question.php");

class M_question extends Da_question
{
    function get_by_user_id() {	
		$sql = "SELECT q_id, q_name, q_description, q_seq, q_status, q_ca_id, ca.ca_name as q_ca_name
				FROM `question` as q
                LEFT JOIN category as ca ON ca.ca_id = q.q_ca_id
				WHERE q_create_user_id=?";
		return $this->db->query($sql, array($this->q_create_user_id));
    }
    
    function count_question() {	
		$sql = "SELECT count(q_id) as count_question
				FROM `question`
				WHERE q_create_user_id=?";
		return $this->db->query($sql, array($this->q_create_user_id));
	}

	function get_by_name() {	
		$sql = "SELECT *
				FROM `question`
				WHERE q_name=?";
		return $this->db->query($sql, array($this->q_name));
	}
}
