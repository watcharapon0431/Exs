<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_user.php");

class M_user extends Da_user
{
    function get_by_username(){
        require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$db = $client->exs;
		$data = $db->users->findOne(array(
			'user_username' => $this->user_username,
			'user_password' => $this->user_password
        ));
        return $data;
        // $sql = "SELECT *
		// 		FROM `user`
        //         WHERE user_username=? AND user_password=?";
        // return $this->db->query($sql, array($this->user_username, $this->user_password));
    }

    // function get_position_by_username(){
    //     require 'vendor/autoload.php';
	// 	$client = new MongoDB\Client("mongodb://localhost:27017");
	// 	$db = $client->exs;
	// 	$data = $db->users->findOne(array(
	// 		'user_username' => $this->user_username,
	// 		'user_password' => $this->user_password
    //     ));
    //     // print_r($data);
    //     return $data;
    //     // $sql = "SELECT position_name
	// 	// 		FROM `user`
    //     //         LEFT JOIN position ON position.position_id = user.user_position_id
    //     //         WHERE user_username=? AND user_password=?";
    //     // return $this->db->query($sql, array($this->user_username, $this->user_password));
    // }
}
