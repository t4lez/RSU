<?php

defined("BASEPATH") or exit("No direct script access allowed");

class File_manager_mdl extends CI_Model
{
	private $_table = "tbl_file_manager";
	private $_primary = "fileManagerId";

	function get($where = [], $single = false)
	{
		$result = $single ? 'row' : 'result';
		return $this->db
					->select("$this->_table.*, tbl_users.first_name as firstName, tbl_users.last_name as lastName")
					->order_by("$this->_table.$this->_primary", "desc")
					->join("tbl_users", "tbl_users.id = $this->_table.createBy", 'left')
					->get_where($this->_table, $where)->$result();
	}

	function insert($payload)
	{
		$this->db->insert($this->_table, $payload);
		return $this->db->insert_id();
	}

	function delete($fileManagerId)
	{
		return $this->db->delete($this->_table, [$this->_primary => $fileManagerId]);
	}
}

/* End of file Images_file_manager_m.php */
