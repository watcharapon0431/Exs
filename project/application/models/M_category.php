<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Da_category.php");

class M_category extends Da_category
{
  function get_all()
  {
    $sql = "SELECT c.ca_id,c.ca_name
				FROM `category` as c ";
    $query = $this->db->query($sql);
    return $query;
  }

  function get_by_id()
  {
    $sql = "SELECT c.ca_id,c.ca_name
      FROM `category` as c 
      WHERE ca_id = ?";
    $query = $this->db->query($sql, $this->ca_id);
    return $query;
  }
}
