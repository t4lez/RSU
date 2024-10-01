<?php if (!defined('BASEPATH'))
	exit('No direct script allowed');

class Booking_mdl extends CI_Model
{
	var $date;
	public $tblData = "tbl_booking";
	public $tblKey = 'bookingId';
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->date = date("Y-m-d");
	}
	/*Model*/
	var $arrStatus = array("1" => "Aktif", "0" => "Non Aktif");

	function get($select = '*', $where = [], $join = [], $single = false)
	{
		$result = $single ? 'row' : 'result';
		$this->db
			->select($select)
			->order_by("$this->tblData.$this->tblKey", "desc")
			->group_by("$this->tblData.$this->tblKey")
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
		$query = $this->db->get($this->tblData);
		return $query->num_rows() > 0 ? $query->$result() : false;
	}

	function get_data_single($select, $table, $where = null, $join = null)
	{
		$this->db->select($select);
		$this->db->from($table);
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
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else
			return false;
	}

	function isDataExist($kode)
	{
		$this->db->where($this->tblKey, $kode);
		$query = $this->db->get($this->tblData);
		if ($query->num_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}
	function cekWhere($arrwhere)
	{
		$this->db->where($arrwhere);
		$query = $this->db->get($this->tblData);
		if ($query->num_rows() > 0)
			return TRUE;
		else
			return FALSE;
	}

	function insertErr($param)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$sql = $this->db->insert($this->tblData, $param);
		$db_error = $this->db->error();
		//pause($db_error);
		if (empty($db_error["message"])) {
			//pause($db_error);
			$sql = FALSE;
		} else
			$sql = $db_error["message"];
		$this->db->db_debug = $db_debug;
		return $sql;
	}

	function deleteErr($kode)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$this->db->where($this->tblKey, $kode);
		$sql = $this->db->delete($this->tblData);
		$db_error = $this->db->error();
		if (empty($db_error["message"])) {
			//pause($db_error);
			$sql = FALSE;
		} else
			$sql = $db_error["message"];
		$this->db->db_debug = $db_debug;
		return $sql;
	}

	function updateErr($arrwhere, $param)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$this->db->where($arrwhere);
		$sql = $this->db->update($this->tblData, $param);
		$db_error = $this->db->error();
		//pause($db_error);
		if (empty($db_error["message"])) {
			//pause($db_error);
			$sql = FALSE;
		} else
			$sql = $db_error["message"];
		$this->db->db_debug = $db_debug;
		return $sql;
	}

	function data_by_id($limit, $offset, $ordercol, $orderby = 'DESC', $select, $where = null, $join = null, $like = null, $group = null)
	{
		$this->db->select($select);
		$this->db->select("DATE_FORMAT($this->tblData.createAt, '%H:%i:%s %d-%m-%Y' ) as date_human", FALSE);
		$this->db->from($this->tblData);
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
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			//pause();
			return $query->result();
		} else
			return array();
	}
	public function get_count_record($select, $where = null, $like = null, $join = null, $group = null)
	{
		$this->db->select($select);
		$this->db->from($this->tblData);
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

	function cekWhereKode($arrWhere = null, $orWhere = null)
	{
		if ($arrWhere !== null)
			$this->db->where($arrWhere);
		if ($orWhere !== null) {
			$this->db->group_start()
				->or_where($orWhere);
			$this->db->group_end();
		}
		$query = $this->db->get($this->tblData);
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return false;
	}

	function check_available_room($ruanganId)
	{
		$total_ruangan = $this->db->get_where('tbl_ruangan as r', ['ruanganId' => $ruanganId])->row()->jumlahKamar ?? 0;
		$used_room = $this->db->select('COUNT(bookingId) as total')->get_where("$this->tblData as b", ['status' => 0, 'ruanganId' => $ruanganId])->row()->total ?? 0;
		return $total_ruangan - $used_room;
	}

	function get_popular_by_kelas()
	{
		return $this->db->select('COUNT(b.ruanganId) as total, b.kelasId, b.ruanganId, r.namaRuangan, k.namaKelas, r.backgroundColor, r.foregroundColor')
			->join('tbl_ruangan_kelas as k', 'k.kelasId=b.kelasId')
			->join('tbl_ruangan as r', 'r.ruanganId=b.ruanganId')
			->group_by('b.kelasId')
			->order_by('total', 'DESC')
			->limit(3)
			->get_where("$this->tblData as b", [])
			->result();
	}
	/*End Model*/
}
