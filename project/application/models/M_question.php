<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_question.php");

class M_question extends Da_question
{
    function get_by_user_id() {	
		$sql = "SELECT q_id, q_name, q_description, q_seq, q_status, q_ca_id, ca_name
				FROM `question`
                LEFT JOIN category ON category.ca_id = question.q_ca_id
				WHERE q_create_user_id=?";
		return $this->db->query($sql, array($this->q_create_user_id));
    }
    
    function count_question() {	
		$sql = "SELECT count(q_id) as count_question
				FROM `question`
				WHERE q_create_user_id=?";
		return $this->db->query($sql, array($this->q_create_user_id));
	}
}
