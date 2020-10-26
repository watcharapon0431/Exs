<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_anser.php");

class M_anser extends Da_anser
{

    function get_all_by_id()
	{
		$sql = "SELECT * 
				FROM `anser`
				WHERE ans_id=?";
		return $this->db->query($sql, array($this->ans_id));
	}

	function check_score()
	{
		$sql = "UPDATE `anser`
				SET	ans_score=?, ans_status=?
				WHERE ans_id=?";
		return $this->db->query($sql, array($this->ans_score,$this->ans_status,$this->ans_id));
	}
}
