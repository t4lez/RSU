<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class Config_mdl extends CI_Model
{
	var $date;
	private $tblData = "tbl_config";

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->date = date("Y-m-d");
	}
	/*Absenpoint Model*/
	var $arrStatus = array("1" => "Aktif", "0" => "Non Aktif");

	function get_data_single($select, $table, $where = null, $join = null)
	{
		$this->db->select($select);
		$this->db->from($table);
		if ($join !== null) {
			foreach ($join as $joinRow) :
				if (!empty($joinRow['joinType'])) {
					$this->db->join($joinRow['table'], $joinRow['tableJoin'], $joinRow['joinType']);
				} else {
					$this->db->join($joinRow['table'], $joinRow['tableJoin']);
				}
			endforeach;
		}
		if ($where !== null)
			$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row(); //$query->row_array();
		} else
			return false;
	}

	function getSingleArray($select, $table, $where = null, $join = null)
	{
		$this->db->select($select);
		$this->db->from($table);
		if ($join !== null) {
			foreach ($join as $joinRow) :
				if (!empty($joinRow['joinType'])) {
					$this->db->join($joinRow['table'], $joinRow['tableJoin'], $joinRow['joinType']);
				} else {
					$this->db->join($joinRow['table'], $joinRow['tableJoin']);
				}
			endforeach;
		}
		if ($where !== null)
			$this->db->where($where);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else
			return false;
	}

	function isKodeExist($kode)
	{
		$this->db->where('keyKode', $kode);
		$query = $this->db->get($this->tblData);
		if ($query->num_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}

	function insertErr($param)
	{
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries
		//$this->db->set('createdAt', 'NOW()', FALSE);
		$sql = $this->db->insert($this->tblData, $param);
		$db_error = $this->db->error();
		//pause($db_error);
		if (empty($db_error["message"])) {
			//pause($db_error);
			$sql = FALSE;
		} else
			$sql = $db_error["message"];
		$this->db->db_debug = $db_debug; //restore setting
		return $sql;
	}


	function deleteErr($kode)
	{
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries
		$this->db->where("metodeId", $kode);
		$sql = $this->db->delete($this->tblData);
		$db_error = $this->db->error();
		if (empty($db_error["message"])) {
			//pause($db_error);
			$sql = FALSE;
		} else
			$sql = $db_error["message"];
		$this->db->db_debug = $db_debug; //restore setting
		return $sql;
	}

	function updateErr($arrwhere, $param, $tbl = null)
	{
		$db_debug = $this->db->db_debug; //save setting
		$this->db->db_debug = FALSE; //disable debugging for queries
		//$this->db->set('updatedAt', 'NOW()', FALSE);
		$this->db->where($arrwhere);
		$sql = $this->db->update(($tbl) ? $tbl :  $this->tblData, $param);
		$db_error = $this->db->error();
		//pause($db_error);
		if (empty($db_error["message"])) {
			//pause($db_error);
			$sql = FALSE;
		} else
			$sql = $db_error["message"];
		$this->db->db_debug = $db_debug; //restore setting
		return $sql;
	}

	function data_by_id($limit, $offset, $ordercol, $orderby = 'DESC', $select, $where = null, $join = null, $like = null, $group = null, $tbl = null)
	{
		$this->db->select($select);
		//$this->db->select("DATE_FORMAT( date, '%d.%m.%Y' ) as date_human",FALSE);
		//$this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",FALSE);		
		//$this->db->from($tabel);
		$this->db->from(($tbl) ? $tbl : $this->tblData);
		if ($join !== null) {
			foreach ($join as $joinRow) :
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

		//$this->db->like($like);
		if ($group !== null)
			$this->db->group_by($group);
		$this->db->order_by($ordercol, $orderby);
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			//pause();
			return $query->result();
		} else
			return array();
	}

	public function get_count_record($select, $where = null, $like = null, $join = null, $group = null, $tbl = null)
	{
		//pause(array('nama'=>'pulsa'));
		//pause($like);
		$this->db->select($select);
		$this->db->from(($tbl) ? $tbl : $this->tblData);
		if ($join !== null) {
			foreach ($join as $joinRow) :
				if (!empty($joinRow['joinType'])) {
					$this->db->join($joinRow['table'], $joinRow['tableJoin'], $joinRow['joinType']);
				} else {
					$this->db->join($joinRow['table'], $joinRow['tableJoin']);
				}
			endforeach;
		}
		if ($where != null)
			$this->db->where($where);
		/*if ($like != null)
			$this->db->or_like($like);*/
		//$this->db->like($like);
		if ($like !== null) {
			$this->db->group_start()
				->or_like($like);
			/*->like('FirstName','Tove')
		         ->or_like('FirstName','Ola')
		         ->or_like('Gender','M');*/
			$this->db->group_end();
		}

		if ($group != null)
			$this->db->group_by($group);
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*End Model*/
}
