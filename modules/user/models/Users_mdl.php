<?php if (!defined('BASEPATH'))
	exit('No direct script allowed');

class Users_mdl extends CI_Model
{
	var $date;
	private $tblData = "tbl_users";
	private $tblGroups = "tbl_groups";

	public function __construct()
	{
		parent::__construct();
	}

	function getGroups($select = "*", $ordercol = "name", $orderby = 'Desc', $where = null)
	{
		$this->db->select($select);
		$this->db->from($this->tblGroups);
		if ($where !== null)
			$this->db->where($where);
		$this->db->order_by($ordercol, $orderby);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else
			return array();
	}

}
