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
		// require 'vendor/autoload.php';
		// $client = new MongoDB\Client("mongodb://localhost:27017");
		// $db = $client->exsdb;
		// $db->ansers->updateOne(
		// 	[ '_id' => $this->ans_id ],
		// 	[ '$set' => [ 'ans_score' => $this->ans_score, 'ans_status' => $this->ans_status]]
		// );
		
	}
}
