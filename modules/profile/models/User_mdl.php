<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_mdl extends CI_Model
{
	private $_table = 'tbl_users';
	private $_primary = 'id';

	function get($select = '*', $where = [], $join = [], $single = false)
	{
		$result = $single ? 'row' : 'result';
		$this->db
			->select($select)
			->order_by("$this->_table.$this->_primary", "desc")
			->group_by("$this->_table.$this->_primary")
			->where($where);
		if ($join) {
			foreach ($join as $joinRow):
				if (!empty($joinRow['joinType'])) {
					$this->db->join($joinRow['table'], $joinRow['tableJoin'], $joinRow['joinType']);
				} else {
					$this->db->join($joinRow['table'], $joinRow['tableJoin']);
				}
			endforeach;
		}
		$query = $this->db->get($this->_table);
		return $query->num_rows() > 0 ? $query->$result() : false;
	}

	function update($payload = [], $id)
	{
		return $this->db->update($this->_table, $payload, [$this->_primary => $id]);
	}

	function insert($payload = [])
	{
		return $this->db->insert($this->_table, $payload);
	}

	function insert_batch($payload = [])
	{
		return $this->db->insert_batch($this->_table, $payload);
	}

	function delete($id)
	{
		return $this->db->delete($this->_table, [$this->_primary => $id]);
	}

	function data_by_id($limit, $offset, $ordercol, $orderby = 'DESC', $select, $where = null, $join = null, $like = null, $group = null)
	{
		$this->db->select($select);
		$this->db->from($this->_table);
		if ($join !== null) {
			foreach ($join as $joinRow):
				if (!empty($joinRow['joinType'])) {
					$this->db->join($joinRow['table'], $joinRow['tableJoin'], $joinRow['joinType']);
				} else {
					$this->db->join($joinRow['table'], $joinRow['tableJoin']);
				}
			endforeach;
		}
		if ($where !== null)
			$this->db->where($where);
		if ($like !== null) {
			$this->db->group_start()
				->or_like($like);
			$this->db->group_end();
		}
		if ($group !== null)
			$this->db->group_by($group);
		$this->db->order_by($ordercol, $orderby);
		$this->db->limit($limit, $offset);
		$query = $this->db->get_where();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else
			return [];
	}

	public function get_count_record($select, $where = null, $like = null, $join = null, $group = null)
	{
		$this->db->select($select);
		$this->db->from($this->_table);
		if ($join !== null) {
			foreach ($join as $joinRow):
				if (!empty($joinRow['joinType'])) {
					$this->db->join($joinRow['table'], $joinRow['tableJoin'], $joinRow['joinType']);
				} else {
					$this->db->join($joinRow['table'], $joinRow['tableJoin']);
				}
			endforeach;
		}
		if ($where != null)
			$this->db->where($where);
		if ($like !== null) {
			$this->db->group_start()
				->or_like($like);
			$this->db->group_end();
		}
		if ($group != null)
			$this->db->group_by($group);
		$query = $this->db->get();
		return $query->num_rows();
	}
}

/* End of file Perusahaan_mdl.php */
