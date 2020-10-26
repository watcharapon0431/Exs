<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_sup_question.php");

class M_sup_question extends Da_sup_question
{
    function get_by_question_id()
	{
		$sql = "SELECT sq_description, sq_score
				FROM `sup_question`
                WHERE sq_q_id=?
                ORDER BY sq_id";
		return $this->db->query($sql, array($this->sq_q_id));
	}
}
